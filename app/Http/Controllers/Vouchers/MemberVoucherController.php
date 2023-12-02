<?php

namespace App\Http\Controllers\Vouchers;

use App\Http\Controllers\Controller;

use App\Models\Vouchers\MemberVoucher;
use App\Models\Vouchers\MemberVoucherBkdn;
use App\Models\Vouchers\GeneralLedger;
use App\Models\OurMember;
use App\Models\MembershipType;
use Illuminate\Http\Request;
use App\Models\Accounts\Sub_head;
use App\Models\Accounts\Child_one;
use App\Models\Accounts\Child_two;

use DB;
use Session;
use Exception;
use Toastr;

class MemberVoucherController extends VoucherController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberVoucher= MemberVoucher::paginate(10);
        return view('voucher.memberVoucher.index',compact('memberVoucher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymethod=$this->incomeHead();
        $membertype= MembershipType::get();
        return view('voucher.memberVoucher.create',compact('paymethod','membertype'));
    }
    public function incomeHead(){
        $paymethod=array();
        $account_data=Sub_head::where('head_code',4100)->first();
        
        if($account_data){
            $childonehead=Child_one::where('sub_head_id',$account_data->id);
            if($childonehead->count() > 0){
                $childonehead=$childonehead->get();
                foreach($childonehead as $coh){
                    $childtwohead=Child_two::where('child_one_id',$coh->id);
                    if($childtwohead->count() > 0){
                        $childtwohead=$childtwohead->get();
                        foreach($childtwohead as $sh){
                            $paymethod[]=array(
                                            'id'=>$sh->id,
                                            'head_code'=>$sh->head_code,
                                            'head_name'=>$sh->head_name,
                                            'table_name'=>'child_twos'
                                        );
                        }
                    }else{
                        $paymethod[]=array(
                            'id'=>$coh->id,
                            'head_code'=>$coh->head_code,
                            'head_name'=>$coh->head_name,
                            'table_name'=>'child_twos'
                        );
                    }
                }
            }else{
                $paymethod[]=array(
                    'id'=>$account_data->id,
                    'head_code'=>$account_data->head_code,
                    'head_name'=>$account_data->head_name,
                    'table_name'=>'child_ones'
                );
            }
                
            
        }

        return $paymethod;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        try {
            DB::beginTransaction();
            $voucher_no = $this->create_voucher_no();
            if(!empty($voucher_no)){
                $jv=new MemberVoucher;
                $jv->voucher_no=$voucher_no;
                $jv->current_date=$request->current_date;
                $jv->pay_name=$request->pay_name;
                $jv->purpose=$request->purpose;
                $jv->credit_sum=$request->debit_sum;
                $jv->debit_sum=$request->debit_sum;
                $jv->created_by=currentUserId();
                if($jv->save()){
                    $account_codes=$request->account_code;
                    $credit=$request->credit;
                    $debit=$request->debit;
                    if($request->member_type)
                        $member=OurMember::where('status',2)->where('membership_applied',$request->member_type)->pluck('id');
                    else
                        $member=OurMember::where('status',2)->pluck('id');

                    if($member){
                        foreach($member as $mem){
                            $jvb=new MemberVoucherBkdn;
                            $jvb->eyear=$request->year;
                            $jvb->emonth=$request->month;
                            $jvb->member_voucher_id=$jv->id;
                            $jvb->particulars="Due";
                            $jvb->account_code="1130".$mem;
                            $jvb->table_name="child_twos";
                            $jvb->table_id=Child_two::where('head_code',"1130".$mem)->first()->id;
                            $jvb->debit=$request->debit_sum;
                            if($jvb->save()){
                                $gl=new GeneralLedger;
                                $gl->member_voucher_id=$jv->id;
                                $gl->journal_title=$jvb->particulars;
                                $gl->rec_date=$request->current_date;
                                $gl->jv_id=$voucher_no;
                                $gl->member_voucher_bkdn_id=$jvb->id;
                                $gl->created_by=currentUserId();
                                $gl->dr=$request->debit_sum;
                                $gl->child_two_id=$jvb->table_id;
                                $gl->save();
                            }
                        }
                    }
					if(sizeof($account_codes)>0){
                        foreach($account_codes as $i=>$acccode){
                            $acccode=explode('~',$acccode);
                            $jvb=new MemberVoucherBkdn;
                            $jvb->credit_voucher_id=$jv->id;
                            $jvb->particulars=!empty($request->remarks[$i])?$request->remarks[$i]:"";
                            $jvb->account_code=!empty($acccode)?$acccode:"";
                            $jvb->table_name=!empty($request->table_name[$i])?$request->table_name[$i]:"";
                            $jvb->table_id=!empty($request->table_id[$i])?$request->table_id[$i]:"";
                            $jvb->credit=!empty($request->debit[$i])?$request->debit[$i]:0;
                            if($jvb->save()){
                                $table_name=$request->table_name[$i];
                                if($table_name=="master_accounts"){$field_name="master_account_id";}
    							else if($table_name=="sub_heads"){$field_name="sub_head_id";}
    							else if($table_name=="child_ones"){$field_name="child_one_id";}
    							else if($table_name=="child_twos"){$field_name="child_two_id";}
    							$gl=new GeneralLedger;
                                $gl->credit_voucher_id=$jv->id;
                                $gl->journal_title=!empty($acccode)?$acccode:"";
                                $gl->rec_date=$request->current_date;
                                $gl->jv_id=$voucher_no;
                                $gl->crvoucher_bkdn_id=$jvb->id;
                                $gl->created_by=currentUserId();
                                $gl->cr=!empty($request->debit[$i])?$request->debit[$i]:0;
                                $gl->{$field_name}=!empty($request->table_id[$i])?$request->table_id[$i]:"";
                                $gl->save();
                            }
                        }
                    }
                }
                DB::commit();
				\Toastr::success('Successfully created');
				return redirect()->route(currentUser().'.credit.index');
			}
		}catch (Exception $e) {
			// dd($e);
			\Toastr::error('Please try again');
			DB::rollBack();
			return redirect()->back()->withInput();
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberVoucher  $creditVoucher
     * @return \Illuminate\Http\Response
     */
    public function show(MemberVoucher $creditVoucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberVoucher  $creditVoucher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $creditVoucher=MemberVoucher::findOrFail(encryptor('decrypt',$id));
		$crevoucherbkdn=MemberVoucherBkdn::where('credit_voucher_id',$id)->get();
		return view('voucher.creditVoucher.edit',compact('creditVoucher','crevoucherbkdn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberVoucher  $creditVoucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		try {
			$cv= MemberVoucher::findOrFail(encryptor('decrypt',$id));
			$cv->current_date = $request->current_date;
			$cv->pay_name = $request->pay_name;
			$cv->purpose = $request->purpose;
			$cv->cheque_no = $request->cheque_no;
			$cv->cheque_dt = $request->cheque_dt;
			$cv->bank = $request->bank;
			if($request->has('slip')){
				$imageName= rand(111,999).time().'.'.$request->slip->extension();
				$request->slip->move(public_path('uploads/slip'), $imageName);
				$cv->slip=$imageName;
			}
			$cv->save();
			\Toastr::success('Successfully Updated');
        	return redirect()->route(currentUser().'.credit.index');
		}catch (Exception $e) {
			// dd($e);
			\Toastr::error('Please try again');
			DB::rollBack();
			return redirect()->back()->withInput();
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberVoucher  $creditVoucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberVoucher $creditVoucher)
    {
        //
    }
}
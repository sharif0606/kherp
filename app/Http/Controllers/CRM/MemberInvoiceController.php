<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Vouchers\VoucherController;


use App\Models\CRM\MemberInvoice;
use App\Models\CRM\MemberInvoiceDetail;

use App\Models\Vouchers\MemberVoucher;
use App\Models\Vouchers\MemberVoucherBkdn;
use App\Models\Vouchers\GeneralLedger;
use App\Models\Accounts\Child_two;

use App\Models\OurMember;
use App\Models\CRM\MemberFeeCategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Carbon\Carbon;
use DB;


class MemberInvoiceController extends VoucherController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymethod=$this->cashHead();
        $data = MemberInvoice::all();
        return view('crm.member_invoice.index',compact('data','paymethod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fees = MemberFeeCategory::all();
        $member = OurMember::select('id','given_name','surname','membership_no')->get();
        $paymethod=$this->cashHead();
        return view('crm.member_invoice.create',compact('fees','member','paymethod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $fee=new MemberInvoice;
            $fee->purpose=$request->purpose;
            $fee->invoice_date=$request->invoice_date;
            $fee->member_id=$request->member_id;
            $fee->year=$request->year;
            $fee->month=$request->month;
            $fee->status=$request->status;
            $fee->total_amount=$request->total_amount;
            if($fee->save()){
                $commitflag=0;//check if any fee has amount
                if($request->amount){
                    foreach($request->amount as $i=>$amount){
                        if($amount > 0){
                            $mc=new MemberInvoiceDetail;
                            $mc->member_invoice_id=$fee->id;
                            $mc->fee_category_id=$request->fee_category_id[$i];
                            $mc->amount=$request->amount[$i];
                            if($mc->save()){
                            
                                /* member voucher */
                                $voucher_no = $this->create_voucher_no();
                                if(!empty($voucher_no)){
                                    $jv=new MemberVoucher;
                                    $jv->voucher_no=$voucher_no;
                                    $jv->member_id=$request->member_id;
                                    $jv->current_date=$request->invoice_date;
                                    $jv->eyear=$request->year;
                                    $jv->emonth=$request->month;
                                    $jv->pay_name="";
                                    $jv->purpose=$request->fee_name[$i]." Due";
                                    $jv->credit_sum=$mc->amount;
                                    $jv->debit_sum=$mc->amount;
                                    $jv->created_by=currentUserId();
                                    if($jv->save()){
                                        /* debit side */
                                        $headdata=Child_two::where('head_code',"1130".$request->member_id)->first();
                                        
                                        $jvb=new MemberVoucherBkdn;
                                        $jvb->member_id=$request->member_id;
                                        $jvb->eyear=$request->year;
                                        $jvb->emonth=$request->month;
                                        $jvb->member_voucher_id=$jv->id;
                                        $jvb->particulars="Due";
                                        $jvb->account_code=$headdata->head_code.'-'.$headdata->head_name;
                                        $jvb->table_name="child_twos";
                                        $jvb->table_id=$headdata->id;
                                        $jvb->debit=$mc->amount;
                                        if($jvb->save()){
                                            $gl=new GeneralLedger;
                                            $gl->member_voucher_id=$jv->id;
                                            $gl->journal_title=$jv->purpose;
                                            $gl->rec_date=$request->invoice_date;
                                            $gl->jv_id=$voucher_no;
                                            $gl->member_voucher_bkdn_id=$jvb->id;
                                            $gl->created_by=currentUserId();
                                            $gl->dr=$mc->amount;
                                            $gl->child_two_id=$jvb->table_id;
                                            $gl->save();
                                        }
                                        
                                        /* credit side */
                                        $acccode=MemberFeeCategory::find($request->fee_category_id[$i]);

                                        $jvb=new MemberVoucherBkdn;
                                        $jvb->member_voucher_id=$jv->id;
                                        $jvb->eyear=$request->year;
                                        $jvb->emonth=$request->month;
                                        $jvb->particulars="Due";
                                        $jvb->account_code=$acccode->code;
                                        $jvb->table_name=$acccode->account_table_name;
                                        $jvb->table_id=$acccode->account_id;
                                        $jvb->credit=$mc->amount;
                                        if($jvb->save()){
                                            $table_name=$jvb->table_name;
                                            if($table_name=="master_accounts"){$field_name="master_account_id";}
                                            else if($table_name=="sub_heads"){$field_name="sub_head_id";}
                                            else if($table_name=="child_ones"){$field_name="child_one_id";}
                                            else if($table_name=="child_twos"){$field_name="child_two_id";}
                                            $gl=new GeneralLedger;
                                            $gl->member_voucher_id=$jv->id;
                                            $gl->journal_title=$jv->purpose;
                                            $gl->rec_date=$request->invoice_date;
                                            $gl->jv_id=$voucher_no;
                                            $gl->member_voucher_bkdn_id=$jvb->id;
                                            $gl->created_by=currentUserId();
                                            $gl->cr=$jvb->credit;
                                            $gl->{$field_name}=$acccode->account_id;
                                            $gl->save();
                                            
                                            $commitflag=1;
                                        }

                                        /* update jv id to invice details table */
                                        $mc->jv_id=$jv->id;
                                        $mc->save();
                                    }
                                }
                            }
                        }
                    }
                }
                if($commitflag==1){
                    DB::commit();

                    if($request->status==1)
                        $this->invoice_payment($request, $fee->id);

                    Toastr::success('Create Successfully!');
                    return redirect()->route(currentUser().'.member-invoice.index');
                }else{
                    DB::rollback();
                    Toastr::warning('Minimum one fee is required.');
                    return back()->withInput();
                }
            }
        }
        catch (Exception $e){
            DB::rollback();
            Toastr::warning('Please try Again!');
            dd($e);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberInvoice  $MemberInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(MemberInvoice $MemberInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberInvoice  $MemberInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feeDetails = MemberInvoice::findOrFail(encryptor('decrypt',$id));
        $fees = MemberFeeCategory::all();
        $member = OurMember::select('id','given_name','surname','membership_no')->get();
        $feeCollectionDetails = MemberInvoiceDetail::where('member_invoice_id',$feeDetails->id)->pluck('amount','fee_category_id');
        $paymethod=$this->cashHead();
        return view('crm.member_invoice.edit',compact('feeDetails','feeCollectionDetails','fees','member','paymethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberInvoice  $MemberInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $fee= MemberInvoice::findOrFail(encryptor('decrypt',$id));
            $fee->purpose=$request->purpose;
            $fee->invoice_date=$request->invoice_date;
            $fee->member_id=$request->member_id;
            $fee->year=$request->year;
            $fee->month=$request->month;
            $fee->status=$request->status;
            $fee->total_amount=$request->total_amount;
            if($fee->save()){
                if($request->old_status==0 && $request->total_amount != $request->old_total){
                    if($request->amount){
                        $oldinvoiceid=MemberInvoiceDetail::where('MemberInvoices_id',$fee->id)->pluck('jv_id');//get old voucher
                        MemberInvoiceDetail::where('MemberInvoices_id',$fee->id)->delete();//delete old invoice
                        MemberVoucher::whereIn('id',$oldinvoiceid)->delete();//delete old voucher
                        MemberVoucherBkdn::whereIn('member_voucher_id',$oldinvoiceid)->delete();//delete old voucher
                        GeneralLedger::whereIn('member_voucher_id',$oldinvoiceid)->delete();//delete old voucher

                        $commitflag=0;//check if any fee has amount
                        if($request->amount){
                            foreach($request->amount as $i=>$amount){
                                if($amount > 0){
                                    $mc=new MemberInvoiceDetail;
                                    $mc->member_invoice_id=$fee->id;
                                    $mc->fee_category_id=$request->fee_category_id[$i];
                                    $mc->amount=$request->amount[$i];
                                    if($mc->save()){
                                        /* member voucher */
                                        $voucher_no = $this->create_voucher_no();
                                        if(!empty($voucher_no)){
                                            $jv=new MemberVoucher;
                                            $jv->voucher_no=$voucher_no;
                                            $jv->member_id=$request->member_id;
                                            $jv->current_date=$request->invoice_date;
                                            $jv->eyear=$request->year;
                                            $jv->emonth=$request->month;
                                            $jv->pay_name="";
                                            $jv->purpose=$request->fee_name[$i]." Due";
                                            $jv->credit_sum=$mc->amount;
                                            $jv->debit_sum=$mc->amount;
                                            $jv->created_by=currentUserId();
                                            if($jv->save()){
                                                /* debit side */
                                                $headdata=Child_two::where('head_code',"1130".$request->member_id)->first();
                                                
                                                $jvb=new MemberVoucherBkdn;
                                                $jvb->member_id=$request->member_id;
                                                $jvb->eyear=$request->year;
                                                $jvb->emonth=$request->month;
                                                $jvb->member_voucher_id=$jv->id;
                                                $jvb->particulars="Due";
                                                $jvb->account_code=$headdata->head_code.'-'.$headdata->head_name;
                                                $jvb->table_name="child_twos";
                                                $jvb->table_id=$headdata->id;
                                                $jvb->debit=$mc->amount;
                                                if($jvb->save()){
                                                    $gl=new GeneralLedger;
                                                    $gl->member_voucher_id=$jv->id;
                                                    $gl->journal_title=$jv->purpose;
                                                    $gl->rec_date=$request->invoice_date;
                                                    $gl->jv_id=$voucher_no;
                                                    $gl->member_voucher_bkdn_id=$jvb->id;
                                                    $gl->created_by=currentUserId();
                                                    $gl->dr=$mc->amount;
                                                    $gl->child_two_id=$jvb->table_id;
                                                    $gl->save();
                                                }
                                                
                                                /* credit side */
                                                $acccode=MemberFeeCategory::find($request->fee_category_id[$i]);
        
                                                $jvb=new MemberVoucherBkdn;
                                                $jvb->member_voucher_id=$jv->id;
                                                $jvb->eyear=$request->year;
                                                $jvb->emonth=$request->month;
                                                $jvb->particulars="Due";
                                                $jvb->account_code=$acccode->code;
                                                $jvb->table_name=$acccode->account_table_name;
                                                $jvb->table_id=$acccode->account_id;
                                                $jvb->credit=$mc->amount;
                                                if($jvb->save()){
                                                    $table_name=$jvb->table_name;
                                                    if($table_name=="master_accounts"){$field_name="master_account_id";}
                                                    else if($table_name=="sub_heads"){$field_name="sub_head_id";}
                                                    else if($table_name=="child_ones"){$field_name="child_one_id";}
                                                    else if($table_name=="child_twos"){$field_name="child_two_id";}
                                                    $gl=new GeneralLedger;
                                                    $gl->member_voucher_id=$jv->id;
                                                    $gl->journal_title=$jv->purpose;
                                                    $gl->rec_date=$request->invoice_date;
                                                    $gl->jv_id=$voucher_no;
                                                    $gl->member_voucher_bkdn_id=$jvb->id;
                                                    $gl->created_by=currentUserId();
                                                    $gl->cr=$jvb->credit;
                                                    $gl->{$field_name}=$acccode->account_id;
                                                    $gl->save();
                                                    
                                                    $commitflag=1;
                                                }
        
                                                /* update jv id to invice details table */
                                                $mc->jv_id=$jv->id;
                                                $mc->save();
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    if($commitflag==1){
                        DB::commit();
                        if($request->status==1)
                            $this->invoice_payment($request, $fee->id);
                        Toastr::success('Update Successfully!');
                        return redirect()->route(currentUser().'.member-invoice.index');
                    }else{
                        DB::rollback();
                        Toastr::warning('Minimum one fee is required.');
                        return back()->withInput();
                    }
                }else{
                    DB::commit();
                    Toastr::success('Update Successfully!');
                    return redirect()->route(currentUser().'.member-invoice.index');
                }
            }
        }
        catch (Exception $e){
            DB::rollback();
            Toastr::warning('Please try Again!');
            // dd($e);
            return back()->withInput();

        }
    }

    /* paynow voucher ready */
    public function pay_now(Request $request,$id) 
    {
        $this->invoice_payment($request, $id);
        return redirect()->route(currentUser().'.member-invoice.index');
    }
    /* payment invoice voucher */
    public function invoice_payment(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $commitflag=0;

            $voucher_no = $this->create_voucher_no();
            if(!empty($voucher_no)){
                $fee= MemberInvoice::find($id);

                if(!empty($fee->jv_id)){
                    MemberVoucher::where('id',$fee->jv_id)->delete();//delete old voucher
                    MemberVoucherBkdn::where('member_voucher_id',$fee->jv_id)->delete();//delete old voucher
                    GeneralLedger::where('member_voucher_id',$fee->jv_id)->delete();//delete old voucher
                }

                $jv=new MemberVoucher;
                $jv->voucher_no=$voucher_no;
                $jv->member_id=$fee->member_id;

                $jv->current_date=$request->invoice_date;

                $jv->eyear=$fee->year;
                $jv->emonth=$fee->month;
                $jv->pay_name="";
                $jv->purpose=$fee->purpose." Payment";
                $jv->credit_sum=$fee->total_amount;
                $jv->debit_sum=$fee->total_amount;
                $jv->created_by=currentUserId();
                if($jv->save()){
                    /* debit side */
                    $debit=$request->debit;
                    
                    if($debit){
                        $debit=explode('~',$debit);
                        $jvb=new MemberVoucherBkdn;
                        $jvb->member_id=$fee->member_id;
                        $jvb->eyear=$fee->year;
                        $jvb->emonth=$fee->month;
                        $jvb->member_voucher_id=$jv->id;
                        $jvb->particulars="Received from";
                        $jvb->account_code=$debit[2];
                        $jvb->table_name=$debit[0];
                        $jvb->table_id=$debit[1];
                        $jvb->debit=$fee->total_amount;
                        if($jvb->save()){
                            $table_name=$debit[0];
                            if($table_name=="master_accounts"){$field_name="master_account_id";}
                            else if($table_name=="sub_heads"){$field_name="sub_head_id";}
                            else if($table_name=="child_ones"){$field_name="child_one_id";}
                            else if($table_name=="child_twos"){$field_name="child_two_id";}
                            $gl=new GeneralLedger;
                            $gl->member_voucher_id=$jv->id;
                            $gl->journal_title=$jv->purpose;
                            $gl->rec_date=$jv->current_date;
                            $gl->jv_id=$voucher_no;
                            $gl->member_voucher_bkdn_id=$jvb->id;
                            $gl->created_by=currentUserId();
                            $gl->dr=$fee->total_amount;
                            $gl->{$field_name}=$debit[1];
                            $gl->save();
                        }
                    }

                    
                    /* credit side */
                    $headdata=Child_two::where('head_code',"1130".$fee->member_id)->first();
                    
                    $jvb=new MemberVoucherBkdn;
                    $jvb->member_id=$fee->member_id;
                    $jvb->eyear=$fee->year;
                    $jvb->emonth=$fee->month;
                    $jvb->member_voucher_id=$jv->id;
                    $jvb->particulars="Due Payment";
                    $jvb->account_code=$headdata->head_code.'-'.$headdata->head_name;
                    $jvb->table_name="child_twos";
                    $jvb->table_id=$headdata->id;
                    $jvb->credit=$fee->total_amount;
                    if($jvb->save()){
                        $gl=new GeneralLedger;
                        $gl->member_voucher_id=$jv->id;
                        $gl->journal_title=$jv->purpose;
                        $gl->rec_date=$jv->current_date;
                        $gl->jv_id=$voucher_no;
                        $gl->member_voucher_bkdn_id=$jvb->id;
                        $gl->created_by=currentUserId();
                        $gl->cr=$fee->total_amount;
                        $gl->child_two_id=$jvb->table_id;
                        $gl->save();
                        $commitflag=1;
                    }
                    
                    /* update jv id to invice details table */
                    $fee->status=1;
                    $fee->jv_id=$jv->id;
                    $fee->save();
                }
                
                if($commitflag==1){
                    DB::commit();
                    Toastr::success('Update Successfully!');
                    return true;
                }else{
                    DB::rollback();
                    Toastr::warning('Please try Again!');
                    return false;
                }
            }else{
                Toastr::warning('Please try Again!');
                return false;
            }
        }catch (Exception $e){
            DB::rollback();
            Toastr::warning('Please try Again!');
            // dd($e);
            return false;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberInvoice  $MemberInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberInvoice $MemberInvoice)
    {
        //
    }
}
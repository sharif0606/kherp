<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;


use App\Models\Accounts\Child_one;
use App\Models\Accounts\Child_two;
use App\Models\Accounts\Sub_head;
use App\Models\CRM\MemberFeeCategory;
use App\Models\CRM\MembershipType;
use Illuminate\Http\Request;

class MemberFeeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MemberFeeCategory::all();
        return view('crm.fees_category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymethod=array();
        $account_data=Sub_head::whereIn('head_code',[4100,4200])->get();
        
        if($account_data){
            foreach($account_data as $ad){
                $shead=Child_one::where('sub_head_id',$ad->id);
                if($shead->count() > 0){
                    $chonehead=Child_two::where('child_one_id',$ad->id);
                    if($chonehead->count() > 0){
                        $chonehead=$chonehead->get();
                        foreach($chonehead as $cho){
                            $paymethod[]=array(
                                            'id'=>$cho->id,
                                            'head_code'=>$cho->head_code,
                                            'head_name'=>$cho->head_name,
                                            'table_name'=>'child_twos'
                                        );
                        }
                    }else{
                        $shead=$shead->get();
                        foreach($shead as $sh){
                            $paymethod[]=array(
                                            'id'=>$sh->id,
                                            'head_code'=>$sh->head_code,
                                            'head_name'=>$sh->head_name,
                                            'table_name'=>'child_ones'
                                        );
                        }
                    }
                }else{
                    $paymethod[]=array(
                        'id'=>$ad->id,
                        'head_code'=>$ad->head_code,
                        'head_name'=>$ad->head_name,
                        'table_name'=>'sub_heads'
                    );
                }
                
            }
        }
        $member_type=MembershipType::get();

        return view('crm.fees_category.create',compact('paymethod','member_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $account_code=explode('~',$request->payment_head);
            $b= new MemberFeeCategory;
            $b->code=$account_code[3].'-'.$account_code[2];
            $b->account_table_name=$account_code[0];
            $b->account_id=$account_code[1];
            $b->membership_type_id=$request->membership_type_id;
            $b->purpose=$request->purpose;
            $b->amount=$request->amount;
            if($b->save()){
                \Toastr::success('Created Successfully!');
                return redirect()->route(currentUser().'.fees_category.index');
            }
        }
        catch (Exception $e){
            \Toastr::warning('Please try Again!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberFeeCategory  $MemberFeeCategory
     * @return \Illuminate\Http\Response
     */
    public function show(MemberFeeCategory $MemberFeeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberFeeCategory  $MemberFeeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paymethod=array();
        $account_data=Sub_head::whereIn('head_code',[4100,4200])->get();
        
        if($account_data){
            foreach($account_data as $ad){
                $shead=Child_one::where('sub_head_id',$ad->id);
                if($shead->count() > 0){
                    $chonehead=Child_two::where('child_one_id',$ad->id);
                    if($chonehead->count() > 0){
                        $chonehead=$chonehead->get();
                        foreach($chonehead as $cho){
                            $paymethod[]=array(
                                            'id'=>$cho->id,
                                            'head_code'=>$cho->head_code,
                                            'head_name'=>$cho->head_name,
                                            'table_name'=>'child_twos'
                                        );
                        }
                    }else{
                        $shead=$shead->get();
                        foreach($shead as $sh){
                            $paymethod[]=array(
                                            'id'=>$sh->id,
                                            'head_code'=>$sh->head_code,
                                            'head_name'=>$sh->head_name,
                                            'table_name'=>'child_ones'
                                        );
                        }
                    }
                }else{
                    $paymethod[]=array(
                        'id'=>$ad->id,
                        'head_code'=>$ad->head_code,
                        'head_name'=>$ad->head_name,
                        'table_name'=>'sub_heads'
                    );
                }
                
            }
        }
        $member_type=MembershipType::get();

        $data= MemberFeeCategory::findOrFail(encryptor('decrypt',$id));
        return view('crm.fees_category.edit',compact('data','paymethod','member_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberFeeCategory  $MemberFeeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $account_code=explode('~',$request->payment_head);

            $b= MemberFeeCategory::findOrFail(encryptor('decrypt',$id));
            $b->code=$account_code[3].'-'.$account_code[2];
            $b->account_table_name=$account_code[0];
            $b->account_id=$account_code[1];
            $b->membership_type_id=$request->membership_type_id;
            $b->purpose=$request->purpose;
            $b->amount=$request->amount;
            if($b->save()){
                \Toastr::success('Update Successfully!');
                return redirect()->route(currentUser().'.fees_category.index');
            }
        }
        catch (Exception $e){
            \Toastr::warning('Please try Again!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberFeeCategory  $MemberFeeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b= MemberFeeCategory::findOrFail(encryptor('decrypt',$id));
        if($b->delete()){
            \Toastr::success('Deleted Successfully!');
        }else{
            \Toastr::warning('Please try Again!');
        }
        return redirect()->back();
    }
}

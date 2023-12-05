<?php

namespace App\Http\Controllers;

use App\Models\MembershipType;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use DB;

class MembershipTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MembershipType::all();
        return view('membershipType.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('membershipType.create');
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
            $b= new MembershipType;
            $b->member_type=$request->member_type;
            $b->fee_amount=$request->fee_amount;
            if($b->save()){
                Toastr::success('Created Successfully!');
                return redirect()->route(currentUser().'.memberType.index');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }

        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MembershipType  $membershipType
     * @return \Illuminate\Http\Response
     */
    public function show(MembershipType $membershipType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MembershipType  $membershipType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membertype = MembershipType::findOrFail(encryptor('decrypt',$id));
        return view('membershipType.edit',compact('membertype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MembershipType  $membershipType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $b= MembershipType::findOrFail(encryptor('decrypt',$id));
            $b->member_type=$request->member_type;
            $b->fee_amount=$request->fee_amount;
            if($b->save()){
                Toastr::success('Update Successfully!');
                return redirect()->route(currentUser().'.memberType.index');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }

        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MembershipType  $membershipType
     * @return \Illuminate\Http\Response
     */
    public function destroy(MembershipType $membershipType)
    {
        //
    }
}

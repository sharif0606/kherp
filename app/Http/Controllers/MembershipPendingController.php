<?php

namespace App\Http\Controllers;

use App\Models\MembershipPending;
use App\Models\MembershipPendingDetail;
use App\Models\CRM\MembershipType;
use App\Models\OurMember;
use Illuminate\Http\Request;

class MembershipPendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MembershipPending::paginate(12);
        return view('memberPending.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $memberType= MembershipType::all();
        return view('memberPending.create',compact('memberType'));
    }

    public function get_member_fee(Request $request)
    {
        $mType = $request->input('member_type');
        $fee = MembershipType::where('id',$mType)->first();
        return response()->json(['data' => $fee]);
    }

    public function get_members(Request $request)
    {
        $mType = $request->input('member_type');
        $year = $request->input('selected_year');
        $month = $request->input('selected_month');
        $member = OurMember::where('membership_applied',$mType)->get();
        // $mPending = MembershipPending::where('membership_type_id',$mType)->where('year',$year)->where('month',$month)->first();
        // $pendingDetails = MembershipPendingDetail::where('id',$mPending->id)->pluck('amount','member_id');
        return response()->json(['data' => $member]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MembershipPending  $membershipPending
     * @return \Illuminate\Http\Response
     */
    public function show(MembershipPending $membershipPending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MembershipPending  $membershipPending
     * @return \Illuminate\Http\Response
     */
    public function edit(MembershipPending $membershipPending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MembershipPending  $membershipPending
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MembershipPending $membershipPending)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MembershipPending  $membershipPending
     * @return \Illuminate\Http\Response
     */
    public function destroy(MembershipPending $membershipPending)
    {
        //
    }
}

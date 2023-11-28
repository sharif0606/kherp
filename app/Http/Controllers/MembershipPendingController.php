<?php

namespace App\Http\Controllers;

use App\Models\MembershipPending;
use App\Models\MembershipType;
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

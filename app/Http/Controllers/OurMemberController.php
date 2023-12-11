<?php

namespace App\Http\Controllers;

use App\Models\OurMember;
use App\Models\MemberChildren;
use App\Models\OtherClubDetails;
use Illuminate\Http\Request;
use App\Http\Requests\OurMember\AddNewRequest;
use App\Http\Requests\OurMember\UpdateRequest;
use App\Http\Traits\ImageHandleTraits;
use App\Models\Accounts\Child_one;
use App\Models\Accounts\Child_two;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Exception;
use Carbon\Carbon;

class OurMemberController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourmember=OurMember::where('status',2)->paginate(12);
        return view('ourmember.index',compact('ourmember'));
    }

    public function customerView()
    {
        $ourmember=OurMember::where('status',2)->paginate(12);
        return view('ourmember.dueMember',compact('ourmember'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approvedMember()
    {
        $ourmember=OurMember::where('status',2)->paginate(10);
        return view('ourmember.approveMember',compact('ourmember'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ourmember.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $request)
    {
        try{
            $member=new OurMember;

            $member->given_name=$request->given_name;
            $member->surname=$request->surname;
            $member->father_name=$request->Fathers;
            $member->mother_name=$request->mothersName;
            $member->marital_status=$request->marit_status;
            $member->anniversary=$request->anniversary;
            $member->name_of_spouse=$request->namespouse;
            $member->occupation_of_spouse=$request->occupation_spouse;
            $member->birth_date=$request->dateOfBirth;
            $member->place_of_birth=$request->placeOfBirth;
            $member->cell_number=$request->cellno;
            $member->tel_number=$request->tel;
            $member->email=$request->emailAddress;
            $member->password=Hash::make($request->password);
            $member->nationality=$request->nationality;
            $member->national_id=$request->nationalid;
            $member->passport_no=$request->passportNo;
            $member->blood_group=$request->bloodGroup;
            $member->qualification=$request->qualification;
            $member->name_of_institute=$request->namOfInstitution;
            $member->e_tin_number=$request->tinNo;
            $member->village=$request->vill;
            $member->block=$request->block;
            $member->police_station=$request->policeStation;
            $member->post_office=$request->postoffice;
            $member->postalCode=$request->postalCode;
            $member->district=$request->district;
            $member->country=$request->country;
            $member->perVillage=$request->perVillage;
            $member->perBlock=$request->perBlock;
            $member->perPoliceStation=$request->perPoliceStation;
            $member->perPostOffice=$request->perPostOffice;
            $member->perPostalCode=$request->perPostalCode;
            $member->perDistrict=$request->perDistrict;
            $member->perCountry=$request->perCountry;
            $member->profession=$request->profession;
            $member->designation=$request->designation;
            $member->company=$request->company;
            $member->profVillage=$request->profVillage;
            $member->profBlock=$request->profBlock;
            $member->profPoliceStation=$request->profPoliceStation;
            $member->profPostOffice=$request->profPostOffice;
            $member->profPostalCode=$request->profPostalCode;
            $member->profDistrict=$request->profDistrict;
            $member->profCountry=$request->profCountry;
            $member->membership_applied=$request->categorymembership;
            $member->proposed_name=$request->proposedname;
            $member->proposed_membership_id=$request->memberNo;

            $member->role_id=5;

            // if($request->has('image'))
            //     $member->image=$this->resizeImage($request->image,'uploads/member_image',true,140,175,false);

            if($request->hasFile('image')){
                $data = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/member_image'), $data);
                $member->image=$data;
            }

            if($request->hasFile('nid')){
                $data = rand(111,999).time().'.'.$request->nid->extension();
                $request->nid->move(public_path('uploads/nid'), $data);
                $member->nid=$data;
            }
            if($request->hasFile('passport')){
                $data = rand(111,999).time().'.'.$request->passport->extension();
                $request->passport->move(public_path('uploads/passport'), $data);
                $member->passport=$data;
            }
            if($request->hasFile('etin')){
                $data = rand(111,999).time().'.'.$request->etin->extension();
                $request->etin->move(public_path('uploads/etin'), $data);
                $member->etin=$data;
            }
           
            $member->show_font=0;
            $member->status=1;
            if($member->save()){
                if($request->cname){
                    foreach($request->cname as $i=>$cname){
                        if($cname){
                            $mc=new MemberChildren;
                            $mc->member_id=$member->id;
                            $mc->name=$cname;
                            $mc->gender=$request->cgender[$i];
                            $mc->birth_date=$request->cbirth_date[$i];
                            $mc->occupation=$request->coccupation[$i];
                            $mc->save();
                        }
                    }
                }
                if($request->clubName){
                    foreach($request->clubName as $i=>$clubName){
                        if($clubName){
                            $mcl=new OtherClubDetails;
                            $mcl->member_id=$member->id;
                            $mcl->name=$clubName;
                            $mcl->membership_type=$request->membershipType[$i];
                            $mcl->year=$request->year[$i];
                            $mcl->save();
                        }
                    }
                }
                // Hit Accounts table this member id
                $id_child_one = Child_one::where('head_code','1130')->first();
                $ach = new Child_two;
                $ach->child_one_id=$id_child_one->id;
                $ach->head_name= $member->full_name;
                $ach->head_code = '1130'.$member->id;
                $ach->opening_balance =$request->openingAmount ?? 0;
                if($ach->save()){
                    $member->account_id= $ach->id;
                    $member->save();
                }
                
            Toastr::success('our Member Create Successfully!');
            return redirect()->route(currentUser().'.member.index');
            }else{
            Toastr::warning('Please try Again!');
            return redirect()->back();
            }

        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            // dd($e);
            return back()->withInput();

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OurMember  $ourMember
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_data=OurMember::findOrFail(encryptor('decrypt',$id));
        return view('ourmember.show',compact('show_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurMember  $ourMember
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member=OurMember::findOrFail(encryptor('decrypt',$id));
        return view('ourmember.edit',compact('member'));
    }

    public function editView($id)
    {
        $member=OurMember::findOrFail(encryptor('decrypt',$id));
        return view('ourmember.editView',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurMember  $ourMember
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $member=OurMember::findOrFail(encryptor('decrypt',$id));

            $member->given_name=$request->given_name;
            $member->surname=$request->surname;
            $member->father_name=$request->Fathers;
            $member->mother_name=$request->mothersName;
            $member->marital_status=$request->marit_status;
            $member->anniversary=$request->anniversary;
            $member->name_of_spouse=$request->namespouse;
            $member->occupation_of_spouse=$request->occupation_spouse;
            $member->birth_date=$request->dateOfBirth;
            $member->place_of_birth=$request->placeOfBirth;
            $member->cell_number=$request->cellno;
            $member->tel_number=$request->tel;
            $member->email=$request->emailAddress;
            if($request->has('password') && $request->password)
                $member->password=Hash::make($request->password);
            $member->nationality=$request->nationality;
            $member->national_id=$request->nationalid;
            $member->passport_no=$request->passportNo;
            $member->blood_group=$request->bloodGroup;
            $member->qualification=$request->qualification;
            $member->name_of_institute=$request->namOfInstitution;
            $member->e_tin_number=$request->tinNo;
            $member->village=$request->vill;
            $member->block=$request->block;
            $member->police_station=$request->policeStation;
            $member->post_office=$request->postoffice;
            $member->postalCode=$request->postalCode;
            $member->district=$request->district;
            $member->country=$request->country;
            $member->perVillage=$request->perVillage;
            $member->perBlock=$request->perBlock;
            $member->perPoliceStation=$request->perPoliceStation;
            $member->perPostOffice=$request->perPostOffice;
            $member->perPostalCode=$request->perPostalCode;
            $member->perDistrict=$request->perDistrict;
            $member->perCountry=$request->perCountry;
            $member->profession=$request->profession;
            $member->designation=$request->designation;
            $member->company=$request->company;
            $member->profVillage=$request->profVillage;
            $member->profBlock=$request->profBlock;
            $member->profPoliceStation=$request->profPoliceStation;
            $member->profPostOffice=$request->profPostOffice;
            $member->profPostalCode=$request->profPostalCode;
            $member->profDistrict=$request->profDistrict;
            $member->profCountry=$request->profCountry;
            $member->membership_applied=$request->categorymembership;
            $member->proposed_name=$request->proposedname;
            $member->proposed_membership_id=$request->memberNo;

            $path='uploads/member_image';
            if($request->hasFile('image')){
                $this->deleteImage($member->image,$path);
                $data = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/member_image'), $data);
                $member->image=$data;
            }

            $path2='uploads/nid';
            if($request->hasFile('nid')){
                $this->deleteImage($member->nid,$path2);
                $data = rand(111,999).time().'.'.$request->nid->extension();
                $request->nid->move(public_path('uploads/nid'), $data);
                $member->nid=$data;
            }

            $path3='uploads/passport';
            if($request->hasFile('passport')){
                $this->deleteImage($member->passport,$path3);
                $data = rand(111,999).time().'.'.$request->passport->extension();
                $request->passport->move(public_path('uploads/passport'), $data);
                $member->passport=$data;
            }

            $path4='uploads/etin';
            if($request->hasFile('etin')){
                $this->deleteImage($member->etin,$path4);
                $data = rand(111,999).time().'.'.$request->etin->extension();
                $request->etin->move(public_path('uploads/etin'), $data);
                $member->etin=$data;
            }

            $member->show_font=$request->show_font;
            $member->club_designation=$request->club_designation;
            $member->membership_no=$request->membershipno;
            $member->status=$request->status;

            if($request->status==2){
                $member->member_id='0'.Carbon::now()->format('y'). str_pad((OurMember::whereYear('created_at', Carbon::now()->year)->where('status',2)->count() + 1),3,"0",STR_PAD_LEFT);
            }else{
                $member->member_id = null;
            }

            if($member->save()){
                if($request->cname){
                    foreach($request->cname as $i=>$cname){
                        if($cname){
                            if($request->id[$i])
                                $mc=MemberChildren::find($request->id[$i]);
                            else
                                $mc=new MemberChildren;
                                $mc->member_id=$member->id;
                                $mc->name=$cname;
                                $mc->gender=$request->cgender[$i];
                                $mc->birth_date=$request->cbirth_date[$i];
                                $mc->occupation=$request->coccupation[$i];
                                $mc->save();
                        }
                    }
                }
                if($request->clubName){
                    OtherClubDetails::where('member_id',$member->id)->delete();
                    foreach($request->clubName as $i=>$clubName){
                        if($request->clubName[$i]>0){
                            $mcl=new OtherClubDetails;
                            $mcl->member_id=$member->id;
                            $mcl->name=$clubName;
                            $mcl->membership_type=$request->membershipType[$i];
                            $mcl->year=$request->year[$i];
                            $mcl->save();
                        }
                    }
                }
                $ach = Child_two::where('head_code', "1130$member->id")->first();
                if($ach){
                    $ach->head_name= $member->full_name;
                    $ach->opening_balance =$request->openingAmount ?? 0;
                    $ach->save();
                }else{
                    $id_child_one = Child_one::where('head_code','1130')->first();
                    $ach = new Child_two;
                    $ach->child_one_id= $id_child_one->id;
                    $ach->head_name= $member->full_name;
                    $ach->head_code = '1130'.$member->id;
                    $ach->opening_balance =$request->openingAmount ?? 0;
                    $ach->save();
                    $member->account_id= $ach->id;
                    $member->save();
                }
            Toastr::success('our Member Create Successfully!');
            return redirect()->route(currentUser().'.member.index');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }
        }
        catch (Exception $e){
            dd($e);
            return back()->withInput();
            Toastr::warning('Please try Again!');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurMember  $ourMember
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat= OurMember::findOrFail(encryptor('decrypt',$id));
        $cat->delete();
        Toastr::warning('Member Deleted Permanently!');
        return redirect()->back();
    }
}
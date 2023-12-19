<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//db.onlinewebfonts.com/c/1d48b2cf83cd3bb825583f7eefd80149?family=AdmiralScriptW01-Regular" rel="stylesheet" type="text/css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        @media print
        {    
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
        .tinput {
            width: 100%;
            outline: 0;
            border-style: dashed;
            border-width: 0 0 1px;
            border-color: blue;
            background-color: transparent;
        }
        input:focus {
            border-color: green;
            font-family: Montserrat !important;
        }


        .gfg {
            border-collapse:separate;
            border-spacing:0 25px;
        }
        .gfg2 {
            border-collapse:separate;
            border-spacing:0 25px;
            }

        .gfg3 {
            border-collapse:separate;
            border-spacing:0 30px;
        }

        .gfg4 {
            border-collapse:separate;
            border-spacing:0 10px;
        }
        .gfg5 {
            border-collapse:separate;
            border-spacing:0 40px;
        }
        .dtable,td, th{

            border-collapse: collapse;
        }

        .photo{

            margin: auto;
            padding-top: 1.3rem;


        }
        .pdiv{
            position: relative;
            background-color: rgb(240, 235, 235) !important;
            padding: 10px;
        }
        .pdiv p{
            font-family: 'Times New Roman', Times, serif !important;
        }
        .pbox{
            width: 120px;
            height: 114px;
            /* border-style: solid;
            border-radius: 1rem;
            border-width: 2px;
            border-color: #3939b3; */
            text-align: center;
            position: absolute;
            bottom: 9px;
            right: 80px;
            background-color: rgb(248, 239, 239);
            padding-bottom: 6px;
            padding-top: 26px;
        }
        .font{
            font-family: AdmiralScriptW01-Regular;
        }
        
        
        /* .section-heading{
            font-family: Montserrat !important;
        } */
        body{
            background-color: rgb(252, 245, 245);
            font-family: Montserrat !important;
        }
        .binput {
            width: 100%;
            outline: 0;
            border-style: dashed;
            border-width: 0 0 1px;
            border-color: blue;
            background-color: transparent;
            
        }
        .sinput {
            width: 100%;
            outline: 0;
            border-style: dashed;
            border-width: 0 0 1px;
            border-color: blue;
            background-color: transparent;
        }
        .finput {
            width: 30%;
            outline: 0;
            border-style: dashed;
            border-width: 0 0 1px;
            border-color: blue;
            background-color: transparent;
        }
        .bottominput {
            width: 80%;
            outline: 0;
            border-style: dashed;
            border-width: 0 0 1px;
            border-color: blue;
            background-color: transparent;
        }
        .bottom2input {
            width: 32%;
            outline: 0;
            border-style: dashed;
            border-width: 0 0 1px;
            border-color: blue;
            background-color: transparent;
        }
       
        .btn {
    --bs-btn-padding-x: 0.75rem;
    --bs-btn-padding-y: 0.375rem;
    --bs-btn-font-family: ;
    --bs-btn-font-size: 1rem;
    --bs-btn-font-weight: 400;
    --bs-btn-line-height: 1.5;
    --bs-btn-color: #607080;
    --bs-btn-bg: transparent;
    --bs-btn-border-width: 1px;
    --bs-btn-border-color: transparent;
    --bs-btn-border-radius: 0.25rem;
    --bs-btn-box-shadow: inset 0 1px 0 hsla(0,0%,100%,.15),0 1px 1px rgba(0,0,0,.075);
    --bs-btn-disabled-opacity: 0.65;
    --bs-btn-focus-box-shadow: 0 0 0 0.25rem rgba(var(--bs-btn-focus-shadow-rgb),.5);
    background-color: var(--bs-btn-bg);
    border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
    border-radius: var(--bs-btn-border-radius);
    color: var(--bs-btn-color);
    cursor: pointer;
    display: inline-block;
    font-family: var(--bs-btn-font-family);
    font-size: var(--bs-btn-font-size);
    font-weight: var(--bs-btn-font-weight);
    line-height: var(--bs-btn-line-height);
    padding: var(--bs-btn-padding-y) var(--bs-btn-padding-x);
    text-align: center;
    text-decoration: none;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    vertical-align: middle;
    --bs-btn-color: #fff;
    --bs-btn-bg: #435ebe;
    --bs-btn-border-color: #435ebe;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #3950a2;
    --bs-btn-hover-border-color: #364b98;
    --bs-btn-focus-shadow-rgb: 95,118,200;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #364b98;
    --bs-btn-active-border-color: #32478f;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0,0,0,.125);
    --bs-btn-disabled-color: #fff;
    --bs-btn-disabled-bg: #435ebe;
    --bs-btn-disabled-border-color: #435ebe;
}
    </style>
</head>
<body>
    
    <div>
        <a href="{{route(currentUser().'.dashboard')}}" class="btn no-print"> Go To Dashboard</a>
        <button class="no-print btn" type="button" onclick="window.print()" style="float:right"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
              </svg>
            Print
        </button>
    </div>
    <div class="bg1"  style="width:800px; margin:0 auto;">
        <div style="text-align: center;">
            <img src="{{ asset('./images/khulsi_club_logo.png')}}" width="88%" height= auto; alt="">
        </div>
        <div style="margin-bottom: 1.5rem;">
            <h1 class="font" style="text-align: center; margin-top:0;">Membership Form</h1>
        </div>

        <div class="pdiv">
            <div class="tbl1">
                <p style="margin: 0px; font-weight:bold;"><em>Govt. Reg No: CH-10511/13</em></p>
                <p style="margin: 0px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <p style="margin: 0px; font-weight:bold;"><em>Holding No - 1471/2184/1, Concord</em></p>
                <p style="margin: 0px; font-weight:bold;"><em>Amusement Park Road, Opposite of Ansar</em></p>
                <p style="margin: 0px; font-weight:bold;"><em>Sadar Doptor, Foy'slake, Khulshi,</em></p>
                <p style="margin: 0px; font-weight:bold;"><em>Chattogram, Bangladesh</em></p>
                <p style="margin: 0px;">&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <p style="margin: 0px; font-weight:bold;"><em>Contact: +88019 88 896 906, +88019 70 896 905</em></p>
            </div>
            <div class="pbox">
                @if ($show_data->image > 0)
                <td><img src="{{asset('uploads/member_image/'.$show_data->image)}}" width="110px" height="110px" alt=""></td>
                @else
                <td ><p class="photo"><em>4 Copies of Passport Size Photo</em></p></td> 
                @endif
            </div>
        </div>
        <div style="margin-top: 2.5rem;">
            <h4 class="section-heading" style="margin: 0px;"><b>PERSONAL INFORMATION</b></h4>
        </div>
        <form action="">
            <table class = "gfg" style="width:100%">
                <tbody >
                    <tr>
                        <td style="text-align: left;">Full Name:</td>
                        <td colspan="3"><input type="text" class="tinput"  value="{{ $show_data->full_name }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Father's Name:</th>
                        <td colspan="3"><input type="text" class="tinput"  value="{{ $show_data->father_name . $show_data->husban_name }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Mother's Name:</td>
                        <td colspan="3"><input type="text" class="tinput" value="{{ $show_data->mother_name }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Marital Status:</td>
                        <td >
                            <input type="radio"  value="" {{ old('marit_status',$show_data->marital_status)=="0" ? "checked":"" }} name="marital_status">
                            <label for="">Single</label>
                            <input type="radio" value="" {{ old('marit_status',$show_data->marital_status)=="1" ? "checked":"" }} name="marital_status">
                            <label for="">Married</label>
                        </td>
                        <td style="text-align: left; ">Anniversary:</td>
                        <td ><input type="text" class="sinput"  value="{{ $show_data->anniversary }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Spouse Name:</td>
                        <td ><input type="text" class="sinput"  value="{{ $show_data->name_of_spouse }}"></td>
                        <td style="text-align: left; padding-left:5px; ">Profession:</td>
                        <td ><input type="text" class="sinput"  value="{{ $show_data->occupation_of_spouse }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Date of Birth:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->birth_date }}"></td>
                        <td style="text-align: left; padding-left:5px;">Place:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->place_of_birth }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Tel:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->tel_number }}"></td>
                        <td style="text-align: left; padding-left:5px;">Phone:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->cell_number }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Email:</td>
                        <td colspan="3"><input type="text" class="tinput" value="{{ $show_data->email }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Nationality:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->nationality }}"></td>
                        <td style="text-align: left; padding-left:5px;">Blood Group:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->blood_group }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">National ID No:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->national_id }}"></td>
                        <td style="text-align: left; padding-left:5px;">Passport No:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->passport_no }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Educational Qualification:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->qualification }}"></td>
                        <td style="text-align: left; padding-left:5px;">Institution Name:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->name_of_institute }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">e-TIN No:</td>
                        <td colspan="3"><input type="text" class="tinput" value="{{ $show_data->e_tin_number }}"></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <p style="margin: 0;">Present Address</p>
            </div>
        </form>
    </div>
    <div class="bg4" style="width:800px; margin:0 auto; padding-bottom: 1rem;">
        <form action="">
            <table class = "gfg2" style=" width:100%">
                <tr>
                    <td style="text-align: left;">House/Village:</td>
                    <td ><input type="text" class="tinput" value="{{ $show_data->village }}"></td>
                    <td style="text-align: left; padding-left:5px;">Road/Block/Sector:</td>
                    <td ><input type="text" class="tinput" value="{{ $show_data->block }}"></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Police Station:</td>
                    <td ><input type="text" class="tinput" value="{{ $show_data->police_station }}"></td>
                    <td style="text-align: left; padding-left:5px;">Post Office:</td>
                    <td ><input type="text" class="tinput" value="{{ $show_data->post_office }}"></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Postal Code:</td>
                    <td ><input type="text" class="tinput" value="{{ $show_data->postalCode }}"></td>
                    <td style="text-align: left; padding-left:5px;">District:</td>
                    <td ><input type="text" class="tinput" value="{{ $show_data->district }}"></td>
                    <td style="text-align: left; padding-left:5px;">Country:</td>
                    <td ><input type="text" class="tinput" value="{{ $show_data->country }}"></td>
                </tr>
            </table>
            <div>
                <p style="margin: 0;">Permanent Address</p>
            </div>
            <table class = "gfg2" style=" width:100%">
                <tbody >
                    <tr>
                        <td style="text-align: left;">House/Village:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->perVillage }}"></td>
                        <td style="text-align: left; padding-left:5px;">Road/Block/Sector:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->perBlock }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Police Station:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->perPoliceStation }}"></td>
                        <td style="text-align: left; padding-left:5px;">Post Office:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->perPostOffice }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Postal Code:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->perPostalCode }}"></td>
                        <td style="text-align: left; padding-left:5px;">District:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->perDistrict }}"></td>
                        <td style="text-align: left; padding-left:5px;">Country:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->perCountry }}"></td>
                    </tr>
                </tbody>
            </table>
            <div style="margin-top: 2rem;">
                <p style="margin: 0;">Details of Children:</p>
            </div>
            <table class="dtable" style=" width:100%; border: 1px solid; margin-bottom: 5rem;">
                <thead style="">
                    <tr style="background-color: red; color: white; text-align: center; ">
                        <th style="padding-top: 10px; padding-bottom: 10px; border: 1px solid; border-color: rgb(178, 178, 189);">Serial</th>
                        <th style="border: 1px solid; border-color: rgb(178, 178, 189);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th style="border: 1px solid; border-color: rgb(178, 178, 189);">Sex</th>
                        <th style="border: 1px solid; border-color: rgb(178, 178, 189);">Date of Birth</th>
                        <th style="border: 1px solid; border-color: rgb(178, 178, 189);">Occupation with Address</th>
                    </tr>
                </thead>
                <tbody >
                    @if($show_data->children)
                        @foreach($show_data->children as $c)
                            <tr style="text-align: center;">
                                <th style="padding-top: 10px; padding-bottom: 10px; border: 1px solid; border-color: rgb(96, 96, 102);">{{$j=$loop->index + 1}}</th>
                                <td style="padding-top: 10px; padding-bottom: 10px; border: 1px solid; border-color: rgb(96, 96, 102);">{{ $c->name }}</td>
                                <td style="border: 1px solid; border-color: rgb(96, 96, 102);"> @if($c->gender==1) Male @elseif($c->gender==2) Female @else @endif </td>
                                <td style="border: 1px solid; border-color: rgb(96, 96, 102);">{{ $c->birth_date }}</td>
                                <td style="border: 1px solid; border-color: rgb(96, 96, 102);">{{ $c->occupation }}</td>
                            </tr>
                        @endforeach
                    @endif
                    @for($i=$show_data->children->count();$i<5;$i++ )
                        <tr style="text-align: center;">
                            <th style="padding-top: 10px; padding-bottom: 10px; border: 1px solid; border-color: rgb(96, 96, 102);">{{$j=$i + 1}}</th>
                            <td style="padding-top: 10px; padding-bottom: 10px; border: 1px solid; border-color: rgb(96, 96, 102);"></td>
                            <td style="border: 1px solid; border-color: rgb(96, 96, 102);"></td>
                            <td style="border: 1px solid; border-color: rgb(96, 96, 102);"></td>
                            <td style="border: 1px solid; border-color: rgb(96, 96, 102);"></td>
                        </tr>
                    @endfor
                   
                </tbody>
            </table>
            <div>
                <h4 class="section-heading" style="margin-top: 2rem; margin-bottom: 0;"><b>NOMINEE INFORMATION</b></h4>
            </div>
            <table class = "gfg2" style=" width:100%">
                <tbody >
                    <tr>
                        <td style="text-align: left;">Name:</td>
                        <td colspan="5"><input type="text" class="tinput" value="{{ $show_data->nominee_name }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Relation:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->nominee_relation }}"></td>
                        <td style="text-align: left; padding-left:5px;">Occupation:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->nominee_occupation }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Dath Of Birth:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->nominee_date_of_birth }}"></td>
                        <td style="text-align: left; padding-left:5px;">Place:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->nominee_place }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Email:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->nominee_email }}"></td>
                        <td style="text-align: left; padding-left:5px;">Phone:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->nominee_phone }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">NID NO:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->nominee_nid_no }}"></td>
                        <td style="text-align: left; padding-left:5px;">Passport No:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->nominee_passport_no }}"></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <h4 class="section-heading" style="margin-top: 2rem; margin-bottom: 0;"><b>PROFESSION INFORMATION</b></h4>
            </div>
            <table class = "gfg2" style=" width:100%">
                <tbody >
                    <tr>
                        <td style="text-align: left;">Profession:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->profession }}"></td>
                        <td style="text-align: left; padding-left:5px;">Designation:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->designation }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Company:</td>
                        <td colspan="5"><input type="text" class="tinput" value="{{ $show_data->company }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">House/Village:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->profVillage }}"></td>
                        <td style="text-align: left; padding-left:5px;">Road/Block/Sector:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->profBlock }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Police Station:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->profPoliceStation }}"></td>
                        <td style="text-align: left; padding-left:5px;">Post Office:</td>
                        <td colspan="2"><input type="text" class="tinput" value="{{ $show_data->profPostOffice }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Postal Code:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->profPostalCode }}"></td>
                        <td style="text-align: left; padding-left:5px;">District:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->profDistrict }}"></td>
                        <td style="text-align: left; padding-left:5px;">Country:</td>
                        <td ><input type="text" class="tinput" value="{{ $show_data->profCountry }}"></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <h4 class="section-heading" style="margin-top: 2rem;"><b>CATEGORY OF MEMBERSHIP</b></h4>
            </div>
            <div style="padding-left: 40px; margin-bottom: 1rem; padding-bottom:5rem;">
                <table class = "gfg4" style=" width:100%">
                    <tr>
                        <td ><input type="checkbox" value="1" {{ $show_data->membership_applied=="1" ? "checked":"" }}>&nbsp;Donor Member</td>
                        <td ><input type="checkbox" value="2" {{ $show_data->membership_applied=="2" ? "checked":"" }}>&nbsp;Service Member</td>
                    </tr>
                    <tr>
                        <td ><input type="checkbox" value="3" {{ $show_data->membership_applied=="3" ? "checked":"" }}>&nbsp;Life Member</td>
                        <td ><input type="checkbox" value="4" {{ $show_data->membership_applied=="4" ? "checked":"" }}>&nbsp;Temporary Member</td>
                    </tr>
                    <tr>
                        <td ><input type="checkbox" value="5" {{ $show_data->membership_applied=="5" ? "checked":"" }}>&nbsp;Permanent Member</td>
                        <td ><input type="checkbox" value="6" {{ $show_data->membership_applied=="6" ? "checked":"" }}>&nbsp;Honorary Member</td>
                    </tr>
                    <tr>
                        <td ><input type="checkbox" value="7" {{ $show_data->membership_applied=="7" ? "checked":"" }}>&nbsp;Corporate Member</td>
                        <td ><input type="checkbox" value="8" {{ $show_data->membership_applied=="8" ? "checked":"" }}>&nbsp;Diplomate and Foreing National Member</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="checkbox" value="9" {{ $show_data->membership_applied=="9" ? "checked":"" }}>&nbsp;Founding Member</td>
                    </tr>

                </table>
            </div>
            <div style="margin-bottom: 5px; margin-top: 5rem; padding-top: 2rem;">
                <h4 class="section-heading" style="margin:0;"><b>DETAILS OF OTHER CLUB MEMBERSHIP (IF ANY)</b></h4>
            </div>
            <table class="dtable" style=" width:100%; border: 1px solid;">
                <thead style="padding-top: 10px; padding-bottom: 5px;">
                    <tr style="background-color: red; color: white; text-align: center; ">
                        <th style="padding-top: 10px; padding-bottom: 10px; border: 1px solid; border-color: rgb(178, 178, 189);">Serial</th>
                        <th style="border: 1px solid; border-color: rgb(178, 178, 189);">Name</th>
                        <th style="border: 1px solid; border-color: rgb(178, 178, 189);">Membership Type</th>
                        <th style="border: 1px solid; border-color: rgb(178, 178, 189);">Year</th>
                    </tr>
                </thead>
                <tbody >
                    @if($show_data->otherClub)
                        @foreach($show_data->otherClub as $c)
                            <tr style="text-align: center;">
                                <th style="padding-top: 10px; padding-bottom: 10px; border: 1px solid; border-color: rgb(96, 96, 102);">{{$j=$loop->index + 1}}</th>
                                <td style="padding-top: 10px; padding-bottom: 10px; border: 1px solid; border-color: rgb(96, 96, 102);">{{ $c->name }}</td>
                                <td style="border: 1px solid; border-color: rgb(96, 96, 102);">{{ $c->membership_type }}</td>
                                <td style="border: 1px solid; border-color: rgb(96, 96, 102);">{{ $c->year }}</td>
                            </tr>
                        @endforeach
                    @endif
                    @for($i=$show_data->otherClub->count();$i<5;$i++ )
                        <tr style="text-align: center;">
                            <th style="padding-top: 10px; padding-bottom: 10px; border: 1px solid; border-color: rgb(96, 96, 102);">{{$j=$i + 1}}</th>
                            <td style="padding-top: 10px; padding-bottom: 10px; border: 1px solid; border-color: rgb(96, 96, 102);"></td>
                            <td style="border: 1px solid; border-color: rgb(96, 96, 102);"></td>
                            <td style="border: 1px solid; border-color: rgb(96, 96, 102);"></td>
                        </tr>
                    @endfor
                   
                </tbody>
            </table>
            <div style="margin-top: 5rem;">
                <h4 class="section-heading" style="margin-top: 2rem;"><b>PROPOSED BY (ANY MEMBER OF CKCL)</b></h4>
            </div>
            <table class = "gfg5" style=" width:100%">
                <tbody >
                    <tr>
                        <td style="text-align: left;">Name:</td>
                        <td colspan="3"><input type="text" class="tinput" value="{{$show_data->proposed_name}}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Membership ID:</td>
                        <td ><input type="text" class="tinput" value="{{$show_data->proposed_membership_id}}"></td>
                        <td style="text-align: left; padding-left:5px;">Signature:</td>
                        <td ><input type="text" class="tinput" value=""></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <p style="font-size: 16px; line-height: 27px;">Declaration I, <input type="text" class="finput">hereby declare that I Have Neither Committed any illegal / Criminal act Judiciary Law of Bangladesh, nor been awarded any punishment by Bangladesh Court for any Offence.
                    I further declare that the above statement / particulars are correct therfore, request you to become a Donor, Life, Service, Permanent,
                    Temporary, Corporate,Honorary,Diplomat and Foreign National Member as per constitution of the <b style="color: red;">CHITTAGONG KHULSHI CLUB LIMITED</b></p>
            </div>
            <table class = "gfg5" style=" width:100%; margin-bottom: 5rem; padding-bottom: 60px;">
                <tr>
                    <tr>
                        <td style="text-align: left;">DATE:</td>
                        <td ><input type="text" class="tinput" value=""></td>
                        <td style="text-align: left; padding-left: 5px;">APPLICANT SIGNATURE:</td>
                        <td ><input type="text" class="tinput" value=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: left;">IDENTIFIED BY PRESIDENT / VICE PRESIDENT:</td>
                        <td colspan="2"><input type="text" class="tinput" value=""></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">MEMBERSHIP NO:</td>
                        <td colspan="3"><input type="text" class="tinput" value="{{$show_data->membership_no}}"></td>
                    </tr>
                </tr>
            </table>
        </form>
    </div>


    <div class="bg3" style="width:800px; margin:0 auto; padding-top: 90px;">
        <form action="">
            <div style="text-align: center; margin-top: 5rem; ">
                <h4 class="section-heading" style="margin-top: 5rem;"><b>FOR OFFICIAL USE ONLY</b></h4>
            </div>
            <table class = "gfg3" style=" width:100%">
                <tbody >
                    <tr>
                        <td  style="text-align: left; width: 12%;">Mr./Mrs.:</td>
                        <td><input type="text" class="binput" value="{{ $show_data->full_name }}"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left; width: 12%;">Address:</td>
                        <td ><input type="text" class="binput" value="{{encryptor('decrypt', request()->session()->get('address'))}}"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" class="binput" ></td>
                    </tr>
                </tbody>
            </table>
            <div>
                <p style="font-size: 16px; line-height: 27px;">The constitution of club does hereby
                    declare you as the <input type="text" class="finput" value=""> of <b style="color: red;">CHITTAGONG KHULSHI CLUB LIMITED</b>
                    and your Membership No. is <input type="text" class="finput" value="{{$show_data->membership_no}}"></p>
            </div>
            <div>
                <p><b>Thank you</b></p>
            </div>
            <table class = "gfg3" style=" width:100%">
                <tr>
                    <td ><p style=" border-width: 1px 0 0; border-color: blue; outline: 0; border-style: solid; width: 80%;">President<br><b>CHITTAGONG KHULSHI CLUB LIMITED</b></p></td>
                    <td ><p style=" border-width: 1px 0 0; border-color: blue; outline: 0; border-style: solid; width: 80%;">Vice President<br><b>CHITTAGONG KHULSHI CLUB LIMITED</b></p></td>
                </tr>
            </table>
            <div>
                <p><b>Remarks:</b></p>
            </div>
            <table class = "gfg3" style=" width:100%; margin-bottom: 30px;">
                <tbody >
                    <tr>
                        <td><input type="text" class="binput" value="{{ $show_data->remarks }}"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="binput" ></td>
                    </tr>
                    
                </tbody>
            </table>
        </form>
    </div>


</body>
</html>
@extends('layout.app')

@section('pageTitle',trans('Create Customer'))
@section('pageSubTitle',trans('Create'))

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{route(currentUser().'.member.store')}}">
                            @csrf
                            <div class="steps progress-tabmenu d-flex flex-column">
                                <ul class="nav nav-pills mt-3 mb-5" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link step-1-tab active" id="step-1-tab" data-toggle="pill" href="#step-1" role="tab" aria-controls="step-1" aria-selected="true"><span>1</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link step-2-tab" id="step-2-tab" data-toggle="pill" href="#step-2" role="tab" aria-controls="step-2" aria-selected="false"><span>2</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link step-3-tab" id="step-3-tab" data-toggle="pill" href="#step-3" role="tab" aria-controls="step-3" aria-selected="false"><span>3</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link step-4-tab" id="step-4-tab" data-toggle="pill" href="#step-4" role="tab" aria-controls="step-4" aria-selected="false"><span>4</span></a>
                                    </li>
                                </ul>
                                <div class="text-end">
                                    <button type="button" class="btn btn-sm btn-info text-white">Save as Draft</button>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="step-1" role="tabpanel" aria-labelledby="step-1-tab">
                                        <!-- Step 1 -->
                                        <div class="section-heading">
                                            <h5 class="text-uppercase m-0"><b>Personal Information</b></h5>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="givenName">Given Name</label>
                                                    <input type="text" id="givenName" class="form-control" value="{{ old('given_name')}}" name="given_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="surname">Surname</label>
                                                    <input type="text" id="surname" class="form-control" value="{{ old('surname')}}" name="surname">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="Fathers">Father's Name:</label>
                                                    <input type="text" id="Fathers" class="form-control" value="{{ old('Fathers')}}" name="Fathers">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="mothersName">Mother's Name:</label>
                                                    <input type="text" id="mothersName" class="form-control" value="{{ old('mothersName')}}" name="mothersName">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <fieldset>
                                                    <legend>Marital Status</legend>
                                                    <input type="radio"  name="marit_status" value="0">
                                                    <label for="">Single</label>
                                                    <input type="radio"  name="marit_status" value="1">
                                                    <label for="">Married</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="anniversary">Anniversary:</label>
                                                    <input type="text" id="anniversary" class="form-control" value="{{ old('anniversary')}}" name="anniversary">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="">Spouse Name:</label>
                                                    <input type="text" class="form-control" value="{{ old('namespouse')}}" name="namespouse">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="professionOfSpouse">Profession:</label>
                                                    <input type="text" class="form-control" value="{{ old('occupation_spouse')}}" name="occupation_spouse">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="dateOfBirth">Date of Birth:</label>
                                                    <input type="date" id="dateOfBirth" class="form-control" value="{{ old('dateOfBirth')}}" name="dateOfBirth">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="placeOfBirth">Place:</label>
                                                    <input type="text" class="form-control" value="{{ old('placeOfBirth')}}" name="placeOfBirth">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="cellno">Cell No:</label>
                                                    <input type="text" id="cellno" class="form-control" value="{{ old('cellno')}}" name="cellno">
                                                        @if($errors->has('cellno'))
                                                            <span class="text-danger"> {{ $errors->first('cellno') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="tel">Tel:</label>
                                                    <input type="text" id="tel" class="form-control" value="{{ old('tel')}}" name="tel">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="email">E-mail:</label>
                                                    <input type="email" class="form-control" value="{{ old('emailAddress')}}" name="emailAddress">
                                                        @if($errors->has('emailAddress'))
                                                            <span class="text-danger"> {{ $errors->first('emailAddress') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nationality">Nationality:</label>
                                                    <input type="text" id="nationality" class="form-control" value="{{ old('nationality')}}" name="nationality">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nid">National ID No:</label>
                                                    <input type="text" class="form-control" value="{{ old('nationalid')}}" name="nationalid">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="passportno">Passport No:</label>
                                                    <input type="text" class="form-control" value="{{ old('passportNo')}}" name="passportNo">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="bloodGroup">Blood Group:</label>
                                                        <select class="form-control form-select" name="bloodGroup" id="blood">
                                                            <option value="">Select Blood Group</option>
                                                            <option value="A+" {{ old('patientBlood')=='A+' ? 'selected':''}}>A+</option>
                                                            <option value="A-"{{ old('patientBlood')=='A-' ? 'selected':''}}>A-</option>
                                                            <option value="B+"{{ old('patientBlood')=='B+' ? 'selected':''}}>B+</option>
                                                            <option value="B-"{{ old('patientBlood')=='B-' ? 'selected':''}}>B-</option>
                                                            <option value="O+"{{ old('patientBlood')=='O+' ? 'selected':''}}>O+</option>
                                                            <option value="O-"{{ old('patientBlood')=='O-' ? 'selected':''}}>O-</option>
                                                            <option value="AB+"{{ old('patientBlood')=='AB+' ? 'selected':''}}>AB+</option>
                                                            <option value="AB-"{{ old('patientBlood')=='AB-' ? 'selected':''}}>AB-</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="qualification">Educational Qualifications:</label>
                                                    <input type="text" id="qualification" class="form-control" value="{{ old('qualification')}}" name="qualification">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="namOfInstitution">Institution Name:</label>
                                                    <input type="text" class="form-control" value="{{ old('namOfInstitution')}}" name="namOfInstitution">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="tinNo">e- TIN No:</label>
                                                    <input type="text" class="form-control" value="{{ old('tinNo')}}" name="tinNo">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="col-lg-12 col-sm-12 col-md-12 d-flex justify-content-end">
                                            <button type="button" class="btn btn-sm btn-info text-white me-2">Save as Draft</button>
                                            <button type="button" class="btn btn-danger next-step">Next</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step-2" role="tabpanel" aria-labelledby="step-2-tab">
                                        <!-- Step 2 -->
                                        <div class="row">
                                            <div>
                                                <h6><b>Present Address</b></h6>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <label for="vill">House/Village</label>
                                                    <input type="text" class="form-control" id="presentVillage" value="{{ old('vill')}}" name="vill">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <label for="block">Road/Block/Sector</label>
                                                    <input type="text" class="form-control" id="presentBlock" value="{{ old('block')}}" name="block">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="presentAddress" value="{{ old('address')}}" name="address">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="policeStation">Police Station:</label>
                                                    <input type="text" class="form-control" id="presentPoliceStation" value="{{ old('policeStation')}}" name="policeStation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postoffice">Post Office:</label>
                                                    <input type="text" class="form-control" id="presentPostOffice" value="{{ old('postoffice')}}" name="postoffice">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postcode">Postal Code:</label>
                                                    <input type="text" class="form-control"  id="presentPostalCode" value="{{ old('postalCode')}}" name="postalCode">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="district">District:</label>
                                                    <input type="text" class="form-control" id="presentDistrict" value="{{ old('district')}}" name="district">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="country">Country:</label>
                                                    <input type="text" class="form-control" id="presentCountry" value="{{ old('country')}}" name="country">
                                                </div>
                                            </div>
                                            <div>
                                                <h6><b>Permanent Address</b>&nbsp;&nbsp;<input type="checkbox" id="sameAsPresent" name="sameAsPresent">&nbsp;Same As Present Address</h6>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <label for="vill">House/Village</label>
                                                    <input type="text" class="form-control" id="permanentVillage" value="{{ old('perVillage')}}" name="perVillage">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <label for="block">Road/Block/Sector</label>
                                                    <input type="text" class="form-control" id="permanentBlock" value="{{ old('perBlock')}}" name="perBlock">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="permanentAddress" value="{{ old('perAddress')}}" name="perAddress">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="policeStation">Police Station:</label>
                                                    <input type="text" class="form-control" id="permanentPoliceStation" value="{{ old('perPoliceStation')}}" name="perPoliceStation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postoffice">Post Office:</label>
                                                    <input type="text" class="form-control" id="permanentPostOffice" value="{{ old('perPostOffice')}}" name="perPostOffice">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postcode">Postal Code:</label>
                                                    <input type="text" class="form-control" id="permanentPostalCode" value="{{ old('perPostalCode')}}" name="perPostalCode">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="district">District:</label>
                                                    <input type="text" class="form-control" id="permanentDistrict" value="{{ old('perDistrict')}}" name="perDistrict">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="country">Country:</label>
                                                    <input type="text" class="form-control" id="permanentCountry" value="{{ old('perCountry')}}" name="perCountry">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="py-2">
                                                    <label for="detailschildresns" class="mt-3">Details of Children:(Must be Added with Birth Certificate copy):</label>
                                                    <table class="table mb-5">
                                                        <thead>
                                                            <tr class="bg-primary text-white text-center">
                                                                <th class="p-2">Serial</th>
                                                                <th class="p-2">Name</th>
                                                                <th class="p-2">Sex</th>
                                                                <th class="p-2">Date of Birth</th>
                                                                <th class="p-2">Occupation With Address</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="details_data">
                                                            @for($i=0;$i<5;$i++ )
                                                                <tr>
                                                                    <td>{{$j=$i + 1}}.</td>
                                                                    <td><input type="text" id="Name{{$i}}" class="form-control" name="cname[]" placeholder=" Enter Name"></td>
                                                                    <td><input type="radio" id="male{{$i}}" name="cgender[{{$i}}]" value="1" {{ old('cgender')=="1" ? "checked":"" }}> <label for="male{{$i}}">Male</label>
                                                                        <input type="radio" id="female{{$i}}" name="cgender[{{$i}}]" value="2" {{ old('cgender')=="2" ? "checked":"" }}> <label for="female{{$i}}">Female</label></td>
                                                                    <td><input type="date" id="birth_date{{$i}}" class="form-control" name="cbirth_date[]" placeholder="Date of Birth"></td>
                                                                    <td><input type="text" id="occupation{{$i}}" class="form-control" name="coccupation[]" placeholder="Occupation With Address"></td>
                                                                </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> 
                                        </div>
                                        
                                        <div class="col-lg-12 col-sm-12 col-md-12 text-end">
                                            <button type="button" class="btn btn-info text-white me-2">Save as Draft</button>
                                            <button type="button" class="btn btn-secondary prev-step m-2">Previous</button>
                                            <button type="button" class="btn btn-danger next-step m-2">Next</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step-3" role="tabpanel" aria-labelledby="step-3-tab">
                                        <!-- Step 3 -->
                                        <div class="row">
                                            <div class="section-heading">
                                                <h5 class="text-uppercase m-0"><b>Nominee Information</b></h5>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Name:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_name')}}" name="nominee_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Relation:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_relation')}}" name="nominee_relation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Occupation:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_occupation')}}" name="nominee_occupation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Date Of Birth:</label>
                                                    <input type="date"class="form-control" value="{{ old('nominee_date_of_birth')}}" name="nominee_date_of_birth">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Place:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_place')}}" name="nominee_place">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Email:</label>
                                                    <input type="email"class="form-control" value="{{ old('nominee_email')}}" name="nominee_email">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Phone:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_phone')}}" name="nominee_phone">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">NID NO:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_nid_no')}}" name="nominee_nid_no">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Passport NO:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_passport_no')}}" name="nominee_passport_no">
                                                </div>
                                            </div>
                                            <div class="section-heading">
                                                <h5 class="text-uppercase m-0"><b>Profession Information</b></h5>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="profession">Profession:</label>
                                                    <input type="text" id="profession" class="form-control" value="{{ old('profession')}}" name="profession">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="designation">Designation:</label>
                                                    <input type="text" class="form-control" value="{{ old('designation')}}" name="designation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="company">Company:</label>
                                                    <input type="text" id="company" class="form-control" value="{{ old('company')}}" name="company">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <label for="vill">House/Village</label>
                                                    <input type="text" class="form-control" value="{{ old('profVillage')}}" name="profVillage">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12 d-none">
                                                <div class="form-group py-2">
                                                    <label for="block">Road/Block/Sector</label>
                                                    <input type="text" class="form-control" value="{{ old('profBlock')}}" name="profBlock">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" value="{{ old('profAddress')}}" name="profAddress">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="policeStation">Police Station:</label>
                                                    <input type="text" class="form-control" value="{{ old('profPoliceStation')}}" name="profPoliceStation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postoffice">Post Office:</label>
                                                    <input type="text" class="form-control" value="{{ old('profPostOffice')}}" name="profPostOffice">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postcode">Postal Code:</label>
                                                    <input type="text" class="form-control" value="{{ old('profPostalCode')}}" name="profPostalCode">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="district">District:</label>
                                                    <input type="text" class="form-control" value="{{ old('profDistrict')}}" name="profDistrict">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="country">Country:</label>
                                                    <input type="text" class="form-control" value="{{ old('profCountry')}}" name="profCountry">
                                                </div>
                                            </div>
                                            <div class="section-heading">
                                                <h5 class="text-uppercase m-0"><b>Category Of Membership</b></h5>
                                            </div>
                                            @forelse ($memberType as $mt)
                                                
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="type{{$mt->id}}" name="categorymembership" value="{{$mt->id}}" {{ old('categorymembership')=="$mt->id" ? "checked":"" }}>
                                                    <label for="type{{$mt->id}}">{{$mt->member_type}}</label>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" name="categorymembership" value="1" {{ old('categorymembership')=="1" ? "checked":"" }} disabled>
                                                    <label for="donermember">No Data Found</label>
                                                </div>
                                            </div>
                                            @endforelse
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-md-12 text-end">
                                            <button type="button" class="btn btn-info text-white me-2">Save as Draft</button>
                                            <button type="button" class="btn btn-secondary prev-step m-2">Previous</button>
                                            <button type="button" class="btn btn-danger next-step m-2">Next</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="step-4" role="tabpanel" aria-labelledby="step-4-tab">
                                        <!-- Step 4 -->
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="py-2">
                                                    <label for="detailschildresns" class="mt-3 text-uppercase"><b>Details of Other Club Membership (If any)</b>:</label>
                                                    <table class="table mb-5">
                                                        <thead>
                                                            <tr class="bg-danger text-center text-white">
                                                                <th scope="col">Serial</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Membership Type</th>
                                                                <th scope="col">Year</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="details_data">
                                                            @for($i=0;$i<5;$i++ )
                                                                <tr>
                                                                    <td>{{$j=$i + 1}}.</td>
                                                                    <td><input type="text" id="Name{{$i}}" class="form-control" name="clubName[]" placeholder=" Enter Name"></td>
                                                                    <td><input type="text" id="Name{{$i}}" class="form-control" name="membershipType[]" placeholder="Membership Type"></td>
                                                                    <td><input type="text" id="year{{$i}}" class="form-control" name="year[]" placeholder="year"></td>
                                                                </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="section-heading">
                                                <h5 class="text-uppercase m-0"><b>Proposed by (Any Member Of CKCL)</b></h5>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="name">Name:</label>
                                                    <input type="text" class="form-control" value="{{ old('proposedname')}}" name="proposedname">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="membershipid">Membership ID:</label>
                                                    <input type="text" class="form-control" value="{{ old('memberNo')}}" name="memberNo">
                                                </div>
                                            </div>
                                            <div class="section-heading">
                                                <h5 class="text-uppercase m-0"><b>File</b></h5>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="photo">Applicant Photo:</label>
                                                    <input type="file" id="image" class="form-control" name="image">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="photo">Nomimee Photo:</label>
                                                    <input type="file" class="form-control" name="nominee_photo">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="photo">NID:</label>
                                                    <input type="file" class="form-control" name="nid">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="photo">Passport:</label>
                                                    <input type="file" class="form-control" name="passport">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="photo">ETIN:</label>
                                                    <input type="file" class="form-control" name="etin">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="password">Password:</label>
                                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                                        @if($errors->has('password'))
                                                            <span class="text-danger"> {{ $errors->first('password') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-md-12 d-flex justify-content-end">
                                            <button type="button" class="btn btn-secondary prev-step m-2">Previous</button>
                                            <button type="submit" class="btn btn-primary m-2">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
$(document).ready(function() {

$('.next-step').click(function() {
    var currentTab = $(this).closest('.tab-pane').attr('id');
    var nextTab = $(this).closest('.tab-pane').next().attr('id');

    $('#' + currentTab).removeClass('show active');
    $('#' + currentTab + '-tab').removeClass('active');
    $('#' + nextTab).addClass('show active');
    $('#' + nextTab + '-tab').addClass('active');
});

$('.prev-step').click(function() {
    var currentTab = $(this).closest('.tab-pane').attr('id');
    var prevTab = $(this).closest('.tab-pane').prev().attr('id');

    $('#' + currentTab).removeClass('show active');
    $('#' + currentTab + '-tab').removeClass('active');
    $('#' + prevTab).addClass('show active');
    $('#' + prevTab + '-tab').addClass('active');
});

$('.nav-item a').click(function(e) {
  var currentTab = $(this).attr('href');
  var prevTab = $('.tab-content .tab-pane.show').attr('id');
  
  $('#' + prevTab).removeClass('show active');
  $('#' + prevTab + '-tab').removeClass('active');
  $(currentTab).addClass('show active');
  $(currentTab + '-tab').addClass('active');
  e.preventDefault();
});

});
</script>
<script>
    const sameAsPresentCheckbox = document.getElementById('sameAsPresent');
    const permanentVillage = document.getElementById('permanentVillage');
    const permanentBlock = document.getElementById('permanentBlock');
    const permanentAddress = document.getElementById('permanentAddress');
    const permanentPoliceStation = document.getElementById('permanentPoliceStation');
    const permanentPostOffice = document.getElementById('permanentPostOffice');
    const permanentPostalCode = document.getElementById('permanentPostalCode');
    const permanentDistrict = document.getElementById('permanentDistrict');
    const permanentCountry = document.getElementById('permanentCountry');

    sameAsPresentCheckbox.addEventListener('change', function () {
        if (this.checked) {
            permanentVillage.value = document.getElementById('presentVillage').value;
            permanentBlock.value = document.getElementById('presentBlock').value;
            permanentAddress.value = document.getElementById('presentAddress').value;
            permanentPoliceStation.value = document.getElementById('presentPoliceStation').value;
            permanentPostOffice.value = document.getElementById('presentPostOffice').value;
            permanentPostalCode.value = document.getElementById('presentPostalCode').value;
            permanentDistrict.value = document.getElementById('presentDistrict').value;
            permanentCountry.value = document.getElementById('presentCountry').value;
        } else {
            permanentVillage.value = '';
            permanentBlock.value = '';
            permanentAddress.value = '';
            permanentPoliceStation.value = '';
            permanentPostOffice.value = '';
            permanentPostalCode.value = '';
            permanentDistrict.value = '';
            permanentCountry.value = '';
        }
    });
</script>
@endpush

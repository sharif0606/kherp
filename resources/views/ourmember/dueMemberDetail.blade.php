@extends('layout.app')

@section('pageTitle',trans('Due Customer'))
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
                        <form method="post" enctype="multipart/form-data" action="{{route(currentUser().'.member.update',encryptor('encrypt',$member->id))}}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$member->id)}}">
                            <div class="steps  d-flex flex-column">
                                <ul class="nav nav-pills mt-3 mb-5" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link step-1-tab active" id="step-1-tab" data-toggle="pill" href="#step-1" role="tab" aria-controls="step-1" aria-selected="true"><span>Member Details</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link step-2-tab" id="step-2-tab" data-toggle="pill" href="#step-2" role="tab" aria-controls="step-2" aria-selected="false"><span>Account Status</span></a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="step-1" role="tabpanel" aria-labelledby="step-1-tab">
                                        <!-- Step 1 -->
                                        <div class="section-heading d-flex justify-content-between">
                                            <h5 class="text-uppercase m-0"><b>Personal Information</b></h5>
                                            <a class="btn btn-sm btn-info" target="__blank" href="{{route(currentUser().'.member.show',encryptor('encrypt',$member->id))}}">Print View</a>
                                                {{-- <a href="#" class="no_print float-end" title="print" id="addCompanyDescription" onclick="printReport('result_show')"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 16 16"><g fill="currentColor"><path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/><path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102c.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645a19.701 19.701 0 0 0 1.062-2.227a7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136c.075-.354.274-.672.65-.823c.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538c.007.187-.012.395-.047.614c-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686a5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465c.12.144.193.32.2.518c.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416a.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95a11.642 11.642 0 0 0-1.997.406a11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238c-.328.194-.541.383-.647.547c-.094.145-.096.25-.04.361c.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193a11.666 11.666 0 0 1-.51-.858a20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41c.24.19.407.253.498.256a.107.107 0 0 0 .07-.015a.307.307 0 0 0 .094-.125a.436.436 0 0 0 .059-.2a.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198a.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283c-.04.192-.03.469.046.822c.024.111.054.227.09.346z"/></g></svg></a> --}}
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="givenName">Given Name</label>
                                                    <input type="text" id="givenName" class="form-control" value="{{ old('given_name',$member->given_name)}}" name="given_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="surname">Surname</label>
                                                    <input type="text" id="surname" class="form-control" value="{{ old('surname',$member->surname)}}" name="surname">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="Fathers">Father's Name:</label>
                                                    <input type="text" id="Fathers" class="form-control" value="{{ old('Fathers',$member->father_name)}}" name="Fathers">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="mothersName">Mother's Name:</label>
                                                    <input type="text" id="mothersName" class="form-control" value="{{ old('mothersName',$member->mother_name)}}" name="mothersName">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <fieldset>
                                                    <legend>Marital Status</legend>
                                                    <input type="radio"  name="marit_status" value="0" {{ old('marit_status',$member->marital_status)=="0" ? "checked":"" }}>
                                                    <label for="">Single</label>
                                                    <input type="radio"  name="marit_status" value="1" {{ old('marit_status',$member->marital_status)=="1" ? "checked":"" }}>
                                                    <label for="">Married</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="anniversary">Anniversary:</label>
                                                    <input type="text" id="anniversary" class="form-control" value="{{ old('anniversary',$member->anniversary)}}" name="anniversary">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="">Spouse Name:</label>
                                                    <input type="text" class="form-control" value="{{ old('namespouse',$member->name_of_spouse)}}" name="namespouse">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="professionOfSpouse">Profession:</label>
                                                    <input type="text" class="form-control" value="{{ old('occupation_spouse',$member->occupation_of_spouse)}}" name="occupation_spouse">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="dateOfBirth">Date of Birth:</label>
                                                    <input type="date" id="dateOfBirth" class="form-control" value="{{ old('dateOfBirth',$member->birth_date)}}" name="dateOfBirth">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="placeOfBirth">Place:</label>
                                                    <input type="text" class="form-control" value="{{ old('placeOfBirth',$member->place_of_birth)}}" name="placeOfBirth">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="cellno">Cell No:</label>
                                                    <input type="text" id="cellno" class="form-control" value="{{ old('cellno',$member->cell_number)}}" name="cellno">
                                                        @if($errors->has('cellno'))
                                                            <span class="text-danger"> {{ $errors->first('cellno') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="tel">Tel:</label>
                                                    <input type="text" id="tel" class="form-control" value="{{ old('tel',$member->tel_number)}}" name="tel">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="email">E-mail:</label>
                                                    <input type="email" class="form-control" value="{{ old('emailAddress',$member->email)}}" name="emailAddress">
                                                        @if($errors->has('emailAddress'))
                                                            <span class="text-danger"> {{ $errors->first('emailAddress') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nationality">Nationality:</label>
                                                    <input type="text" id="nationality" class="form-control" value="{{ old('nationality',$member->nationality)}}" name="nationality">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nid">National ID No:</label>
                                                    <input type="text" class="form-control" value="{{ old('nationalid',$member->national_id)}}" name="nationalid">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="passportno">Passport No:</label>
                                                    <input type="text" class="form-control" value="{{ old('passportNo',$member->passport_no)}}" name="passportNo">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="bloodGroup">Blood Group:</label>
                                                        <select class="form-control form-select" name="bloodGroup" id="blood">
                                                            <option value="">Select Blood Group</option>
                                                            <option value="A+" {{ old('patientBlood',$member->blood_group)=='A+' ? 'selected':''}}>A+</option>
                                                            <option value="A-"{{ old('patientBlood',$member->blood_group)=='A-' ? 'selected':''}}>A-</option>
                                                            <option value="B+"{{ old('patientBlood',$member->blood_group)=='B+' ? 'selected':''}}>B+</option>
                                                            <option value="B-"{{ old('patientBlood',$member->blood_group)=='B-' ? 'selected':''}}>B-</option>
                                                            <option value="O+"{{ old('patientBlood',$member->blood_group)=='O+' ? 'selected':''}}>O+</option>
                                                            <option value="O-"{{ old('patientBlood',$member->blood_group)=='O-' ? 'selected':''}}>O-</option>
                                                            <option value="AB+"{{ old('patientBlood',$member->blood_group)=='AB+' ? 'selected':''}}>AB+</option>
                                                            <option value="AB-"{{ old('patientBlood',$member->blood_group)=='AB-' ? 'selected':''}}>AB-</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="qualification">Educational Qualifications:</label>
                                                    <input type="text" id="qualification" class="form-control" value="{{ old('qualification',$member->qualification)}}" name="qualification">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="namOfInstitution">Institution Name:</label>
                                                    <input type="text" class="form-control" value="{{ old('namOfInstitution',$member->name_of_institute)}}" name="namOfInstitution">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="tinNo">e- TIN No:</label>
                                                    <input type="text" class="form-control" value="{{ old('tinNo',$member->e_tin_number)}}" name="tinNo">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <!-- Step 2 -->
                                        <div class="row">
                                            <div>
                                                <h6><b>Present Address</b></h6>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="vill">House/Village</label>
                                                    <input type="text" class="form-control" id="presentVillage" value="{{ old('vill',$member->village)}}" name="vill">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="block">Road/Block/Sector</label>
                                                    <input type="text" class="form-control" id="presentBlock" value="{{ old('block',$member->block)}}" name="block">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="policeStation">Police Station:</label>
                                                    <input type="text" class="form-control" id="presentPoliceStation" value="{{ old('policeStation',$member->police_station)}}" name="policeStation">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postoffice">Post Office:</label>
                                                    <input type="text" class="form-control" id="presentPostOffice" value="{{ old('postoffice',$member->post_office)}}" name="postoffice">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postcode">Postal Code:</label>
                                                    <input type="text" class="form-control" id="presentPostalCode" value="{{ old('postalCode',$member->postalCode)}}" name="postalCode">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="district">District:</label>
                                                    <input type="text" class="form-control" id="presentDistrict" value="{{ old('district',$member->district)}}" name="district">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="country">Country:</label>
                                                    <input type="text" class="form-control" id="presentCountry" value="{{ old('country',$member->country)}}" name="country">
                                                </div>
                                            </div>
                                            <div>
                                                <h6><b>Permanent Address</b>&nbsp;&nbsp;<input type="checkbox" id="sameAsPresent" name="sameAsPresent">&nbsp;Same As Present Address</h6>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="vill">House/Village</label>
                                                    <input type="text" class="form-control" id="permanentVillage" value="{{ old('perVillage',$member->perVillage)}}" name="perVillage">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="block">Road/Block/Sector</label>
                                                    <input type="text" class="form-control" id="permanentBlock" value="{{ old('perBlock',$member->perBlock)}}" name="perBlock">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="policeStation">Police Station:</label>
                                                    <input type="text" class="form-control" id="permanentPoliceStation" value="{{ old('perPoliceStation',$member->perPoliceStation)}}" name="perPoliceStation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postoffice">Post Office:</label>
                                                    <input type="text" class="form-control" id="permanentPostOffice" value="{{ old('perPostOffice',$member->perPostOffice)}}" name="perPostOffice">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postcode">Postal Code:</label>
                                                    <input type="text" class="form-control" id="permanentPostalCode" value="{{ old('perPostalCode',$member->perPostalCode)}}" name="perPostalCode">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="district">District:</label>
                                                    <input type="text" class="form-control" id="permanentDistrict" value="{{ old('perDistrict',$member->perDistrict)}}" name="perDistrict">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="country">Country:</label>
                                                    <input type="text" class="form-control" id="permanentCountry" value="{{ old('perCountry',$member->perCountry)}}" name="perCountry">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="py-2">
                                                    <label for="detailschildresns" class="mt-3">Details of Children:(Must be Added with Birth Certificate copy):</label>
                                                    <table class="table table-striped mb-3">
                                                        <thead>
                                                            <tr class="bg-danger text-center text-white">
                                                                <th scope="col">Serial</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Sex</th>
                                                                <th scope="col">Date of Birth</th>
                                                                <th scope="col">Occupation With Address</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="details_data">
                                                            @if($member->children)
                                                            @foreach($member->children as $c)
                                                                <tr class="text-center">
                                                                    <td>{{$j=$loop->index + 1}}.
                                                                        <input type="hidden" name="id[]" value="{{$c->id}}">
                                                                    </td>
                                                                    <td><input type="text" id="Name{{$loop->index}}" class="form-control" name="cname[]" value="{{ $c->name }}" placeholder=" Enter Name"></td>
                                                                    <td><input type="radio" id="male{{$loop->index}}" name="cgender[{{$loop->index}}]" value="1" {{ old('cgender',$c->gender)=="1" ? "checked":"" }}> <label for="male{{$loop->index}}">Male</label>
                                                                        <input type="radio" id="female{{$loop->index}}" name="cgender[{{$loop->index}}]" value="2" {{ old('cgender',$c->gender)=="2" ? "checked":"" }}> <label for="female{{$loop->index}}">Female</label></td>
                                                                    <td><input type="date" id="birth_date{{$loop->index}}" class="form-control" name="cbirth_date[]" value="{{ $c->birth_date }}" placeholder="Date of Birth"></td>
                                                                    <td><input type="text" id="occupation{{$loop->index}}" class="form-control" name="coccupation[]" value="{{ $c->occupation }}"  placeholder="Occupation"></td>
                                                                </tr>
                                                            @endforeach
                                                            @endif
                                                            
                                                            @for($i=$member->children->count();$i<5;$i++ )
                                                            <tr class="text-center">
                                                                <td>{{$j=$i + 1}}.
                                                                    <input type="hidden" name="id[]" value="">
                                                                </td>
                                                                <td><input type="text" id="Name{{$i}}" class="form-control" name="cname[]" placeholder=" Enter Name"></td>
                                                                <td><input type="radio" id="male{{$i}}" name="cgender[{{$i}}]" value="1" {{ old('cgender')=="1" ? "checked":"" }}> <label for="male{{$i}}">Male</label>
                                                                    <input type="radio" id="female{{$i}}" name="cgender[{{$i}}]" value="2" {{ old('cgender')=="2" ? "checked":"" }}> <label for="female{{$i}}">Female</label></td>
                                                                <td><input type="date" id="birth_date{{$i}}" class="form-control" name="cbirth_date[]" placeholder="Date of Birth"></td>
                                                                <td><input type="text" id="occupation{{$i}}" class="form-control" name="coccupation[]" placeholder="Occupation"></td>
                                                            </tr>
                                                            @endfor

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> 
                                        </div>
                                        <!-- Step 3 -->
                                        <div class="row">
                                            <div class="section-heading">
                                                <h5 class="text-uppercase m-0"><b>Nominee Information</b></h5>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Name:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_name',$member->nominee_name)}}" name="nominee_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Relation:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_relation',$member->nominee_relation)}}" name="nominee_relation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Occupation:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_occupation',$member->nominee_occupation)}}" name="nominee_occupation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Date Of Birth:</label>
                                                    <input type="date"class="form-control" value="{{ old('nominee_date_of_birth',$member->nominee_date_of_birth)}}" name="nominee_date_of_birth">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Place:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_place',$member->nominee_place)}}" name="nominee_place">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Email:</label>
                                                    <input type="email"class="form-control" value="{{ old('nominee_email',$member->nominee_email)}}" name="nominee_email">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Phone:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_phone',$member->nominee_phone)}}" name="nominee_phone">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">NID NO:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_nid_no',$member->nominee_nid_no)}}" name="nominee_nid_no">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="nominee">Passport NO:</label>
                                                    <input type="text"class="form-control" value="{{ old('nominee_passport_no',$member->nominee_passport_no)}}" name="nominee_passport_no">
                                                </div>
                                            </div>
                                            <div class="section-heading">
                                                <h5 class="text-uppercase m-0"><b>Profession Information</b></h5>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="profession">Profession:</label>
                                                    <input type="text" id="profession" class="form-control" value="{{ old('profession',$member->profession)}}" name="profession">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="designation">Designation:</label>
                                                    <input type="text" class="form-control" value="{{ old('designation',$member->designation)}}" name="designation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="company">Company:</label>
                                                    <input type="text" id="company" class="form-control" value="{{ old('company',$member->company)}}" name="company">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="vill">House/Village</label>
                                                    <input type="text" class="form-control" value="{{ old('profVillage',$member->profVillage)}}" name="profVillage">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="block">Road/Block/Sector</label>
                                                    <input type="text" class="form-control" value="{{ old('profBlock',$member->profBlock)}}" name="profBlock">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="policeStation">Police Station:</label>
                                                    <input type="text" class="form-control" value="{{ old('profPoliceStation',$member->profPoliceStation)}}" name="profPoliceStation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postoffice">Post Office:</label>
                                                    <input type="text" class="form-control" value="{{ old('profPostOffice',$member->profPostOffice)}}" name="profPostOffice">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="postcode">Postal Code:</label>
                                                    <input type="text" class="form-control" value="{{ old('profPostalCode',$member->profPostalCode)}}" name="profPostalCode">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="district">District:</label>
                                                    <input type="text" class="form-control" value="{{ old('profDistrict',$member->profDistrict)}}" name="profDistrict">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="country">Country:</label>
                                                    <input type="text" class="form-control" value="{{ old('profCountry',$member->profCountry)}}" name="profCountry">
                                                </div>
                                            </div>
                                            <div class="section-heading">
                                                <h5 class="text-uppercase m-0"><b>Category Of Membership</b></h5>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="donermember" name="categorymembership" value="1" {{ old('categorymembership',$member->membership_applied)=="1" ? "checked":"" }}>
                                                    <label for="donermember">Donor Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="servicemember" name="categorymembership" value="2" {{ old('categorymembership',$member->membership_applied)=="2" ? "checked":"" }}>
                                                    <label for="servicemember">Service Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="lifemember" name="categorymembership" value="3" {{ old('categorymembership',$member->membership_applied)=="3" ? "checked":"" }}>
                                                    <label for="lifemember">Life Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="temporarymember" name="categorymembership" value="4" {{ old('categorymembership',$member->membership_applied)=="4" ? "checked":"" }}>
                                                    <label for="temporarymember">Temporary Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="permanentmember" name="categorymembership" value="5" {{ old('categorymembership',$member->membership_applied)=="5" ? "checked":"" }}>
                                                    <label for="permanentmember">Permanent Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="honorarymember" name="categorymembership" value="6" {{ old('categorymembership',$member->membership_applied)=="6" ? "checked":"" }}>
                                                    <label for="honorarymember">Honorary Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="cprporatemember" name="categorymembership" value="7" {{ old('categorymembership',$member->membership_applied)=="7" ? "checked":"" }}>
                                                    <label for="cprporatemember">Corporate Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="diplomatedmember" name="categorymembership" value="8" {{ old('categorymembership',$member->membership_applied)=="8" ? "checked":"" }}>
                                                    <label for="diplomatedmember">Diplomate and Foreing National Member</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12 col-md-12">
                                                <div class="form-group py-2">
                                                    <input type="radio" id="foundingmember" name="categorymembership" value="9" {{ old('categorymembership',$member->membership_applied)=="9" ? "checked":"" }}>
                                                    <label for="foundingmember">Founding Member</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Step 4 -->
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="py-2">
                                                    <label for="detailschildresns" class="mt-3 text-uppercase"><b>Details of Other Club Membership (If any)</b>:</label>
                                                    <table class="table table-striped mb-3">
                                                        <thead>
                                                            <tr class="bg-danger text-center text-white">
                                                                <th scope="col">Serial</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Membership Type</th>
                                                                <th scope="col">Year</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="details_data">
                                                            @if($member->otherClub)
                                                            @foreach($member->otherClub as $c)
                                                                <tr class="text-center">
                                                                    <td>{{$j=$loop->index + 1}}.
                                                                        <input type="hidden" name="id[]" value="{{$c->id}}">
                                                                    </td>
                                                                    <td><input type="text" id="Name{{$loop->index}}" class="form-control" name="clubName[]" value="{{ $c->name }}" placeholder=" Enter Name"></td>
                                                                    <td><input type="text" id="memberType{{$loop->index}}" class="form-control" name="membershipType[]" value="{{ $c->membership_type }}"></td>
                                                                    <td><input type="text" id="year{{$loop->index}}" class="form-control" name="year[]" value="{{ $c->year }}"></td>
                                                                </tr>
                                                            @endforeach
                                                            @endif
                                                            
                                                            @for($i=$member->otherClub->count();$i<5;$i++ )
                                                            <tr class="text-center">
                                                                <td>{{$j=$i + 1}}.
                                                                    <input type="hidden" name="id[]" value="">
                                                                </td>
                                                                <td><input type="text" id="Name{{$i}}" class="form-control" name="clubName[]" placeholder=" Enter Name"></td>
                                                                <td><input type="text" id="memberType{{$i}}" class="form-control" name="membershipType[]"></td>
                                                                <td><input type="text" id="year{{$i}}" class="form-control" name="year[]"></td>
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
                                                    <input type="text" class="form-control" value="{{ old('proposedname',$member->proposed_name)}}" name="proposedname">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="membershipid">Membership ID:</label>
                                                    <input type="text" class="form-control" value="{{ old('memberNo',$member->proposed_membership_id)}}" name="memberNo">
                                                </div>
                                            </div>
                                            <div class="section-heading">
                                                <h5 class="text-uppercase m-0"><b>File & Approval Section</b></h5>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group py-2">
                                                    <label for="photo">Photo:</label>
                                                    <input type="file" id="image" class="form-control" name="image">
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
                                                    <label for="show">Show Font:</label>
                                                        <select class="form-control form-select" name="show_font" id="show_font">
                                                            <option value="">Select Show Font</option>
                                                            <option value="1" {{ old('show_font',$member->show_font)=='1' ? 'selected':''}}>Yes</option>
                                                            <option value="0" {{ old('show_font',$member->show_font)=='0' ? 'selected':''}}>No</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="designation">Club Designation:</label>
                                                    <input type="text" class="form-control" value="{{ old('club_designation',$member->club_designation)}}" name="club_designation">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="membershipno">Membership No:</label>
                                                    <input type="text" id="membershipno" class="form-control" value="{{ old('membershipno',$member->membership_no)}}" name="membershipno">
                                                    @if($errors->has('membershipno'))
                                                        <span class="text-danger"> {{ $errors->first('membershipno') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control form-select" name="status" id="status">
                                                        <option value="">Select Status</option>
                                                        <option value="0" {{ old('status',$member->status)=='0' ? 'selected':''}}>Pending</option>
                                                        <option value="1" {{ old('status',$member->status)=='1' ? 'selected':''}}>Applied for approval</option>
                                                        <option value="2" {{ old('status',$member->status)=='2' ? 'selected':''}}>Approved</option>
                                                        <option value="3" {{ old('status',$member->status)=='3' ? 'selected':''}}>Suspended</option>
                                                    </select>
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
                                    </div>
                                    <div class="tab-pane fade" id="step-2" role="tabpanel" aria-labelledby="step-2-tab">
                                        
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
    const permanentPoliceStation = document.getElementById('permanentPoliceStation');
    const permanentPostOffice = document.getElementById('permanentPostOffice');
    const permanentPostalCode = document.getElementById('permanentPostalCode');
    const permanentDistrict = document.getElementById('permanentDistrict');
    const permanentCountry = document.getElementById('permanentCountry');

    sameAsPresentCheckbox.addEventListener('change', function () {
        if (this.checked) {
            permanentVillage.value = document.getElementById('presentVillage').value;
            permanentBlock.value = document.getElementById('presentBlock').value;
            permanentPoliceStation.value = document.getElementById('presentPoliceStation').value;
            permanentPostOffice.value = document.getElementById('presentPostOffice').value;
            permanentPostalCode.value = document.getElementById('presentPostalCode').value;
            permanentDistrict.value = document.getElementById('presentDistrict').value;
            permanentCountry.value = document.getElementById('presentCountry').value;
        } else {
            permanentVillage.value = '';
            permanentBlock.value = '';
            permanentPoliceStation.value = '';
            permanentPostOffice.value = '';
            permanentPostalCode.value = '';
            permanentDistrict.value = '';
            permanentCountry.value = '';
        }
    });
</script>
@endpush

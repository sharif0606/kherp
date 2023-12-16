@extends('layout.app')

@section('pageTitle',trans('Create Payment Purpose'))
@section('pageSubTitle',trans('Create'))

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.fees_category.store')}}">
                            @csrf
                            
                            <div class="row mb-3">
                                <label for="payment" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Account Head')}}<span class="text-danger">*</span></b></label>
                                <div class="col-sm-6 offset-1 m-0">
                                    <select  class="form-control form-select" name="payment_head" required>
                                        <option value="">Select Account Head</option>
                                        @if($paymethod)
                                            @foreach($paymethod as $d)
                                                <option value="{{$d['table_name']}}~{{$d['id']}}~{{$d['head_name']}}~{{$d['head_code']}}">{{$d['head_name']}}-{{$d['head_code']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="membership_type_id" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Member Type')}}</b></label>
                                <div class="col-sm-6 offset-1 m-0">
                                    <select  class="form-control form-select" name="membership_type_id">
                                        <option value="">Select Member Type</option>
                                        @if($member_type)
                                            @foreach($member_type as $d)
                                                <option value="{{$d['id']}}">{{$d['member_type']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="payment" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Purpose')}}<span class="text-danger">*</span></b></label>
                                <div class="col-sm-6 offset-1 m-0">
                                    <input type="text" value="{{ old('purpose')}}" class="form-control" name="purpose" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="amount" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Amount')}}<span class="text-danger">*</span></b></label>
                                <div class="col-sm-6 offset-1 m-0">
                                    <input type="number" value="{{ old('amount')}}" class="form-control" name="amount" required>
                                </div>
                            </div>
                            <div class="col-6 offset-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Save')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
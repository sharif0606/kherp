@extends('layout.app')

@section('pageTitle',trans('Update Member Request'))
@section('pageSubTitle',trans('update'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.changeReq.update',encryptor('encrypt',$mrequest->id))}}">
                              @csrf
                              @method('patch')
                                  <div class="row mb-3">
                                      <label for="status" class="col-sm-2 offset-1 col-form-label text-end"><b>{{__('Status')}}</b></label>
                                      <div class="col-sm-6 offset-1 m-0">
                                          <select name="status" class="form-control form-select">
                                            <option value="0" {{ old('status',$mrequest->status)=="0"?"selected":""}}> Pending</option>
                                            <option value="1" {{ old('status',$mrequest->status)=="1"?"selected":""}}> Approved</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-6 offset-3 d-flex justify-content-end">
                                      <button type="submit" class="btn btn-info me-1 mb-1">{{__('Update')}}</button>
                                  </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection
@extends('layout.app')

@section('pageTitle',trans('Change Request List'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr class="text-center bg-primary text-white">
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Apply Date')}}</th>
                                <th scope="col">{{__('Member Name')}}</th>
                                <th scope="col">{{__('Change Type')}}</th>
                                <th scope="col">{{__('Change Requests')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th class="white-space-nowrap">{{__('ACTION')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $b)
                            <tr class="text-center">
                            <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$b->date}}</td>
                                <td>{{$b->member?->full_name}}</td>
                                <td>
                                    <ul class="text-start">
                                        @foreach(explode(',', $b->change_type) as $type)
                                        <li>{{$type}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <table class="table">
                                        @if ($b->mobile != null)
                                        <tr class="text-start">
                                            <th>Mobile No:</th>
                                            <td>{{$b->mobile}}</td>
                                        </tr>
                                        @else
                                        @endif

                                        @if ($b->email != null)
                                        <tr class="text-start">
                                            <th>Email:</th>
                                            <td>{{$b->email}}</td>
                                        </tr>
                                        @else
                                        @endif
                                        
                                        @if ($b->address != null)
                                        <tr class="text-start">
                                            <th>Address:</th>
                                            <td>{{$b->address}}</td>
                                        </tr>
                                        @else
                                        @endif

                                        @if ($b->member_type != null)
                                        <tr class="text-start">
                                            <th>Member Type:</th>
                                            <td>{{$b->member_type}}</td>
                                        </tr>
                                        @else
                                        @endif
                                    </table>
                                </td>
                                <td >@if($b->status == 0) {{__('Pending') }} @else {{__('Approved') }} @endif</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.changeReq.edit',encryptor('encrypt',$b->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="6" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="my-3">
                        {!! $data->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
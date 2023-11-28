@extends('layout.app')
@section('pageTitle',trans('Member Pending List'))
@section('pageSubTitle',trans('List'))

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <a class="float-end" href="{{route(currentUser().'.mPending.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                        <thead>
                            <tr class="text-center">
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Member Type')}}</th>
                                <th scope="col">{{__('Year')}}</th>
                                <th scope="col">{{__('Month')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $d)
                            <tr class="text-center">
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->membership_type_id}}</td>
                                <td>{{$p->year}}</td>
                                <td>{{$p->month}}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.mPending.edit',encryptor('encrypt',$p->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <th colspan="5" class="text-center">No Data Found</th>
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

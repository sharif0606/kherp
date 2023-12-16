@extends('layout.app')
@section('pageTitle',trans('Member Invoice'))
@section('pageSubTitle',trans('List'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">

            <div class="card">
                <div>
                <a class="float-end" href="{{route(currentUser().'.member-invoice.create')}}"style="font-size:1.7rem"><i class="bi bi-plus-square-fill"></i></a>
                </div>
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">

                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Purpose')}}</th>
                                <th scope="col">{{__('Member')}}</th>
                                <th scope="col">{{__('Date')}}</th>
                                <th scope="col">{{__('Receipt No')}}</th>
                                <th scope="col">{{__('Amount')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $pstatus=array('Unpaid','Paid','In Review'); @endphp
                            @forelse($data as $p)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{$p->purpose}}</td>
                                <td>{{$p->member?->full_name}}</td>
                                <td>{{$p->invoice_date}}</td>
                                <td>{{$p->receipt_no}}</td>
                                <td>{{$p->total_amount}}</td>
                                <td>{{$pstatus[$p->status]}}</td>
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.member-invoice.edit',encryptor('encrypt',$p->id))}}" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    @if($p->status!=1)
                                        <a class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#duepayment{{$p->id}}" href="javascript:void(0)">Pay Now</a>
                                        
                                        <div class="modal fade" id="duepayment{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route(currentUser().'.member-invoice.pay_now',$p->id)}}" method="post">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Pay your due</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">Payment Date</label>
                                                                <input type="date" class="form-control" name="invoice_date" id="" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Payment Method</label>
                                                                <select  class="form-control form-select" name="debit">
                                                                    @if($paymethod)
                                                                        @foreach($paymethod as $d)
                                                                            <option value="{{$d['table_name']}}~{{$d['id']}}~{{$d['head_code']}}-{{$d['head_name']}}">{{$d['head_name']}}-{{$d['head_code']}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Pay Now</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    {{-- <a href="javascript:void()" onclick="$('#form{{$p->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$p->id}}" action="{{route(currentUser().'.member-invoice.destroy',encryptor('encrypt',$p->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form> --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="6" class="text-center">No Data Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('layout.app')
@section('pageTitle',trans('Create Member Invoice'))
@section('pageSubTitle',trans('Create'))

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.member-invoice.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="text-center">
                                        <h6>Fees Collection</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th>Purpose <span class="text-danger">*</span></th>
                                                <td><input type="text" class="form-control" name="purpose" value="{{old('purpose')}}" required></td>
                                            </tr>
                                            <tr>
                                                <th>Date <span class="text-danger">*</span></th>
                                                <td><input type="date" class="form-control" name="invoice_date" required value="{{old('invoice_date')}}"></td>
                                            </tr>
                                            <tr>
                                                <th>Member <span class="text-danger">*</span></th>
                                                <td>
                                                    <select class="form-control choices form-select" name="member_id" required>
                                                        <option value="">Select Member</option>
                                                        @if($member)
                                                            @foreach($member as $d)
                                                                <option value="{{$d['id']}}">{{$d['given_name']}} {{$d['surname']}} - {{$d['membership_no']}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Receipt No</th>
                                                <td><input type="text" class="form-control" name="receipt_no" value="{{old('receipt_no')}}"></td>
                                            </tr>
                                            <tr>
                                                <th>Year <span class="text-danger">*</span></th>
                                                <td>
                                                    <select id="year" class="form-control"  name="year" required>
                                                        <option value="">Select Year</option>
                                                        @for($i=2017; $i<=date('Y')+1; $i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Month <span class="text-danger">*</span></th>
                                                <td>
                                                    <select id="month" class="form-control" name="month" required>
                                                        <option value="">Select Month</option>
                                                        @for($i=1; $i<=12; $i++)
                                                            <option value="{{date('m', strtotime('2020-'.$i.'-01'))}}">{{date('F', strtotime('2020-'.$i.'-01'))}}</option>
                                                        @endfor
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Payment Status</th>
                                                <td>
                                                    <select id="month" class="form-control" name="status" onchange="if($(this).val()==1) alert('NB: You have your choice as paid invoice. You cannot update the amount of a paid invoice')">
                                                        <option value="0">Unpaid</option>
                                                        <option value="1">Paid</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Payment Method</th>
                                                <td>
                                                    <select  class="form-control form-select" name="debit">
                                                        @if($paymethod)
                                                            @foreach($paymethod as $d)
                                                                <option value="{{$d['table_name']}}~{{$d['id']}}~{{$d['head_code']}}-{{$d['head_name']}}">{{$d['head_name']}}-{{$d['head_code']}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="text-center">
                                        <h6>Fees Table</h6>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr class="bg-light text-center">
                                                    <th>Category</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($fees as $f)
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control" name="fee_name[{{$f->id}}]" value="{{$f->purpose}}" readonly>
                                                            <input type="hidden" name="fee_category_id[{{$f->id}}]" value="{{$f->id}}">
                                                        </td>
                                                        <td><input type="text" class="form-control fee_amount" name="amount[{{$f->id}}]"></td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="2" class="text-center">No Data Found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                            <tfoot>
                                                <tr class="text-center">
                                                    <th colspan="1">Total Fees</th>
                                                    <td colspan="1"><input type="text" readonly class="form-control" name="total_amount"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
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
    $('#member_serial_no').change(function() {
        var member_serial_no = $(this).val();
        var errorMessage = $(this).next('.error-message');
        if (member_serial_no !== '') {
            $.ajax({
                url: '{{route(currentUser().'.getMember')}}',
                type: 'GET',
                data: {
                    member_serial_no: member_serial_no
                },
                dataType: 'json',
                success: function(response) {
                    var member = response.member;
                    if (member !== null) {
                        // Fill the input fields with the received data
                        $('input[name="member_id"]').val(member.id);
                        $('input[name="nid"]').val(member.national_id);
                        $('input[name="member_name"]').val(member.full_name);
                    } else {
                        // Handle the case when no match is found
                        // $('#member_serial_no').val('');
                        $('input[name="member_id"]').val('');
                        $('input[name="nid"]').val('');
                        $('input[name="member_name"]').val('');
                    }

                    if (member == null) {
                        errorMessage.text('No matches found').css('color', 'red').show();
                    } else {
                        errorMessage.hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error); // Handle the error if needed
                }
            });
        } else {
            // Clear the input fields if the memberId is empty
            // $('#member_serial_no').val('');
            $('input[name="member_id"]').val('');
            $('input[name="nid"]').val('');
            $('input[name="member_name"]').val('');
        }
        
        if(member_serial_no == ''){
            errorMessage.hide();
        }
    });
});

</script>
<script>
    $(document).ready(function() {
        function calculateTotalFees() {
            var totalFees = 0;
            // Loop through each fee amount input field
            $('.fee_amount').each(function() {
                var amountValue = parseFloat($(this).val()) || 0;
                totalFees += amountValue;
            });
            // Update the total fees input field
            $('[name="total_amount"]').val(totalFees);
        }
        calculateTotalFees();

        // Call the function whenever a fee amount input changes
        $('.fee_amount').on('input', function() {
            calculateTotalFees();
        });
        // Handle click event for "Remove" button
        $(document).on('click', '.remove-row', function() {
            // Remove the entire table row (tr) when the button is clicked
            $(this).closest('tr').remove();
            // Recalculate the total fees
            calculateTotalFees();
        });
    });
</script>

@endpush


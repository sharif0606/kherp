@extends('layout.app')

@section('pageTitle',trans('Create Member Pending'))
@section('pageSubTitle',trans('Create'))

@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.mPending.store')}}">
                              @csrf
                              <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                        <div class="form-group">
                                            <label class="form-label">Year</label>
                                            <select id="year" class="form-control">
                                                <option value="">Select Year</option>
                                                @for($i=2021; $i<= date('Y'); $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                        <div class="form-group">
                                            <label class="form-label">Month</label>
                                            <select id="month" class="form-control">
                                            <option value="">Select Month</option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label class="form-label">Member Type</label>
                                            <select onchange="Get_fee(this)" id="selected_id" class="form-control" name="member_type">
                                                <option value="">Select</option>
                                                @forelse ($memberType as $mt)
                                                <option value="{{$mt->id}}">{{$mt->member_type}}</option>
                                                @empty
                                                <option value="">No Data Found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="text" class="form-control feeAmount" name="amount" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2" style="padding-top: 1.8rem;">
                                        <button class="btn btn-primary btn-block" type="button" onclick="get_details_report()">Get Report</button>
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
<script>
    function Get_fee(e) {
        var mtype = document.getElementById("selected_id").value;
        $.ajax({
            url: '{{route(currentUser().'.getMemberFee')}}',
            type: 'GET',
            data: { member_type: mtype },
            dataType: 'json',
            success: function(response) {
                // console.log(response.data);
                if (response.data) {
                var fee = response.data.fee_amount;
                $('.feeAmount').val(fee);
                } else {
                    $('.feeAmount').val('');
                }
            },
            
            error: function(xhr, status, error) {
                console.log(error); // Handle the error if needed
            }
        });
    }
</script>
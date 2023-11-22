@extends('layout.app')
@section('pageTitle',trans('Dashboard'))
@section('content')

<div class="page-content py-3">
    <section class="row">
       <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="info-box shadow">
                <span class="info-box-icon bg-aqua">
                <i class="bi bi-currency-dollar icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Today's Balance</span><br>
                    <span class="info-box-number">৳  1892.54</span>
                </div>
            </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="info-box shadow">
                <span class="info-box-icon bg-yellow">
                <i class="bi bi-currency-dollar icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Accounts Receivable</span><br>
                    <span class="info-box-number">৳  9.1k</span>
                </div>
            </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="info-box shadow">
                <span class="info-box-icon bg-red">
                <i class="bi bi-currency-dollar icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Accounts Payable</span><br>
                    <span class="info-box-number">৳  8.2k</span>
                </div>
            </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="info-box shadow">
                <span class="info-box-icon bg-green">
                <i class="bi bi-currency-dollar icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Net Profit</span><br>
                    <span class="info-box-number">৳  3.7k</span>
                </div>
            </div>
       </div>
    </section>
    <section class="row">
       <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="info-box shadow">
                <span class="info-box-icon bg-aqua">
                <i class="bi bi-currency-dollar icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Total Cash</span><br>
                    <span class="info-box-number">৳  1892.54</span>
                </div>
            </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="info-box shadow">
                <span class="info-box-icon bg-yellow">
                <i class="bi bi-currency-dollar icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Income</span><br>
                    <span class="info-box-number">৳  9.1k</span>
                </div>
            </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="info-box shadow">
                <span class="info-box-icon bg-red">
                <i class="bi bi-currency-dollar icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Expense</span><br>
                    <span class="info-box-number">৳  8.2k</span>
                </div>
            </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="info-box shadow">
                <span class="info-box-icon bg-green">
                <i class="bi bi-currency-dollar icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="text-bold text-uppercase">Net Profit</span><br>
                    <span class="info-box-number">৳  3.7k</span>
                </div>
            </div>
       </div>
    </section>
    <section class="row">
       <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="small-box bg-dream-pink">
               <div class="inner text-uppercase">
                    <h3>800</h3>
                    <p>Members</p>
               </div> 
               <div class="icon">
                <i class="bi bi-people-fill"></i>
               </div>
               <a href="#" class="small-box-footer text-uppercase">View
                <i class="bi bi-arrow-right-circle"></i>
               </a>
            </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="small-box bg-dream-purple">
               <div class="inner text-uppercase">
                    <h3>18</h3>
                    <p>Total Events</p>
               </div> 
               <div class="icon">
                <i class="bi bi-calendar2-event"></i>
               </div>
               <a href="#" class="small-box-footer text-uppercase">View
                <i class="bi bi-arrow-right-circle"></i>
               </a>
            </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="small-box bg-dream-maroon">
               <div class="inner text-uppercase">
                    <h3>18</h3>
                    <p>Reports</p>
               </div> 
               <div class="icon">
                <i class="bi bi-receipt"></i>
               </div>
               <a href="#" class="small-box-footer text-uppercase">View
                <i class="bi bi-arrow-right-circle"></i>
               </a>
            </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="small-box bg-dream-green">
               <div class="inner text-uppercase">
                    <h3>198</h3>
                    <p>Invoice</p>
               </div> 
               <div class="icon">
                <i class="bi bi-receipt"></i>
               </div>
               <a href="#" class="small-box-footer text-uppercase">View
                <i class="bi bi-arrow-right-circle"></i>
               </a>
            </div>
       </div>
    </section>
</div>
@endsection

@push('scripts')

<!-- Need: Apexcharts -->
<script src="{{ asset('/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('/assets/js/pages/dashboard.js') }}"></script>
@endpush
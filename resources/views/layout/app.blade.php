<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKCL | @yield('siteTitle', 'Dashboard')</title>
<link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main/custom.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}">
<link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
{{-- choice css --}}
<link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  {{-- tostr css --}}
  <link rel="stylesheet" href="{{ asset('assets/toastr/css/toastr.min.css')}}">
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  @stack('styles')
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-2">
                <div class="header-top">
                    <div class="container">
                        <div class="logo py-1">
                            <a href="{{route(currentUser().'.dashboard')}}"><img src="{{asset('uploads/erpAdmin/'.encryptor('decrypt', request()->session()->get('image')))}}" alt="Logo"></a>
                        </div>
                        <div class="header-top-right">
                            <div class="dropdown">
                                <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="text mobile-view-erp">
                                        <h6 class="user-dropdown-name">{{encryptor('decrypt', request()->session()->get('userName'))}}</h6>
                                        <p class="user-dropdown-status text-sm text-muted">{{currentUser()}}</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                    {{-- <li><a class="dropdown-item" href="#">{{__('My Account') }}</a></li> --}}
                                    {{-- <li><a class="dropdown-item" href="#">Settings</a></li> --}}
                                    {{-- <li><hr class="dropdown-divider"></li> --}}
                                    <li><span class="ps-2"><i class="bi bi-box-arrow-right"></i></span><a class="dropdown-item" href="{{route('logOut')}}" style="display: inline; padding-left: 6px;">{{__('Logout') }}</a></li>
                                </ul>
                            </div>
                            <a  href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        @include('layout.nav.'.currentUser())
                    </div>
                </nav>
            </header>
			<div class="content-wrapper container">
				<div class="page-heading m-0">
                    <div class="row">
					    <div class="page-title">
							<div class="col-lg-12 col-md-12 order-md-1 order-last p-0 mb-2">
                                <div class="about-title d-flex  justify-content-between" id="grad">
                                    <div class="fs-5 fw-bold ps-2">@yield('pageTitle')</div>
                                    <nav aria-label="breadcrumb" class="breadcrumb-header">
                                        <ol class="breadcrumb mb-0 text-white">
                                            @hasSection('pageSubTitle')
                                                <li class="breadcrumb-item"><a class="text-white" href="{{route(currentUser().'.dashboard')}}">{{__('dashboard') }}</a></li>
                                                <li class="breadcrumb-item active text-white pe-2" aria-current="page">@yield('pageSubTitle')</li>
                                            @else
                                                <li class="breadcrumb-item active text-white pe-2">{{__('dashboard') }}</li>
                                            @endif
                                        </ol>
                                    </nav>
                                </div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="page-content">
					@yield('content')
				</div>
			</div>
            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>&copy; CKCL</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="#">Muktodhara Technology LTD.</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
<script src="{{ asset('/assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('/assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/pages/horizontal-layout.js')}}"></script>
<script src="{{ asset('/assets/extensions/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{ asset('/assets/js/pages/form-element-select.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

  <script src="{{ asset('assets/toastr/js/toastr.min.js')}}"></script>
  {!! Toastr::message() !!}
  {{-- //nav active code --}}
<script>
    $(function() {
        $("#datepicker").datepicker({ dateFormat: "dd-mm-yy" }).val()
    });
</script>
<script>
    $(document).ready(function() {
        // Get the current page URL
        var currentPageUrl = window.location.href;

        // Loop through each anchor in submenu items
        $('.submenu-item a').each(function() {
            var anchorUrl = $(this).attr('href');

            // Check if the current page URL matches the anchor's URL
            if (currentPageUrl === anchorUrl) {
                // Add "active" class and style to the closest ul with class "submenu"
                $(this).closest('.submenu-item').addClass('active');
                $(this).closest('ul.submenu').addClass('active').css('display', 'block');
                
                // Add "active" class and style to the parent ul with class "submenu"
                $(this).closest('ul.submenu').parents('ul.submenu').addClass('active').css('display', 'block');
            }
        });
    });
</script>
{{-- //nav active code --}}

@stack('scripts')

  {{-- tostr --}}
  
</body>

</html>

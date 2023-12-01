<ul>
    <li class="menu-item">
        <a href="{{route(currentUser().'.dashboard')}}" class='menu-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{__('dashboard') }}</span>
        </a>
    </li>
    <li class="menu-item  has-sub">
        <a href="#" class='menu-link'>
            <i class="bi bi-gear-fill"></i>
            <span>Settings</span>
        </a>
        <div class="submenu ">
            <div class="submenu-group-wrapper">
                <ul class="submenu-group">
                    {{-- <li  class="submenu-item  has-sub">
                        <a href="#" class='submenu-link'>Location</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.country.index')}}" class="subsubmenu-link">Country</a></li>
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.division.index')}}" class="subsubmenu-link">Division</a></li>
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.district.index')}}" class="subsubmenu-link">District</a></li>
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.thana.index')}}" class="subsubmenu-link">Thana</a></li>
                        </ul>
                    </li> --}}
                    <li  class="submenu-item  has-sub">
                        <a href="#" class='submenu-link'>User</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.admin.index')}}" class="subsubmenu-link">Admin</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </li>
    <li class="menu-item  has-sub">
        <a href="#" class='menu-link'>
            <i class="bi bi-people-fill"></i>
            <span>CRM</span>
        </a>
        <div class="submenu ">
            <div class="submenu-group-wrapper">
                <ul class="submenu-group">
                    <li  class="submenu-item">
                        <a href="{{route(currentUser().'.member.index')}}" class='submenu-link'>Customer</a>
                    </li>
                    <li  class="submenu-item">
                        <a href="{{route('member_voucher.index')}}" class='submenu-link'>Customer Auto Voucher</a>
                    </li>
                </ul>
            </div>
        </div>
    </li>
    <li class="menu-item  has-sub">
        <a href="#" class='menu-link'>
            <i class="bi bi-calculator"></i>
            <span>Accounts</span>
        </a>
        <div class="submenu ">
            <div class="submenu-group-wrapper">
                <ul class="submenu-group">
                    <li  class="submenu-item  has-sub">
                        <a href="#" class='submenu-link'>Accounts</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.master.index')}}" class="subsubmenu-link">{{__('Master Head')}}</a></li>
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.sub_head.index')}}" class="subsubmenu-link">{{__('Sub Head')}}</a></li>
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.child_one.index')}}" class="subsubmenu-link">{{__('Child One')}}</a></li>
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.child_two.index')}}" class="subsubmenu-link">{{__('Child Two')}}</a></li>
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.navigate.index')}}" class="subsubmenu-link">{{__('Navigate View')}}</a></li>
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.incomeStatement')}}" class="subsubmenu-link">{{__('Income Statement')}}</a></li>
                        </ul>
                    </li>
                    <li  class="submenu-item  has-sub">
                        <a href="#" class='submenu-link'>Voucher</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.credit_voucher.index')}}" class="subsubmenu-link">{{__('Credit Voucher')}}</a></li>
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.debit_voucher.index')}}" class="subsubmenu-link">{{__('Debit Voucher')}}</a></li>
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.journal_voucher.index')}}" class="subsubmenu-link">{{__('Journal Voucher')}}</a></li>
                        </ul>
                    </li>
                    <li  class="submenu-item  has-sub">
                        <a href="#" class='submenu-link'>Payment</a>
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.ppurpose.index')}}" class="subsubmenu-link">{{__('Payment Purpose')}}</a></li>
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.payment.index')}}" class="subsubmenu-link">{{__('Payment')}}</a></li>
                            <li class="subsubmenu-item "> <a href="{{route(currentUser().'.mPending.index')}}" class="subsubmenu-link">{{__('Member Pending')}}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </li>
    {{-- <li class="menu-item  has-sub"> <a href="#" class='menu-link'>
            <i class="bi bi-stack"></i>
            <span>Components</span>
        </a>
        <div class="submenu ">
            <div class="submenu-group-wrapper">
                <ul class="submenu-group">
                    <li class="submenu-item"><a href="component-alert.html" class='submenu-link'>Alert</a></li>
                </ul>
                <ul class="submenu-group">
                    <li
                        class="submenu-item  ">
                        <a href="component-tooltip.html"
                            class='submenu-link'>Tooltip</a>
                    </li>
                    <li
                        class="submenu-item  has-sub">
                        <a href="#" class='submenu-link'>Extra Components</a>
                        <!-- 3 Level Submenu -->
                        <ul class="subsubmenu">
                            <li class="subsubmenu-item ">
                                <a href="extra-component-avatar.html" class="subsubmenu-link">Avatar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </li> --}}
    
</ul>

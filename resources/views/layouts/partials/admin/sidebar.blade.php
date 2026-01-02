<!--begin::Primary menu-->
<div id="kt_aside_menu"
    class="menu menu-column menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5"
    data-kt-menu="true">
    <div class="menu-item py-2">
        <a class="menu-link {{ request()->is('dashboard') ? 'active' : '' }} menu-center"
            href="{{ route('admin.dashboard.index') }}" title="Dashboard" data-bs-toggle="tooltip" data-bs-trigger="hover"
            data-bs-dismiss="click" data-bs-placement="right">
            <span class="menu-icon me-0">
                <!--begin::Svg Icon | path: icons/duotone/Home/Home2.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path
                            d="M21.4622 10.699C21.4618 10.6986 21.4613 10.6981 21.4609 10.6977L13.3016 2.53955C12.9538 2.19165 12.4914 2 11.9996 2C11.5078 2 11.0454 2.1915 10.6974 2.5394L2.54246 10.6934C2.53971 10.6961 2.53696 10.699 2.53422 10.7018C1.82003 11.42 1.82125 12.5853 2.53773 13.3017C2.86506 13.6292 3.29739 13.8188 3.75962 13.8387C3.77839 13.8405 3.79732 13.8414 3.81639 13.8414H4.14159V19.8453C4.14159 21.0334 5.10833 22 6.29681 22H9.48897C9.81249 22 10.075 21.7377 10.075 21.4141V16.707C10.075 16.1649 10.516 15.7239 11.0582 15.7239H12.941C13.4832 15.7239 13.9242 16.1649 13.9242 16.707V21.4141C13.9242 21.7377 14.1866 22 14.5102 22H17.7024C18.8909 22 19.8576 21.0334 19.8576 19.8453V13.8414H20.1592C20.6508 13.8414 21.1132 13.6499 21.4613 13.302C22.1786 12.5844 22.1789 11.4171 21.4622 10.699V10.699Z"
                            fill="#00B2FF" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
        </a>
    </div>

    {{-- <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" data-kt-menu-flip="bottom" class="menu-item py-2">
        <span class="menu-link menu-center {{ request()->is('attendance*') ? 'active' : '' }}" title="Attendance" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
            <span class="menu-icon me-0">
                <!-- Clock Icon for Attendance -->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm1-13h-2v6h6v-2h-4z" fill="#00B2FF" />
                    </svg>
                </span>
            </span>
        </span>
        <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
            <div class="menu-item">
                <div class="menu-content">
                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">Manage Attendance</span>
                </div>
            </div>
            <div class="menu-item menu-accordion">
                <a href="{{ route('attendance.index') }}" class="menu-link {{ request()->routeIs('attendance.index') ? 'active' : '' }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Attendance</span>
                </a>
            </div>
            <div class="menu-item menu-accordion">
                <a href="{{ route('attendance.all_attendance_index') }}" class="menu-link {{ request()->routeIs('attendance.all_attendance_index') ? 'active' : '' }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Attendance Record</span>
                </a>
            </div>
            <div class="menu-item menu-accordion">
                <a class="menu-link">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Leave</span>
                </a>
            </div>
            <div class="menu-item menu-accordion">
                <a class="menu-link">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Overtime</span>
                </a>
            </div>
        </div>
    </div> --}}


    <div class="menu-item py-2">
        <a class="menu-link {{ request()->is('users') ? 'active' : '' }}  menu-center" href="" title="User"
            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
            <span class="menu-icon me-0">
                <!--begin::Svg Icon | path: icons/duotone/Home/Home2.svg-->
                <i class="fa-duotone fa-solid fa-users"></i>
                <!--end::Svg Icon-->
            </span>
        </a>
    </div>

    <div class="menu-item py-2">
        <a class="menu-link {{ request()->is('admin/categories') ? 'active' : '' }}  menu-center" href="{{ route('admin.categories.index') }}"
            title="Food Category" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
            data-bs-placement="right">
            <span class="menu-icon me-0">
                <!--begin::Svg Icon | path: icons/duotone/Home/Home2.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-egg-fried" viewBox="0 0 16 16">
                    <path d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    <path d="M13.997 5.17a5 5 0 0 0-8.101-4.09A5 5 0 0 0 1.28 9.342a5 5 0 0 0 8.336 5.109 3.5 3.5 0 0 0 5.201-4.065 3.001 3.001 0 0 0-.822-5.216zm-1-.034a1 1 0 0 0 .668.977 2.001 2.001 0 0 1 .547 3.478 1 1 0 0 0-.341 1.113 2.5 2.5 0 0 1-3.715 2.905 1 1 0 0 0-1.262.152 4 4 0 0 1-6.67-4.087 1 1 0 0 0-.2-1 4 4 0 0 1 3.693-6.61 1 1 0 0 0 .8-.2 4 4 0 0 1 6.48 3.273z"/>
                    </svg>
                 </span>
                <!--end::Svg Icon-->
            </span>
        </a>
    </div>
    <div class="menu-item py-2">
        <a class="menu-link {{ request()->is('admin/products') ? 'active' : '' }}  menu-center" href="{{ route('admin.products.index') }}" title="Food Product"
            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
            <span class="menu-icon me-0">
                <!--begin::Svg Icon | path: icons/duotone/Home/Home2.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor"
                        class="bi bi-fork-knife" viewBox="0 0 16 16">
                        <path
                            d="M13 .5c0-.276-.226-.506-.498-.465-1.703.257-2.94 2.012-3 8.462a.5.5 0 0 0 .498.5c.56.01 1 .13 1 1.003v5.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5zM4.25 0a.25.25 0 0 1 .25.25v5.122a.128.128 0 0 0 .256.006l.233-5.14A.25.25 0 0 1 5.24 0h.522a.25.25 0 0 1 .25.238l.233 5.14a.128.128 0 0 0 .256-.006V.25A.25.25 0 0 1 6.75 0h.29a.5.5 0 0 1 .498.458l.423 5.07a1.69 1.69 0 0 1-1.059 1.711l-.053.022a.92.92 0 0 0-.58.884L6.47 15a.971.971 0 1 1-1.942 0l.202-6.855a.92.92 0 0 0-.58-.884l-.053-.022a1.69 1.69 0 0 1-1.059-1.712L3.462.458A.5.5 0 0 1 3.96 0z" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
        </a>
    </div>
     <div class="menu-item py-2">
        <a class="menu-link {{ request()->is('admin/orders') ? 'active' : '' }}  menu-center" href="{{ route('admin.orders.index') }}" title="Customer Orders"
            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
            <span class="menu-icon me-0">
                <!--begin::Svg Icon | path: icons/duotone/Home/Home2.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
        </a>
    </div>


    {{-- <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" data-kt-menu-flip="bottom" class="menu-item py-2">
        <span class="menu-link menu-center {{ request()->is('payroll*') ? 'active' : '' }}" title="Payroll" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
            <span class="menu-icon me-0">
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
                        <!-- Base Money Check (Color 1) -->
                        <path d="M20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4ZM20 18H4V8H20V18ZM4 6H20V7H4V6Z" fill="#4CAF50"/>

                        <!-- Pen (Color 2) -->
                        <path d="M14.6 2.6L16.6 4.6L9.5 11.7L7.5 9.7L14.6 2.6ZM17.2 4.6L15.2 2.6L14.4 3.4L16.4 5.4L17.2 4.6ZM10.3 13.7L14.4 9.6L15.6 10.8L11.5 14.8L9.4 12.8L10.3 13.7Z" fill="#FFC107"/>
                    </svg>
                </span>
            </span>
        </span>
        <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
            <div class="menu-item">
                <div class="menu-content">
                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">Manage Payroll</span>
                </div>
            </div>
            <div class="menu-item menu-accordion">
                <a href="{{ route('payroll.index') }}" class="menu-link {{ request()->routeIs('payroll.index') ? 'active' : '' }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Payslip</span>
                </a>
            </div>
        </div>
    </div> --}}


</div>
<!--end::Primary menu-->

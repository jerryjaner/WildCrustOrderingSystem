<!--begin::Primary menu-->
<div id="kt_aside_menu" class="menu menu-column menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5" data-kt-menu="true">
    <div class="menu-item py-2">
        <a class="menu-link {{ request()->is('dashboard') ? 'active' : '' }} menu-center"
           href="{{ route('admin.dashboard.index') }}"
           title="Dashboard"
           data-bs-toggle="tooltip"
           data-bs-trigger="hover"
           data-bs-dismiss="click"
           data-bs-placement="right">
            <span class="menu-icon me-0">
                <!--begin::Svg Icon | path: icons/duotone/Home/Home2.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M21.4622 10.699C21.4618 10.6986 21.4613 10.6981 21.4609 10.6977L13.3016 2.53955C12.9538 2.19165 12.4914 2 11.9996 2C11.5078 2 11.0454 2.1915 10.6974 2.5394L2.54246 10.6934C2.53971 10.6961 2.53696 10.699 2.53422 10.7018C1.82003 11.42 1.82125 12.5853 2.53773 13.3017C2.86506 13.6292 3.29739 13.8188 3.75962 13.8387C3.77839 13.8405 3.79732 13.8414 3.81639 13.8414H4.14159V19.8453C4.14159 21.0334 5.10833 22 6.29681 22H9.48897C9.81249 22 10.075 21.7377 10.075 21.4141V16.707C10.075 16.1649 10.516 15.7239 11.0582 15.7239H12.941C13.4832 15.7239 13.9242 16.1649 13.9242 16.707V21.4141C13.9242 21.7377 14.1866 22 14.5102 22H17.7024C18.8909 22 19.8576 21.0334 19.8576 19.8453V13.8414H20.1592C20.6508 13.8414 21.1132 13.6499 21.4613 13.302C22.1786 12.5844 22.1789 11.4171 21.4622 10.699V10.699Z" fill="#00B2FF" />
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
        <a class="menu-link {{ request()->is('users') ? 'active' : '' }}  menu-center"
           href=""
           title="User"
           data-bs-toggle="tooltip"
           data-bs-trigger="hover"
           data-bs-dismiss="click"
           data-bs-placement="right">
            <span class="menu-icon me-0">
                <!--begin::Svg Icon | path: icons/duotone/Home/Home2.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
        </a>
    </div>

    <div class="menu-item py-2">
        <a class="menu-link {{ request()->is('category') ? 'active' : '' }}  menu-center"
           href=""
           title="Food Category"
           data-bs-toggle="tooltip"
           data-bs-trigger="hover"
           data-bs-dismiss="click"
           data-bs-placement="right">
            <span class="menu-icon me-0">
                <!--begin::Svg Icon | path: icons/duotone/Home/Home2.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
        </a>
    </div>
    <div class="menu-item py-2">
        <a class="menu-link {{ request()->is('menu') ? 'active' : '' }}  menu-center"
           href=""
           title="Food Menu"
           data-bs-toggle="tooltip"
           data-bs-trigger="hover"
           data-bs-dismiss="click"
           data-bs-placement="right">
            <span class="menu-icon me-0">
                <!--begin::Svg Icon | path: icons/duotone/Home/Home2.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
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

    {{-- <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" data-kt-menu-flip="bottom" class="menu-item py-2">
        <span class="menu-link menu-center " title="Deduction" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
            <span class="menu-icon me-0">

                <span class="svg-icon svg-icon-1">
                    <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <!-- Main Body of Icon (Color 1) -->
                        <path d="M731.25 547.39v72.93H475.06v54.59c0 19.89 4.93 38.51 13.04 55.34h-38.49l-194.73-128c-28.84-18.98-65.64-20.57-96.07-4.18a93.73 93.73 0 0 0-49.29 82.57c0 32.05 16.09 61.54 43.04 78.88l238.79 153.77h339.9v36.57H914.1V547.39H731.25z m-318.4 292.75l-220.7-142.12a20.6 20.6 0 0 1-9.48-17.38c0-11.12 7.59-16.43 10.86-18.2 3.29-1.73 11.88-5.18 21.18 0.91l213.02 140.04h230.7v-73.14h-0.71v-0.04h-54.2c-23.98 0-44.46-15.36-52.11-36.75h179.85v146.68H412.85z m428.11 36.57h-36.57V620.53h36.57v256.18zM232.17 501.66c-20.46-35.7-31.27-76.48-31.27-117.95C200.9 252.64 307.51 146 438.54 146 569.6 146 676.2 252.64 676.2 383.71c0 41.43-10.8 82.21-31.25 117.91l63.46 36.36c26.79-46.77 40.93-100.11 40.93-154.27 0-171.41-139.43-310.86-310.8-310.86S127.76 212.3 127.76 383.71c0 54.2 14.16 107.55 40.95 154.3l63.46-36.35z" fill="#007AFF" />

                        <!-- Secondary Element (Color 2) -->
                        <path d="M336.22 350.91l-48.78 54.48 136.73 122.47 170.36-195.97-55.22-48-121.64 139.97z" fill="#FF5722" />
                    </svg>
                </span>

            </span>
        </span>
        <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
            <div class="menu-item">
                <div class="menu-content">
                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">Manage Deduction</span>
                </div>
            </div>
            <div class="menu-item menu-accordion">
                <a href="" class="menu-link">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">SSS </span>
                </a>
            </div>
            <div class="menu-item menu-accordion">
                <a href="" class="menu-link">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Pag Ibig </span>
                </a>
            </div>
            <div class="menu-item menu-accordion">
                <a href="" class="menu-link">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Philhealth </span>
                </a>
            </div>
        </div>
    </div> --}}
</div>
<!--end::Primary menu-->

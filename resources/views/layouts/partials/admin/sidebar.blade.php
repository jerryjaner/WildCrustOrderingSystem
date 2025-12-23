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
        <a class="menu-link {{ request()->is('categories') ? 'active' : '' }}  menu-center" href="{{ route('admin.categories.index') }}"
            title="Food Category" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
            data-bs-placement="right">
            <span class="menu-icon me-0">
                <!--begin::Svg Icon | path: icons/duotone/Home/Home2.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Pro v5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2025 Fonticons, Inc.--><path d="M158.87.15c-16.16-1.52-31.2 8.42-35.33 24.12l-14.81 56.27c187.62 5.49 314.54 130.61 322.48 317l56.94-15.78c15.72-4.36 25.49-19.68 23.62-35.9C490.89 165.08 340.78 17.32 158.87.15zm-58.47 112L.55 491.64a16.21 16.21 0 0 0 20 19.75l379-105.1c-4.27-174.89-123.08-292.14-299.15-294.1zM128 416a32 32 0 1 1 32-32 32 32 0 0 1-32 32zm48-152a32 32 0 1 1 32-32 32 32 0 0 1-32 32zm104 104a32 32 0 1 1 32-32 32 32 0 0 1-32 32z"/></svg>
                </span>
                <!--end::Svg Icon-->
            </span>
        </a>
    </div>
    <div class="menu-item py-2">
        <a class="menu-link {{ request()->is('menu') ? 'active' : '' }}  menu-center" href="" title="Food Menu"
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

<div>
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">


            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Dashboard</span></li>


            <li>
                <a href="{{ route('home') }}" class="iq-waves-effect">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>




            <li>
                <a href="{{ route('opd_get') }}">
                    <i class="fa fa-stethoscope"></i>
                    <span>
                        Opd In
                    </span>
                </a>
            </li>
            <li><a href="{{ route('ipd_get') }}"><i class="fa fa-procedures"></i>Ipd In</a></li>


            <li><a href="{{ route('bedstatus') }}"><i class="fa fa-bed"></i>Bed Control</a></li>
            <li><a href="{{ route('patients') }}"><i class="fa fa-user"></i>Patients</a></li>


            <li><a href="{{ route('patients') }}"><i class="fa fa-flask"></i>Lab Test</a></li>
            <li><a href="{{ route('patients') }}"><i class="fa fa-cut"></i>Operation Theatre</a></li>
            <li><a href="{{ route('patients') }}"><i class="fa fa-birthday-cake"></i>Birth & Death Record</a></li>

            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Apps</span></li>


            <li>
                <a href="#mailbox" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-mail-open-fill"></i><span>Email</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="mailbox" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="app/index.html"><i class="ri-inbox-fill"></i>Inbox</a></li>
                   <li><a href="app/email-compose.html"><i class="ri-edit-2-fill"></i>Email Compose</a></li>
                </ul>
            </li>

            <li>
                <a href="#doctor-info" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                        class="ri-user-3-fill"></i><span>Finance</span><i class="fa fa fa-money-bill-wave"></i></a>

                <ul id="doctor-info" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="#"><i class="ri-file-list-fill"></i>Income</a></li>
                    <li><a href="#"><i class="ri-file-list-fill"></i>All Doctors</a></li>
                </ul>
            </li>


            <li>
                <a href="#staff" id="iq-sidebar-toggle" class="iq-waves-effect collapsed" onclick="return false" data-toggle="collapse" aria-expanded="false"><i class="ri-mail-open-fill"></i><span>Staff</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="staff" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="{{ route('staff') }}"><i class="ri-inbox-fill"></i>Inbox</a></li>
                   <li><a href="{{ route('staff') }}"><i class="ri-edit-2-fill"></i>Email Compose</a></li>
                </ul>
            </li>




{{--
            <li>
                <a href="#menu-level" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                        class="ri-record-circle-line"></i><span>Menu Level</span><i
                        class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="menu-level" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="#"><i class="ri-record-circle-line"></i>Menu 1</a></li>
                    <li><a href="#"><i class="ri-record-circle-line"></i>Menu 2</a>
                        <ul>
                            <li>
                                <a href="#sub-menu" class="iq-waves-effect collapsed" data-toggle="collapse"
                                    aria-expanded="false"><i class="ri-play-circle-line"></i><span>Sub-menu</span><i
                                        class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                <ul id="sub-menu" class="iq-submenu iq-submenu-data collapse">
                                    <li><a href="#"><i class="ri-record-circle-line"></i>Sub-menu 1</a></li>
                                    <li><a href="#"><i class="ri-record-circle-line"></i>Sub-menu 2</a></li>
                                    <li><a href="#"><i class="ri-record-circle-line"></i>Sub-menu 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="ri-record-circle-line"></i>Menu 3</a></li>
                    <li><a href="#"><i class="ri-record-circle-line"></i>Menu 4</a></li>
                </ul>
            </li> --}}
        </ul>
    </nav>
</div>

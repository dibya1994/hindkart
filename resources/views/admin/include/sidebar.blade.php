<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
      
        <!-- Light Logo-->
        <a href="{{ url('/') }}" class="logo logo-light">
            <span class="logo-sm" style="background: #fff;padding: 18px 12px;">
                <img src="{{ URL::asset('public/assets/images/logo.png')}}" alt="" height="45">
            </span>
            <span class="logo-lg" style="background: #fff;padding: 18px 12px;">
                <img src="{{ URL::asset('public/assets/images/logo.png')}}" alt="" height="45">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
@php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$path=explode('/', $actual_link);
$page_name=$path[4];
@endphp
    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Admin Panel</span></li>
                <li class="nav-item">
                    <a class="nav-link {{$page_name=='dashboard'?'active':''}}" href="{{ url('/admin/dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='user'?'active':''}}" href="{{ url('/admin/user') }}">
                        <i class="fa fa-user-o" aria-hidden="true"></i> <span data-key="t-dashboards">User</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='category'?'active':''}}" href="{{ url('/admin/category') }}">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i> <span data-key="t-dashboards">Category</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='subcategory'?'active':''}}" href="{{ url('/admin/subcategory') }}">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i> <span data-key="t-dashboards">Sub Category</span>
                    </a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link {{$page_name=='megacategory'?'active':''}}" href="{{ url('/admin/megacategory') }}">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i> <span data-key="t-dashboards">Mega Category</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='teammember'?'active':''}}" href="{{ url('/admin/teammember') }}">
                        <i class="fa fa-users" aria-hidden="true"></i> <span data-key="t-dashboards">Team Member</span>
                    </a>
                </li> 

                

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='service'?'active':''}}" href="{{ url('/admin/service') }}">
                        <i class="fa fa-cogs" aria-hidden="true"></i> <span data-key="t-dashboards">Service</span>
                    </a>
                </li> 

                

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Banners</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/admin/websitebanner') }}" class="nav-link {{$page_name=='websitebanner'?'active':''}}" data-key="t-calendar"> Website Banner </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/company-announcement') }}" class="nav-link {{$page_name=='company-announcement'?'active':''}}" data-key="t-calendar"> Company Announcement </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/deals-of-the-day') }}" class="nav-link {{$page_name=='deals-of-the-day'?'active':''}}" data-key="t-chat"> Deals of the day </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/recently-viewed') }}" class="nav-link {{$page_name=='recently-viewed'?'active':''}}" data-key="t-chat"> Recently Viewed </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/best-discount') }}" class="nav-link {{$page_name=='best-discount'?'active':''}}" data-key="t-chat"> Best Discount </a>
                            </li>
                           
                            
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Partners</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/admin/zone') }}" class="nav-link {{$page_name=='zone'?'active':''}}" data-key="t-calendar"> Zones </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/zonepartner') }}" class="nav-link {{$page_name=='zonepartner'?'active':''}}" data-key="t-chat"> Zone Partner </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/districtpartner') }}" class="nav-link {{$page_name=='districtpartner'?'active':''}}" data-key="t-chat"> District Partner </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/blockpartner') }}" class="nav-link {{$page_name=='blockpartner'?'active':''}}" data-key="t-chat"> Block Partner </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/employee') }}" class="nav-link {{$page_name=='employee'?'active':''}}" data-key="t-chat"> Employee </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/merchant') }}" class="nav-link {{$page_name=='merchant'?'active':''}}" data-key="t-chat"> Merchant </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="#sidebarEmail" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                    Email
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEmail">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-mailbox.html" class="nav-link" data-key="t-mailbox"> Mailbox </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebaremailTemplates" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebaremailTemplates">
                                                <span data-key="t-email-templates">Email Templates</span> <span class="badge badge-pill bg-danger" data-key="t-new">New</span>
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebaremailTemplates">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="apps-email-basic.html" class="nav-link" data-key="t-basic-action"> Basic Action </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="apps-email-ecommerce.html" class="nav-link" data-key="t-ecommerce-action"> Ecommerce Action </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}
                            
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='clientreview'?'active':''}}" href="{{ url('/admin/clientreview') }}">
                        <i class="fa fa-commenting-o" aria-hidden="true"></i> <span data-key="t-dashboards">Client Review</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='razorpay'?'active':''}}" href="{{ url('/admin/razorpay') }}">
                        <i class="fa fa-commenting-o" aria-hidden="true"></i> <span data-key="t-dashboards">Razorpay Credentials</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='monthlyfee'?'active':''}}" href="{{ url('/admin/monthlyfee') }}">
                        <i class="fa fa-commenting-o" aria-hidden="true"></i> <span data-key="t-dashboards">Monthly Fees</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{$page_name=='deliverytype'?'active':''}}" href="{{ url('/admin/deliverytype') }}">
                        <i class="fa fa-commenting-o" aria-hidden="true"></i> <span data-key="t-dashboards">Delivery Type</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='admin_logout'?'active':''}}" href="{{ url('/admin/admin_logout') }}">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> <span data-key="t-dashboards">Logout</span>
                    </a>
                </li> 

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
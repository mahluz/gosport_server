<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CPanel Admin</title>
    <link rel="stylesheet" href="{{ url('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/css/typicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/css/varello-theme.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/css/varello-skins.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/css/icheck-all-skins.css') }}">
    <link rel="stylesheet" href="{{ url('public/css/icheck-skins/flat/_all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/js/dataTables/dataTables.bootstrap.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600,700,300' rel='stylesheet' type='text/css'>    <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">        
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('css')
</head>
<body>
    <div class="notifications top-right"></div>
    <div class="wrapper">
        <div class="page-wrapper">
            <aside class="left-sidebar">
            <section class="sidebar-user-panel">
                <div id="user-panel-slide-toggleable">
                    <div class="user-panel-profile-picture">
                        <img src="{{ url('public/img/profile.jpg') }}" alt="Tyrone G">
                    </div>
                    <span class="user-panel-logged-in-text"><span class="fa fa-circle-o text-success user-panel-status-icon"></span> Logged in as <strong> Zulham</strong></span>
                    <a href="app-pages/profile/update.html" class="user-panel-action-link"><span class="fa fa-pencil"></span> Manage your account</a>
                </div>
                <!-- <button class="user-panel-toggler" data-slide-toggle="user-panel-slide-toggleable"><span class="fa fa-chevron-up" data-slide-toggle-showing></span><span class="fa fa-chevron-down" data-slide-toggle-hidden></span></button> -->
            </section>
            <ul class="sidebar-nav">
                <li class="sidebar-nav-heading">
                    MAIN MENU
                </li>
                <li class="sidebar-nav-link @yield('dashboard-active')">
                    <a href="{{ url('main') }}">
                        <span class="typcn typcn-home sidebar-nav-link-logo"></span> Dashboard
                    </a>
                </li>
                <li class="sidebar-nav-link @yield('customer-active')">
                    <a href="{{ url('pelanggan') }}">
                        <span class="typcn typcn-group sidebar-nav-link-logo"></span> Pelanggan
                    </a>
                </li>
                <li class="sidebar-nav-link @yield('technician-active')">
                    <a href="{{ url('teknisi') }}">
                        <span class="typcn typcn-spanner sidebar-nav-link-logo"></span> Teknisi
                    </a>
                </li>
                <li class="sidebar-nav-link sidebar-nav-link-group @yield('jasa-active')">
                    <a data-subnav-toggle href="{{ url('jasa') }}">
                        <span class="typcn typcn-shopping-cart sidebar-nav-link-logo"></span> Jasa
                        <span class="fa fa-chevron-right subnav-toggle-icon subnav-toggle-icon-closed"></span>
                        <span class="fa fa-chevron-down subnav-toggle-icon subnav-toggle-icon-opened"></span>
                    </a>
                    <ul class="sidebar-nav">
                        <li class="sidebar-nav-link ">
                            <a href="{{ url('paket') }}">
                                <span class="typcn typcn-th-list-outline sidebar-nav-link-logo"></span> Paket
                            </a>
                        </li>
                        <li class="sidebar-nav-link ">
                            <a href="{{ url('tempat') }}">
                                <span class="typcn typcn-th-list-outline sidebar-nav-link-logo"></span> Tempat
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-nav-heading">
                    SUB MENU
                </li>
                <li class="sidebar-nav-link ">
                    <a href="{{ url('setting') }}">
                        <span class="typcn typcn-spanner sidebar-nav-link-logo"></span> Setting
                    </a>
                </li>
            </ul>
            </aside>        

            <header class="top-header">

            <a href="index.html" class="top-header-logo">
                    <span class="text-primary">Go</span>Sport
            </a>

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-sidebar-toggle" data-toggle-sidebar>
                            <span class="typcn typcn-arrow-left visible-sidebar-sm-open"></span>
                            <span class="typcn typcn-arrow-right visible-sidebar-sm-closed"></span>
                            <span class="typcn typcn-arrow-left visible-sidebar-md-open"></span>
                            <span class="typcn typcn-arrow-right visible-sidebar-md-closed"></span>
                        </button>
                    </div>
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <form class="navbar-left navbar-search-form">
                                    <button type="submit" class="navbar-search-btn"><span class="fa fa-search"></span></button>
                                    <input type="text" class="navbar-search-box" placeholder="Find something...">
                                </form>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right" data-dropdown-in="flipInX" data-dropdown-out="zoomOut">
                            <li class="hidden-sm hidden-xs hidden-md"><a href="#">Welcome to <strong>Go</strong>Sport</a></li>
                            {{-- <li class="item-feed dropdown">
                                <a href="#" class="item-feed-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-envelope"></span> <span class="badge badge-primary item-feed-badge">15</span></a>
                                <ul class="dropdown-menu dropdown-menu-messages">
                                    <li>
                                        <a class="dropdown-menu-messages-item" href="#">
                                            <div class="dropdown-menu-messages-item-image">
                                                <img src="{{ url('public/img/james-taylor.jpg') }}" alt="James T">
                                            </div>
                                            <div class="dropdown-menu-messages-item-ago">3hr ago</div>
                                            <div class="dropdown-menu-messages-item-content">
                                                <div class="dropdown-menu-messages-item-content-from"><span class="fa fa-circle-o text-success"></span> James Taylor</div>
                                                <div class="dropdown-menu-messages-item-content-snippet">Hey there man, do you...</div>
                                                <div class="dropdown-menu-messages-item-content-timestamp">12:03 AM on 19/05/2016</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-menu-messages-item" href="#">
                                            <div class="dropdown-menu-messages-item-image">
                                                <img src="{{ url('public/img/user-1-profile.jpg') }}" alt="Tyrone G">
                                            </div>
                                            <div class="dropdown-menu-messages-item-ago">3hr ago</div>
                                            <div class="dropdown-menu-messages-item-content">
                                                <div class="dropdown-menu-messages-item-content-from"><span class="fa fa-circle-o text-warning"></span> Tyrone G</div>
                                                <div class="dropdown-menu-messages-item-content-snippet">Hey there man, do you...</div>
                                                <div class="dropdown-menu-messages-item-content-timestamp">12:03 AM on 19/05/2016</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-menu-messages-item" href="#">
                                            <div class="dropdown-menu-messages-item-image">
                                                <img src="{{ url('public/img/user-3-profile.jpg') }}" alt="James T">
                                            </div>
                                            <div class="dropdown-menu-messages-item-ago">3hr ago</div>
                                            <div class="dropdown-menu-messages-item-content">
                                                <div class="dropdown-menu-messages-item-content-from"><span class="fa fa-circle-o text-danger"></span> Sandra Nelvo</div>
                                                <div class="dropdown-menu-messages-item-content-snippet">Hey there man, do you...</div>
                                                <div class="dropdown-menu-messages-item-content-timestamp">12:03 AM on 19/05/2016</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-menu-link-lg" href="app-pages/inbox.html">
                                            <span class="fa fa-envelope"></span> Go To Inbox
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="item-feed dropdown">
                                <a href="#" class="item-feed-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-bell"></span> <span class="badge badge-danger item-feed-badge">7</span></a>
                                <ul class="dropdown-menu dropdown-menu-notifications">
                                    <li>
                                        <a class="dropdown-menu-notifications-item" href="#">
                                            <span class="dropdown-menu-notifications-item-content"><span class="fa fa-smile-o"></span> You got 3 likes</span>
                                            <span class="dropdown-menu-notifications-item-ago">3hr ago</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-menu-notifications-item" href="#">
                                            <span class="dropdown-menu-notifications-item-content"><span class="fa fa-line-chart"></span> Sales report available</span>
                                            <span class="dropdown-menu-notifications-item-ago">12hr ago</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-menu-notifications-item" href="#">
                                            <span class="dropdown-menu-notifications-item-content"><span class="fa fa-credit-card-alt"></span> 248 new subscriptions</span>
                                            <span class="dropdown-menu-notifications-item-ago">12hr ago</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-menu-link-md" href="#">
                                            <small>
                                                <span class="fa fa-bell"></span> See Notification History
                                            </small>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                            <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="fa fa-sign-out"></span> <span class="hidden-sm hidden-xs">Log out</span></a></li>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                          </ul>
                </div>
            </nav>
            </header>            
    <div class="content-wrapper">
    <div class="content-dimmer"></div>
    @yield('content')
    </div>
    {{-- end content wrapper --}}
    </div>
    {{-- end page wrapper --}}
</div>
{{-- end wrapper --}}

{{-- javascript core library --}}
<script src="{{ url('public/js/Chart.min.js') }}"></script>
<script src="{{ url('public/js/jquery-1.12.3.min.js') }}"></script>
<script src="{{ url('public/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/js/jquery.piety.min.js') }}"></script>
<script src="{{ url('public/js/varello-theme.js') }}"></script>
<script src="{{ url('public/js/icheck.min.js') }}"></script>
<script src="{{ url('public/js/dropdown.js') }}"></script>
{{-- data tables --}}
<script type="text/javascript" src="{{ url('public/js/dataTables/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ url('public/js/dataTables/dataTables.bootstrap.js') }}"></script>
{{-- <script src="{{ url('public/js/pages/chart-js.js') }}"></script> --}}
<script type="text/javascript">
          
  $(document).ready(function(){

    $(".table").DataTable();

  });

</script>
@yield('script')

</body>
</html>
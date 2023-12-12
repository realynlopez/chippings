@extends('admin.admin-layout')
@section('title', 'Admin')
@section('additional_css')
    <!-- Include additional CSS files for the registration panel here -->
    <!-- For example, you can link your custom CSS file -->
    <link href="{{ asset('assets/css/admin-style.css') }}" rel="stylesheet">
@endsection

@section('additional_js')
    <!-- Include additional JS files for the registration panel here -->
    <!-- For example, you can link your custom JS file -->
    <script src="{{ asset('assets/js/admin-index.js') }}"></script>
    <script src="{{ asset('assets/js/admin-orders.js') }}"></script>
@endsection


@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar">
    <div class="container d-flex justify-content-center">
    <!--navbar-->
        <ul class="nav nav-pills">
        <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.menu.index') }}">Menu</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Transactions</a>
            <ul class="dropdown-menu">
                <li><hr class="dropdown" href="#">Branches</li>
                <li><a class="dropdown-item" href="{{ route('laludBranch') }}">Lalud</a></li>
                <li><a class="dropdown-item" href="{{ route('NacocoBranch') }}">Nacoco</a></li>
        
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('queue') }}">Queue</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.table.management') }}">Table management</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
        </li>
        </ul>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
            <div class="logo">
                <img src="{{ asset('assets/images/logo-chippings.jpg') }}">
                <h3>Eskinita<span class="danger">by Chippings</span></h3>
            </div>

                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>
            <!--sidebar-->
            <div class="sidebar">
                
                <a href="{{ route('newlyRegisteredUsers') }}">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Users</h3>
                </a>
                <a href="{{ route('admin.menu.index') }}">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>Menu</h3>
                </a>
                <a href="#" class="#">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Transactions</h3>
                </a>
                <a href="{{ route('queue') }}">
                    <span class="material-icons-sharp">
                        mail_outline
                    </span>
                    <h3>Queue</h3>
                    
                </a>
                <a href="{{ route('sales.index') }}">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Sales</h3>
                </a>
                <a href="{{ route('admin.feedback.index') }}">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Feedbacks</h3>
                </a>
                <a href="{{ route('admin.table.management') }}">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Table management</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3> Add</h3>
                </a>
                <a href="{{ route('logout') }}">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <h1>Dashboard</h1>
            <!-- Analyses -->
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Daily Sales</h3>
                            <h1>65,024</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+81%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Percentage Sale</h3>
                            <h1>24,981</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>-48%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Sales per Branch</h3>
                            <h1>1,147</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+21%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->

            <!-- New Users Section -->
            <div class="new-users">
                <h2>New Users</h2>
                <div class="user-list">
                    <div class="user">
                        <img src="{{ asset('assets/images/profile-2.jpg') }}">
                        <h2>Arem</h2>
                        <p>54 Min Ago</p>
                    </div>
                    <div class="user">
                        <img src="{{ asset('assets/images/profile-3.jpg') }}">
                        <h2>Harvey</h2>
                        <p>3 Hours Ago</p>
                    </div>
                    <div class="user">
                        <img src="{{ asset('assets/images/profile-4.jpg') }}">
                        <h2>Natalie</h2>
                        <p>6 Hours Ago</p>
                    </div>
                    <div class="user">
                        <img src="{{ asset('assets/images/plus.png') }}">
                        <h2>More</h2>
                        <p>New User</p>
                    </div>
                </div>
            </div>
            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Transactions Per Branch</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Daily</th>
                            <th>Monthly</th>
                            <th>Yearly</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <a href="{{ route('laludBranch') }}">Show All</a>
            </div>
            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                <div class="info">
                    @if(Auth::check())
                        <p>Hey, {{ Auth::user()->name }}</b></p>
                        <small class="text-muted">Admin</small>
                    @endif
                </div>
                    <div class="profile-photo">
                        <img src="{{ asset('assets/images/profile-1.jpg') }}">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="{{ asset('assets/images/logo-chippings.jpg') }}">
                    <h2>Eskinita by Chippings</h2>
                    <p>ihaw-ihaw express</p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Notification</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>

</html>
@endsection
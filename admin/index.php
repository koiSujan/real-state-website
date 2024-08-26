<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Prime Property Realtors</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <div class="flx">
        <aside id="sidebar">
            <input type="checkbox" name="" id="toggler">
            <label for="toggler" class="toggle-btn">
                <i class="lni lni-grid-alt"></i>
            </label>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Task</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link ">
                        <i class="lni lni-protection"></i>
                        <span>Auth</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link ">
                        <i class="lni lni-layout"></i>
                        <span>Packages</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-layout"></i>
                        <span>Page</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <div class="dashboard-navbar">
                <a href="./" style="color:#368aff; font-weight:bold; font-size:20px;">
                  Prime Properties
                </a>
                <div class="navbar-content">
                    <ul class="main-nav">
                        <li class="user-link">
                            <a href="#" class="f-md flx flx-ctr clr-theme">
                                <span><i class="lni lni-user"></i> John</span>
                            </a>
                            <div class="user-link-dropdown">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <h2>Statistics & Reports</h2>
                <div class="dashboard-card">
                    <div class="card">
                        <h6 class="title">Memebrs Progress</h6>
                        <h6 class="amount">$72,540</h6>
                        <div class="badge">
                            <span class="text-success-bg"> +6.85% </span>
                            <span class="badge-text">Since Last Month</span>
                        </div>
                    </div>
                    <div class="card">
                        <h6 class="title">Authors Earninigs</h6>
                        <h6 class="amount">$72,540</h6>
                        <div class="badge">
                            <span class="text-success-bg"> +6.85% </span>
                            <span class="badge-text">Since Last Month</span>
                        </div>
                    </div>
                    <div class="card">
                        <h6 class="title">Total Users</h6>
                        <h6 class="amount">$72,540</h6>
                        <div class="badge">
                            <span class="text-success-bg"> +6.85% </span>
                            <span class="badge-text">Since Last Month</span>
                        </div>
                    </div>
                </div>
                <h2>Avg. Agent Earnings</h2>
                <div style="overflow-x:auto;">
                    <table id="posts">
                        <thead>
                            <tr>
                                <th style="width:5%">SN</th>
                                <th style="width:45%">Name</th>
                                <th style="width:45%">Email</th>
                                <th style="width:5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>john@example.com</td>
                                <td><a href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>jane@example.com</td>
                                <td><a href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Bob Johnson</td>
                                <td>bob@example.com</td>
                                <td><a href="#">Edit</a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Alice Williams</td>
                                <td>alice@example.com</td>
                                <td><a href="#">Edit</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer>
                <div class="footer-wrap">
                    <div class="copyright-text">
                        <p>© Copyright 2023 by <strong>CodzSword</strong></p>
                    </div>
                    <ul class="social-icons">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">LinkedIn</a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
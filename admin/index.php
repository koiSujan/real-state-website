<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Prime Property Realtors</title>
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="../css/dashboard.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        :root {
            --main-color: #0069ff;
            --black: #303030;
            --box-shodow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            --red-clr: #ff1212;
        }

        * {
            font-family: "Inter", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
        }

        body {
            color: var(--black);
        }

        ul {
            list-style: none;
        }

        a {
            text-decoration: none;
            color: var(--black);
        }

        img {
            max-width: 100%;
        }

        .dashboard-wrap {
            display: flex;
        }

        .sidebar {
            width: 20%;
            background-color: #eee;
            min-height: 100vh;
            height: 100%;
            padding: 20px;
        }

        .dash-header {
            background-color: #eee;
            padding: 8px 20px;
            border-bottom: 1px solid #eee;
        }

        .main {
            width: 100%;
        }

        .dashboard-container {
            padding: 20px 10px;
        }

        .dash-header {
            /* padding: 20px 10px; */
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .overview {
            margin-top: 10px;
        }

        .title-h2 {
            font-size: 20px;
            font-weight: 700;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        .title-h3 {
            font-size: 16px;
            font-weight: 600;
        }

        .title-h4 {
            font-size: 18px;
            font-weight: 600;
        }

        .txt-tiny {
            font-size: 13px;
        }


        .dash-card-wrap {
            display: flex;
            gap: 20px;
        }

        .dash-card {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 10px 10px;
            width: 20%;
        }

        .dash-card p {
            margin-bottom: 20px;
        }

        .sidebar-links li a {
            padding: 12px 0;
            transition: 0.35s ease;
            display: flex;
            align-items: center;
            margin: 10px 0;
            font-weight: 500;
            font-size: 15.8px;
        }

        .sidebar-links li a i {
            font-size: 22px;
            padding-right: 4px;
        }

        .sidebar-links li a:hover {
            color: var(--main-color);
        }
    </style>
</head>


<body>
    <header class="dash-header">
        <a href="./"><?php include "../components/logo.php" ?></a>
        <div class="account">
            <p>Hi <span>Sujan Poudel</span></p>
        </div>
    </header>
    <div class="dashboard-wrap">
        <aside class="sidebar">
            <div class="sidebar-links">
                <ul>
                    <li><a href=""><i class="ri-dashboard-3-line"></i>Dashboard</a></li>
                    <li><a href=""><i class="ri-list-radio"></i>Appointment</a></li>
                    <li><a href=""><i class="ri-building-line"></i>Properties</a></li>
                    <li><a href=""><i class="ri-service-line"></i>Services</a></li>
                    <li><a href=""><i class="ri-contacts-book-3-line"></i>Contact</a></li>
                    <li><a href=""><i class="ri-tools-line"></i>Settings</a></li>
                </ul>
            </div>
        </aside>
        <main class="main">
            <div class="dashboard-container">

                <div class="dashboard-section">
                    <section class="overview">
                        <h2 class="title-h2">Overview</h2>
                        <div class="flx dash-card-wrap">
                            <div class="dash-card">
                                <p class="text-tiny">Properties</p>
                                <h4 class="title-h4">218</h4>
                            </div>
                            <div class="dash-card">
                                <p class="text-tiny">Users</p>
                                <h4 class="title-h4">819</h4>
                            </div>
                            <div class="dash-card">
                                <p class="text-tiny">Appointments</p>
                                <h4 class="title-h4">51</h4>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
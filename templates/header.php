<?php

    session_start();

    if($_SERVER['QUERY_STRING'] == 'noname'){
        unset($_SESSION['name']);
    }

    $name = $_SESSION['name'] ?? 'Guest';

    // Get cookie
    $gender = $_COOKIE['gender'] ?? 'Unknown';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toffra Pizza</title>
    <!-- Icon Titile -->
    <link rel="icon" type="image/x-icon" href="public\icons\favicon.png">

    <!-- Daisy UI CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }
        .brand {
            background: #cbb09c !important;
        }
        .brand-text, .nav-wrapper {
            color: #cbb09c !important;
        }
        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        .pizza {
            width: 70px;
            height: 75px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }
    </style>
    
</head>
    <body class="bg-gray-50">
        
        <!-- Dropdown Structure -->
        <header class="bg-white" style="height: 100px; padding: 10px 100px 0 100px;">
            <div class="navbar">
                <div class="flex-1">
                    <a class="btn btn-ghost normal-case text-xl" href="index.php"><img src="public\icons\logo.png" alt="Logo" style="width: 150px"></a>
                </div>
                <div class="flex-none">
                    <ul class="menu menu-horizontal px-1">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="pizza_prod.php">Pizza</a></li>
                    <li><a href="drink_prod.php">Drinks</a></li>
                    <li><a>Orders</a></li>
                    <li>
                        <details>
                        <summary>
                            User
                        </summary>
                        <ul class="p-2 bg-base-100">
                            <li><a>Profile</a></li>
                            <li><a>Setting</a></li>
                            <li><a>Log Out</a></li>
                        </ul>
                        </details>
                    </li>
                    </ul>
                </div>
            </div>
        </header>
        
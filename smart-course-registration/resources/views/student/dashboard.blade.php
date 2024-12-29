<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Smart Course Registration</title>
    <style>
        /* Basic Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header Styling */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #007BFF;
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-button {
            background-color: #fff;
            color: #007BFF;
            border: none;
            padding: 8px 15px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            overflow: hidden;
            z-index: 1000;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu a {
            color: #007BFF;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
            font-size: 14px;
        }

        .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }

        /* Navigation Styling */
        .nav {
            display: flex;
            justify-content: center;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .nav a {
            padding: 10px 20px;
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            font-size: 14px;
            border-right: 1px solid #ddd;
        }

        .nav a:last-child {
            border-right: none;
        }

        .nav a.active {
            background-color: #007BFF;
            color: white;
            border-radius: 10px 10px 0 0;
        }

        /* Progress Bar Styling */
        .progress-container {
            margin-bottom: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            width: 100%;
            background-color: #e9ecef;
            border-radius: 5px;
            height: 30px;
        }

        .progress-bar span {
            display: block;
            height: 100%;
            background-color: #28a745;
            border-radius: 5px;
            text-align: center;
            line-height: 30px;
            color: white;
            font-weight: bold;
        }

        /* Sections Styling */
        .sections-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            flex: 1;
        }

        .section h2 {
            margin-top: 0;
        }

        .section p {
            color: #6c757d;
            margin: 10px 0;
        }

        .section button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .section button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Header -->
    <div class="header">
        <h1>Smart Course Registration</h1>
        <div class="dropdown">
            <button class="dropdown-button">Profile</button>
            <div class="dropdown-menu">
                <a href="#">View Profile</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    <div class="nav">
        <a href="{{ route('student.dashboard') }}" class="active">Dashboard</a>
        <a href="{{ route('student.courses.registered') }}">Course Registered</a>
    </div>

    <div class="progress-container">
        <h2>Course Progress</h2>
        <div class="progress-bar">
            <a href="{{ route('student.degree.progress') }}" style="text-decoration: none;">
                <span style="display: inline-block; background-color: #28a745; color: white; padding: 5px 10px; border-radius: 5px; width: {{ (17 / 127) * 100 }}%;">
                    {{ 17 }} / 127 Credits
                </span>
            </a>
        </div>
    </div>

    <!-- Course Management and Consultation Sections -->
    <div class="sections-container">
        <!-- Course Management Section -->
        <div class="section">
            <h2>Course Management</h2>
            <p>Manage your course registration.</p>
            <button>Register Now!</button>
        </div>

        <!-- Need Consultation Section -->
        <div class="section">
            <h2>Need Consultation?</h2>
            <p>Chat with your Academic Advisor.</p>
            <button>Now</button>
        </div>
    </div>
</div>

</body>
</html>
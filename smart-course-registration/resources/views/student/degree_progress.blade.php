<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Degree Progress - Smart Course Registration</title>
    <style>
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
            padding: 20px;
        }

        h1 {
            color: #007BFF;
        }

        .progress-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
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

        .section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .elective-list {
            list-style: none;
            padding: 0;
        }

        .elective-list li {
            background-color: #f1f1f1;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Degree Progress</h1>

    <!-- Handle error messages -->
    @if(session('errors'))
        <div class="error-message">
            <strong>Error:</strong> {{ session('errors')->first() }}
        </div>
    @endif

    <!-- Progress Bar -->
    <div class="progress-container">
        @if (isset($totalCourses) && $totalCourses > 0)
            <div class="progress-bar">
                <span style="width: {{ $completionRate }}%;">
                    {{ $completedCourses->count() }} / {{ $totalCourses }} Courses Completed
                </span>
            </div>
        @else
            <p>No courses found in your degree plan.</p>
        @endif
    </div>

    <!-- Remaining Mandatory Courses -->
    <div class="section">
        <h2>Remaining Mandatory Courses</h2>
        @if (isset($degreePlan) && $degreePlan->getPendingMandatoryCourses($completedCourses)->count() > 0)
            <ul>
                @foreach ($degreePlan->getPendingMandatoryCourses($completedCourses) as $course)
                    <li>{{ $course->name }}</li>
                @endforeach
            </ul>
        @else
            <p>All mandatory courses have been completed or no degree plan is available.</p>
        @endif
    </div>

    <!-- Suggested Electives -->
    <div class="section">
        <h2>Suggested Electives</h2>
        @if (isset($suggestedElectives) && $suggestedElectives->count() > 0)
            <ul class="elective-list">
                @foreach ($suggestedElectives as $elective)
                    <li>{{ $elective->name }}</li>
                @endforeach
            </ul>
        @else
            <p>No elective suggestions available at this time.</p>
        @endif
    </div>

    <button onclick="window.history.back();">Back to Dashboard</button>
</div>

</body>
</html>


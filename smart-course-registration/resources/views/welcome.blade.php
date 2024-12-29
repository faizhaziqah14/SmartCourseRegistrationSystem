<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Smart Course Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container text-center mt-5">
    <h1 class="mb-4">Welcome to the Smart Course Registration System!</h1>
    <p class="lead">We are excited to have you here. Please choose your role to proceed:</p>

    <!-- Role selection form -->
    <form action="{{ route('login.redirect') }}" method="GET">
        @csrf
        <div class="mb-3">
            <select name="role" class="form-select" required>
                <option value="" disabled selected>Select Your Role</option>
                <option value="student">Student</option>
                <option value="academic_staff">Academic Staff</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Proceed to Login</button>
    </form>

    <hr class="my-4">
    <p>If you don't have an account, <a href="{{ route('register') }}">register here</a>.</p>
</div>

</body>
</html>
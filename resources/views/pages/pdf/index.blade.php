<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello welcome</title>
</head>

<body>
    <h1>Student Details</h1>
    <form method="POST" action="/submit">
        @csrf <!-- CSRF protection for Laravel forms -->

        <!-- Last Name, First Name, Middle Name -->
        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="{{ ucfirst($student->name) }}" required>
        </div>
        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="{{ ucfirst($student->name) }}" required>
        </div>
        <div>
            <label for="middle_name">Middle Name:</label>
            <input type="text" id="middle_name" value="{{ ucfirst($student->name) }}" name="middle_name">
        </div>

        <!-- Home Address -->
        <div>
            <label for="home_address">Home Address:</label>
            <input type="text" id="home_address" name="home_address" required>
        </div>

        <!-- City, State -->
        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>
        </div>
        <div>
            <label for="state">State:</label>
            <input type="text" id="state" name="state" required>
        </div>

        <!-- Phone -->
        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
        </div>

        <!-- Submit Button -->
        {{-- <button type="submit">Submit</button> --}}
    </form>

    {{-- <div>{{ __('Name : ') }}{{ ucfirst($student->name) }}</div>
    <div>{{ __('Email : ') }}{{ $student->email }}</div>
    <div>{{ __('Registration Expiry Date : ') }}{{ $student->expiry_date }}</div> --}}
</body>

</html>

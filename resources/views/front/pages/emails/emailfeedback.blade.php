<!DOCTYPE html>
<html>
<head>
    <title>Feedback from User</title>
</head>
<body>
    <h1>Feedback from {{ $details['name'] }}</h1>
    <p>Email: {{ $details['email'] }}</p>
    <p>Message:</p>
    <p>{{ $details['message'] }}</p>
</body>
</html>

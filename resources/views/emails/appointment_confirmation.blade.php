<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>
    <h1>Hello, {{ $customer_first_name }} {{ $customer_last_name }}!</h1>
    <p>This email is to confirm your upcoming appointment with us.</p>
    <p>Details of your appointment are as follows:</p>
    <p>Date: {{ $appointment_date }}</p>
    <p>Time: {{ $appointment_time }}</p>
    <p>Thank you for choosing our salon and we look forward to seeing you soon!</p>
</body>
</html>

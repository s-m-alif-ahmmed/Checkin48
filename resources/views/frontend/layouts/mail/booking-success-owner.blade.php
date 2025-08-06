<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            background-color: #2196F3;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .email-body {
            padding: 20px;
        }
        .email-footer {
            text-align: center;
            padding: 10px;
            background-color: #f1f1f1;
            color: #777;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-header">
        <h1>New Booking for Your Villa!</h1>
    </div>
    <div class="email-body">
        <p>Hello {{ $booking->name }},</p>
        <p>Great news! A guest has booked your villa, <strong>{{ $villa_name }}</strong>.</p>
        <p><strong>Booking Details:</strong></p>
        <ul>
            <li><strong>Booking ID:</strong> {{ $booking->booking_id }}</li>
            <li><strong>Guest Name:</strong> {{ $booking->name }}</li>
            <li><strong>Guest Number:</strong> {{ $booking->number }}</li>
            <li><strong>Check-in:</strong> {{ $booking->check_in_date }}</li>
            <li><strong>Check-out:</strong> {{ $booking->check_out_date }}</li>
            <li><strong>Guest Count:</strong> {{ $booking->guest_count }}</li>
        </ul>
        <p>Please prepare the villa to welcome your guest.</p>
    </div>
    <div class="email-footer">
        <p>Thank you for using our platform!</p>
    </div>
</div>
</body>
</html>

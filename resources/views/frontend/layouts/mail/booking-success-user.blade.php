<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
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
            background-color: #4CAF50;
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
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            background: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-header">
        <h1>Thank You for Booking!</h1>
    </div>
    <div class="email-body">
        <p>Dear {{ $booking->name }},</p>
        <p>We are thrilled to confirm your booking for the villa <strong>{{ $villa_name }}</strong>.</p>
        <p><strong>Booking Details:</strong></p>
        <ul>
            <li><strong>Booking ID:</strong> {{ $booking->booking_id }}</li>
            @if($booking->villa->user->number)
                <li><strong>Villa Owner Number:</strong> {{ $booking->villa->user->number }}</li>
            @endif
            <li><strong>Check-in:</strong> {{ $booking->check_in_date }}</li>
            <li><strong>Check-out:</strong> {{ $booking->check_out_date }}</li>
            <li><strong>Total Guests:</strong> {{ $booking->guest_count }}</li>
        </ul>
        <p>We hope you enjoy your stay and create unforgettable memories!</p>
        <a href="https://checkin48.com" class="btn text-white">Visit Website</a>
    </div>
    <div class="email-footer">
        <p>Thank you for choosing us!</p>
    </div>
</div>
</body>
</html>

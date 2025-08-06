<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking Alert</title>
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
            background-color: #FF9800;
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
        <h1>New Booking Alert!</h1>
    </div>
    <div class="email-body">
        <p>Dear Admin,</p>
        <p>A new booking has been made on the platform. Here are the details:</p>
        <ul>
            <li><strong>Booking ID:</strong> {{ $booking->booking_id }}</li>
            <li><strong>Villa Name:</strong> {{ $villa_name }}</li>
            <li><strong>Guest Name:</strong> {{ $booking->name }}</li>
            <li><strong>Guest Name:</strong> {{ $booking->email }}</li>
            <li><strong>Check-in:</strong> {{ $booking->check_in_date }}</li>
            <li><strong>Check-out:</strong> {{ $booking->check_out_date }}</li>
            <li><strong>Guest Count:</strong> {{ $booking->guest_count }}</li>
            <li><strong>Phone Number:</strong> {{ $booking->number }}</li>
            <li><strong>Total Amount:</strong> ${{ $booking->total_amount }}</li>
        </ul>
    </div>
    <div class="email-footer">
        <p>Thank you for monitoring the platform.</p>
    </div>
</div>
</body>
</html>

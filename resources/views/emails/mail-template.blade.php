<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users Contact Message</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }
        .email-wrapper {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            border-bottom: 2px solid #007BFF;
            margin-bottom: 20px;
        }
        .email-header h2 {
            color: #007BFF;
        }
        .email-content p {
            margin: 10px 0;
        }
        .email-content strong {
            color: #007BFF;
        }
        .email-action {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 30px;
            color: #fff;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 25px;
            transition: background-color 0.3s;
        }
        .email-action:hover {
            background-color: #0056b3;
        }
    </style>

</head>
<body>

<div class="email-wrapper">
    <div class="email-header">
        <h2>Users Contact Message</h2>
    </div>
    <div class="email-content">
        <p>Hello Admin,</p>
        <p>You have received a user message.</p>
        <p><strong>Name:</strong> {{ $formData['name'] }}</p>
        <p><strong>Email:</strong> {{ $formData['email'] }}</p>
        <p><strong>WhatsApp:</strong> {{ $formData['whatsapp'] }}</p>
        <p><strong>Phone:</strong> {{ $formData['phone'] }}</p>
        <p><strong>Subject:</strong> {{ $formData['subject'] }}</p>
        <p><strong>Message:</strong> {{ $formData['message'] }}</p>
        {{-- <a href="{{ url('/') }}" class="email-action">View Details</a> --}}
    </div>
    <p style="text-align:center;">Thank you!</p>
</div>

</body>
</html>


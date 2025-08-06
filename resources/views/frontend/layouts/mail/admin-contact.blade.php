<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { padding: 20px; max-width: 600px; margin: 0 auto; border: 1px solid #ddd; border-radius: 10px; }
        .header { background: #007bff; color: #fff; padding: 10px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { margin-top: 20px; }
        .footer { margin-top: 20px; font-size: 12px; color: #555; text-align: center; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>New Contact Form Submission</h2>
    </div>
    <div class="content">
        @if(isset($contactData['name']))
            <p><strong>Name:</strong> {{ $contactData['name'] }}</p>
        @endif
        @if(isset($contactData['email']))
            <p><strong>Email:</strong> {{ $contactData['email'] }}</p>
        @endif
        @if(isset($contactData['whatsapp']))
            <p><strong>WhatsApp:</strong> {{ $contactData['whatsapp'] }}</p>
        @endif
        @if(isset($contactData['phone']))
            <p><strong>Phone:</strong> {{ $contactData['phone'] }}</p>
        @endif
        @if(isset($contactData['subject']))
            <p><strong>Subject:</strong> {{ $contactData['subject'] }}</p>
        @endif
        @if(isset($contactData['message']))
            <p><strong>Message:</strong> <br>{{ $contactData['message'] }}</p>
        @endif
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Checkin48. All rights reserved.</p>
    </div>
</div>
</body>
</html>

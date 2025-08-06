<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Villa Created</title>
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
        <h2>New Villa Created</h2>
    </div>
    <div class="content">
        <p><strong>Villa Name:</strong> {{ $villa['title'] ?? 'N/A' }}</p>
        <p><strong>Created By:</strong> {{ $villa->user->name ?? 'N/A' }} ({{ $villa->user->email ?? 'N/A' }})</p>
        <p><strong>Location:</strong> {{ $villa['full_address'] ?? 'N/A' }}</p>
        <p><strong>Description:</strong> {{ $villa['description'] ?? 'N/A' }}</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Checkin48. All rights reserved.</p>
    </div>
</div>
</body>
</html>

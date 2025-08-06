<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
</head>
<body>
    <h1>{{ $newsletter->title }}</h1>
    <p>Here is the latest newsletter for you.</p>
    @if($newsletter->pdf)
        <p><a href="{{ asset($newsletter->pdf) }}" download>Download Newsletter PDF</a></p>
    @endif
</body>
</html>

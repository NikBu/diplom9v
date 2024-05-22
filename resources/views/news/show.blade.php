<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }}</title>
</head>
<body>
    <h1>{{ $news->title }}</h1>
    <p>{{ $news->content }}</p>
    <p>Published on: {{ $news->published_at->format('d M Y') }}</p>
</body>
</html>
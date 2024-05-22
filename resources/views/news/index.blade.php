<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest News</title>
</head>
<body>
    <h1>Latest News</h1>
    <ul>
        @foreach($news as $item)
            <li>{{ $item->title }}</li>
        @endforeach
    </ul>
</body>
</html>
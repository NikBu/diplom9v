<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Special Offers</title>
</head>
<body>
    <h1>Latest Special Offers</h1>
    <ul>
        @foreach($specialOffers as $offer)
            <li>{{ $offer->title }}</li>
        @endforeach
    </ul>
</body>
</html>
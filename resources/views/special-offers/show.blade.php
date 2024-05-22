<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $specialOffer->title }}</title>
</head>
<body>
    <h1>{{ $specialOffer->title }}</h1>
    <p>{{ $specialOffer->description }}</p>
    <p>Offer valid from {{ $specialOffer->start_date->format('d M Y') }} to {{ $specialOffer->end_date->format('d M Y') }}</p>
</body>
</html>
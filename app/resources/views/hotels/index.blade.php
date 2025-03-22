<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        .hotel-card {
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        .hotel-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4 text-center">Hotels</h1>
        
        <div class="row">
            @foreach($hotels as $hotel)
                <div class="col-md-4">
                    <div class="card hotel-card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $hotel->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $hotel->city }}</h6>
                            <p class="card-text">{{ $hotel->description }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            <small>更新日: {{ $hotel->updated_at->format('Y-m-d') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
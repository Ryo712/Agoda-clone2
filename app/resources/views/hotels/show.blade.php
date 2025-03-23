<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hotel->name ?? 'ホテル詳細' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- 他のCSSファイル -->
</head>
<body>
    <div class="container">
        <!-- コンテンツ -->
        <h1>{{ $hotel->name }}</h1>
        <p>{{ $hotel->description }}</p>
        
        <!-- 他のコンテンツ -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- 他のJavaScriptファイル -->
</body>
</html>
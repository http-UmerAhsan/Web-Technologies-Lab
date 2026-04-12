<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">By {{ $post->author ?? 'Anonymous' }} on {{ $post->created_at->format('M d, Y') }}</p>
        <p>{{ $post->content }}</p>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
    </div>
</body>
</html>
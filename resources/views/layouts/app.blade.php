<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Book Review')</title>
    @vite(['resources/css/app.css', 'resources/css/app.css'])
</head>
<body>
    <header class="site-header">
        <nav class="navbar">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('books.index') }}">Books</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <p>&copy; {{ date('Y') }} Laravel Book Review</p>
    </footer>

@vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>

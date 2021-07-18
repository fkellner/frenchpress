<!-- resources/views/components/layout.blade.php -->

<html>
    <head>
        <title>{{ $title ?? 'MyFunkyBlog' }}</title>
    </head>
    <body>
        {{ $slot }}
    </body>
</html>

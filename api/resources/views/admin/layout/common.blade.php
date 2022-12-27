<!DOCTYPE html>
<html lang="ja">
<head>
    @include('admin.layout.head')
</head>
<body>
    @include('admin.layout.header')

    @yield('main')

    @yield('script')
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('admin.layouts.navbar')

<div class="d-flex">

    @include('admin.layouts.sidebar')

    <div class="container-fluid p-4">
        @yield('content')
    </div>

</div>

</body>
</html>
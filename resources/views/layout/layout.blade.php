<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/app.css" rel="stylesheet">
    <link href="../css/blog.css" rel="stylesheet">
</head>

<body>

<div class="container">
    @include('layout.header')
    @include('layout.nav')
    @include('layout.headContent')

</div>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            @yield('content')
        </div><!-- /.blog-main -->

        @include('layout.sidebar')
        <!-- /.blog-sidebar -->

    </div><!-- /.row -->

</main><!-- /.container -->
@include('layout.footer')
</body>
</html>

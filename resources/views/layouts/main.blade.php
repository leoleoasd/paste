<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>{{config("app.name")}} - @yield('title')</title>
    <link rel="stylesheet" href="/assets/css/prism.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.15.0/esm/popper-utils.min.js"></script>
    <script src="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"><script async src="/assets/js/prism.js"></script>
    <script async src="/assets/js/b64.js"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "{{$google_ad_id}}",
            enable_page_level_ads: true
        });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$google_anal_id}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{$google_anal_id}}');
    </script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-success">
        <div class="container">
            <a class="navbar-brand" href="/" style="color: #ffffff">{{config("app.name")}}</a>
        </div>
    </nav>
</header>
<main>
    <div class="container" style="margin-top: 20px;">
        @yield('content')
    </div>
</main>
<footer class="footer">
    <div class="container">
        <span class="text-muted">&copy;2019</span>
        根据相关法律法规, 本站不对欧盟用户提供服务.
        <a href="#" onclick="alert('举报成功!')">举报</a>
    </div>
</footer>
@stack("js")
</body>
</html>

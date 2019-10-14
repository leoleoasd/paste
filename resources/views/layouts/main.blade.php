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
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149534064-1"></script>
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
        <div class="row">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- 2 -->
            <ins class="adsbygoogle"
                 style="display:block;width:100%;"
                 data-ad-client="ca-pub-8076088517734186"
                 data-ad-slot="1766135360"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
</main>
<footer class="footer">
    <div class="container">
        <span class="text-muted">&copy;2019</span>
        在此处粘贴您的代码就视为您同意将您的代码以Apache协议开源.
        <a href="#" onclick="alert('举报成功!')">举报</a>
    </div>
</footer>
@stack("js")
</body>
</html>

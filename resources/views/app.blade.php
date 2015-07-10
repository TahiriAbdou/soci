<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SocialvDS</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />

    <style type="text/css">
        .formation {
      padding: 10px;
      margin-bottom: 10px;
    }
    .btn-large-dim {
      height: 90px;
      font-size: 22px;
    }
    </style>
    @yield('style')
</head>

<body class="pace-done skin-1" ng-app="vids">

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            @include('partials.navbarside')
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            @include('partials.topbar')
        </div>
        @include('partials.breadcrumbs')
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                @yield('content')
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                Powered by {< <a href="https://twitter.com/tahiriabdou" target="blanc">@TahiriAbdou</a> >}
            </div>
            <div>
                <strong>Copyright</strong> &copy; 2014-2015
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="/js/jquery-2.1.1.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="/js/inspinia.js"></script>
<script src="/js/plugins/pace/pace.min.js"></script>
<script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="/js/plugins/summernote/summernote.min.js"></script>
<script src="/js/plugins/flot/jquery.flot.js"></script>
<script src="/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="/js/plugins/flot/jquery.flot.time.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.select2').select2();
    $('.summernote').summernote();
});
</script>
@yield('script')
</body>
</html>

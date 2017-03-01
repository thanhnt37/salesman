<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Domain For Sale Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="robots" content="noindex" />
    <meta name="googlebot" content="noindex" />
    <meta name="googlebot-news" content="nosnippet">

    <!-- Le styles -->
    <link rel="stylesheet" href="{!! \URLHelper::asset('libs/plugins/toastr/toastr.min.css', 'admin') !!}">
    <link href="{!! \URLHelper::asset('css/style.css', 'user') !!}" rel="stylesheet">

    <script src="{!! \URLHelper::asset('libs/plugins/jQuery/jquery-2.2.3.min.js', 'admin') !!}"></script>
    <script src="{!! \URLHelper::asset('libs/plugins/toastr/toastr.min.js', 'admin') !!}"></script>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
</head>

<body>

<div class="background-circle">
    <div class="wrapper">

        <img src="{!! \URLHelper::asset('images/salesman.png', 'user') !!}" class="salesman" alt="">

        {{--<div class="social">--}}
            {{--<a href="#"><img src="images/facebook.png" alt=""></a>--}}
            {{--<a href="#"><img src="images/linkedin.png" alt=""></a>--}}
            {{--<a href="#"><img src="images/twitter.png" alt=""></a>--}}
        {{--</div>--}}

        <div class="cloud">
            <div class="cloud-elements">
                <div class="text-1">
                    <span class="ok"></span>
                    THISDOMAIN.COM
                </div>
                <div class="text-2">
                    IS <span class="green">AVAILABLE</span> FOR SALE!
                </div>
            </div>
        </div>

        <div class="content">
            <form class="contact-form" action="{{ action('User\IndexController@postContact') }}" method="POST">
                {{ csrf_field() }}
                <div class="input-item">
                    <label>NAME</label>
                    <input type="text" name="name" required>
                </div>
                <div class="input-item">
                    <label>EMAIL</label>
                    <input type="email" name="email" required>
                </div>
                <div class="textarea-item">
                    <label>MESSAGE</label>
                    <textarea name="messages" required></textarea>
                </div>
                <div class="send-button">
                    <button type="submit">SEND</button>
                </div>
            </form>
        </div>

        <footer>
            <div class="footer-top" style="height: 40px;">
                {{--CALL NOW <span class="tel">012 345 678</span>--}}
            </div>
            <div class="copy">&copy; THIS DOMAIN IS FOR SALE</div>
        </footer>

    </div>
</div>

<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "700",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    @if(Session::has('message-success'))
            toastr["success"]("{{ Session::get('message-success') }}", "Successfully !!!");
    @endif
            @if(Session::has('message-failed'))
            toastr["error"]("{{ Session::get('message-failed') }}", "Error !!!");
    @endif
</script>
</body>
</html>

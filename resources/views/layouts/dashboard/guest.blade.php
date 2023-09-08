<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />
        <!-- Fonts -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> -->

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/libs.min.css') }}">
        <link rel="stylesheet" href="{{asset('css/hope-ui.css?v=1.0')}}">
        <!-- remixicon -->
        <!-- <link rel="stylesheet" href="{{ asset('vendor/remixicon/fonts/remixicon.css') }}"/> -->

    </head>
    <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
        <div id="loading">
            @include('partials.dashboard._body_loader')
            @include('partials.dashboard._head')
        </div>
        <div class="wrapper">
            {{ $slot }}
        </div>
         @include('partials.dashboard._scripts')
    </body>
</html>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6497ea0ecc26a871b024884b/1h3omkic2';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
@include('modals.share')

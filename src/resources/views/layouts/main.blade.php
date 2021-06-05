<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        {{ config('mdp.core.site.name') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Core Style -->
    <link href="{{ asset('/assets/mdp/css/material-dashboard.css?v=2.2.2') }}" rel="stylesheet"/>

    @stack('mdp::layout_css')
</head>

<body class="">
<div class="wrapper ">
    @include('mdp::elements.sidebar')
    <div class="main-panel">
        @includeWhen(config('mdp.core.nav_bar.enabled', true), 'mdp::elements.nav_bar')

        <div class="content">
            <div class="content">
                <div class="container-fluid">
                    @yield('mdp::content')
                </div>
            </div>
        </div>
    </div>
    @includeWhen(config('mdp.core.fixed_plugin.enabled', false), 'mdp::elements.fixed-plugin')
</div>

<script src="{{ asset('/assets/mdp/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/mdp/js/core/popper.min.js') }}"></script>
<script src="{{ asset('/assets/mdp/js/core/bootstrap-material-design.min.js') }}"></script>
<script src="{{ asset('/assets/mdp/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('/assets/mdp/js/material-dashboard.js') }}"></script>
<script src="{{ asset('/assets/mdp/js/dom.js') }}"></script>

@stack('mdp::layout_js')

</body>

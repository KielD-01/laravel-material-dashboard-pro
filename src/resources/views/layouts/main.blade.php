<!DOCTYPE html>
<html lang="en">
@include('mdp::elements.head')
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

<script src="/assets/mdp/js/core/jquery.min.js"></script>
<script src="/assets/mdp/js/core/popper.min.js"></script>
<script src="/assets/mdp/js/core/bootstrap-material-design.min.js"></script>
<script src="/assets/mdp/js/core/bootstrap-selectpicker.js"></script>
<script src="/assets/mdp/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/mdp/js/dom.js"></script>

@stack('mdp::before_material_js')

<script src="/assets/mdp/js/material-dashboard.js"></script>

@stack('mdp::layout_js')

@yield('mdp::js')

</body>

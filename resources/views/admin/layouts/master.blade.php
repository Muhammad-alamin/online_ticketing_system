
@include('admin.layouts._head')

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        @include('admin.layouts._leftNav')
        <!-- wrap @s -->
        @include('admin.layouts._topNav')


        @yield('content')

@include('admin.layouts._footer')
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->

@include('admin.layouts._jsScript')
{{-- {!! Toastr::message() !!} --}}
</body>

</html>


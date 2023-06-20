<!DOCTYPE html>
<html lang="en">
@include('auth.layouts._head')

<body>
    @include('auth.layouts._topNav')

    @yield('content')

    @include('auth.layouts._footer')
    
    @include('auth.layouts._jsScript')
    {!! Toastr::message() !!}
</body>

</html>

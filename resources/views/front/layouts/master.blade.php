<!DOCTYPE html>
<html lang="en">
@include('front.layouts._head')

<body>
    @include('front.layouts._topNav')

    @yield('content')

    @include('front.layouts._footer')

    @include('front.layouts._jsScript')
    {!! Toastr::message() !!}
</body>

</html>

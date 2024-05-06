@extends('client.layouts._layout')

@section('entry')

@include('client.layouts._header')    
<!--Body Content-->
<div id="page-content">
    @yield('content')
</div>
<!--End Body Content-->
<!--Footer-->
@include('client.layouts._footer')
<!--End Footer-->
@endsection
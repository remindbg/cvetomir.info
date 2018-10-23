@include('_partials.header')

<!-- Page Content -->
<div class="container fix">

    <div class="row">
        <div class="col-lg-8">

        @yield('content')

        </div>

        @include('_partials.sidebar')
    </div>
    <!-- /.row -->

</div>
@include('_partials.footer')
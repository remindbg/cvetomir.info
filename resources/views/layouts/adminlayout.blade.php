@include('admin._partials.header')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-12">
            <hr>
                <div class="card-body">
                    <h2 class="card-title">@yield('title')</h2>
                    @yield('content')
                </div>
        </div>
    </div>
    <!-- /.row -->

</div>
@include('admin._partials.footer')
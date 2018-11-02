@include('_partials.header')

<!-- Page Content -->
<div class="container fix">

    <div class="row">
        <div class="col-lg-8">
            @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Грешка!</strong>
                    <br/>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @yield('content')
        </div>

        @include('_partials.sidebar')
    </div>
    <!-- /.row -->

</div>
@include('_partials.footer')
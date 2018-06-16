@include('_partials.header')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <hr>

            <!-- Blog Post -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">Post Title</h2>
                    <p class="small text-muted">Etiketi: Cvetomir | Pregleda 123231 | 56 Komentara</p>
                    <div class="row">
                        <div class="col-lg-3">
                            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">

                        </div>
                        <div class="col-lg-9">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>

                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on January 1, 2017 by
                    <a href="#">Start Bootstrap</a> | 3 Komentara | 123 Pregleda
                </div>
            </div>
            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>
        @include('_partials.sidebar')
    </div>
    <!-- /.row -->

</div>
@include('_partials.footer')
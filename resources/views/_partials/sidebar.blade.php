<!-- Sidebar Widgets Column -->
<div class="col-lg-4">

    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Категории</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled mb-0">
                        @foreach($cats as $cat )
                        <li>
                            <a href="/category/{{$cat->id}}/{{$cat->slug}}">{{$cat->title}}</a> ({{$cat->articles->count()}})
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Последно</h5>
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                @foreach($latestarticles as $article)
                    @if($article->active == true)
                        <li class="small">
                            <a href="/articles/{{$article->id}}/{{$article->slug}}">{{$article->title}}</a>
                        </li>

                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="card my-4">
        <h5 class="card-header">Популярни</h5>
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                @foreach($populararticles as $article)
                    @if($article->active == true)
                        <li class="small">
                            <a href="/articles/{{$article->id}}/{{$article->slug}}">{{$article->title}}<span class="small">({{$article->views}})</span></a>
                        </li>
                    @endif

                @endforeach
            </ul>
        </div>
    </div>

    <div class="card my-4">
        <h5 class="card-header">Коментари</h5>
        <div class="card-body">
            Скоро
        </div>
    </div>

</div>
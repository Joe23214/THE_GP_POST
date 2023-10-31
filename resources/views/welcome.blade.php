<x-layout></x-layout>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center my-5 display-1">THE GP POST</h1>
        </div>
        <div class="col-12">
            <h2 class="diplay-3 text-center my-5">Ultime notizie:</h2>
        </div>
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-12 col-md-3">
                <div class="card">
                    <img src="{{Storage::url($artcle->img)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->subtitle}}</p>
                        <p class="small text-muted d-flex justify-content-between align-items-center">
                            Redatto il {{$article-created_at->format('d/m/Y')}} da {{$article->user->name}}
                            <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">scopri di più</a>
                            <a href="{{route('article.show' , compact('article'))}}" class="btn btn-outline-primary">{{$article->category->name}}</a>
                        </p>
                    </div>
                </div>
            </div>
                
            @endforeach
        </div>
    </div>
</div>

<x-layout>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center my-5 display-1">THE GP POST</h1>
        </div>
        <div class="col-12">
            <h2 class="diplay-3 text-center my-5">Ultime notizie:</h2>
        </div>
        <div class="row">
            @auth
            @foreach ($articles as $article)
            <div class="col-12 col-md-3">
                <div class="card">
                    <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="small">
                            @foreach ($article->tags as $tag)
                            #{{$tag->name}}
                                
                            @endforeach
                        </p>
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->subtitle}}</p>
                        <p class="small text-muted d-flex justify-content-between align-items-center">
                            @if($article->category)
                            <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</a>
                            @else
                            <p class="small text-capitalize">
                                Non Categorizzato
                            </p>
                            @endif
                        </p>
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            <a class="" href="{{route('article.byUser', ['user' => $article->user->id])}}">Redatto il{{$article->created_at->format('d/m/Y')}} da {{$article->user->name}}</a>
                            <a href="{{'article.show', compact('article')}}" class="btn btn-info"> Leggi</a>
                        </div> 
                    </div>
                </div>
            </div>
                
            @endforeach
            @endauth
        </div>
    </div>
</div>
</x-layout>
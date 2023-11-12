<x-layout>
<div class="container-fluid p-5 bg-info text-center">
    <div class="row justify-content-center">
        <h1 class="display-1">
            Tutti Gli Articoli
        </h1>
    </div>
</div>


<div class="container my-5">
    <div class="row justify-content-around">
        @foreach ($articles as $article)
        <div class="col-12 col-md-3">
            <div class="card">
                <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    @foreach ($article->tags as $tag)
                    #{{$tag->name}}
                        
                    @endforeach
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text">{{$article->subtitle}}</p>
                    <p class="small text-muted d-flex justify-content-between align-items-center">
                        Redatto il {{$article->created_at->format('d/m/Y')}} da {{$article->user->name}}
                        <span class="text-muted"> tempo di lettura {{$article->readDuration()}} min</span>
                        <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</a>
                        <a href="{{route('article.show' , compact('article'))}}" class="btn btn-outline-primary">scopri di più</a>
                        <a href="{{route('article.show' , compact('article'))}}" class="btn btn-outline-primary">{{$article->category->name}}</a>
                    </p>
                </div>
            </div>
        </div>
            
        @endforeach
    </div>
</div>
</x-layout>
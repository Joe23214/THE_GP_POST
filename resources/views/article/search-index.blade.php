<div class="container-fluid">
    <div class="col-12">
        <div class="row">
            <div class="col-12 my-5">
                <h3 class="text-center">Articoli per:  {{ $query }}</h3>
            </div>
            @foreach ($articles as $article)
                <div class="col-4 py-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{Storage::url($articles->img)}}" class="card-img-top" alt="{{ $articles->title }}">
                        <div class="card-body">
                            @foreach ($article->tags as $tag)
                            #{{$tag->name}}
                                
                            @endforeach
                            <h5 class="card-title">{{ $articles->title }}</h5>
                            <p class="card-text">{{ $articles->subtitle }}</p>
                            <a href="{{route('article.byCategory',['Category'=> $article->category->id])}}" class="text-uted text-capitalize small">{{$article->category->name}}</a>
                            <hr>
                            <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text">{{$article->subtitle}}</p>
                    <p class="small text-muted d-flex justify-content-between align-items-center">
                        Redatto il {{$article->created_at->format('d/m/Y')}} da {{$article->user->name}}
                        <span class="text-muted"> tempo di lettura {{$article->readDuration()}} min</span>
                        <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</a>
                        <a href="{{route('article.show' , compact('article'))}}" class="btn btn-outline-primary">scopri di più</a>
                        <a href="{{route('article.byUser' , compact('article'))}}" class="btn btn-outline-primary">{{$article->category->name}}</a>
                    </p>
                        </div>
                    </div>
                </div> 
            @endforeach
        </div>
    </div>
</div>
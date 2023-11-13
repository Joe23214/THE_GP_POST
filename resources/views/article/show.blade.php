<x-layout>

    <div class="container-fluid p-5 text-center">
        <div class="row justify content-center">
            <h1 class="display-1">
                {{$article->title}}
            </h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-3">
                <div class="card">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->subtitle}}</p>
                        <p class="small text-muted d-flex justify-content-between align-items-center">
                            Redatto il {{$article->created_at->format('d/m/Y')}} da {{$article->user->name}}<p>
                                <hr>
                                <p>{{$article->body}}</p>
                                <div class="text-center">
                                    <a href="{{route('article.index')}}" class="btn btn-outline-dark my-2"> Torna agli articoli</a>
                                    @if(Auth::user() && Auth::user()->is_revisor)
                                    <a href="{{route('revisor.acceptArticle', compact('article'))}}" class="btn btn-success">accetta articolo</a>
                                    <a href="{{route('revisor.rejectArticle', compact('article'))}}" class="btn btn-danger">rifiuta articolo</a>
                                    @endif
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
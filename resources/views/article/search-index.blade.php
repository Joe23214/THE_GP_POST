<x-layout>
<div class="container-fluid">
    <div class="col-12">
        <div class="row justify-content-center">
            <div class="col-12 my-5">
                <h2 class="text-center">Articoli per:  {{$query}}</h2>
            </div>
            @foreach ($articles as $article)
            <div class="col-12 col-md-3 p-1">
                <div class="card">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="small text-success">
                            @foreach ($article->tags as $tag)
                            #{{$tag->name}}
                                
                            @endforeach
                        </p>
                        <h5 class="card-title titolocar">{{$article->title}}</h5>
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
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3 p-1 m-1"><p class=" text-dark">Autore: <a href="#" class="btn btn-light my-1">{{$article->user->name}}</a></p>
                                </div>
                                <div class="col-3 p-1 m-1">
                                    <p> Redatto il {{$article->created_at->format('d/m/Y')}}</p>

                                </div>
                                <div class="col-3 p-1 m-1">
                                    <a href="{{route('article.show' , compact('article'))}}" class="btn btn-outline-success">Leggi l'articolo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            @endforeach
        </div>
    </div>
</div>
</x-layout>
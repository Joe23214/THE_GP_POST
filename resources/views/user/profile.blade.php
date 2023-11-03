<x-layout>
    <div class="container-fluid p-5 bg-info text-center">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Tutti gli Articoli di {{auth()->user()->name}}
            </h1>
        </div>
    </div>
    
    
    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach ($user_articles as $article)

            <div class="col-12 col-md-3">
                <div class="card">
                    <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->subtitle}}</p>
                        <p class="small text-muted d-flex justify-content-between align-items-center">
                            Redatto il {{$article->created_at->format('d/m/Y')}} da {{$article->user->name}}
                            <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</a>
                            <a href="{{route('article.show' , compact('article'))}}" class="btn btn-outline-primary">scopri di più</a>
                            <a href="{{route('article.show' , compact('article'))}}" class="btn btn-outline-primary">{{$article->category->name}}</a>
                            <form action="{{route('delete', $article->id)}}" method="post">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
                                
                            </form>
                            
                        </p>
                    </div>
                </div>
            </div>
                
            @endforeach
        </div>
    </div>
</x-layout>
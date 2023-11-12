<x-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Kawi&family=Roboto:ital,wght@1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');



        
        h1{
            font-family: 'Edu TAS Beginner', cursive;
            
        }

        h2{
            font-family: 'Bebas Neue', sans-serif;
            font-size: 50px;
        }

        p{
            font-family: 'Noto Sans Kawi', sans-serif;
            font-family: 'Roboto', sans-serif;
        }
    </style>
<div class="container">
    <div class="row">
        @if(session('message'))
        <div class="alert alert-success text-center">
            {{session('message')}}
        </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12">
            <h1 class="text-center my-5 display-1 text-success">THE GP POST</h1>
        </div>
        <div class="col-12">
            <h2 class="diplay-3 text-center my-5">Ultime notizie:</h2>
        </div>
        <div class="row justify-content-center p-1">
            @auth
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
            @endauth
        </div>
    </div>
</div>
</x-layout>
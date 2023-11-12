

<style>
    @import url('https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner:wght@500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

    .container{
        width: 40%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 1px 2px 6px rgba(0, 0, 0, 0.36);
        margin-top: 8%;
        padding: 30px 40px 30px 40px;
        border-radius: 10px;
    }
    
    .card{
        margin-left: 15%;
    }
    
    img{
        max-width: 300px;
        max-height: 200px;
    }

    h2{
            font-family: 'Bebas Neue', sans-serif; !important
        }

        p{
            font-family: 'Noto Sans Kawi', sans-serif;
            font-family: 'Roboto', sans-serif;
        }
</style>
<x-layout>   
    <div class="container mb-5">
        <div class="col-12">
            <div class="form-group">
                <div class="mb-3">
                    <h1 class="text-center">
                        Profilo di {{auth()->user()->name}}
                    </h1>
                </div>
                {{-- Current username --}}
                <div class="mb-3">
                    <label for="name">nome</label>
                    <input type="text" class="form-control-plaintext" value="{{ auth()->user()->name }}">
                </div>
                {{-- Current userEmail --}}
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control-plaintext" value="{{ auth()->user()->email }}">
                </div>
                <div class="mb-3">
                    <div class="edit-info">
                        {{-- <a class="btn btn-primary" href="{{ route('edit.info') }}">Edit Profile Information</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (auth()->user()->is_writer)
    <h2 class="text-center py-5 display-3">All publiched</h2>
    <div class="container-fluid py-5">
        <div class="row">
            @foreach ($user_article as $article)
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
    @endif
    
</x-layout>


<style>
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
</style>
<x-layout>   
    <div class="container mb-5">
        <div class="col-12">
            <div class="form-group">
                <div class="mb-3">
                    <h3 class="text-center">
                        Profilo di {{auth()->user()->name}}
                    </h3>
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
    <h3 class="text-center py-5">All publiched</h3>
    <div class="container-fluid py-5">
        <div class="row">
            @foreach ($user_article as $article)
            <div class="col-4">
                <div class="card" mb-5 style="width: 18rem;">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="{{$article->title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->subtitle}}</p>
                        <hr>
                        <p class="card-text content">{{$article->content}}</p>
                        <hr>
                        <p>Author: <a href="#" class="btn btn-outline-dark btn-sm my-1">{{$article->user->name}}</a></p>
                        <p>Category: <a href="/homepage/article-category/{{$article->category->id}}" class="btn btn-outline-dark btn-sm my-1">{{$article->category->name}}</a></p>
                        {{-- <a href="{{route('article.show'), compact('article')}}" class="btn btn-info"> Leggi</a> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    
</x-layout>
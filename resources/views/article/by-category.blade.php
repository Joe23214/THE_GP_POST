<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Kawi&family=Roboto:ital,wght@1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner:wght@500&display=swap');



        
        h1{
            font-family: 'Edu TAS Beginner', cursive;
            
        }
        p{
            font-family: 'Noto Sans Kawi', sans-serif;
            font-family: 'Roboto', sans-serif;
        }
</style>
<x-layout>

    <div class="container-fluid p-5 bg-primary text-center">
        <div class="row justify-content-center">
            <h1 class="display-1 text-capitalize">
                categoria {{$category->name}}
            </h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
            <div class="col-12 col-md-3">
                <div class="card">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->subtitle}}</p>
                        <p class="small text-muted d-flex justify-content-between align-items-center">
                            Redatto il {{$article->created_at->format('d/m/Y')}} da {{$article->user->name}}
                            <a href="{{route('article.show', compact('article'))}}" class="btn btn-outline-primary">scopri di più</a>
                        </p>
                    </div>
                </div>
            </div>
                
            @endforeach
        </div>
    </div>
</x-layout>
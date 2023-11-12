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
    .sfondox{
     background-color: rgb(218, 199, 121);
    }
</style>
<x-layout>
    <div class="container-fluid p-5 text-center"></div>
    <div class="row justify content-center">
        <h1 class="display-1">
            Bentornato, Redattore {{auth()->user()->name}}
        </h1>
    </div>
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
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 py-3">
                <h2 class="text-center mb-3">Articoli in fase di revisione</h2>
                <x-writer-articles-table :articles="$unrevisionedArticles" />
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-12 py-3">
                <h2 class="text-center mb-3">Articoli pubblicati</h2>
                <x-writer-articles-table :articles="$acceptedArticles" />
            </div>
        </div>
    </div>

    <hr>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2> Articoli respinti</h2>
                <x-writer-articles-table :articles="$rejectedArticles" />
            </div>
        </div>
    </div>

</x-layout>
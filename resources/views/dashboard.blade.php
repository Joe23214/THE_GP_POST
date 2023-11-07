<x-layout>
    <div class="container-fluid p-5 bg-info text-center"></div>
    <div class="row justify content-center">
        <h1 class="display-1">
            Bentornato, Redattore
        </h1>
    </div>
    @if(session('message'))
    <div class="alert alert-success text-center">
        {{session('message')}}
    </div>
    @endif

    <div class="container my-3">
        <div class="row">
            <div class="col-12 py-3">
                <h3 class="text-center mb-3">Articoli in fase di revisione</h3>
                <x-writer-articles-table :articles="$unrevisionedArticles"/>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="row">
            <div class="col-12 py-3">
                <h3 class="text-center mb-3">Articoli pubblicati</h3>
                <x-writer-articles-table :articles="$acceptedArticles"/>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="row">
            <div class="col-12 py-3">
                <h3 class="text-center mb-3">articoli respinti</h3>
                <x-writer-articles-table :articles="$rejectedArticles"/>
            </div>
        </div>
    </div>

</x-layout>
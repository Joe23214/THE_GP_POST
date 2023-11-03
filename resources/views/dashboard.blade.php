<x-layout>
    <div class="container-fluid p-5 bg-info text-center"></div>
    <div class="row justify content-center">
        <h1 class="display-1">
            Bentornato, Amministratore
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
                <h3 class="text-center mb-3">Richieste come amministratore</h3>
                <x-request-table :adminRequest="$adminRequest" role="Admin"/>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="row">
            <div class="col-12 py-3">
                <h3 class="text-center mb-3">Richieste come revisore</h3>
                <x-request-table :revisorRequest="$revisorRequest" role="Revisor"/>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="row">
            <div class="col-12 py-3">
                <h3 class="text-center mb-3">Richieste come Redattore</h3>
                <x-request-table :writerRequest="$writerRequest" role="Writer"/>
            </div>
        </div>
    </div>
</x-layout>
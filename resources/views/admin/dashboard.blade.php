<x-layout>
    <div class="container-fluid p-5 bg-info text-center"></div>
    <div class="row justify content-center">
        <h1 class="display-1">
            Bentornato, Admin {{auth()->user()->name}}
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
        <div class="container my-3">
            <div class="row justify-content-center">
                <div class="col-12 py-3">
                    <h3 class="text-center mb-3">Richieste per ruolo di amministratore</h3>
                    <x-requests-table user="$user"  :roleRequests="$adminRequests" role="amministratore"/>
                </div>
            </div>
        </div>
        <div class="container my-3">
            <div class="row justify-content-center">
                <div class="col-12 py-3">
                    <h3 class="text-center mb-3">Richieste per ruolo di revisore</h3>
                    <x-requests-table user="$user" :roleRequests="$revisorRequests" role="revisore"/>
                </div>
            </div>
        </div>
        <div class="container my-3">
            <div class="row justify-content-center">
                <div class="col-12 py-3">
                    <h3 class="text-center mb-3">richieste per ruolo redattore</h3>
                    <x-requests-table user="$user" :roleRequests="$writerRequests" role="redattore"/> 
                </div>
            </div>
        </div>

</x-layout>
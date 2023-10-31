<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 text-center">Carica il tuo articolo!</h1>
            </div>
            <div class="col-6">
                <form method="POST" action="{{route('article.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="title" class="form-label">Titolo Articolo:</label>
                      <input name="name" type="text" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                      <label for="category" class="form-label">Inserisci il genere:</label>
                      <input name="category" type="text" class="form-control" id="category">
                    </div>
                    <div class="form-floating">
                        <textarea name="body" class="form-control" placeholder="Scrivi qui..." id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Corpo dell'articolo</label>
                      </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Carica la copertina:</label>
                        <input name="img" type="file" class="form-control" id="img">
                    </div>
                    <div class="my-3">
                      @foreach ($tags as $tag)
                        <input name="tags[]" class="form-check-input" type="checkbox" value="{{$tag->id}}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          {{$tag->name}}
                        </label>
                    @endforeach
                    </div>
                    
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</x-layout>
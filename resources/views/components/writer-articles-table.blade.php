<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tags</th>
            <th scope="col">Creato il</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{$article->title}}</td>
                <td>{{$article->subtitle}}</td>
                <td>{{$article->category->name ?? 'non categorizzato'}}</td>
                <td>
                    @foreach ($article->tags as $tag)
                        {{$tag->name}},
                    @endforeach
                </td>
                <td>{{$article->created_at->format('d/m/Y')}}</td>
                <td>
                    <a href="{{route('article.show', compact('article'))}}" class="btn btn-info">leggi l'articolo</a>
                    <a href="{{('article.edit' , compact('article'))}}" class="btn btn-warning">modifica l'articolo</a>
                    <form action="{{route('article.destroy', compact('article'))}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">elimina l'articolo</button>
                    </form>
                </td>
            </tr>
            @endforeach

    </tbody>
</table>
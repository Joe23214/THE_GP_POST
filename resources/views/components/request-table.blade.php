<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roleRequest as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>

                    @switch($role)
                    @case('amministratore')
                    <a href="{{route('admin.setAdmin', compact('user'))}}" class="btn btn-info">Attiva {{$role}}</a>
                    @break
                    @case('revisore')
                    <a href="{{route('admin.setRevisor', compact('user'))}}" class="btn btn-info">Attiva {{$role}}</a>
                    @break
                    @case('redattore')
                    <a href="{{route('admin.setWriter', compact('user'))}}" class="btn btn-info">Attiva {{$role}}</a>
                    @break
                </td>
            </tr>

        @endforeach
    </tbody>
</table>
<div>
    <div class="card">

        <div class="card-header">
            <input wire:model="search" class="form-control"
                placeholder="Inserisci Un Nome Utente oppure indirizzo Email ">

        </div>
        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width='10px'>
                                    <a class="btn btn-primary" href="{{ route('dash.users.edit', $user) }}">Edit</a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>NON CI SONO UTENTI REGISTRATI CON QUESTO NOME</strong>
            </div>
        @endif
    </div>
</div>

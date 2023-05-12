@extends('layouts.index')

@section('conteudo')
    <style>
        .ls {
            position: absolute;
            left: 63%;
        }
    </style>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datatables</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">nome</th>
                                    <th scope="col">Tags</th>
                                    <th scope="col">ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <th>{{ $usuario->id }}</th>
                                        <th>{{ $usuario->name }}</th>
                                        <th>
                                            @foreach ($usuario->roles as $item)
                                                @if ($usuario->roles->isEmpty())
                                                    <span class="badge text-bg-secondary">None</span>
                                                    @elseif ($item->name === 'Admin')
                                                        <span class="badge text-bg-success">{{ $item->name }}</span>
                                                    @else
                                                        <span class="badge text-bg-info">{{ $item->name }}</span>
                                                    @endif
                                            @endforeach
                                        </th>
                                        <td>
                                            @if ($auth != $usuarios)
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">
                                                        Excluir
                                                    </button>
                                                </form>
                                            @else
                                                <button type="" class="btn btn-secondary">
                                                    Usuario logado
                                                </button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

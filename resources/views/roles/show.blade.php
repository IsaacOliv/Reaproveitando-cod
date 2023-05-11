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

                                    <th scope="col">nome</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($roles as $role)
                                    <tr>
                                        <th>{{ $role->name }}</th>
                                        <th>{{ $role->description }}</th>
                                        <td>
                                            @foreach ($user->roles as $item)
                                                @if ($item->name === 'Admin')
                                                    <a class="btn btn-warning ls"
                                                        href="{{ route('roles.edit', $role->id) }}">Editar</a>
                                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">
                                                            Excluir
                                                        </button>
                                                    </form>
                                                @endif
                                            @endforeach
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

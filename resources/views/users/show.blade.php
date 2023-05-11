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
                                @foreach ($users as $user)
                                    <tr>
                                        <th>{{ $user->id }}</th>
                                        <th>{{ $user->name }}</th>

                                        @if ($user->roles->isEmpty())
                                            <th><span class="badge text-bg-secondary">None</span></th>
                                        @else
                                            <th>
                                                @foreach ($user->roles as $item)
                                                    @if ($item->name === 'Admin')
                                                        <span class="badge text-bg-success">{{ $item->name }}</span>
                                                    @else
                                                        <span class="badge text-bg-info">{{ $item->name }}</span>
                                                    @endif
                                                @endforeach
                                            </th>
                                        @endif
                                        <td>
                                            @if ($auth != $user)
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

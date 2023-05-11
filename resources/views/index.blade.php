@extends('layouts.index')

@section('conteudo')
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
                                    <th scope="col">Usuarios</th>
                                    <th scope="col">Regra</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <th>
                                           {{ $usuario->name }}
                                        </th>
                                        <th>
                                            @foreach ($usuario->roles as $role)
                                                @if ($role->name === 'Admin')
                                                    <span class="badge text-bg-success">{{ $role->name }}</span>
                                                @else
                                                    <span class="badge text-bg-info">{{ $role->name }}</span>
                                                @endif
                                            @endforeach
                                        </th>

 
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



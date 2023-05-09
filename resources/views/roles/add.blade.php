@extends('layouts.index')

@section('conteudo')
    <style>
        .bt {
            position: relative;
            left: 45%;
        }
    </style>


    <div class="card mb-3">
        <div class="card-body">
            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Criar nova regra</h5>
            </div>
            <form class="g-3 needs-validation" method="post" action="{{ route('user.role') }}">
                @csrf
                <div class="row">
                    <div class="input-group mb-3 col">
                        <div class="input-group-prepend ">
                            <label class="input-group-text" for="inputGroupSelect01">Usuario</label>
                        </div>
                        <select class="input-group mb-3 " name="id_user" id="inputGroupSelect01">
                            <option selected>Escolha...</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3 col">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Regra</label>
                        </div>
                        <select class="input-group mb-3 " name="id_role" id="inputGroupSelect01">
                            <option selected>Escolha...</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="container bt">
                    <button type="submit" class="btn btn-primary">Vincular</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.index')

@section('conteudo')
    <style>
        .bt {

            width: 200px;
            height: 50px;
            border: none;
            outline: none;
            color: #fff;
            background: blue;
            cursor: pointer;
            position: relative;
            margin: 0 auto;
            z-index: 0;
            border-radius: 10px;

        }

        .divcenter {
            width: 500px;
            margin: 0 auto;
        }

        .divcenter1 {

            width: 100%;
            display: flex;
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

                    <div class="input-group mb-3 divcenter">
                        <div class="input-group-prepend ">
                            <label class="input-group-text" for="inputGroupSelect01">Usuario</label>
                        </div>
                        <select class="input-group mb-3 " name="id_user" id="inputGroupSelect01">
                            <option selected disabled>Escolha...</option>
                            @foreach ($usersSelect as $users)
                                <option value="{{ $users->id }}">{{ $users->name }}</option>
                            @endforeach
                        </select>

                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Regra</label>
                        </div>
                        <select class="input-group mb-3 " name="id_role" id="inputGroupSelect01">
                            <option selected disabled> Escolha... </option>
                            @if ($roles->isEmpty())
                                <option selected disabled> Não existem regras cadastradas</option>
                            @endif
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="container divcenter1 ">
                    <button type="submit" class="bt">Vincular</button>
                </div>
            </form>
        </div>
    </div>
@endsection

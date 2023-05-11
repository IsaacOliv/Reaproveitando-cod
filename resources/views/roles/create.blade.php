@extends('layouts.index')

@section('conteudo')
    <style>
        .divcenter {
            width: 500px;
            margin: 0 auto;
        }

        .divcenter1 {

            width: 100%;
            display: flex;
        }


        .glow-on-hover {
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
    </style>


    <div class="card mb-3">
        <div class="card-body">

            <div class="divcenter">

                <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Criar nova regra</h5>
                </div>
                <form class="row g-3 needs-validation" method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Descrição</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>
                </form>
            </div>

            <div class="divcenter1">
                <button class="glow-on-hover" type="submit">Criar regra</button>
            </div>

        </div>

    </div>
@endsection

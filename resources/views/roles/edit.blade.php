@extends('layouts.index')

@section('conteudo')
    
<div class="card mb-3">
    <div class="card-body">
        <div class="pt-4 pb-2">

            <h5 class="card-title text-center pb-0 fs-4">Criar nova regra</h5>
        </div>
        <form class="row g-3 needs-validation" method="post" action="{{route('roles.update', $role->id)}}"> 
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$role->name}}" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">description</label>
                <textarea name="description" id="description" class="form-control"  rows="3">{{$role->description}}</textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary w-100" type="submit">Criar regra</button>
            </div>
        </form>
    </div>
</div>
@endsection
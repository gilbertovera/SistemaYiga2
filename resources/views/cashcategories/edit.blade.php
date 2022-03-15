@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Editar Categoría</h1>
</div>

<form action="{{ route('cashcategories.update', $cashcategory->idcashcategories) }}" method="POST">
    @csrf
    @method('PUT')
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre de categoría:</strong>
                <input type="text" name="name" class="form-control" value="{{$cashcategory->name}}" placeholder="Escriba el nombre">
            </div>
            <div class="form-group">
                <strong>Descripción:</strong>
                <input type="text" name="description" class="form-control" value="{{$cashcategory->description}}" placeholder="Escriba una descripción">
            </div>
            <div class="form-group">
                <select class="form-control" id="selectUser" name="type" required focus>
                    <option value="" disabled>Selecciona tipo</option>
                    <option value="Ingreso" {{$cashcategory->type=='Ingreso'?'selected':''}}>Ingreso</option>
                    <option value="Egreso" {{$cashcategory->type=='Egreso'?'selected':''}}>Egreso</option> 
                </select> 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="/cashcategories" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
   
</form>

@endsection
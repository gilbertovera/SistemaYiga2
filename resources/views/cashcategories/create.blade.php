@extends('layouts.app')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agregar Categoría</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible" >
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('cashcategories.store') }}" method="POST">
        @csrf
      
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre de categoría:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Escriba el nombre">
                </div>
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <input type="text" name="description" class="form-control" placeholder="Escriba una descripción">
                </div>
                <div class="form-group">
                    <select class="form-control" id="selectUser" name="type" required focus>
                        <option value="" disabled selected>Selecciona tipo</option>
                        <option value="Ingreso">Ingreso</option>
                        <option value="Egreso">Egreso</option> 
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
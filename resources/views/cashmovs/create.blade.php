@extends('layouts.app')

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

@endsection

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agregar Movimiento</h1>
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

    <form action="{{ route('cashmovs.store') }}" method="POST">
        @csrf
      
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"> 
                    <strong>Tipo:</strong>   
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Ingreso" name="type" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">Ingreso</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Egreso" name="type" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">Egreso</label>
                    </div>
                </div>
                <div class="form-group">
                    <strong>Categoría:</strong>
                    <select class="form-control" id="selectCatI" name="idcashcategories" hidden>
                        <option value="" disabled selected>Selecciona una categoría tipo Ingreso:</option>
                        @foreach ($cashcategories_i as $cashcategory_i)
                            <option value="{{$cashcategory_i->idcashcategories}}">{{$cashcategory_i->name}}</option>
                        @endforeach 
                    </select> 
                    <select class="form-control" id="selectCatE" name="idcashcategories" hidden>
                        <option value="" disabled selected>Selecciona una categoría tipo Egreso:</option>
                        @foreach ($cashcategories_e as $cashcategory_e)
                            <option value="{{$cashcategory_e->idcashcategories}}">{{$cashcategory_e->name}}</option>
                        @endforeach    
                    </select> 
                </div>
                <div class="form-group">
                    <strong>Fecha del movimiento:</strong>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <input type="text" name="description" class="form-control" placeholder="Escriba una descripción">
                </div>
                <div class="form-group">
                    <strong>Monto: </strong>
                    <input type="number" name="amount" class="form-control" placeholder="Ingrese monto del movimiento">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <a href="/cashmovs" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
       
    </form>

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>//jQuery Plugin
    <script>
        $('input[type=radio]').click(function(e) {//jQuery works on clicking radio box
            var value = $(this).val(); //Get the clicked checkbox value
        if(value=="Ingreso"){
            $("#selectCatI").removeAttr("hidden");
            $("#selectCatE").attr("hidden","hidden");
        }else{
            $("#selectCatE").removeAttr("hidden");
            $("#selectCatI").attr("hidden","hidden");
        }
    });
    </script>
@endsection


@endsection
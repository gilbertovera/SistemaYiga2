@extends('layouts.app')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Movimiento</h1>
    </div>

    <form action="{{ route('cashmovs.update', $cashmov->idcashmovs) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"> 
                    <strong>Tipo:</strong>   
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Ingreso" {{$cashmov->type=='Ingreso'?'checked':''}} name="type" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">Ingreso</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Egreso" {{$cashmov->type=='Egreso'?'checked':''}} name="type" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">Egreso</label>
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control" id="selectCatI" name="idcashcategories" {{$cashmov->type=='Ingreso'?'':'hidden disabled'}}>
                        <option value="" disabled>Selecciona una categoría tipo Ingreso:</option>
                        @foreach ($cashcategories_i as $cashcategory_i)
                            <option value="{{$cashcategory_i->idcashcategories}}" {{$cashmov->idcashcategories==$cashcategory_i->idcashcategories?'selected':''}}>{{$cashcategory_i->name}}</option>
                        @endforeach   
                    </select> 
                    <select class="form-control" id="selectCatE" name="idcashcategories" {{$cashmov->type=='Egreso'?'':'hidden disabled'}}>
                        <option value="" disabled>Selecciona una categoría tipo Egreso:</option>
                        @foreach ($cashcategories_e as $cashcategory_e)
                            <option value="{{$cashcategory_e->idcashcategories}}" {{$cashmov->idcashcategories==$cashcategory_e->idcashcategories?'selected':''}}>{{$cashcategory_e->name}}</option>
                        @endforeach 
                    </select>
                </div>
                <div class="form-group">
                    <strong>Fecha del movimiento:</strong>
                    <input type="date" name="date" class="form-control" value="{{$cashmov->date}}">
                </div>
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <input type="text" name="description" class="form-control" value="{{$cashmov->description}}" placeholder="Escriba una descripción">
                </div>
                <div class="form-group">
                    <strong>Monto: </strong>
                    <input type="number" name="amount" class="form-control" value="{{$cashmov->amount}}">
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
            $("#selectCatI").removeAttr("disabled");
            $("#selectCatE").attr("hidden","hidden");
            $("#selectCatE").attr("disabled","disabled");

        }else{
            $("#selectCatE").removeAttr("hidden");
            $("#selectCatE").removeAttr("disabled");
            $("#selectCatI").attr("hidden","hidden");
            $("#selectCatI").attr("disabled","disabled");
        }
    });
    </script>
@endsection

@endsection
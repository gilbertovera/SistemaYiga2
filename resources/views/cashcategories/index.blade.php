@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        <i class="fas fa-bookmark"></i>
        Categorías
    </h1>
</div>

@if (session('success'))
<div class="col-sm-12">
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
</div>
@endif

<div class="mb-4">
    <a href="{{ route('cashcategories.create') }}" class=" btn btn-success shadow-sm">
        <i class="fas fa-plus text-white"></i> Agregar categoría
    </a>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="cashcategories" class="table table-bordered" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">    
                    <tr>
                        <th>ID</th>
                        <th>Nombre de Categoría</th>
                        <th>Descripción</th>
                        <th>Tipo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cashcategories as $cashcategory)
                    <tr>
                        <td>{{ $cashcategory->idcashcategories }}</td>
                        <td>{{ $cashcategory->name }}</td>
                        <td>{{ $cashcategory->description }}</td>
                        @if ($cashcategory->type=='Ingreso')
                            <td><span class="badge badge-success"><i class="fas fa-arrow-down"></i> Ingreso</span></td>
                        @else
                            <td><span class="badge badge-warning"><i class="fas fa-arrow-up"></i> Egreso</span></td>
                        @endif
                        <td>  
                            <!-- <a class="btn btn-sm btn-info" href="#">Ver</a>   --> 
                            <a class="btn btn-sm btn-primary" href="{{ route('cashcategories.edit',$cashcategory->idcashcategories) }}">Editar</a>   
                            <a class="btn btn-sm btn-danger" data-toggle="modal" id="smallButton" data-target="#smallModal" href="{{ route('catdelete', $cashcategory->idcashcategories) }}" title="Delete CashCategory">
                                Borrar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>

<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });

</script>

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#cashcategories').DataTable();
    } );
    </script>
@endsection

@endsection
@extends('home')
@section('ViewProducts')


<div class="row justify-content-center align-items-center g-2">
    <div class="col-md-10">
        <h3>Lista de Productos </h3>

        @if(Auth::user()->rol == 1 || Auth::user()->rol == 2)

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-Product">
                <i class="bi bi-plus-circle"></i> Crear Producto
            </button>
        @else
            <button type="button" disabled class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-Product">
                <i class="bi bi-plus-circle"></i> Crear Producto
            </button>

        @endif

        @if(Auth::user()->rol == 1)

        <button type="button"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sell">
            total ventas
        </button>
        @else
        <button type="button" disabled class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sell">
            total ventas
        </button>
        @endif
        <hr>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre Producto</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr class="">
                        <td scope="row">{{$producto->id}}</td>
                        <td>{{$producto->nombre_producto}}</td>
                        <td>{{$producto->referencia}}</td>
                        <td>{{$producto->precio}}</td>
                        <td>{{$producto->peso}}</td>
                        <td>{{$producto->categoria}}</td>
                        <td>{{$producto->stock}}</td>
                        <td>
                            @if(Auth::user()->rol == 1 || Auth::user()->rol == 2)
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$producto->id}}" title="Editar Producto">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$producto->id}}" title="Eliminar Producto">
                                    <i class="bi bi-trash"></i>
                                </button>

                                @if($producto->stock < 1) 
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#noSell">
                                        <i class="bi bi-cash-coin"></i>
                                    </button>
                                @else
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sell{{$producto->id}}">
                                        <i class="bi bi-cash-coin"></i>
                                    </button>
                                @endif

                            @else
                                <button type="button" disabled class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$producto->id}}" title="Editar Producto">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <button type="button" disabled class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$producto->id}}" title="Eliminar Producto">
                                    <i class="bi bi-trash"></i>
                                </button>

                                <button type="button" disabled class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sell{{$producto->id}}">
                                    <i class="bi bi-cash-coin"></i>
                                </button>
                            @endif
                            
                
                        </td>
                    </tr>
                    @include('productos.info')

                    @endforeach

                </tbody>
            </table>
        </div>
        @include('productos.create')

    </div>
    <div class="colmd-2"></div>
</div>


<div class="modal fade" id="sell" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Vender Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">



                    <div class="mb-3">
                        <label for="" class="form-label">Selecciona el producto</label>
                        <select name="categoria_id" class="form-control">
                            @foreach($productos as $producto)
                            <option value="{{ $producto->id }}">{{$producto->nombre_producto }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" name="referencia" id="referencia" aria-describedby="helpId" required placeholder="">
                    </div>

                    <label for="">Total</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
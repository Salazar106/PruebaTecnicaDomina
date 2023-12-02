<div class="modal fade" id="edit{{$producto->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('home.update', $producto->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre del Producto*</label>
                        <input type="text" class="form-control" name="nombre_producto" id="" aria-describedby="helpId" value="{{$producto->nombre_producto}}" oninput="validarLetras(this)" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Referencia*</label>
                        <input type="text" class="form-control" name="referencia" id="" aria-describedby="helpId" value="{{$producto->referencia}}" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Precio*</label>
                        <input type="text" class="form-control" name="precio" id="" aria-describedby="helpId" oninput="SoloNumeros(this)" value="{{$producto->precio}}" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Peso*</label>
                        <input type="text" class="form-control" name="peso" id="" aria-describedby="helpId" oninput="SoloNumeros(this)" value="{{$producto->peso}}" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Categoria*</label>
                        <input type="text" class="form-control" name="categoria" id="" aria-describedby="helpId" value="{{$producto->categoria}}" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">stock*</label>
                        <input type="text" class="form-control" name="stock" id="" aria-describedby="helpId" oninput="SoloNumeros(this)" value="{{$producto->stock}}" placeholder="">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="delete{{$producto->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Eliminar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('home.destroy', $producto->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Vas a eliminar el producto <strong>{{$producto->nombre_producto}}</strong>, Estas seguro de querer eliminarlo?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="noSell" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">No se puede realizar la venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>El producto <strong>{{$producto->nombre_producto}}</strong> no cuenta con el suficiente stock para poder realizar una venta</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="sell{{$producto->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Vender {{$producto->nombre_producto}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('home.create', $producto->id, $producto->stock )}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Cantidad de Unidades</label>
                        <input type="text" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId" required oninput="SoloNumeros(this); calcularMultiplicacion()" onblur="validarStock(this)">
                    </div>
                    <input type="text" id='stockActual' name='stockActual' hidden value="{{$producto->stock}}">
                    <input type="text" id='nombre_producto' name='nombre_producto' hidden value="{{$producto->nombre_producto}}">

                    <div class="mb-3">
                        <label for="" class="form-label">Precio Unidad</label>
                        <input type="text" disabled class="form-control" name="precioVenta" id="precioVenta" aria-describedby="helpId" value="{{$producto->precio}}" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Precio de la Total</label>
                        <input type="text" disabled class="form-control" name="precioTotal" id="precioTotal" aria-describedby="helpId" placeholder="">
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Vender</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    function validarLetras(input) {
        input.value = input.value.replace(/[^a-zA-Z\s]/g, '')
    }

    function SoloNumeros(input) {
        input.value = input.value.replace(/[^0-9]/g, '')
    }

    function validarStock(cantidad) {
        var stock = document.getElementById('stockActual').value
        var cantidadUnidades = document.getElementById('cantidad').value;


        if (cantidadUnidades > stock) {
            alert("la cantida de productos a vender supera el Stock actual del producto, ingresa un valor permitido");
            document.getElementById('cantidad').value = '';
            document.getElementById('precioTotal').value = '';
        }


    }

    function calcularMultiplicacion() {
        // Obtener los valores de los dos primeros inputs y convertirlos a números
        var cantidadUnidades = parseFloat(document.getElementById('cantidad').value);
        var precioVenta = parseFloat(document.getElementById('precioVenta').value);

        // Verificar si ambos valores son números válidos
        if (!isNaN(cantidadUnidades) && !isNaN(precioVenta)) {
            // Realizar la multiplicación y mostrar el resultado en el tercer input
            document.getElementById('precioTotal').value = cantidadUnidades * precioVenta;
        } else {
            // Manejar el caso en que uno o ambos valores no son números válidos
            document.getElementById('precioTotal').value = '';
        }
    }
</script>
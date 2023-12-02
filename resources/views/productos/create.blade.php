<!-- Modal -->
<div class="modal fade" id="create-Product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Crear nuevo producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('home.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre del Producto*</label>
                        <input type="text" class="form-control" name="nombre_producto" id="nombre_producto" oninput="validarLetras(this)" helpId" required placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Referencia*</label>
                        <input type="text" class="form-control" name="referencia" id="referencia" aria-describedby="helpId" oninput="validarLetras(this)" required placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Precio*</label>
                        <input type="text" class="form-control" name="precio" id="precio" aria-describedby="helpId" oninput="SoloNumeros(this)" required placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Peso*</label>
                        <input type="text" class="form-control" name="peso" id="peso"  aria-describedby="helpId" oninput="SoloNumeros(this)" required placeholder="peso en Gramos (g)">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Categoria*</label>
                        <input type="text" class="form-control" name="categoria" id="categoria" aria-describedby="helpId" oninput="validarLetras(this)" required placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">stock*</label>
                        <input type="text" class="form-control" name="stock" id="stock" aria-describedby="helpId" oninput="SoloNumeros(this)" required placeholder="">
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

<script>
    function validarLetras(input) {
        input.value = input.value.replace(/[^a-zA-Z\s]/g, '')
    }

    function SoloNumeros(input) {
        input.value = input.value.replace(/[^0-9]/g, '')
    }

</script>

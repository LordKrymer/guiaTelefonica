<div class="row">
    <div class="col-12 text-center">
        <h1>{$persona->nombre|cat:' '|cat:$persona->apellido}</h1>
    </div>
    <div class="container  d-flex row justify-content-around col-12">
        {foreach $telefonos as $telefono}
            <div class="border border 3 mb-2 col-12 col-md-4 row justify-content-start">
                <div class="col-8">
                    <h1>{$telefono->caracteristica|cat:'-'|cat:$telefono->telefono}</h1>
                    <h3>Compañia:{$telefono->compania}</h3>
                </div>
                <div class="col-4 ">
                    <a href="formModPersona/{$persona->DNI}" ><input type="button" value="Modificar" class="col-12 h-50"> </a>
                    <a href="borrarPersona/{$persona->DNI}"><input type="button" value="Eliminar" class="col-12 h-50"> </a>
                </div>
            </div>
        {/foreach}
    </div>

</div>
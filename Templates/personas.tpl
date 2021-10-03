<div class="border border-3 p-3 row">
    {foreach $personas as $persona}
        <div class="col-12 col-lg-4   row mb-3">
            <div class=" col-8 ">
                <a href="paginaPersonal/{$persona->DNI} " class="text-decoration-none">
                    <div class="border border-1 mb-2 text-center h-100">
                        <div class="col-4"></div>
                        <div class="col-8 text-center">
                        <h1>{$persona->nombre|cat:" "|cat:$persona->apellido}</h1>
                        </div>
                        <h3 class="text-center">De la ciudad {$persona->nombre_ciudad}</h3>
                    </div>
                </a>
            </div>
            <div class="col-4 ">
                <a href="formModPersona/{$persona->DNI}" ><input type="button" value="Modificar" class="col-12 h-50"> </a>
                <a href="borrarPersona/{$persona->DNI}"><input type="button" value="Eliminar" class="col-12 h-50"> </a>
            </div>
        </div>
    {/foreach}
</div>
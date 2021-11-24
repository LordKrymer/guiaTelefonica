<div class="p-3 row" style="margin-bottom: 100px;">
    {foreach $personas as $persona}
        <div class="col-12 col-lg-4 border border-2   row mb-3">
            <div class=" col-8 ">
                <a href="{BASE_URL|cat:paginaPersonal|cat:'/'|cat:$persona->DNI} " class="text-decoration-none">
                    <div class=" mb-2 text-center h-100">
                        <div class="col-4"></div>
                        <div class="col-8 text-center">
                        <h1 class="text-left">{$persona->nombre|cat:" "|cat:$persona->apellido}</h1>
                        </div>
                        <h3 class="text-right">De la ciudad {$persona->nombre_ciudad}</h3>
                    </div>
                </a>
            </div>
            {if $rol == 'admin'}
                <div class="col-4 ">
                    <a href="{BASE_URL|cat:'formModPersona/'|cat:$persona->DNI}" ><input type="button" value="Modificar" class="col-12 boton"> </a>
                    <a href="borrarPersona/{$persona->DNI}"><input type="button" value="Eliminar" class="col-12 boton"> </a>
                </div>
            {/if}
        </div>
    {/foreach}
    <div class="col-12 text-center row d-flex justify-content-center align-content-center">
    <span><a href="{BASE_URL|cat:home|cat:'/'|cat:($paginaActual-1)}"><h3><i class="fas fa-arrow-left"></i></h3></a></span>
    <a class="m-3" href="{BASE_URL|cat:home|cat:'/'|cat:1}"><span class="display-4 ">1</span></a>
    {if $cantPaginas > 1}
        {for $i=2 to $cantPaginas}
            <a class="m-3" href=" {$i} "><span class="display-4 ">{$i}</span></a>
        {/for}
    {/if}
    <span><a href="{BASE_URL|cat:home|cat:'/'|cat:($paginaActual+1)}"><h3><i class="fas fa-arrow-right"></i></h3></a></span>
    </div>
</div>
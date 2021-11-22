<div class="d-flex justify-content-center border border-3">
    <form action="modificarPersona" method="POST" enctype="multipart/form-data">
        <input type="number" name="DNI" value="{$persona->DNI}" readonly> <br>
        <input type="text" name="nombre" placeholder="Nombre" value="{$persona->nombre}" required> <br>
        <input type="text" name="apellido" placeholder="Apellido" value="{$persona->apellido}" required> <br>
        <span>Ciudad de origen:</span><select name="ciudad">
        <option value="{$persona->postal_fk}">{$persona->nombre_ciudad}</option>
        {foreach $ciudades as $ciudad}
        {if !($persona->postal_fk == $ciudad->postal)}<option value="{$ciudad->postal}">{$ciudad->nombre_ciudad}</option>{/if}
        {/foreach}
        </select> <br>
        {if !isset($persona->ruta_imagen)}
            <input class="form-control" type="file" name="uploadedFile">    
        {/if}
        <input type="submit" value="Modificar"> <br>

        {if isset($persona->ruta_imagen)}
            <a href="{BASE_URL|cat:'borrarImagen/'|cat:$persona->DNI}" class="text-decoration-none"><input type="button" value="Eliminar imagen"d></a>
        {/if}
    </form>
</div>
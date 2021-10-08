<div class="d-flex justify-content-center border border-3">
    <form action="modificarPersona" method="POST">
        <input type="number" name="DNI" value="{$persona->DNI}" readonly> <br>
        <input type="text" name="nombre" placeholder="Nombre" value="{$persona->nombre}"> <br>
        <input type="text" name="apellido" placeholder="Apellido" value="{$persona->apellido}"> <br>
        <span>Ciudad de origen:</span><select name="ciudad">
            <option value="{$persona->postal_fk}">{$persona->nombre_ciudad}</option>
            {foreach $ciudades as $ciudad}
            {if !($persona->postal_fk == $ciudad->postal)}<option value="{$ciudad->postal}">{$ciudad->nombre_ciudad}</option>{/if}
            {/foreach}
        </select>
        <input type="submit" value="Modificar">
    </form>
</div>
<div>
    <form action="modificarPersona" method="POST">
        <input type="number" name="DNI" value="{$persona->DNI}" readonly> <br>
        <input type="text" name="nombre" placeholder="Nombre" value="{$persona->nombre}"> <br>
        <input type="text" name="apellido" placeholder="Apellido" value="{$persona->apellido}"> <br>
        <span>Ciudad de origen:</span><select name="ciudad">
            {foreach $ciudades as $ciudad}
                <option value="{$ciudad->postal}">{$ciudad->nombre_ciudad}</option>
            {/foreach}
        </select>
        <input type="submit" value="Modificar">
    </form>
</div>
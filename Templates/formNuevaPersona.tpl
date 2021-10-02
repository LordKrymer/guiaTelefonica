<div>
    <form action="nuevaPersona" method="POST">
        <input type="text" name="nombre" placeholder="Nombre"> <br>
        <input type="text" name="apellido" placeholder="Apellido"> <br>
        <input type="number" name="DNI" placeholder="Numero DNI"> <br>
        <span>Ciudad de origen:</span><select name="ciudad">
            {foreach $ciudades as $ciudad}
                <option value="{$ciudad->postal}">{$ciudad->nombre_ciudad}</option>
            {/foreach}
        </select>
        <input type="submit" value="Agregar">
    </form>
</div>
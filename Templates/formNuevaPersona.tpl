<div class="row col-12 d-flex justify-content-center">
    <div class="col-12">
        <h1 class="text-center m-4">Agregar Persona</h1>
    </div>
    <form action="nuevaPersona" method="POST" class="form-group">
        <div class="col-12 mb-3">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="apellido" placeholder="Apellido">
        </div>
        <input type="number" name="DNI" placeholder="Numero DNI" class="col-12 mb-3">
        <span>Ciudad de origen:</span><select name="ciudad" class="custom-select mb-3">
            {foreach $ciudades as $ciudad}
                <option value="{$ciudad->postal}">{$ciudad->nombre_ciudad}</option>
            {/foreach}
        </select>
        <input type="submit" value="Agregar">
    </form>
</div>
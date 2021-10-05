<div class="row col-12 d-flex justify-content-center">
    <div class="col-12">
        <h1 class="text-center">Agregar Telefono</h1>
    </div>
    <form action="nuevoTelefono" method="post" class="form-group mb-3">
        <span>Dueño</span> <select name="propietario" class="custom-select mb-3">
            {foreach $personas as $persona}
                <option value="{$persona->DNI}">{$persona->nombre}</option>
            {/foreach}
        </select>
        <div class="col-12">
            <span>+54 9</span>
            <input type="number" placeholder="caracteristica" name="caracteristica" class="mb-3">
            <input type="number" name="telefono" placeholder="telefono" class="mb-3">
        </div>
        <span>Compañia:</span><select name="compania" class="custom-select mb-3">
            <option value="Movistar">Movistar</option>
            <option value="Claro">Claro</option>
            <option value="Personal">Personal</option>
        </select>
        <input type="submit" value="Agregar">
    </form>
</div>
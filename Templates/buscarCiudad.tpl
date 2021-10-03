
<div class=" d-flex justify-content-center text-end flex-wrap">
    <div class="col-7 d-flex justify-content-center">
        <h1>Filtrar personas por ciudad:</h1>
    </div>
    <div class="col-6 d-flex justify-content-center">
        <form action="filtrarCiudad" method="GET" >
            <select name="ciudad" class="custom-select custom-select-lg">
                {foreach $ciudades as $ciudad}
                    <option value="{$ciudad->postal}">{$ciudad->nombre_ciudad}</option>
                {/foreach}
            </select>
            <input type="submit" value="Filtrar" class="w-100">
        </form>
        <div class="ml-3">
            <a href="home"><button class="h-100">Remover Filtro</button></a>
        </div>
    </div>
</div>
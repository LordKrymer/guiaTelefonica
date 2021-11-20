
<div class="col-11 d-flex justify-content-center row">
    <div id="cajaComentarios" class="col-10 d-flex justify-content-around row" style="overflow: scroll; height:25vh">
    </div>

    <div class="d-flex justify-content-center" id="cajaInput" >
    </div> <br>
    <div class="row d-flex justify-content-around col-12">
        <button class="boton-filtro" value="fecha ascendente" data-filtro="fecha-asc">fecha ascendente</button>
        <button class="boton-filtro" value="fecha descendente" data-filtro="fecha-desc">fecha descendente</button>
        <button class="boton-filtro" value="puntuacion ascendente" data-filtro="calificacion-asc">puntuacion ascendente</button>
        <button class="boton-filtro" value="puntuacion descendente" data-filtro="calificacion-desc">puntuacion descendente</button>
        <div>
            <button id="btn-calificacion-minima" data-filtro="calificacion-">Filtrar por calificacion</button>
            <select  id="calificacion-minima">
                <option selected value="3">3</option> 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>
</div>
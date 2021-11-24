
    {include file="header2.tpl" titulo={$persona->nombre|cat:' '|cat:$persona->apellido}}
    <div class="col-12 d-flex justify-content-center">
    {if isset($persona->ruta_imagen)}
            <img src="{BASE_URL|cat:$persona->ruta_imagen}" style="width: 300px; height:225px; border-radius: 50%;;">
    {else}
        <img src="{BASE_URL|cat:'imagenesSubidas/foto-perfil.jpg'}" style="width: 300px; height:225px;border-radius: 50%;;">
        {/if}
        </div>
    {include file="telefonos.tpl" persona=$persona telefonos=$telefonos rol=$rol}
    {include file="seccionComentarios.tpl"}
    <script src="../js/scripts.js"></script>
    {include file="footer2.tpl" logged=$logged nombre=$nombre}

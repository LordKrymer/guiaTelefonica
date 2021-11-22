<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{BASE_URL|cat:'css/estilos.css'}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>{$persona->nombre|cat:' '|cat:$persona->apellido}</title>
</head>
<body>
    {include file="header.tpl"}
    <div class="col-12 d-flex justify-content-center">
    {if isset($persona->ruta_imagen)}
            <img src="{BASE_URL|cat:$persona->ruta_imagen}" style="width: 300px; height:225px; border-radius: 50%;;">
    {else}
        <img src="{BASE_URL|cat:'imagenesSubidas/foto-perfil.jpg'}" style="width: 300px; height:225px;border-radius: 50%;;">
        {/if}
        </div>
    {include file="telefonos.tpl" persona=$persona telefonos=$telefonos rol=$rol}
    {include file="seccionComentarios.tpl"}
    {include file="footer.tpl" logged=$logged nombre=$nombre}
    <script src="../js/scripts.js"></script>
</body>
</html>
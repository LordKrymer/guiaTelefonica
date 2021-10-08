<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Roles</title>
</head>
<body>
    {include file="header.tpl"}
    <div class="d-flex row justify-content-center">
        <h1 class="col-12 text-center">Promover Usuario</h1>
        <div class="col-8">
            <form action="upgradeUser" method="POST">
            <h3>Seleccione usuario a promover</h3>
            <select name="user">
            <option value="NaN" selected>Seleccionar</option>
                {foreach $usuarios as $usuario}
                    {if $usuario->rol != 'admin'}         
                        <option value="{$usuario->nombre}">{$usuario->nombre}</option>
                    {/if}
                {/foreach}
            </select>
            <input type="submit" value="Promover">
            </form>
        </div>
        <h1>{$mensaje}</h1>
    </div>
    {include file="footer.tpl" logged=$logged nombre=$nombre}
</body>
</html>l
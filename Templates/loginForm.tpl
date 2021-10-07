<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {include file="header.tpl"}
    <div class="d-flex row justify-content-center">
        <div class="col-6 border border-3">
            <form action="{$action}" method="POST" class="form-group">
            <h1>Nombre de usuario</h1>
            <input type="text" name="nombre" placeholder="Usuario">
            <h1>Contraseña</h1>
            <input type="password" name="password" placeholder="Contraseña">
            {if $action == 'registrar'}
                <h2>{$cartel}</h2>
            {/if}
            <input type="submit" value="{$envio}">
            </form>
        </div>
    </div>
    <a href="{BASE_URL}"><button class="w-100 h-100">HOME</button></a>
</body>
</html>
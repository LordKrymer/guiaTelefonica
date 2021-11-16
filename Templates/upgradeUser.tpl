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
        <h1 class="col-12 text-center">Cambiar Roles de Usuarios</h1>
        <div class="col-12 text-center">
            <form action="upgradeUser" method="POST">
            <h3>Seleccione usuario a promover/degradar</h3>
            <select name="user">
            <option value="NaN" selected>Seleccionar</option>
                {foreach $usuarios as $usuario}
                <option value="{$usuario->nombre}">{$usuario->nombre}</option>
                {/foreach}
            </select>
            <select name="rol">
                <option value="user">sin permisos</option>
                <option value="admin">administrador</option>
            </select>
            <input type="submit" value="Modificar">
            </form>
        </div>
        </div>
        <h1 class="text-center">{$mensaje}</h1>
        <div>
            <table class="table">
                <thead>
                    <tr scope="row">
                        <th scope="col">Nombre</th>
                        <th scope="col">Rol</th>
                    </tr>
                </thead>
                {foreach $usuarios as $user}
                    <tr scope="row">
                        <td>{$user->nombre}</td>
                        <td>{$user->rol}</td>
                        <td><a href="{BASE_URL|cat:eliminarusuario|cat:'/'|cat:$user->nombre}"><button>Eliminar</button></a></td>
                    </tr>
                {/foreach}
            </table>
        </div>
    {include file="footer.tpl" logged=$logged nombre=$nombre}
</body>
</html>l
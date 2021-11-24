
    {include file="header2.tpl" titulo="Roles"}
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
        <div class="d-flex justify-content-center">
            <table class="table col-9 border border-3">
                <thead>
                    <tr scope="row">
                        <th scope="col">Nombre</th>
                        <th scope="col">Rol</th>
                    </tr>
                </thead>
                {foreach $usuarios as $user}
                    <tr scope="row">
                        <td style="width: 35%;">{$user->nombre}</td>
                        <td class="w-25">{$user->rol}</td>
                        <td class="w-25"><a href="{BASE_URL|cat:eliminarusuario|cat:'/'|cat:$user->nombre}"><button>Eliminar</button></a></td>
                    </tr>
                {/foreach}
            </table>
        </div>
    {include file="footer2.tpl" logged=$logged nombre=$nombre}

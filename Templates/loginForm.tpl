
    {include file="header2.tpl" titulo=$action}
    <div class="d-flex row justify-content-center">
        <div class="col-6 border border-3">
            <form action="{$action}" method="POST" class="form-group">
            <h1>Nombre de usuario</h1>
<input type="text" name="nombre" placeholder="Usuario" {if (!empty($cartel))} class=" form-control is-invalid" {/if} required> 
            <h1>Contraseña</h1>
            <input type="password" name="password" placeholder="Contraseña" required>
            {if $action == 'registrar'}
                <h2>{$cartel}</h2>
            {/if}
            <input type="submit" value="{$envio}">
            </form>
            {if $action == 'login'}
                <a href="{BASE_URL|cat:registrar}"><button>Registrarse</button></a>
            {/if}
        </div>
    </div>
    {include file="footer2.tpl" logged=$logged nombre=$nombre}
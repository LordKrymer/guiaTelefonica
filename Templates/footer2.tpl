<div class="fixed-bottom col-12 mt-3 row footer" style="height: 100px;">
<div class="col-12 d-flex justify-content-around">
    <div class=" mh-100">
        <a href="{BASE_URL}"><button class="w-100 h-100 display-4"> <i class="fas fa-home"></i> HOME</button></a>
    </div>
        {if $rol=='admin'}
            <a href="{BASE_URL|cat:agregar}"><button class="h-100 display-4"> <i class="fas fa-plus-circle"></i> Agregar</button></a>
            <a href="{BASE_URL|cat:upgradeUser}"><button class="h-100 display-4"> <i class="fas fa-user-edit"></i> Edit user</button></a>
        {/if}
        <div class="col-4 align-self-end">
            {if $logged}
                <div class="row w-100 d-flex justify-content-end align-content-center">
                <h1 class="col-12 text-end"  style="color:white;">Bienvenido <span id="nombreUsuario">{$nombre}</span></h1> <br>
                <a class="col-12" href="{BASE_URL|cat:logout}"><button>Logout</button></a>
                </div>
            {else}
                <div class="h-100"><a href="{BASE_URL|cat:login}"><button class="h-100">Iniciar Sesion</button></a></div>
            {/if}
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/d3b466b5b4.js" crossorigin="anonymous"></script>
</body>
</html>
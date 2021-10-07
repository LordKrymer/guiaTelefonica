<div class="fixed-bottom col-12 mt-3 bg-primary row" style="height: 100px;">
    <div class="col-3 mh-100">
        <a href="{BASE_URL}"><button class="w-100 h-100">HOME</button></a>
    </div>
    <div class="col-9 d-flex justify-content-end">
        {if $rol=='admin'}
            <div class="col-8">
            <a href="{BASE_URL|cat:agregar}"><button>Agregar Persona</button></a>
            </div>
        {/if}
        <div class="col-4">
            {if $logged}
                <h1>Bienvenido {$nombre}</h1>
                <a href="{BASE_URL|cat:logout}"><button>Logout</button></a>
            {else}
                <div class="h-100"><a href="{BASE_URL|cat:login}"><button class="h-100">Iniciar Sesion</button></a></div>
            {/if}
        </div>
    </div>
</div>
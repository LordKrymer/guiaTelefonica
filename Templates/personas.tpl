<div class="border border-3 p-3 row">
    {foreach $personas as $persona}
        <div class="col-4">
            <a href="">
                <div class="border border-1 mb-2">
                    <div class="col-4"></div>
                    <div class="col-8">
                    <h1>{$persona->nombre|cat:" "|cat:$persona->apellido}</h1>
                    </div>
                    <h6>De la ciudad {$persona->nombre_ciudad}</h6>
                </div>
            </a>
        </div>
    {/foreach}
</div>
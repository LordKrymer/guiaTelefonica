<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Modificar Telefono</title>
</head>
<body>
    {include file="header.tpl"}
    <div class="row col-12 d-flex justify-content-center">
        <div class="col-12">
            <h1 class="text-center">Modificar Telefono</h1>
        </div>
        <form action="modificarTelefono" method="post" class="form-group mb-3">
            <span>Numero de linea</span><input type="text" name="id" value="{$id}" readonly class="w-25 text-center"> <br>
            <span>Dueño</span> <select name="propietario" class="custom-select mb-3">
                {foreach $personas as $persona}
                    <option value="{$persona->DNI}">{$persona->nombre|cat:" "|cat:$persona->apellido}</option>
                {/foreach}
            </select>
            <div class="col-12">
                <span>+54 9</span>
                <input type="number" placeholder="caracteristica" name="caracteristica" class="mb-3">
                <input type="number" name="telefono" placeholder="telefono" class="mb-3">
            </div>
            <span>Compañia:</span><select name="compania" class="custom-select mb-3">
                <option value="Movistar">Movistar</option>
                <option value="Claro">Claro</option>
                <option value="Personal">Personal</option>
            </select>
            <input type="submit" value="Modificar">
        </form>
    </div>
    {include file="footer.tpl" logged=$logged nombre=$nombre}
    
</body>
</html>



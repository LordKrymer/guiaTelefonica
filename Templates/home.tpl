
    {include file="header2.tpl" titulo="Home - Personas"}} 
    {include file="buscarCiudad.tpl" ciudades=$ciudades }
    {include file="personas.tpl" personas=$personas rol=$rol cantPaginas=$cantPaginas paginaActual=$paginaActual}
    {include file="footer2.tpl" logged=$logged nombre=$nombre}


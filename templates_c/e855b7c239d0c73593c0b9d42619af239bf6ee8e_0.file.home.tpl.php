<?php
/* Smarty version 3.1.39, created on 2021-10-07 05:53:38
  from 'C:\xampp\htdocs\guiaTelefonica\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615e6f42b73d93_67318844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e855b7c239d0c73593c0b9d42619af239bf6ee8e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\guiaTelefonica\\templates\\home.tpl',
      1 => 1633578816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:buscarCiudad.tpl' => 1,
    'file:personas.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_615e6f42b73d93_67318844 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Personas</title>
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
    <?php $_smarty_tpl->_subTemplateRender("file:buscarCiudad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ciudades'=>$_smarty_tpl->tpl_vars['ciudades']->value), 0, false);
?>
    <?php $_smarty_tpl->_subTemplateRender("file:personas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('personas'=>$_smarty_tpl->tpl_vars['personas']->value,'rol'=>$_smarty_tpl->tpl_vars['rol']->value), 0, false);
?>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('logged'=>$_smarty_tpl->tpl_vars['logged']->value,'nombre'=>$_smarty_tpl->tpl_vars['nombre']->value), 0, false);
?>
</body>
</html>
<?php }
}

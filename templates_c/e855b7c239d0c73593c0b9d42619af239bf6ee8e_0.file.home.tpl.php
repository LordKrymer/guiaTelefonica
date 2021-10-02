<?php
/* Smarty version 3.1.39, created on 2021-10-02 23:57:52
  from 'C:\xampp\htdocs\guiaTelefonica\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6158d5e01db384_59024122',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e855b7c239d0c73593c0b9d42619af239bf6ee8e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\guiaTelefonica\\templates\\home.tpl',
      1 => 1633211867,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:personas.tpl' => 1,
  ),
),false)) {
function content_6158d5e01db384_59024122 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php ob_start();
$_smarty_tpl->_subTemplateRender("file:personas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('personas'=>$_smarty_tpl->tpl_vars['personas']->value), 0, false);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

</body>
</html>
<?php }
}

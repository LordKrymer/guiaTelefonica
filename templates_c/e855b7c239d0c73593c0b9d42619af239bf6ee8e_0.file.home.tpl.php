<?php
/* Smarty version 3.1.39, created on 2021-10-02 00:22:17
  from 'C:\xampp\htdocs\guiaTelefonica\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61578a19bff659_62191211',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e855b7c239d0c73593c0b9d42619af239bf6ee8e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\guiaTelefonica\\templates\\home.tpl',
      1 => 1633126934,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:personas.tpl' => 1,
  ),
),false)) {
function content_61578a19bff659_62191211 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/navbar.css">
    <title>Personas</title>
</head>
<body>
    <div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">BBBootstrap</span> </a>
            <div class="nav_list"> <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> <a href="#" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> <a href="#" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a> <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> </div>
        </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </nav>
    </div>
    <?php ob_start();
$_smarty_tpl->_subTemplateRender("file:personas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('personas'=>$_smarty_tpl->tpl_vars['personas']->value), 0, false);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

</body>
</html>
<?php }
}

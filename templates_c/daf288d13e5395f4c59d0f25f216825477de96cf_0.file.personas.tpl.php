<?php
/* Smarty version 3.1.39, created on 2021-10-07 05:53:38
  from 'C:\xampp\htdocs\guiaTelefonica\templates\personas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615e6f42c7d986_95359585',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'daf288d13e5395f4c59d0f25f216825477de96cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\guiaTelefonica\\templates\\personas.tpl',
      1 => 1633578640,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_615e6f42c7d986_95359585 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="border border-3 p-3 row">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['personas']->value, 'persona');
$_smarty_tpl->tpl_vars['persona']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['persona']->value) {
$_smarty_tpl->tpl_vars['persona']->do_else = false;
?>
        <div class="col-12 col-lg-4   row mb-3">
            <div class=" col-8 ">
                <a href="paginaPersonal/<?php echo $_smarty_tpl->tpl_vars['persona']->value->DNI;?>
 " class="text-decoration-none">
                    <div class="border border-1 mb-2 text-center h-100">
                        <div class="col-4"></div>
                        <div class="col-8 text-center">
                        <h1><?php echo (($_smarty_tpl->tpl_vars['persona']->value->nombre).(" ")).($_smarty_tpl->tpl_vars['persona']->value->apellido);?>
</h1>
                        </div>
                        <h3 class="text-center">De la ciudad <?php echo $_smarty_tpl->tpl_vars['persona']->value->nombre_ciudad;?>
</h3>
                    </div>
                </a>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['rol']->value == 'admin') {?>
                <div class="col-4 ">
                    <a href="formModPersona/<?php echo $_smarty_tpl->tpl_vars['persona']->value->DNI;?>
" ><input type="button" value="Modificar" class="col-12 h-50"> </a>
                    <a href="borrarPersona/<?php echo $_smarty_tpl->tpl_vars['persona']->value->DNI;?>
"><input type="button" value="Eliminar" class="col-12 h-50"> </a>
                </div>
            <?php }?>
        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div><?php }
}

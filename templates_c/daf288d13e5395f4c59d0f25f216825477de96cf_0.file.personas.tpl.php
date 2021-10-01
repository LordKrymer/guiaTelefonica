<?php
/* Smarty version 3.1.39, created on 2021-09-29 21:01:29
  from 'C:\xampp\htdocs\guiaTelefonica\templates\personas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6154b809037ae5_10017109',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'daf288d13e5395f4c59d0f25f216825477de96cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\guiaTelefonica\\templates\\personas.tpl',
      1 => 1632942087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6154b809037ae5_10017109 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="border border-3 p-3 row">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['personas']->value, 'persona');
$_smarty_tpl->tpl_vars['persona']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['persona']->value) {
$_smarty_tpl->tpl_vars['persona']->do_else = false;
?>
        <div class="col-4   ">
            <a href="">
                <div class="border border-1 mb-2 text-center">
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
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div><?php }
}

<?php /* Smarty version 2.6.11, created on 2015-08-27 00:50:36
         compiled from custom/include/SugarFields/Fields/Photo/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugarvar', 'custom/include/SugarFields/Fields/Photo/EditView.tpl', 1, false),array('modifier', 'default', 'custom/include/SugarFields/Fields/Photo/EditView.tpl', 2, false),)), $this); ?>
<input type="hidden" id="old_<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
" name="old_<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
" value="{$fields[<?php echo smarty_function_sugarvar(array('key' => 'name','stringFormat' => true), $this);?>
].value}"/>
<input id="<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
" name="<?php echo smarty_function_sugarvar(array('key' => 'name'), $this);?>
" type="file" title='<?php echo $this->_tpl_vars['vardef']['help']; ?>
' size="<?php echo ((is_array($_tmp=@$this->_tpl_vars['displayParams']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 30) : smarty_modifier_default($_tmp, 30)); ?>
" <?php if (! empty ( $this->_tpl_vars['vardef']['len'] )): ?>maxlength='<?php echo $this->_tpl_vars['vardef']['len']; ?>
'<?php elseif (! empty ( $this->_tpl_vars['displayParams']['maxlength'] )): ?>maxlength="<?php echo $this->_tpl_vars['displayParams']['maxlength']; ?>
"<?php else: ?>maxlength="255"<?php endif; ?> value="{$fields[<?php echo smarty_function_sugarvar(array('key' => 'name','stringFormat' => true), $this);?>
].value}" <?php echo $this->_tpl_vars['displayParams']['field']; ?>
>
{if !empty(<?php echo smarty_function_sugarvar(array('key' => 'value','string' => true), $this);?>
)}
    <img src='cache/images/thumb/{$fields.<?php echo $this->_tpl_vars['displayParams']['id']; ?>
.value}_<?php echo smarty_function_sugarvar(array('key' => 'value'), $this);?>
' style="max-height: 150px;">
{/if}
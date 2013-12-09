<div class='form-group {$f_error}'>
<label class='col-sm-2 control-label {$f_error} {$f_required}' for='{$f_id}'>{$f_label}</label>
<div class='col-sm-6'>

<select name='{$f_name}' id='{$f_id}' class='form-control' >
{foreach $f_options as $k=>$v}

	<option value='{$k}' {if ($k==$f_value || $v==$f_value)} selected='selected'{/if}>{$v}</option>
{/foreach}
</select>
</div>
{if $f_msg}<span class="help-block">{$f_msg}</span>{/if}
</div>
<div class='form-group {$f_error}'>
<label class='col-sm-2 control-label {$f_error} {$f_required}' for='{$f_id}'>{$f_label}</label>
<div class='col-sm-6'>
	<div class='btn-group' data-toggle='buttons'>
	{foreach $f_options as $k=>$v}
		<label class='btn btn-default  {if ($k==$f_value || $v==$f_value)} active{/if}'>
			<input type='radio' name='{$f_name}' id='{$k}' value='{$v}' {if ($k==$f_value || $v==$f_value)} checked='checked'{/if}>
			{$v}
		</label>
	{/foreach}
	</div>
</div>
{if $f_msg}<span class="help-block">{$f_msg}</span>{/if}
</div>
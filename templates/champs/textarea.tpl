<div class='form-group {$f_error}'>
	<label class='col-sm-2 control-label {$f_error} {$f_required}' for='{$f_id}'>{$f_label}</label>
	<div class='col-sm-6'>
		{if $f_error}
		<div class='input-group'>
		{/if}
		<textarea name='{$f_name}' class='form-control {$f_error} {$f_required}' id='{$f_id}'>{$f_value}</textarea>
		{if $f_error}
			<span class='input-group-addon'><span class='glyphicon glyphicon-exclamation-sign'></span></span>		
		</div>
		{/if}		
		
	</div>
	{if $f_msg}<span class="help-block">{$f_msg}</span>{/if}
</div>
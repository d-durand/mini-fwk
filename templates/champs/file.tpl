<div class='form-group {$f_error}'>
<label class='col-sm-2 control-label {$f_error} {$f_required}' for='{$f_id}'>{$f_label}</label>
<div class='col-sm-6'>
<input type='file' name='{$f_name}' id='{$f_id}' class='form-control'>
</div>
{if $f_msg}<span class="help-block">{$f_msg}</span>{/if}
</div>
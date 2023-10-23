<?php
 $label ??= "";
 $name ??= "";
 $type ??= "text";
 $value ??= "";

?>


<div class="form-group">
    <label for="<?=$name?>"> <?= $label ?> </label>
    <input  value="<?=$value?>" class="form-control" id="<?=$name?>" type="<?=$type?>" required name="<?=$name ?>" >
</div>

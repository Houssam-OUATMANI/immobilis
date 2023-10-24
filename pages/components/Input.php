<?php
 $label ??= "";
 $name ??= "";
 $type ??= "text";
 $value ??= "";
 $multiple ??= false;

?>
<div class="form-group">
    <label for="<?=$name?>"> <?= $label ?> </label>
    <?php  if($type === "textarea"): ?>
    <textarea class="form-control"   id="<?=$name?>"  name="<?=$name?>" > <?= $value?></textarea>
    <?php else: ?>
        <input
            <?= $multiple ?  "multiple" : "" ?>
            value="<?=$value?>"
            class="form-control"
            id="<?=$name?>"
            type="<?=$type?>"
            required
            name="<?=$name ?>"
        >
    <?php  endif; ?>
</div>


<form action="form-handler.php" method="post">

<?php

$nInput = 10;
for($i = 0; $i < $nInput; $i++ ){
    echo "<input type='text' name='my-input-$i'" . "[]" . "/><br>";
}
?>
<input type="submit">
</form>

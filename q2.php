<form method="POST">
    P: <input type="number" name="p"> 
    R: <input type="number" name="r"> 
    T: <input type="number" name="t">
    <button name="type" value="si">Simple Interest</button>
    <button name="type" value="ci">Compound Interest</button>
</form>

<?php
if(isset($_POST['type'])){
    $p = $_POST['p']; $r = $_POST['r']; $t = $_POST['t'];
    if($_POST['type'] == 'si') {
        echo "Simple Interest: " . ($p * $t * $r) / 100;
    } else {
        echo "Compound Interest: " . ($p * pow((1 + $r/100), $t) - $p);
    }
}
?>
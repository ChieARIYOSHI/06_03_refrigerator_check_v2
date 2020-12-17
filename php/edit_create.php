<?php
// var_dump($_POST);
// exit();

$edit_food_02 = $_POST['edit_food_02'];
$edit_food_04 = $_POST['edit_food_04'];
$edit_food_06 = $_POST['edit_food_06'];
$edit_food_08 = $_POST['edit_food_08'];

$write_data = "{$todo} {$deadline}\n";

$file = fopen('data/todo.txt', 'a');
// var_dump($file);
// exit();

flock($file, LOCK_EX);
fwrite($file, $write_data);
flock($file, LOCK_UN);
fclose($file);

header('Location:todo_txt_input.php');
?>
<?php 
isset($_POST['submit']) ? $submit = $_POST['submit'] : $submit = '';
$nama = $_POST['name'];
$email = $_POST['email'];
$data1 = $_POST['alamat'];
$data2 = $_POST['umur'];
$message = $_POST['message'];

header("Location:https://api.whatsapp.com/send?phone=6282340058195&text=Halo%20saya%20".$nama."%0ASaya%20ingin%20".$data1."%0ADan%20Ingin".$data2."0A".$message."");
?>
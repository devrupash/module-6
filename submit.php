<?php
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
die('Please fill out all required fields.');
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
die('Invalid email format.');
}
$uploads_dir = 'uploads/';
if (!file_exists($uploads_dir)) {
mkdir($uploads_dir);
}
$filename = uniqid() . '_' . basename($_FILES['profile-pic']['name']);
$target_file = $uploads_dir . $filename;
if (move_uploaded_file($_FILES['profile-pic']['tmp_name'], $target_file)) {
echo 'Profile picture uploaded successfully.';
} else {
die('Error uploading file.');
}

$data = array($_POST['name'], $_POST['email'], $filename);
$fp = fopen('users.csv', 'a');
fputcsv($fp, $data);
fclose($fp);
session_start();

setcookie('name', $_POST['name'], time()+3600);
header('Location: show.php');
exit;

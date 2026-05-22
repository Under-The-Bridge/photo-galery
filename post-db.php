<?php
require "conn.php";

$title = $_POST["title"] ?? false;
$image = $_FILES["image"] ?? false;

$imagename = $image["name"];
$sql = "INSERT INTO `post` (`title`, `image`) VALUES ('$title','$imagename')";

$query = mysqli_query($conn, $sql);
if ($query) {
    $path = "images/$imagename";
    $temp = $image["tmp_name"];
    move_uploaded_file($temp, $path);
    echo "<script>
        alert(\"Добавлено!\");
        location.href='/';
        </script>";
}
?>
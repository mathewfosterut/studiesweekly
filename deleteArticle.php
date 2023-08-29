<?php
include 'connect.php';
DBconnect();

$deleteArticle = "DELETE FROM articles where id ='" .$_GET["id"]. "'";

if (mysqli_query($connection, $deleteArticle)) {
    echo "Article deleted Successfully";
} else {
    echo "Error deleting article: " .mysqli_error($connection);
}

mysqli_close($connection);

echo '<p><a href="index.php">Article List</a></p>'
?>
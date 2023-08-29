<?php
    include 'connect.php';
    DBconnect();
    
    $articleTitle=$_POST['articleTitle'];
    $articleBody=$_POST['articleBody'];
    $articleAuthor=$_POST['articleAuthor'];
    $articleDate=$_POST['articleDate'];
    
    mysqli_query($connection,"insert into `articles` (articleTitle,articleBody,articleAuthor,articleDate) values ('$articleTitle','$articleBody','$articleAuthor','$articleDate')");
    header('location:index.php');
     
?>
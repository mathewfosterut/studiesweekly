<?php
    function DBconnect() {
        global $connection;

        $connection = mysqli_connect("localhost", "root", "", "education");

        if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
        }
    }
?>
<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "jualsepatu";

$conn = mysqli_connect("$server", "$username", "$password", "$db");

if (!$conn) {
    mysqli_connect_error($conn);
};

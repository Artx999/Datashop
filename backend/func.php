<?php

// Checks if a value is true or false
function trueOrFalse($i) {
    if ($i) return "true";
    else return "false";
}

// Queries the DB with
function dbQuery($sql, $database = "datashop", $server = "localhost", $username="root", $password="") {
    $connection = new mysqli($server, $username, $password, $database);
    if ($connection -> connect_error) return false;
    else return $connection -> query($sql);
}

function dbInsertOrder($sql, $database = "datashop", $server = "localhost", $username="root", $password="") {
    $connection = new mysqli($server, $username, $password, $database);
    if ($connection -> connect_error) return false;
    else {
        $connection -> query($sql);
        return $connection -> insert_id;
    }
}
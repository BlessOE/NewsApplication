<?php

function verifyUsers()
{
    if (!isset($_POST['email']) or !isset($_POST['password'])) {
        return;  // <-- return null;  
    }

    $db = new SQLite3('C:\xampp\Data\news.db');
    // WE HAVE A SECURITY PROBLEM HERE
    // because we are using _POST vars directly from the form, a bad user could inject code here
    // I explain this to you once
    // we'd need to "work" with this vars before using it in a query, but for a first approach to PHP is enough
    $stmt = $db->prepare('SELECT * FROM user WHERE email=:email AND password=:password');
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT); //what is SQLITE3_TEXT???

    // we are going to see what $rows have
    //die(print_r($stmt));

    // Is a type of SQLITE, defined in SQLite3 class
    // DOC: https://www.php.net/manual/en/sqlite3stmt.bindvalue.php
    $result = $stmt->execute();

    // TESTING
    // die stop a routine
    // var_dump or print_r show the content of a var/object, etc
    //die(print_r($result)); 
    // NO, this STOPS all and show what $result has
    // NO, result is: SQLiteResult object() 1
    // and I don't know why result object is empty
    $rows_array = [];
    while ($row = $result->fetchArray()) {
        $rows_array[] = $row;
    }
    return $rows_array;
}


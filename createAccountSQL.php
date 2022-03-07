<?php

function createAccount()
{

    $created = false; //this variable is used to indicate the creation is successfull or not
    $db = new SQLite3('C:\xampp\Data\news.db'); // db connection - get your db file here. Its strongly advised to place your db file outside htdocs. 
    $sql = 'INSERT INTO user (user_id, first_name, last_name, email, city, password, date_of_birth) VALUES (:userId, :firstName, :lastName, :email, :city, :password, :dateOfBirth)';
    $stmt = $db->prepare($sql); //prepare the sql statement

    //give the values for the parameters
    $stmt->bindParam(':userId', $_POST['userId'], SQLITE3_INTEGER); //we use SQLITE3_TEXT for text/varchar. You can use SQLITE3_INTEGER or SQLITE3_REAL for numerical values
    $stmt->bindParam(':firstName', $_POST['firstName'], SQLITE3_TEXT);
    $stmt->bindParam(':lastName', $_POST['lastName'], SQLITE3_TEXT);
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':city', $_POST['city'], SQLITE3_TEXT);
    $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);
    $stmt->bindParam(':dateOfBirth', $_POST['dateOfBirth'], SQLITE3_TEXT);

    //execute the sql statement
    $stmt->execute();

    //the logic
    if ($stmt) {
        $created = true;
    }

    return $created;
}

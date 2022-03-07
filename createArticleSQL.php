<?php

function createArticle()
{

    $created = false; //this variable is used to indicate the creation is successfull or not
    $db = new SQLite3('C:\xampp\Data\news.db'); // db connection - get your db file here. Its strongly advised to place your db file outside htdocs. 
    $sql = 'INSERT INTO article (article_id, time_posted, date_posted, author_first_name, author_last_name, title, content, located_city) VALUES (:article_id, :time_posted, :date_posted, :author_first_name, :author_last_name, :title, :content, :located_city)';
    $stmt = $db->prepare($sql); //prepare the sql statement

    //give the values for the parameters
    $stmt->bindParam(':articleId', $_POST['articleId'], SQLITE3_INTEGER); //we use SQLITE3_TEXT for text/varchar. You can use SQLITE3_INTEGER or SQLITE3_REAL for numerical values
    $stmt->bindParam(':timePosted', $_POST['timePosted'], SQLITE3_INTEGER);
    $stmt->bindParam(':datePosted', $_POST['datePosted'], SQLITE3_INTEGER);
    $stmt->bindParam(':authorFirstName', $_POST['authorFirstName'], SQLITE3_TEXT);
    $stmt->bindParam(':authorLastName', $_POST['authorLastName'], SQLITE3_TEXT);
    $stmt->bindParam(':title', $_POST['title'], SQLITE3_TEXT);
    $stmt->bindParam(':content', $_POST['content'], SQLITE3_TEXT);
    $stmt->bindParam(':locatedCity', $_POST['locatedCity'], SQLITE3_TEXT);

    //execute the sql statement
    $stmt->execute();

    //the logic
    if ($stmt) {
        $created = true;
    }

    return $created;
}

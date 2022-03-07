<?php
    if(isset($_POST['submit'])) {
        $file = $_FILES['file'];

        // gathers and stores the data of the uploaded file

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        // seperates the extention from the name of the file

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        // verification of what file can be uploaded
        
        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActualExt, $allowed)) {
            if($fileError === 0) {
                if($fileSize < 10000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("location: article.php?uploadsuccess");
                } else {
                    echo "Your file is too big!";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }

    }


// this file was created following this tutorial: https://www.youtube.com/watch?v=JaRq73y5MJk
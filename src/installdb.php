<?php

try {
    $conn = new PDO(
        "mysql:host=localhost",
        "root",
        "secure",
        [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
    );
    $sql = file_get_contents("data/init.sql");
    $conn->exec($sql);
    echo "Table Users created successfully";
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

?>
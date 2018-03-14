<?php
$servername = "localhost";
$username = "root";
$password = "";
$arr = [];
// table creation
/*try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE me (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        address VARCHAR(50),
        postalcode INT,
        city VARCHAR(50),
        email VARCHAR(50),
        telephone INT,
        birthdate TIMESTAMP
        )";
    $conn->exec($sql);
    echo "Database created successfully<br>";
}
catch(PDOException $e)
{
    echo  $e->getMessage();
}*/

try {
    $sql = "SELECT * FROM me";
    $conn = new PDO("mysql:host=$servername;dbname=mydb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM me");
    $stmt->execute();
    $result = $conn->query($sql);
    }
catch(PDOException $e)
    {
    echo  $e->getMessage();
    }
    echo "db connected";
$valuex = strcmp($value['id'], [string]);
$arr = [$result];
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
}

foreach ($arr as $key => $valuex) {
    echo "Key: $key; Value: $valuex<br />\n";
}

?>
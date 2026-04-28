<?php
class db{
    function connection()
    {
        $db_host="localhost";
        $db_user="root";
        $db_password="";
        $db_name="practice";

        $connection = new mysqli($db_host, $db_user,$db_password, $db_name);
        if($connection->connect_error)
        {
            die("Please Connect the Database".$connection->connect_error);
        }
        return $connection;
    }
    function registration($connection, $tablename, $name, $mail, $web, $comment, $gender)
    {
        $sql = "INSERT INTO ".$tablename."(name, mail, web, comment, gender) VALUES ('".$name."', '".$mail."', '".$web."', '".$comment."', '".$gender."')";
        $result = $connection->query($sql);
        return $result;
    }
}

?>
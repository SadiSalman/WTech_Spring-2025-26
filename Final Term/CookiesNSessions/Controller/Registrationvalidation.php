<?php
$name="";
$mail="";
$web="";
$comment="";
$gender="";

$validMail="";
$validWeb="";

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $web = $_POST["web"];
    $comment = $_POST["comment"];

    $name = $_REQUEST["name"];
    $mail = $_REQUEST["mail"];
    $web = $_REQUEST["web"];
    $comment = $_REQUEST["comment"];

    if(isset($_REQUEST["gender"])) 
    {
        $gender = $_REQUEST["gender"];
    }

    if(!empty($name) && strlen($name) >= 5) {
        echo"Name: ".$name."<br>";
        
        $_SESSION["name"] = $name;
        setcookie("name", $name, time()+2592000, "/");
    } 
    else 
    {
        echo"Name must be greater than 5 characters<br>";
    }
    if(!empty($mail)) 
    {
        $pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        if(preg_match($pattern, $mail)) 
        {
            $validMail = $mail;
            echo"Email: " . $validMail . "<br>";
            
            $_SESSION["mail"] = $validMail;
            setcookie("mail", $validMail, time() + 2592000, "/");
        }
        else
        {
            echo"Invalid Email Format<br>";
        }
    } 
    else
    {
        echo"Email is required<br>";
    }
    if(!empty($web)) 
    {
       $pattern="/\b(?:https?:\/\/|www\.)\S+\.\S+\b/i";
        if(preg_match($pattern, $web)) 
        {
            $validWeb = $web;
            echo"Website: " . $validWeb . "<br>";
            
            $_SESSION["web"] =$validWeb;
            setcookie("web", $validWeb, time() + 2592000, "/");
        }
        else 
        {
            echo"Invalid Website URL<br>";
        }
    } 
    
    if(!empty($comment)){
        echo"Comment: " . $comment . "<br>";

        $_SESSION["comment"] = $comment;
        setcookie("comment", $comment, time() + 2592000, "/");
    }
    if(!empty($gender)) 
    {
        echo"Gender: " . $gender . "<br>";
        $_SESSION["gender"] =$gender;
        setcookie("gender", $gender, time() + 2592000, "/");
    } 
    else{
        echo"Gender is required<br>";
    }
    
    if (!empty($validName) && !empty($validMail) && !empty($validWeb) && !empty($comment) && !empty($gender)) {
        echo "Registration Successful<br>";
    }
}

 if(isset($_SESSION["name"]) || isset($_SESSION["mail"]) || isset($_SESSION["web"]) || isset($_SESSION["comment"]) || isset($_SESSION["gender"]))
{
    echo "Welcome Back, " . ($_SESSION["name"] ?? $_COOKIE["name"]);
} 
else 
{
    echo "Please log in again!";
}

?>
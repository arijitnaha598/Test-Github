<?php
 session_start();

if(isset($_SESSION['is_login'])){
    include("./includes/gen_navbar.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap icon cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Boostrap css cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <title>
        <?php 
        //Dynamic page name setup
        $filename= basename($_SERVER['PHP_SELF'],'.php');
        //page first letter in capital (using ucfirst() function)
        //_ soranor jonno str_replace function use
        $page_titel= ucfirst(str_replace("_"," ",$filename));
        //Index page titel change to Dashboard
        if($page_titel === "Index"){
            echo "Dashboard";
        }else{
            echo $page_titel;
        }

        ?>
    </title>
</head>
<body>
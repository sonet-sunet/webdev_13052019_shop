<?php 
    session_start();
    include('functions.php');
    include('config/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$headerConfig['title']?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <?php foreach( $headerConfig['css'] as $cssPath ): ?>
        <link rel="stylesheet" href="/styles/<?=$cssPath?>">
    <?php endforeach; ?>
    
</head>
<body>
    <div class="wrapper">
        <header>
            <a class="logo" href="/"></a>
            <nav>
                <a href="/catalog.php?id=1">Мужчинам</a>
                <a href="/catalog.php?id=2">Женщинам</a>
                <a href="/catalog.php?id=3">Детям</a>
            </nav>
            <a href="#" class="user">Привет, Вячеслав</a>
            <a href="/basket.php" class="basket">Корзина (<span>0</span>)</a>
        </header>
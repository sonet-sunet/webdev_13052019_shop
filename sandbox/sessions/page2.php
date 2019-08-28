<?php  
    session_start();
    // unset($_SESSION['count']); - удаление информации из сессии
    if( empty( $_SESSION['count'] ) ){
        $_SESSION['count'] = 1;    
    }else{
        $_SESSION['count']++;    
    }

    echo $_SESSION['count'];
?>
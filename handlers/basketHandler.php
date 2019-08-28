<?php
    session_start();

    if( empty( $_SESSION['basket'] ) ){
        $_SESSION['basket'] = [];     
    }

    if( !empty( $_GET['id'] ) ){
/*
        0=>['id'=>1, 'quntity'=>2],
        1=>['id'=>2, 'quntity'=>2],
*/
        $is_find = false;
        foreach( $_SESSION['basket'] as $key=>$basketItem ){
            if( $_GET['id'] == $basketItem['id'] ){
                $_SESSION['basket'][$key]['quantity']++;    
                $is_find = true; 
            }
        }

        if( $is_find == false ){
            $_SESSION['basket'][] = [
                'id'=>$_GET['id'],
                'quantity'=>1
            ];
        }
        
    }

    $quantity = 0;
    foreach( $_SESSION['basket'] as $basketItem ){
        $quantity = $quantity + $basketItem['quantity'];    
    }

    echo $quantity;

?>
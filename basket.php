<?php 
$headerConfig = [
    'title'=> 'Корзина',
    'css'=>['style.css', 'basket.css', 'pe-icon-7-stroke.css', 'font-awesome.css']
];
include('parts/header.php'); 
// unset($_SESSION['basket']);
d($_SESSION['basket']);

$template = [
    'basket'=>[]
];
if( !empty( $_SESSION['basket'] ) ){
    foreach( $_SESSION['basket'] as $basketItem ){
        $sql_basket_item = "SELECT * FROM products WHERE id={$basketItem['id']}";
        $result_basket_item = mysqli_query($db, $sql_basket_item);
        $data_basket_item = mysqli_fetch_assoc($result_basket_item);
        $data_basket_item['quantity'] = $basketItem['quantity'];
        $data_basket_item['full_price'] = $basketItem['quantity'] * $data_basket_item['price'];
        $template['basket'][] = $data_basket_item;
    }

    d($template);
}
?>
<h1>Корзина<h1>
<?php
$footerConfig = [
    'scripts'=>['script.js', 'basket.js']
];
include('parts/footer.php'); 
?>
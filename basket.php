<?php 
$headerConfig = [
    'title'=> 'Корзина',
    'css'=>['style.css', 'basket.css']
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
<div class="container">
    <div class="container-text">
        <h1>Ваша корзина</h1>
        <p>Товары резервируются на ограниченное время</p>
    </div>
    <div class="container-box">
        <div class="container-box-left">
            <p>Фото</p>
            <p>Наименование</p>
        </div>
        <div class="container-box-right">
            <p>Размер</p>
            <p>Количество</p>
            <p>Стоимость</p>
            <p>Удалить</p>
        </div>
    </div>
    <div class="container-line"></div>
    <div class="container-content">
        <div class="container-content-left">
            <div class="container-content-left-id"><?=$data_basket_item['id']?></div>
            <div class="container-content-left-pic" style="background-image:url(<?=$data_basket_item['img1']?>)"></div>
            <div class="container-content-left-text">
                <p><?=$data_basket_item['name']?></p>
                <p>арт. <?=$data_basket_item['sku']?></p>
            </div>
        </div>
        <div class="container-content-right">
            <div class="container-content-right-size"><?=$data_basket_item['size']?></div>
            <div class="container-content-right-quantity"><?=$data_basket_item['quantity']?></div>
            <div class="container-content-right-price"><?=$data_basket_item['full_price']?> руб.</div>
            <div class="container-content-right-delete"></div>
        </div>
    </div>
</div>
<?php
$footerConfig = [
    'scripts'=>['script.js', 'basket.js']
];
include('parts/footer.php'); 
?>
<?php 
$headerConfig = [
    'title'=> 'Карточка товара',
    'css'=>['style.css', 'product.css', 'pe-icon-7-stroke.css', 'font-awesome.css']
];
include('parts/header.php'); 

if( empty ( $_GET['id'] ) ){
    header('Location: /catalog.php?id=1');
}

$sql_product = "SELECT * FROM products WHERE id = {$_GET['id']}";
$result_product = mysqli_query($db, $sql_product);
$product_data = mysqli_fetch_assoc($result_product);

$template = [
    'id' => $product_data['id'],
    'photo'=>$product_data['img1'],
    'name'=>$product_data['name'],
    'sku'=>$product_data['sku'],
    'price'=>$product_data['price'],
    'text'=>$product_data['text'],
    'size'=>[]
];

$sql_sizes = "
    SELECT sizes.*, products_sizes.quantity FROM sizes
    INNER JOIN products_sizes ON products_sizes.size_id = sizes.id
    WHERE products_sizes.product_id = {$_GET['id']}
    ORDER BY sizes.priority
";

$result_sizes = mysqli_query($db, $sql_sizes);
while( $row = mysqli_fetch_assoc($result_sizes) ){
    $template['size'][] = $row;   
}
d($template);
?>
<div class="product">
    <div class="product-photo" style="background-image:url(<?=$template['photo']?>)"></div>
    <h1 class="product-name"><?=$template['name']?></h1>
    <div class="product-sku">Артикул: <?=$template['sku']?></div>
    <div class="product-price"><?=$template['price']?> руб.</div>
    <div class="product-text"><?=$template['text']?></div>
    <div class="product-size">
        <div class="product-size-text">Размер</div>
        <!-- https://bit.ly/3255uhn -->
        <div class="product-size-box">
            <?php foreach( $template['size'] as $sizeItem ): ?>
                <div class="product-size-box-item <?=($sizeItem['quantity'] == 0) ? 'no' : '' ?>"><?=$sizeItem['name']?></div>
            <?php endforeach;?>
        </div>
    </div>
    <button data-id="<?=$template['id']?>" class="product-addtocart">Добавить в корзину</button>
</div>
<?php 
$footerConfig = [
    'scripts'=>['script.js', 'product.js']
];
include('parts/footer.php');
?>
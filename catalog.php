<?php 
$headerConfig = [
    'title'=> 'Каталог',
    'css'=>['style.css', 'catalog.css', 'pe-icon-7-stroke.css', 'font-awesome.css']
];
include('parts/header.php'); 

$template=[
    'name' => 'Мужчинам',
    'id'   => 1
];

if( !empty( $_GET['id'] ) ){
    $catalog_id = $_GET['id'];

    $sql_catalog = "SELECT * FROM catalogs WHERE id = {$catalog_id}";
    $result_catalog = mysqli_query( $db, $sql_catalog );

    $data_catalog = mysqli_fetch_assoc($result_catalog);

    if( $data_catalog ){
        $template['name'] = $data_catalog['name'];
        $template['id'] = $data_catalog['id'];
    }
}

?>
<!-- Здесь будут выводится данные -->
<div data-catalog-id="<?=$template['id']?>" class="catalog">
    <h1 class="catalog__h1"><?=$template['name']?></h1>
    <p class="catalog__p">Все товары</p>
    <div class="catalog-box">
        <div class="catalog-box-filters"></div>
        <div class="catalog-box-products"></div>
        <div class="catalog-box-pagination">
            <!-- <a href="#" class="catalog-box-pagination-item active">1</a>
            <a href="#" class="catalog-box-pagination-item">2</a>
            <a href="#" class="catalog-box-pagination-item">3</a>
            <a href="#" class="catalog-box-pagination-item">4</a> -->
        </div>
        <div class="catalog-box-preloader">Загрузка</div>
    </div>
    
</div>
<?php 
$footerConfig = [
    'scripts'=>['script.js', 'catalog.js']
];
include('parts/footer.php'); 
?>
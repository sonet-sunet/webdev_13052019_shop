<?php include('parts/header.php');?>
<div class='row align-items-center'>
    <div class="col-8">
        <h1>Адмнистративная часть сайта</h1>
    </div>
    <div class="col-4">
        <?php if( !empty( $_SESSION['auth'] ) && $_SESSION['auth']=='Y' ): ?>
        <div class="auth">
            <a class="btn btn-danger" href="/admin/exit.php">Выйти</a>
        </div>
        <?php else: ?>
            <div class="not-auth">
                <a class="btn btn-primary" href="/admin/auth.php">Авторизация</a>
                <a class="btn btn-success" href="/admin/reg.php">Регистрация</a>
            </div>
        <?php endif;?>
    </div>
</div>
<?php if( !empty( $_SESSION['auth'] ) && $_SESSION['auth']=='Y' ): ?>
    <div class="row">
        <div class="col-4">
            <nav class="nav flex-column">
                <a class="nav-link active" href="/admin">Главная</a>
                <a class="nav-link" href="/admin/orders.php">Заказы</a>
                <a class="nav-link" href="/admin/product.php">Добавить товар</a>
            </nav>
        </div>
        <div class="col-8">
            <?php
                $products = []; 
                $sql_products = "SELECT * FROM products";
                $result_products = mysqli_query($db, $sql_products);

                while( $row = mysqli_fetch_assoc($result_products) ){
                    $products[] = $row;   
                }
            ?>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Название</th>
                        <th scope="col">Цена</th>
                        <th scope="col">SKU</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $products as $product_item ): ?>
                        <tr>
                            <td scope="row"><a href='/admin/product.php?id=<?=$product_item['id']?>'><?=$product_item['id']?></a></td>
                            <td><?=$product_item['name']?></td>
                            <td><?=$product_item['price']?> руб.</td>
                            <td><?=$product_item['sku']?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning" role="alert">
                Для доступа к админке необходимо авторизироваться
            </div>
        </div>
    </div>
<?php endif;?>
<?php include('parts/footer.php');?>
    

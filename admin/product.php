<?php 
    include('parts/header.php');
    $template = [];

    if( !empty( $_SESSION['auth'] ) && $_SESSION['auth']=='Y' ){
        if( isset( $_POST['do'] ) && $_POST['do'] == 'edit' ){
            $sql_update = "
                UPDATE products
                SET 
                    name = '{$_POST['name']}',
                    price = '{$_POST['price']}',
                    img1 = '{$_POST['img1']}',
                    sku = '{$_POST['sku']}',
                    text = '{$_POST['text']}'
                WHERE id = {$_POST['id']}
            ";

            $result_update = mysqli_query( $db, $sql_update );

            if( $result_update ){
                echo "Успешно";
            }
        }

        if( !empty( $_GET['id'] ) ){
            $sql_product = "SELECT * FROM products WHERE id = {$_GET['id']}";
            $result_product = mysqli_query($db, $sql_product);

            $template = mysqli_fetch_assoc($result_product);

            d($template);
        }else{
            //Логика добавления товара в БД
            if( isset( $_POST['do'] ) && $_POST['do'] == 'new' ){
                $sql_new_product = "
                    INSERT INTO products (id, name, price, img1, sku, text)
                    VALUE
                    (NULL, '{$_POST['name']}', {$_POST['price']}, 
                        '{$_POST['img1']}', '{$_POST['sku']}', '{$_POST['text']}') 
                ";
                $result_new_product = mysqli_query($db, $sql_new_product);

                if( $result_new_product ){
                    $id = mysqli_insert_id($db);

                    $sql_new_catalog_product = "
                        INSERT INTO products_catalogs (id, catalog_id, product_id)
                        VALUE (NULL, {$_POST['catalog_id']}, {$id})
                    ";
                    echo $sql_new_catalog_product;
                    
                    $result_new_catalog_product = mysqli_query($db, $sql_new_catalog_product);
                    header("Location: /admin/product.php?id={$id}");
                }
            }
        }  
    }else{
        header('Location: /admin/auth.php');
    }

?>
<div class="row">
    <div class="col-8">
        <?php if( !empty( $template ) ): ?>
            <h1>Редактирование товара</h1>
            <form method="POST">
                <input type="hidden" name="do" value="edit">
                <div class="form-group">
                    <input type="text" readonly class="form-control" name="id" value="<?=$template['id']?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="name" value="<?=$template['name']?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="price" value="<?=$template['price']?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="img1" value="<?=$template['img1']?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="sku" value="<?=$template['sku']?>">
                </div>
                <div class="form-group">
                    <textarea name="text" class="form-control"><?=$template['text']?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Изменить</button>
            </form>
    <?php else:?>
        <h1>Новый товар</h1>
        <form method="POST">
            <input type="hidden" name="do" value="new">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Название">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="price" placeholder="Цена">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="img1" placeholder="Путь до картинки">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="sku" placeholder="SKU">
            </div>
            <div class="form-group">
                <textarea name="text" class="form-control" placeholder="Описание"></textarea>
            </div>
            <div class="form-group">
                    <select class="form-control" name="catalog_id">
                        <option value="1">Мужское</option>
                        <option value="2">Женское</option>
                        <option value="3">Детям</option>
                    </select>
                </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>    
    <?php endif;?>
    </div>
</div>
<?php include('parts/footer.php'); ?>
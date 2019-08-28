<?php 
    include ('../config/db.php');
    include ('../parts/functions.php');
    $response = [
        'products'=>[],
        'pagination'=>[
            'countPage'=>4,
            'nowPage'=>1
        ],
        'error'=>[
            'isError'=>true,
            'message'=>'Не передан id-каталога'
        ],
        'sql'=>''
    ];
    $product_on_page = 3;
    $now_page = 1;
    if( !empty($_GET['id']) ){
        $response['error']['isError'] = false;
        $response['error']['message'] = 'OK';
        
        $sql_products = "
            SELECT products.* FROM products
            JOIN products_catalogs ON products_catalogs.product_id = products.id
            WHERE products_catalogs.catalog_id = {$_GET['id']}
        ";

        $result_products = mysqli_query($db, $sql_products);
        $count_products = mysqli_num_rows($result_products);

        $count_page = ceil($count_products / $product_on_page);

        if( !empty( $_GET['numPage'] ) ){
            $now_page = $_GET['numPage'];
        }

        $response['pagination']['countPage'] = $count_page;
        $response['pagination']['nowPage'] =  $now_page;

        $start_row = ($now_page-1) * $product_on_page;

        $sql_products_pagintaion = "
            SELECT products.* FROM products
            JOIN products_catalogs ON products_catalogs.product_id = products.id
            WHERE products_catalogs.catalog_id = {$_GET['id']}
            LIMIT {$start_row}, {$product_on_page}
        ";

        $response['sql'] = $sql_products_pagintaion;

        $result_products_pagintaion = mysqli_query($db, $sql_products_pagintaion);
        while($productRow = mysqli_fetch_assoc($result_products_pagintaion)){
            $response['products'][] = $productRow;    
        }
    }
    // sleep(3);
    echo json_encode($response);

?>
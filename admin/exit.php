<?php 
    include('parts/header.php');
    if( !empty( $_SESSION['auth'] ) ){
        unset( $_SESSION['auth'] );
        unset( $_SESSION['autn_user_info'] );
    }

    header('Location: /admin/index.php');
?>


<?php 
    include('parts/footer.php');
?>
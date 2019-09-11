<?php 
    include('parts/header.php');

    if( isset( $_POST['email'] ) ){
        $pass = crypt( $_POST['pass'], SECRET_WORD );

        $sql_manager = "
            SELECT * FROM managers 
            WHERE email = '{$_POST['email']}' AND password = '{$pass}'
        ";
        $sql_result = mysqli_query($db, $sql_manager);

        if( mysqli_num_rows( $sql_result ) > 0 ){
            echo "Авторизация прошла успешно";
            $_SESSION['auth'] = 'Y';
            $_SESSION['autn_user_info'] = mysqli_fetch_assoc( $sql_result );

            header('Location: /admin/index.php');
        }else{
            echo "Логин или пароль не верен";
        }
    }
?>
<h1>Авторизация</h1>
<form method="POST">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="pass" placeholder="Password">
    <button type="submit">Войти</button>
</form>
<?php include('parts/footer.php');?>
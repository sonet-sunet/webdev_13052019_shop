<?php 
    include('parts/header.php');
    
    if( isset( $_POST['fio']) ){
        $pass = crypt( $_POST['pass'], SECRET_WORD );

        $sql_manager = "
            INSERT INTO managers (id, email, phone, position, fio, password)
            VALUE 
            (NULL, '{$_POST['email']}', '{$_POST['phone']}', '{$_POST['position']}',
            '{$_POST['fio']}', '{$pass}'
            )
        ";

        $sql_result = mysqli_query($db, $sql_manager);

        if( $sql_result ){
            echo "Вы добавлены в систему";
        }else{
            echo "Произошла ошибка";
        }
    }
?>
<div class="row">
    <div class="col-12"><h1>Страница регистрации</h1></div>
</div>
<div class="row">
    <div class="col-6">
        <form method="POST">
        <div class="form-group">
            <input class="form-control" type="text" name="fio" placeholder="ФИО">
        </div>
        <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input class="form-control" type="tel" name="phone" placeholder="Phone">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="position" placeholder="Должность">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="pass" placeholder="Пароль">
        </div>
        <button class="btn btn-primary" type="submit">Зарегестрироваться</button>
        </form>
    </div>
</div>
<?php include('parts/footer.php');?>
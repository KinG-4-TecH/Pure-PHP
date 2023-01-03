<?php
    error_reporting(0);
    session_start();

    include $_SERVER['DOCUMENT_ROOT'] . '/init.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include $tpl . 'proccess.php';
    }
?>

<div class="container d-flex justify-content-center align-items-center mt-5">
    <form action="" method="post">
        <input type="text" class="form-control mb-2" name="username" placeholder="username">
        <input type="password" class="form-control mb-2" name="password" placeholder="Password">
        <div class="d-flex justify-content-center align-items-center mb-2">
            <input type="submit" name="login" value="login" class="btn btn-secondary ">
        </div>
        <?php echo $login_error ; ?>
    </form>
</div>

<?php
    include $tpl . 'footer.php';
?>
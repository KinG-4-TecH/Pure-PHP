<?php
    error_reporting(0);

    include $_SERVER['DOCUMENT_ROOT'] . '/init.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include $tpl . 'proccess.php';
    }
?>

<div class="container d-flex justify-content-center align-items-center mt-5">
    <form action="" method="post">
        <input type="text" class="form-control mb-2" name="username" placeholder="username">
        <input type="email" class="form-control mb-2" name="email_address" placeholder="Email address">
        <input type="password" class="form-control mb-2" name="password" placeholder="Password">
        <input type="password" class="form-control mb-2" name="confirm_password" placeholder="Confrim password">
        <div class="d-flex justify-content-center align-items-center mb-2">
            <input type="submit" name="signup" value="Signup" class="btn btn-secondary ">
        </div>
        <?php echo $signup_error ; ?>
    </form>
</div>

<?php
    include $tpl . 'footer.php';
?>
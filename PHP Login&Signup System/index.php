<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/init.php';
?>

<div class="container d-flex justify-content-center align-items-center mt-5">
    <?php if(!isset($_SESSION['user_id'])) :  ?>
    <a href="/login.php" class="btn btn-secondary m-2">login</a>
    <a href="/signup.php" class="btn btn-secondary">Signup</a>
    <?php 
        elseif(isset($_SESSION['user_id'])) : 
        $username = get_user_username($conn, $_SESSION['user_id']);
        $email = get_user_email($conn, $_SESSION['user_id']);
    ?>
    <h1>Welcome <?php echo $username ; ?></h1>
    <a href="/signout.php" class="btn btn-secondary m-2">logout</a>
    <?php endif ; ?>
</div>


<?php
    include $tpl . 'footer.php';
?>
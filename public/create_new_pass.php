<?php
require_once('../private/initialize.php');

$selector = $_GET['selector'] ?? '';
$validator = $_GET['validator'] ?? '';
?>

<?php $page_title = 'new password'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <div class="Email">

        <form action="<?php echo url_for('reset_pass.php'); ?>" method="post">
            <dl>
                <dt></dt>
                <dd><input type="hidden" name="selector" value="<?php echo $selector;?>" /></dd>
            </dl>

            <dl>
                <dt></dt>
                <dd><input type="hidden" name="validator" value="<?php echo $validator;?>" /></dd>
            </dl>
            <dl>
                <dt>Enter new Password:</dt>
                <dd><input type="password" name="pass"  /></dd>
            </dl>
            <dl>
                <dt>Repeat new password</dt>
                <dd><input type="password" name="pass-repeat"  /></dd>
            </dl>

            <div id="operations">
                <span><a href="forgot_pw.php">forgot password?</a></span>
                <span><a href="new.php">Sign up</a></span>
                <br/><br/>
                <input type="submit" value="Login" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

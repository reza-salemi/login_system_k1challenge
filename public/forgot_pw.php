<?php
require_once('../private/initialize.php');
?>

<?php $page_title = 'Recovery email'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">


  <div class="users new">
    <h1>Reset your password</h1>
    <p>An email will be send you with instructions on how to reset your password</p>
    <form method="post" action="../private/phpmailer/index.php">
      <dl>
        <dt>User Name:</dt>
        <dd><input type="text" name="email" value="" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Recovery" />
       </div>
    </form>

  </div>

</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>

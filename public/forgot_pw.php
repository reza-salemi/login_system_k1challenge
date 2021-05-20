<?php

require_once('../private/initialize.php');

if(is_post_request()) {


  $email = $_POST['email'] ?? '';

  $result = select_email($email);

  $to = $result['email'];
  $subject= "Recover Password";
  $message = "Your password is " .$result['password'];
  if(mail($to,$subject,$message)){
      echo "Your password send sucessfully";
  }
}

?>

<?php $page_title = 'Recovery email'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">


  <div class="users new">
    <h1>Create users</h1>

    <form action="<?php echo url_for('forgot_pw.php'); ?>" method="post">

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

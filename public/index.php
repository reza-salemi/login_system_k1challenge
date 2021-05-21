<?php

require_once('../private/initialize.php');

if(is_post_request()) {

  $users = [];
  $users['username'] = $_POST['username'] ?? '';
  $users['password'] = $_POST['password'] ?? '';

  select_user($users);

}

?>

<?php $page_title = 'Login'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">


  <div class="users new">
    <h1>Login</h1>

    <form action="<?php echo url_for('index.php'); ?>" method="post">

      <dl>
        <dt>User Name:</dt>
        <dd><input type="text" name="username" value="" /></dd>
      </dl>

      <dl>
        <dt>Password:</dt>
        <dd><input type="password" name="password" value="" /></dd>
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

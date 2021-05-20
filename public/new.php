<?php

require_once('../private/initialize.php');

if(is_post_request()) {

  $users = [];
  $users['username'] = $_POST['username'] ?? '';
  $users['firstname'] = $_POST['firstname'] ?? '';
  $users['lastname'] = $_POST['lastname'] ?? '';
  $users['email'] = $_POST['email'] ?? '';
  $users['password'] = $_POST['password'] ?? '';
  $users['number'] = $_POST['number'] ?? '';

  $result = insert_user($users);
  if($result === true) {

  } else {
    $errors = $result;
  }

}
else {
    $users = [];
    $users['username'] = '';
    $users['firstname'] = '';
    $users['lastname'] = '';
    $users['email'] = '';
    $users['number'] = '';
}

?>

<?php $page_title = 'Create users'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">


  <div class="users new">
    <h1>Create users</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('new.php'); ?>" method="post">

      <dl>
        <dt>User Name:</dt>
        <dd><input type="text" name="username" value="" /></dd>
      </dl>

      <dl>
        <dt>Password:</dt>
        <dd><input type="password" name="password" value="" /></dd>
      </dl>

      <dl>
        <dt>First_name:</dt>
        <dd><input type="text" name="firstname" value="" /></dd>
      </dl>

      <dl>
        <dt>Last_name:</dt>
        <dd><input type="text" name="lastname" value="" /></dd>
      </dl>

      <dl>
        <dt>Email:</dt>
        <dd><input type="text" name="email" value="" /></dd>
      </dl>

      <dl>
        <dt>number</dt>
        <dd><input type="text" name="number" value="" /></dd>
      </dl>

      <div id="operations">
         <span><a href="index.php">Sign in</a></span>
        <input type="submit" value="Create users" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

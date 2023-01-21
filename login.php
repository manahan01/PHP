<?php require "includes/header.php"; ?>
<?php require "config.php" ?>

<?php
//session access
if(isset($_SESSION['username'])){
  header("location:index.php");
}

//check data for the submit
if(isset($_POST['submit'])){
  if($_POST['email'] == '' OR $_POST['password'] == ''){
    echo 'some input are empty!';
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];
//take the data and do the query
$login = $conn->query("SELECT * FROM users WHERE email = '$email'");
//execute the query
$login->execute();

//fetch the data
$data = $login->fetch(PDO::FETCH_ASSOC);

//check for the rowCount
if ($login->rowCount() > 0 ) {
  //use password_verify function
  if(password_verify($password, $data['mypassword'])){
   $_SESSION['username'] = $data['username'];
   $_SESSION['email'] = $data['email'];
    header("location:index.php");

  } else {
    echo "email or password wrong!";
  }
} else {
  echo "email or password wrong!";
}

  }
}
?>

<main class="form-signin w-50 m-auto">
  <form method="post" action="">
    <!-- <img class="mb-4 text-center" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mt-5 fw-normal text-center">Please sign in</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <h6 class="mt-3">Don't have an account  <a href="register.php">Create your account</a></h6>
  </form>
</main>
<?php require "includes/footer.php"; ?>

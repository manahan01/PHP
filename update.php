<?php require "includes/header.php" ?>
<?php
require "conn.php";

if(isset($_GET['upd_id'])){
    $id = $_GET['upd_id'];
    $data = $conn->query("SELECT * FROM tasks WHERE id = '$id'");
    $rows = $data->fetch(PDO::FETCH_OBJ);

if(isset($_POST['action'])){
    $task = $_POST['mytask'];
    $update = $conn->prepare("UPDATE tasks SET name = :name WHERE id = '$id'");
    $update->execute([':name' => $task]);
    header("location:index.php");
}
}
?>

<?php if(isset($_SESSION['username'])): ?>

<form method="POST" action="update.php?upd_id=<?php echo $rows->id; ?>" class="form-inline" id="user_form">
		 
         <div class="form-group mx-sm-3 mb-2">
           <label for="inputPassword2" class="sr-only">create</label>
           <input name="mytask" type="text" class="form-control" id="task" placeholder="enter task..." autofocus value="<?php echo $rows->name; ?>">
         </div>
          <input type="hidden" name="action" id="action" /> 
           <input type="submit" name="button_action" id="button_action" class="btn btn-primary" value="Update" />
       </form>
       <?php else: ?>
<?php header("location:login.php"); ?>
<?php endif; ?>
<?php require "includes/footer.php" ?>
<?php
   include("database/db.php");

   if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $result = mysqli_query($conn, "SELECT * FROM task WHERE  id = '$id'")
         or die("Error in the edit");
      if (mysqli_num_rows($result) == 1) {
         $row = mysqli_fetch_array($result);
         $title = $row['title'];
         $description = $row['description'];
      }
   }

   if (isset($_POST['update'])) {
      $id = $_GET['id'];
      $title = $_POST['title'];
      $description = $_POST['description'];
      mysqli_query($conn, "UPDATE task SET title = '$title', description = '$description' WHERE id = '$id'")
         or die("Error in update");
      $_SESSION['message'] = "Task updated succesfully";
      $_SESSION['message_type'] = "success";
      header("Location: index.php");
   }
?>

<?php include("includes/header.php"); ?>
<div class="container p-4">
   <div class="row">
      <div class="col-md-4 mx-auto">
         <div class="card card-body">
            <form action="edit_task.php?id=<?= $_GET['id']; ?>" method="POST">
               <div class="form-group">
                  <input type="text" name="title" value="<?= $title; ?>"
                     class="form-control" placeholder="Update Title">
               </div>
               <div class="form-group">
                  <textarea name="description" rows=2 class="form-control"
                     placeholder="Update Description"><?= $description; ?></textarea>
               </div>
               <input type="submit" name="update" value="Update" class="btn btn-success btn-blocke">
            </form>
         </div>
      </div>
   </div>
</div>

<?php include("includes/footer.php"); ?>

<!--

-->
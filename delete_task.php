<?php
   include("database/db.php");

   if (isset($_GET['id'])) {
      $id = $_GET['id'];
      mysqli_query($conn, "DELETE FROM task WHERE id = '$id'")
         or die('Error in delete');
         $_SESSION['message'] = "Task removed successfully";
         $_SESSION['message_type'] = "danger";
      header("Location: index.php");
   }
?>
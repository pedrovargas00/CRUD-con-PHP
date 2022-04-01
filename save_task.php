<?php
   include("database/db.php");

   if (isset($_POST['save_task'])) {
      $title = $_POST['title'];
      $description = $_POST['description'];

      $result = mysqli_query($conn, "INSERT INTO task (title, description) VALUES ('$title', '$description')")
         or die("Error in the query");
      $_SESSION['message'] = "Task saved succesfully";
      $_SESSION['message_type'] = "success";
      header("Location: index.php");
   }
?>
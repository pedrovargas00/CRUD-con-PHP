<?php 
   include("database/db.php");
   include("includes/header.php");
?>

   
      <div class="container p-4">
         <?php if (isset($_SESSION['message'])) { ?>
               <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                  <?= $_SESSION['message']; ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
         <?php session_unset(); } ?>
         <div class="row">
            <div class="col-md-4">
               <div class="card card-body">
                  <form action="save_task.php" method="POST">
                     <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                     </div>
                     <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
                     </div>
                     <input type="submit" name="save_task" value="Save Task" class="btn btn-success btn-block">
                  </form>
               </div>
            </div>
            <div class="col-md-8">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $result = mysqli_query($conn, "SELECT * FROM task");

                        while ($row = mysqli_fetch_array($result)) {?>
                           <tr>
                              <td><?= $row['title']; ?></td>
                              <td><?= $row['description']; ?></td>
                              <td><?= $row['created_at']; ?></td>
                              <td>
                                 <a href="edit_task.php?id=<?= $row['id']; ?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                                 <a href="delete_task.php?id=<?= $row['id']; ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                              </td>
                           </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      
   </body>
<?php include("includes/footer.php"); ?>
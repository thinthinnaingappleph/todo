<?php
require'config.php';
if ($_POST) {
  $id=$_POST['id'];
  $title =$_POST['title'];
  $desc=$_POST['description'];
  $pdostatement = $pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id'");
  $result = $pdostatement->execute();
  if($result){
    echo "<script>alert('New ToDo is updated');window.location.href='index.php';</script>";
  }
}else {
  $pdostatement=$pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
  $pdostatement->execute();
  $result =$pdostatement->fetchAll();
  // print"<pre>";
  // print_r($result[0]['id']);
}
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Edit New</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
   <body>
     <div class="card">
       <div class="card-body">
        <h2>Edit New ToDo</h2>
        <form class="" action="" method="post">
          <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
          <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?>" required>
          </div>
          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control" rows="8" cols="80"><?php echo $result[0]['description'] ?></textarea>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="" value="UPDATE">
            <a href="index.php" type="button" class="btn btn-warning">Back</a>
          </div>
        </form>
       </div>
     </div>
   </body>
 </html>

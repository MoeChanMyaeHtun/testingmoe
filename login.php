 <?php
  include_once './init.php';

  $errors = [];

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!$email) {
      $errors['email'] = 'The email is required.';
    }
    if (!$password) {
      $errors['password'] = 'The password is required.';
    }

    if (count($errors) == 0) {
      $sql = "SELECT * FROM customer WHERE `email`='$email' and `password`='$password'";
      $result = mysqli_query($connection, $sql);

      if ($user = mysqli_fetch_assoc($result)) {
        $_SESSION['auth'] = [
          'id' => $user['id'],
          'name' => $user['name'],
          'email' => $user['email'],
        ];
        redirect('./index.php');
      }
    }
  }
  ?>
 <?php include 'header.php' ?>
 <style>
   body {
     background-image: url(./bg.jpg);
   }

   .page {
     border: 2px double #FFD0B6;
     width: 500px;
     margin: auto;
     text-align: center;
     padding-top: 10px;
     margin-top: 100px;
     color: white;
   }

   .container {

     padding-bottom: 10px;

   }

   #box {
     border-radius: 15px;
     border: 2px double #FFB6E5;
     margin: auto;
     margin-bottom: 10px;


   }

   #box1 {
     border: 2px double #FFB6E5;

   }

   .checkbox {
     text-align: left;
     padding-top: 4px;
   }
 </style>


 <div class="page">
   <h2 class="title">login</h2> <br>
   <div class="container">
     <div class="row">

       <div class=" col-md-12 mx-auto">
         <div class="container">
           <form method="POST" class="form-horzontal">

             <div class="col-md-12">

               <input type="email" name="email" class=" form-control" id="box" placeholder=" Enter email" value="<?php echo isset($email) ? $email : '' ?>" />
               <label class="text-danger"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?> </label>

             </div>
             <div class="col-md-12">
               <input type="password" name="password" class=" form-control" id="box" placeholder=" Enter your Password" value="<?php echo isset($password) ? $password : '' ?>" />
               <label class="text-danger"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?> </label>
             </div>
             <div class="checkbox">
               <label><input type="checkbox" id="checkbox"> Remember me</label>

             </div>
             <div class="col-md-6" style="margin: auto;">
               <button type="submit" class="btn btn-info "  value="submit">Login</button>
             </div>
           </form>
           <br>
           <div><a href="./register.php">
               <p style="text-align:right">Creat account</p>
             </a></div>
         </div>
       </div>
     </div>
   </div>

 </div>
 <?php include 'footer.php' ?>
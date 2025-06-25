<?php
include_once('config.php');

if(isset($_POST['submit'])){
    $password=$_POST['password'];
    $email=$_POST['email'];

    $sql = "INSERT INTO users1 (password, email) VALUES (:password, :email)";
    $sqlQuery=$conn->prepare($sql);
    $sqlQuery->bindParam(':email',$email);
    $sqlQuery->bindParam(':password',$password);
    header("location:dashboard.php");
    $sqlQuery->execute();

    echo "data saved";
}







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
</head>
<body>
    <div id="content" class="flex">
   <div class="">
     
      <div class="page-content page-container" id="page-content">
         <div class="padding">
            <div class="row">
               <div class="col-md-6">
                  <div class="card">
                     <div class="card-header"><strong>Create your account</strong></div>
                     <div class="card-body">
                        <form action="login.php" method="POST">
                           <form method="POST" action="login.php">
                            <input type="email" name="email" required>
                            <input type="password" name="password" required>
                            <button type="submit" name="submit">Create</button>
</form>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<style>


body {
    background-color: #f9f9fa;
}


.padding {
    padding: 5rem
}


.card {
    background: #fff;
    border-width: 0;
    border-radius: .25rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
    margin-bottom: 1.5rem
}


.card-header {
    background-color: transparent;
    border-color: rgba(160, 175, 185, .15);
    background-clip: padding-box
}

.card-body p:last-child {
    margin-bottom: 0
}

.card-hide-body .card-body {
    display: none
}

.form-check-input.is-invalid~.form-check-label,
.was-validated .form-check-input:invalid~.form-check-label {
    color: #f54394
}



</style>
</body>
</html>
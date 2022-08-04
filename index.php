<?php
session_start();
include 'dbconnect.php';
$email_err='';
$pws_err='';
$success='';
$error='';
if (isset($_POST['submit'])) {
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $pass=password_hash($password, PASSWORD_BCRYPT);
    $cpass=password_hash($cpassword, PASSWORD_BCRYPT);


    $query="Select * from register where email = '$email'";
    $run = mysqli_query($conn,$query);
    $row = mysqli_num_rows($run);
    if($row>0){
        $email_err="Email already Exist. Please try another email";
    }
    else if($password !==$cpassword){
        $pws_err="Password does not match";
    }
    else{
        $sql="insert into register (fname,email,password,cpassword) values ('$fname','$email','$pass','$cpass')";
        $run = mysqli_query($conn,$sql);
        if($run){
            $success="Registered Successfully";
        }
        else{
            $error="Unable to submit data. Please try again...";
        }
    }

}
    

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <script type="text/javaScript">
      function handlelogin1(){
          document.getElementById("div1").style.display='block';
          document.getElementById("div2").style.display='none'
        
      }
      function handlelogin2(){
          document.getElementById("div1").style.display='none';
          document.getElementById("div2").style.display='block'

      }
  </script>

    <title>Student Management System</title>
  </head>

  <body>
    <section>
      <p class="text-center text-warning "><?php echo @$$_SESSION['login_first'] ?></p>
      <h2 class="text-center text-danger pt-5 pb-3 font-weight-bold">
        Student Management System
      </h2>
      <h5 class="text-center text-danger pt-2 pb-1 font-weight-bold" id="spann">
        
      </h5>
      
      <!-- form container  -->
      <div class="container bg-danger" id="formsetting">
        <h3 class="text-white text-center py-3">
          Admin Login | Regsiter Panel
        </h3>
        <!-- row starts here -->
        <div class="row">
          <div class="col-md-6 col-sm-4 col-12">
            <img
              src="./img/students.png"
              alt=""
              srcset=""
              class="img-fluid img-std"
            />
          </div>
          <div class="col-md-5 col-sm-5 col-12">
            <!-- Register form -->
            <div class="btns">
              <button class="btn btn-info px-5 mx-2" onclick="handlelogin1()">Register</button>
              <button class="btn btn-info px-5" onclick=handlelogin2()>Login</button>
            </div>
            <div id="div1" >
              <form action="" method="post">

                <div class="form-group my-2">
                  <label class="text-white" >Full Name</label>
                  <input
                    type="text"
                    name="fname"
                    placeholder="Enter your full name"
                    class="form-control"
                    required="required"
                  />
                </div>
                <div class="form-group my-3">
                  <label class="text-white" >Email</label>
                  <span class="float-right text-white font-weight-bold">
                    <?php echo $email_err ?>
                  </span>
                  <input
                    type="email"
                    name="email"
                    placeholder="Enter your Email"
                    class="form-control"
                    required="required"
                  />
                </div>
                <div class="form-group my-3">
                  <label class="text-white" >Password</label>
                  <input
                    type="new-password"
                    name="password"
                    placeholder="Enter your password"
                    class="form-control"
                    required="required"
                  />
                </div>
                <div class="form-group my-3">
                  <label class="text-white" >Confirm Password</label>
                  <span class="float-right text-white font-weight-bold">
                  <?php echo $pws_err ?>
                  </span>
                  <input
                    type="current-password"
                    name="cpassword"
                    placeholder="Enter your password again"
                    class="form-control"
                    required="required"
                  />
                </div>
                <input
                  type="submit"
                  value="Regsiter"
                  name="submit"
                  class="btn btn-success px-5 my-3"
                />
                <span class="float-right text-white font-weight-bold">
                <?php echo $success; echo $error ?>
                </span>
                <span class="float-right text-white font-weight-bold" id="spann"></span>
              </form>
            </div>
            <!-- Register form end-->
            <!-- Login form -->
            <div id="div2" style="display: none">
              <form action="" method="post">
                

                
                <div class="form-group my-3">
                  <label class="text-white" >Email</label>
                  <input
                    type="email"
                    name="email"
                    placeholder="Enter your Email"
                    class="form-control"
                  />
                </div>
                <div class="form-group my-3">
                  <label class="text-white" >Password</label>
                  <input
                    type="current-password"
                    name="password"
                    placeholder="Enter your password"
                    class="form-control"
                  />
                </div>
                <input
                  type="submit"
                  value="Login"
                  name="submit1"
                  class="btn btn-success px-5 my-3"
                />
              </form>
            </div>
            <!-- Login form ends -->
          </div>
        </div>
        <!-- row ends here -->
      </div>
      <!-- form container end  -->
    </section>
   
    <!-- JavaScript Bundle with Popper -->
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
  </body>
</html>


<?php
if (isset($_POST['submit1'])) {
    
    $email=$_SESSION['email']=$_POST['email'];
    $pwd=$_POST['password'];
    


    $sql="Select * from register where email = '$email'";
    $run = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($run);
    $pwd_fetch=$row['password'];
    $pwd_decode=password_verify($pwd,$pwd_fetch);
    if($pwd_decode){
        echo "<script>window.open('main.php')</script>";
    }
    else{
      echo "<script>document.getElementById('spann').innerText='Wrong password or email, try again'</script>";
  }
    

}
    

?>
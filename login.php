<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Login</h2>
          <ol>
            <li><a href="?p=home">Home</a></li>
            <li>Login</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container col-6"><h3>Login</h3><p>Connect to your account.</p></div><p></p>
      <div class="container col-5">
        <?php 
            if ($_POST["button"] == "สมัครสมาชิก"){
              $user_login = $conn -> real_escape_string($_POST['username']);
              $pwd_login = $_POST['txtpassword'];
              $sql = "SELECT Username, Password from account where Username='$user_login' and Password='$pwd_login'";
              $result = $conn->query($sql);
              if($result->num_rows > 0){
                $_SESSION['login_true'] = $user_login;
                echo '<div class="alert alert-success"> Login successful!!</div>'."<meta http-equiv='refresh' content='2 ;url=./?p=home'>";	
              }else{
                echo '<div class="alert alert-danger"> Username or email wrong!!!</div>'."<meta http-equiv='refresh' content='2 ;url=./?p=login'>";	
              }
              
            }
        ?>
        <form class="form-horizontal" method="post">
            <div class="form-horizontal">
                <label for="fName">Username</label>
                <input type="text" class="form-control" name="username" aria-describedby="" placeholder="Username" required>
            </div>
            <p></p>
            <div class="form-group">
                <label for="con-password">Password</label>
                <input type="password" class="form-control" name="txtpassword" aria-describedby="" placeholder="Password" required>
            </div>
            <p></p>
            <button type="submit" action="<?php echo $_SERVER['PHP_SELF'];?>" name="button" class="btn btn-success" value="สมัครสมาชิก" ><i class="icon-ok icon-white"></i>Login</button>
        </form>
      </div>
    </section>
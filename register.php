
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Register</h2>
          <ol>
            <li><a href="?p=home">Home</a></li>
            <li>Register</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <script>
function goBack() {
  window.history.back();
}
</script>
    <section class="inner-page">
        <div class="container col-6"><h3>Create your account</h3><p>fill your data in textbox.</p></div><p></p>
      <div class="container col-5">
        <?php 
            $password =  $_POST['txtpassword'];
            $conpassword = $_POST['txtcon-password'];
            if ($_POST["button"] == "สมัครสมาชิก"){
                if ($password != $conpassword) {
                    echo 'รหัสไม่ตรงกัน';
                }else{ 
                    $sql = "INSERT INTO member (First_Name, Last_Name, Email, tel, Address) 
                    VALUES ('".$_POST["fName"]."', '".$_POST["lName"]."','".$_POST["email"]."','".$_POST["tel"]."','".$_POST["address"]."')";
                    $sql_email = "SELECT * from member WHERE Email = '".$_POST["email"]."'";
                    $sql_username = "SELECT * from account WHERE Username = '".$_POST["username"]."'";                    
                    if ($conn->query($sql_email)->num_rows > 0){
                        echo "มีอีเมล์ในระบบแล้ว"."<br><a href = ".'javascript:history.back()'.">Back to previous page</a>";
                        exit();
                    }else if($sql_username ->num_rows > 0){
                        echo "มีชื่อผู้ใช้งานนี้ในระบบแล้ว"."<br><a href = ".'javascript:history.back()'.">Back to previous page</a>";
                        exit();
                    }else if ($conn->query($sql) === TRUE) {
                        $sql_member = "SELECT * FROM member WHERE Email = '".$_POST["email"]."'";
                        $result = $conn->query($sql_member);
                        if($result->num_rows > 0){
                            $row = $result->fetch_assoc();
                            $sql_ac = "INSERT INTO account(Username,Password,Member_id) VALUES ('".$_POST["username"]."','".$password."','".$row["Member_id"]."')";
                            $conn->query($sql_ac);
                        }

                        echo '<div class="alert alert-success"> Register successful!!</div>'."<meta http-equiv='refresh' content='2 ;url=./?p=login'>";	
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }                  
                }
            }
        ?>
        <form class="form-horizontal" method="post">
            <div class="form-horizontal">
                <label for="fName">Firstname</label>
                <input type="text" class="form-control" name="fName" aria-describedby="" placeholder="ex. Somchai" required>
            </div>
            <p></p>
            <div class="form-horizontal">
                <label for="lNAme">Lastname</label>
                <input type="text" class="form-control" name="lName" aria-describedby="" placeholder="ex. Sabaidee" required>
            </div>
            <p></p>
            <div class="form-group">
                <label for="Birthdate">Date of birth</label>
                <input type="date" class="form-control" name="BirthDate" aria-describedby="" required>
            </div>
            <p></p>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="" placeholder="yourmail@example.com" required>
            </div>
            <p></p>
            <div class="form-group">
                <label for="tel">Tel</label>
                <input type="text" class="form-control" name="tel" aria-describedby="" placeholder="091xxxxxxx" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
            </div>
            <p></p>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" aria-describedby="" placeholder="Address" required>
            </div>
            <p></p>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" aria-describedby="" placeholder="Username" required>
            </div>
            <p></p>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="txtpassword" aria-describedby="" placeholder="Password" required >
            </div>
            <p></p>
            <div class="form-group">
                <label for="con-password">Confirm Password</label>
                <input type="password" class="form-control" name="txtcon-password" aria-describedby="" placeholder="Confirm Password" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Accept</label>
            </div>
            <button type="submit" action="<?php echo $_SERVER['PHP_SELF'];?>" name="button" class="btn btn-warning" value="สมัครสมาชิก" ><i class="icon-ok icon-white"></i>Register</button>
        </form>
      </div>
    </section>
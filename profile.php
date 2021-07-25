
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Profile</h2>
          <ol>
            <li><a href="?p=home">Home</a></li>
            <li>Profile</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-left">
          <h2>Profile</h2>
        </div>
		<?php
			if($_POST["button"]=="change"){
				if($_POST['Password'] == $_POST['conPass']){
						$sql = "UPDATE account SET Password = '".$_POST['Password']."' WHERE UID ='".$dbarr['UID']."'";
						$conn->query($sql);
						echo '<div class="alert alert-success"> Change password successful!!</div>';	
				}else{
					echo '<div class="alert alert-danger"> Password doesnt match!!</div>';	
				}
			}
			$sql = "SELECT * FROM member JOIN account ON account.Member_id = member.Member_id WHERE UID ='".$dbarr['UID']."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		?>
        <form method="post">
        <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="row" data-aos="fade-down" data-aos-delay="200">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" class="form-control" name = "fName" value="<?php echo $dbarr["First_Name"];?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" class="form-control" name = "lNAme"  value="<?php echo $dbarr["Last_Name"];?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" class="form-control" name = "Email"  value="<?php echo $dbarr["Email"];?>" disabled>
                        </div>
                    </div>
        </div>
        <div class="row" data-aos="fade-down" data-aos-delay="200">
                     <div class="col-md-9">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" name = "Address" value="<?php echo $dbarr["Address"];?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tel</label>
                          <input type="text" class="form-control" name = "Tel"  value="<?php echo $dbarr["tel"];?>" disabled>
                        </div>
                    </div>
        </div>
        <div class="row" data-aos="fade-down" data-aos-delay="200">
                     <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control" name = "Username" value="<?php echo $dbarr["Username"];?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">New Password</label>
                          <input type="password" class="form-control" name = "Password"  value="<?php echo $row["Check_in"];?>">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Comfirm Password</label>
                          <input type="password" class="form-control" name = "conPass"  value="<?php echo $row["Check_in"];?>">
                        </div><br>
                    </div>
                    <div class="text-center"><button class="btn btn-success" type="submit" name="button" value="change">Change Profile</button></div>
        </div>
        
    </form>
      </div>
    </section><!-- End Portfolio Section -->

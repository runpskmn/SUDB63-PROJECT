<div class="content">
        <div class="container-fluid">
            <?php
                if($_POST["button"] == "update"){
                    $sql = "UPDATE member 
                    SET First_Name = '".$_POST["fName"]."', Last_Name = '".$_POST["lName"]."', Email = '".$_POST["Email"]."', Address = '".$_POST["Address"]."', tel = '".$_POST["Tel"]."'
                    WHERE Member_id ='".$_GET["edit"]."'";
                    $conn->query($sql);
            ?>
              <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Success - </b> Update succesful!!</span>
              </div>
            <?php
                }
                $sql = "SELECT * FROM member WHERE Member_id = '".$_GET["edit"]."'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            ?>
          <div class="row">
            <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active show" href="?p=member" data-toggle="tab">
                            <i class="material-icons">person</i> Member
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="?p=member&add=1" data-toggle="tab">
                            <i class="material-icons">add</i> Add Member
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Member ID (disabled)</label>
                          <input type="text" class="form-control" name="memID" value="<?php echo 'M'; echo $row["Member_id"];?>"disabled>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fist Name</label>
                          <input type="text" class="form-control" name = "fName" value="<?php echo $row["First_Name"];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" class="form-control" name = "lName"  value="<?php echo $row["Last_Name"];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" class="form-control" name = "Address" value="<?php echo $row["Address"];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" class="form-control" name = "Email"  value="<?php echo $row["Email"];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tel.</label>
                          <input type="text" class="form-control" name = "Tel" value="<?php echo $row["tel"];?>">
                        </div>
                      </div>
                    </div>
                    
                    <a  class="btn btn-info pull-right" name="button2" onclick="window.location.href='?p=member'">Back</a>
                    <button type="submit" class="btn btn-primary pull-right" name="button" value="update">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
<div class="content">
        <div class="container-fluid">
            <?php
                if($_POST["button"] == "update"){
                    $sql = "UPDATE account 
                    SET Username = '".$_POST["Username"]."', Password = '".$_POST["Password"]."', status = '".$_POST["status"]."', Member_id = '".$_POST["Member_id"]."'
                    WHERE UID ='".$_GET["edit"]."'";
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
                $sql = "SELECT * FROM account WHERE UID = '".$_GET["edit"]."'";
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
                          <a class="nav-link active show" href="?p=account" data-toggle="tab">
                            <i class="material-icons">people</i> Account
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="?p=account&add=1" data-toggle="tab">
                            <i class="material-icons">add</i> Add Account
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
                          <label class="bmd-label-floating">UID (disabled)</label>
                          <input type="text" class="form-control" name="UID" value="<?php echo $row["UID"];?>"disabled>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control" name = "Username" value="<?php echo $row["Username"];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="text" class="form-control" name = "Password"  value="<?php echo $row["Password"];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status (CUS = Customer, ADM = Admin)</label>
                          <input type="text" class="form-control" name = "status"  value="<?php echo $row["status"];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Member_id</label>
                          <select name="Member_id" class="form-control" id="Memberid" required>
                            <option value="<?php echo $row["Member_id"];?>"><?php echo $row["Member_id"];?></option>
                            <?php 
                              $query = "SELECT * FROM member";
                              $result2 = $conn->query($query);
                              while($r = $result2->fetch_array()) { 
                            ?>
                              <option value="<?php echo $r["Member_id"];?>"><?php echo $r["Member_id"] . " - " . $r["First_Name"];?></option>
                            <?php } ?>  
                          </select>
                        </div>
                      </div>
                    </div>
                    
                    <a  class="btn btn-info pull-right" name="button2" onclick="window.location.href='?p=account'">Back</a>
                    <button type="submit" class="btn btn-primary pull-right" name="button" value="update">Update Account</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            member
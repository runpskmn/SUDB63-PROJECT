           <div class="content">
        <div class="container-fluid">
        <?php
            if($_POST["button"] == "insert"){
              $sql = "INSERT INTO account (Username, Password, status, Member_id) 
                    VALUES ('".$_POST["Username"]."', '".$_POST["Password"]."','".$_POST["status"]."','".$_POST["Memberid"]."')";
              $conn->query($sql);
        ?>
            <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Success - </b> Insert new account successful!!</span>
        </div>
         <?php } ?>
          <div class="row">
            <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link" href="?p=account" data-toggle="tab">
                            <i class="material-icons">people</i> Account
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="?p=account&add=1" data-toggle="tab">
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
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="Username" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="text" name="Password" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select name="status" class="form-control" id="status" required>
                            <option > </option>
                            <option value="CUS">Customer</option>
                            <option value="ADM">Admin</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Member_id</label>
                          <select name="Memberid" class="form-control" id="Memberid" required>
                            <option> </option>
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
                    
                    <button type="submit" name="button" value="insert" class="btn btn-primary pull-right">Add Account</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
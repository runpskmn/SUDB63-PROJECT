<div class="content">
        <div class="container-fluid">
            <?php
                if($_POST["button"] == "update"){
                    $sql = "UPDATE Books 
                    SET Bookdate = '".$_POST["Bookdate"]."', Check_in = '".$_POST["Check_in"]."', Check_out = '".$_POST["Check_out"]."', UID = '".$_POST["UID"]."', Deposit = '".$_POST["Deposit"]."'
                    , status = '".$_POST["status"]."' WHERE Books_id ='".$_GET["edit"]."'";
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
                $sql = "SELECT * FROM Books WHERE Books_id = '".$_GET["edit"]."'";
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
                          <a class="nav-link active show" href="?p=books" data-toggle="tab">
                            <i class="material-icons">touch_app</i> Books
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="?p=books&add=1" data-toggle="tab">
                            <i class="material-icons">add</i> Add Books
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
                          <label class="bmd-label-floating">Books_id (disabled)</label>
                          <input type="text" class="form-control" name="Books_id" value="<?php echo $row["Books_id"];?>"disabled>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bookdate</label>
                          <input type="date" class="form-control" name = "Bookdate" value="<?php echo $row["Bookdate"];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Check_in</label>
                          <input type="datetime" class="form-control" name = "Check_in"  value="<?php echo $row["Check_in"];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Check_out</label>
                          <input type="datetime" class="form-control" name = "Check_out" value="<?php echo $row["Check_out"];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select name="status" class="form-control" id="status" required>
                          <option value="<?php echo $row["status"];?>"><?php echo $row["status"];?></option>
                          <option value="0">Unpaid</option>
                          <option value="1">Paid</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Deposit</label>
                          <input type="text" class="form-control" name = "Deposit"  value="<?php echo $row["Deposit"];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">UID</label>
                            <select name="UID" class="form-control" id="UID" required>
                              <option value="<?php echo $row["UID"]; ?>"><?php echo $row["UID"]; ?></option>
                              <?php 
                                $query = "SELECT * FROM account JOIN member ON account.Member_id = member.Member_id";
                                $result2 = $conn->query($query);
                                while($r = $result2->fetch_array()) { 
                              ?>
                                <option value="<?php echo $r["UID"];?>"><?php echo $r["UID"] . " - " . $r["First_Name"];?></option>
                              <?php } ?>  
                            </select>
                        </div>
                      </div>
                    </div>
                    
                    <a  class="btn btn-info pull-right" name="button2" onclick="window.location.href='?p=books'">Back</a>
                    <button type="submit" class="btn btn-primary pull-right" name="button" value="update">Update Books</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
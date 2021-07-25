<div class="content">
        <div class="container-fluid">
            <?php
                if($_POST["button"] == "update"){
                  if($_POST["Books_id"] == 'NULL'){
                    $sql = "UPDATE room 
                    SET Room_type = '".$_POST["Room_type"]."', Room_remark = '".$_POST["Room_remark"]."', Room_price = '".$_POST["Room_price"]."', Books_id = NULL
                    WHERE Room_id ='".$_GET["edit"]."'";
                   }else{
                    $sql = "UPDATE room 
                    SET Room_type = '".$_POST["Room_type"]."', Room_remark = '".$_POST["Room_remark"]."', Room_price = '".$_POST["Room_price"]."', Books_id = '".$_POST["Books_id"]."'
                    WHERE Room_id ='".$_GET["edit"]."'";
                   }
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
                $sql = "SELECT * FROM room WHERE Room_id = '".$_GET["edit"]."'";
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
                          <a class="nav-link active show" href="?p=room" data-toggle="tab">
                            <i class="material-icons">domain</i> Room
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="?p=room&add=1" data-toggle="tab">
                            <i class="material-icons">add</i> Add Room
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
                          <label class="bmd-label-floating">Room_id (disabled)</label>
                          <input type="text" class="form-control" name="Room_id" value="<?php echo $row["Room_id"];?>"disabled>
                        </div>
                      </div>      
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Room_type</label>
                          <select name="Room_type" class="form-control">
                            <option value="<?php echo $row["Room_type"] ?>"><?php echo $row["Room_type"] ?></option>
                            <option value="STD">Standard</option>
                            <option value="DEL">Deluxe</option>	
                            <option value="SUI">Suite</option>
                          </select>
                        </div>
                      </div>
                    </div>  
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Room_remark</label>
                          <select name="Room_remark" class="form-control">
                            <option value="<?php echo $row["Room_remark"] ?>"><?php echo $row["Room_remark"] ?></option>
                            <option value="0">Available</option>
                            <option value="1">Unavailable</option>	
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Room_price</label>
                          <input type="text" class="form-control" name = "Room_price" value="<?php echo $row["Room_price"];?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Books_id</label>
                          <select name="Books_id" class="form-control" id="Books_id" required>
                            <option value="<?php if($row["Books_id"] != NULL){
                              echo $row["Books_id"];
                            }else{
                              echo 'NULL';
                            } ?>"><?php if($row["Books_id"] != NULL){
                              echo $row["Books_id"];
                            }else{
                              echo 'NULL';
                            } ?></option>
                            <?php 
                              $query = "SELECT * FROM account JOIN member ON account.Member_id = member.Member_id JOIN books ON books.UID = account.UID";
                              $result2 = $conn->query($query);
                              while($r = $result2->fetch_array()) { 
                            ?>
                              <option value="<?php echo $r["Books_id"];?>"><?php echo $r["Books_id"] . " - " . $r["First_Name"];?></option>
                            <?php } ?>  
                          </select>
                        </div>
                      </div>
                     </div>
                    
                    <a  class="btn btn-info pull-right" name="button2" onclick="window.location.href='?p=room'">Back</a>
                    <button type="submit" class="btn btn-primary pull-right" name="button" value="update">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
           <div class="content">
        <div class="container-fluid">
        <?php
            if($_POST["button"] == "insert"){
             if($_POST["Books_id"] == 'NULL'){
              $sql = "INSERT INTO Room (Room_id, Room_type, Room_remark, Room_price, Books_id) 
              VALUES ('".$_POST["Room_id"]."', '".$_POST["Room_type"]."','".$_POST["Room_remark"]."','".$_POST["Room_price"]."',NULL)";
             }else{
              $sql = "INSERT INTO Room (Room_id, Room_type, Room_remark, Room_price, Books_id) 
              VALUES ('".$_POST["Room_id"]."', '".$_POST["Room_type"]."','".$_POST["Room_remark"]."','".$_POST["Room_price"]."','".$_POST["Books_id"]."')";
             }
              $conn->query($sql);
        ?>
            <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Success - </b> Insert new room successful!!</span>
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
                          <a class="nav-link" href="?p=room" data-toggle="tab">
                            <i class="material-icons">domain</i> Room
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="?p=room&add=1" data-toggle="tab">
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
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Room_id</label>
                          <input type="text" name="Room_id" class="form-control" maxlength="4" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Room_type</label>
                          <select name="Room_type" class="form-control">
                            <option value="STD">Standard</option>
                            <option value="DEL">Deluxe</option>	
                            <option value="SUI">Suite</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Room_remark</label>
                          <select name="Room_remark" class="form-control">
                            <option value="0">Available</option>
                            <option value="1">Unavailable</option>	
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Room_price</label>
                          <input type="text" name="Room_price" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Books_id</label>
                          <select name="Books_id" class="form-control" id="Books_id" required>
                            <option value="NULL">NULL</option>
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
                    
                    <button type="submit" name="button" value="insert" class="btn btn-primary pull-right">Add Room</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
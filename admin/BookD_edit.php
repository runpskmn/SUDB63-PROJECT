<div class="content">
        <div class="container-fluid">
            <?php
                if($_POST["button"] == "update"){
                    $sql = "UPDATE Books_detail 
                    SET First_Name = '".$_POST["First_Name"]."', Last_Name = '".$_POST["Last_Name"]."', Age = '".$_POST["Age"]."', 
                    Sex = '".$_POST["Sex"]."', Books_id = '".$_POST["Books_id"]."'
                    WHERE ID ='".$_GET["edit"]."'";
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
                $sql = "SELECT * FROM Books_detail WHERE ID = '".$_GET["edit"]."'";
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
                          <a class="nav-link active show" href="?p=books_detail" data-toggle="tab">
                            <i class="material-icons">touch_app</i> Books Detail
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="?p=books_detail&add=1" data-toggle="tab">
                            <i class="material-icons">add</i> Add Books Detail
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
                          <label class="bmd-label-floating">ID (disabled)</label>
                          <input type="text" class="form-control" name="ID" value="<?php echo $row["ID"];?>"disabled>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Books ID</label>
                          <select name="Books_id" class="form-control" id="Books_id" required>
                            <option value="<?php echo $row["Books_id"];?>"><?php echo $row["Books_id"];?></option>
                            <?php 
                              $query = "SELECT * FROM books";
                              $result2 = $conn->query($query);
                              while($r = $result2->fetch_array()) { 
                            ?>
                              <option value="<?php echo $r["Books_id"];?>"><?php echo $r["Books_id"];?></option>
                            <?php } ?>  
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">First_Name</label>
                          <input type="text" class="form-control" name = "First_Name" value="<?php echo $row["First_Name"];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last_Name</label>
                          <input type="text" class="form-control" name = "Last_Name"  value="<?php echo $row["Last_Name"];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age</label>
                          <input type="text" class="form-control" name = "Age" value="<?php echo $row["Age"];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sex</label>
                          <input type="text" class="form-control" name = "Sex" value="<?php echo $row["Sex"];?>">
                        </div>
                      </div>
                    </div>
                   
                    
                    <a  class="btn btn-info pull-right" name="button2" onclick="window.location.href='?p=books_detail'">Back</a>
                    <button type="submit" class="btn btn-primary pull-right" name="button" value="update">Update Books Detail</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
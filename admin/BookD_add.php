<div class="content">
        <div class="container-fluid">
        <?php
            if($_POST["button"] == "insert"){
              
              $sql = "INSERT INTO Books_detail (Books_id, First_Name, Last_Name, Age, Sex) 
                    VALUES ('".$_POST["Books_id"]."', '".$_POST["First_name"]."','".$_POST["Last_Name"]."',
                    '".$_POST["Age"]."','".$_POST["Sex"]."')";
              $conn->query($sql);
        ?>
            <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Success - </b> Insert new Books Detail successful!!</span>
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
                          <a class="nav-link" href="?p=books_detail" data-toggle="tab">
                            <i class="material-icons">touch_app</i> Books Detail
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="?p=books_detail&add=1" data-toggle="tab">
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
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Books_id</label>
                          <select name="Books_id" class="form-control" id="Books_id" required>
                            <option> </option>
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
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First_Name</label>
                          <input type="text" name="First_name" class="form-control" maxlength="" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last_Name</label>
                          <input type="text" name="Last_Name" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age</label>
                          <select name="Age" class="form-control" id="Age" required>
                            <option value="Adult">Adult</option>
                            <option value="Children">Children</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sex</label>
                          <select name="Sex" class="form-control" id="Sex" required>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" name="button" value="insert" class="btn btn-primary pull-right">Add Books Detail</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
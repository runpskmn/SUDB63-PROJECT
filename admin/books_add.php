           <div class="content">
        <div class="container-fluid">
        <?php
            if($_POST["button"] == "insert"){
              $checkin = $_POST["Check_in"]." 12:00:00";
              $checkout = $_POST["Check_out"]." 12:00:00";
              $BID = "B".$_POST["Books_id"];
              $sql = "INSERT INTO Books (Books_id, Bookdate, Check_in, Check_out, Deposit, UID,status) 
                    VALUES ('".$BID."', '".$_POST["Bookdate"]."','".$checkin."','".$checkout."','".$_POST["Deposit"]."','".$_POST["UID"]."','".$_POST["status"]."')";
              $conn->query($sql);
        ?>
            <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Success - </b> Insert new Books successful!!</span>
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
                          <a class="nav-link" href="?p=books" data-toggle="tab">
                            <i class="material-icons">touch_app</i> Books
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="?p=books&add=1" data-toggle="tab">
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
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Books_id</label>
                          <input type="text" name="Books_id" class="form-control" maxlength="5" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Deposit</label>
                          <input type="text" name="Deposit" class="form-control" maxlength="" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">UID</label>
                          <select name="UID" class="form-control" id="UID" required>
                            <option> </option>
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
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bookdate</label>
                          <input type="date" name="Bookdate" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Check_in</label>
                          <input type="date" name="Check_in" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Check_out</label>
                          <input type="date" name="Check_out" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select name="status" class="form-control" id="status" required>
                          <option value="0">Unpaid</option>
                          <option value="1">Paid</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" name="button" value="insert" class="btn btn-primary pull-right">Add Books</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
           <div class="content">
        <div class="container-fluid">
        <?php
            if($_POST["button"] == "insert"){
              $sql = "INSERT INTO member (First_Name, Last_Name, Email, tel, Address) 
                    VALUES ('".$_POST["fname"]."', '".$_POST["lname"]."','".$_POST["email"]."','".$_POST["tel"]."','".$_POST["address"]."')";
              $conn->query($sql);
        ?>
            <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Success - </b> Insert new member successful!!</span>
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
                          <a class="nav-link" href="?p=member" data-toggle="tab">
                            <i class="material-icons">person</i> Member
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="?p=member&add=1" data-toggle="tab">
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
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fist Name</label>
                          <input type="text" name="fname" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" name="lname" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" name="address" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" name="email" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tel.</label>
                          <input type="text" name="tel" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" name="button" value="insert" class="btn btn-primary pull-right">Add Member</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
           <div class="content">
        <div class="container-fluid">
        <?php
            if($_POST["button"] == "insert"){
              $sql = "INSERT INTO payment (Payment_id, Payment_date, Vat, Bank, Books_id) 
                    VALUES ('".$_POST["Payment_id"]."', '".$_POST["Payment_date"]."','".$_POST["Vat"]."','".$_POST["txtBank"]."','".$_POST["Books_id"]."')";
              $conn->query($sql);
        ?>
            <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Success - </b> Insert new payment successful!!</span>
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
                          <a class="nav-link" href="?p=payment" data-toggle="tab">
                            <i class="material-icons">payment</i> Payment
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="?p=payment&add=1" data-toggle="tab">
                            <i class="material-icons">add</i> Add Payment
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
                          <label class="bmd-label-floating">Payment_id</label>
                          <input type="text" name="Payment_id" class="form-control" maxlength="5" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Payment_date</label>
                          <input type="date" name="Payment_date" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Vat</label>
                          <input type="text" name="Vat" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bank</label>
                          <select name="txtBank" class="form-control">
                            <option value="BBL">Bangkok Bank</option>
                            <option value="KTB">Krungthai Bank</option>	
                            <option value="KSB">Krungsri Bank</option>
                            <option value="TMB">TMB Bank Public Company Limited</option>
                            <option value="KBank">Kasikorn Bank</option>
                            <option value="SCB">Siam Commercial Bank</option>
                            <option value="OUB">OUB Bank</option>
                            <option value="GSB">Government Savings Bank</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Books_id</label>
                          <select name="Books_id" class="form-control" id="Books_id" required>
                            <option> </option>
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
                    
                    <button type="submit" name="button" value="insert" class="btn btn-primary pull-right">Add Payment</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
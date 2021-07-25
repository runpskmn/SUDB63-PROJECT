<div class="content">
        <div class="container-fluid">
            <?php
                if($_POST["button"] == "update"){
                    $sql = "UPDATE payment 
                    SET Payment_date = '".$_POST["Payment_date"]."', Vat = '".$_POST["Vat"]."', Bank = '".$_POST["txtBank"]."', Books_id = '".$_POST["Books_id"]."'
                    WHERE Payment_id ='".$_GET["edit"]."'";
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
                $sql = "SELECT * FROM payment WHERE Payment_id = '".$_GET["edit"]."'";
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
                          <a class="nav-link active show" href="?p=payment" data-toggle="tab">
                            <i class="material-icons">payment</i> Payment
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="?p=payment&add=1" data-toggle="tab">
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
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Payment_id (disabled)</label>
                          <input type="text" class="form-control" name="Payment_id" value="<?php echo $row["Payment_id"];?>"disabled>
                        </div>
                      </div>      
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Payment_date</label>
                          <input type="date" class="form-control" name = "Payment_date" value="<?php echo $row["Payment_date"];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Vat</label>
                          <input type="text" class="form-control" name = "Vat"  value="<?php echo $row["Vat"];?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bank</label>
                          <select name="txtBank" class="form-control">
                            <option value="<?php echo $row["Bank"] ?>"><?php echo $row["Bank"] ?></option>
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
                            <option value="<?php echo $row["Books_id"] ?>"><?php echo $row["Books_id"] ?></option>
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
                    
                    <a  class="btn btn-info pull-right" name="button2" onclick="window.location.href='?p=payment'">Back</a>
                    <button type="submit" class="btn btn-primary pull-right" name="button" value="update">Update Payment</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
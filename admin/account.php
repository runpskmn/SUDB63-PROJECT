<!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Account</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <?php if($_GET["add"] != "" ) {
        include("ac_add.php"); //'mem_add.php' edit to insert page file
      }elseif($_GET["edit"] != "" ){
        include("ac_edit.php"); //'mem_edit.php' edit to update page file
      }elseif($_GET["del"] != "" ) {
        include("ac_del.php"); //'mem_del.php' edit to delete page file
      }else{ ?>  <!-- below this is select page -->
      <div class="content">
        <div class="container-fluid">
        <?php if($_GET["delID"]!=""){ //delete sql command
            $sql = "DELETE FROM account WHERE UID ='".$_GET["delID"]."'";
            $result = $conn->query($sql);
            ?>
            <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Success - </b> Delete succesful!!</span>
            </div>
        <?php
            }
            if ($_POST["button"] == "search"){ //search sql command
                $sql = "SELECT * FROM account WHERE Username like '%". $_POST['searchTXT'] . "%' 
                OR Password like '%". $_POST['searchTXT'] . "%'
                OR status like '%". $_POST['searchTXT'] . "%'
                OR UID like '%". $_POST['searchTXT'] . "%'
                OR Member_id like '%". $_POST['searchTXT'] . "%'" ;
            }else{
            $sql = "SELECT * FROM account"; //select sql command
            }
            $result = $conn->query($sql);
        ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
              <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active show" href="?p=account" data-toggle="tab">
                            <i class="material-icons">people</i> Account
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="?p=account&add=1" data-toggle="tab">
                            <i class="material-icons">add</i> Add Account
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                      </ul>
                      <form class="navbar-form" method="post">
                      <div class="input-group no-border">
                        <input type="text" name="searchTXT" class="form-control" placeholder="Search...">
                        <button type="submit"  action="<?php echo $_SERVER['PHP_SELF'];?>" name="button" value="search" class="btn btn-white btn-round btn-just-icon">
                          <i class="material-icons">search</i>
                          <div class="ripple-container"></div>
                        </button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                <?php if ($result->num_rows <= 0) { 
                    echo 'Not found!';
                    exit();
                } ?>
                    
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                        UID
                        </th>
                        <th>
                         Username
                        </th>
                        <th>
                          Password
                        </th>
                        <th>
                         Status
                        </th>
                        <th>
                         Member ID
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                      <?php while($row = $result->fetch_array()) { 
                        if($row["status"] == 'CUS'){
                          $statust = 'Customer';
                        }else{
                          $statust = 'Admin';
                        }
                      ?>
                        <tr>
                          <td>
                            <?php echo $row["UID"];?>
                          </td>
                          <td>
                          <?php echo $row["Username"] ?>
                          </td>
                          <td>
                            <?php echo $row["Password"] ?>
                          </td>
                          <td>
                            <?php echo $statust ?>
                          </td>
                          <td class="text-primary">
                             <a href="?p=member&edit=<?php echo $row["Member_id"] ?>"><?php echo "M".$row["Member_id"] ?></a>
                          </td>
                          <td class="text-primary">
                          <a target="" href="?p=account&edit=<?=$row['UID'];?>"  class="btn btn-round btn-fill btn-warning"><i class="material-icons">edit</i> Edit<div class="ripple-container"></div></a>
                          <a target="" href="?p=account&del=<?=$row['UID'];?>" class="btn btn-round btn-fill btn-danger"><i class="material-icons">clear</i> Delete<div class="ripple-container"></div></a>
                          </td>
                        </tr>
                        <?php } ?> 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
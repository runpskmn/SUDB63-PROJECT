<!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Member</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <?php if($_GET["add"] != "" ) {
        include("mem_add.php"); //'mem_add.php' edit to insert page file
      }elseif($_GET["edit"] != "" ){
        include("mem_edit.php"); //'mem_edit.php' edit to update page file
      }elseif($_GET["del"] != "" ) {
        include("mem_del.php"); //'mem_del.php' edit to delete page file
      }else{ ?>  <!-- below this is select page -->
      <div class="content">
        <div class="container-fluid">
        <?php if($_GET["delID"]!=""){ //delete sql command
            $sql = "DELETE FROM member WHERE Member_id ='".$_GET["delID"]."'";
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
                $sql = "SELECT * FROM member WHERE First_Name like '%". $_POST['searchTXT'] . "%' 
                OR Last_Name like '%". $_POST['searchTXT'] . "%'
                OR Email like '%". $_POST['searchTXT'] . "%'
                OR Address like '%". $_POST['searchTXT'] . "%'
                OR tel like '%". $_POST['searchTXT'] . "%'
                OR Member_id like '%". $_POST['searchTXT'] . "%'" ;
            }else{
            $sql = "SELECT * FROM member"; //select sql command
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
                          <a class="nav-link active show" href="?p=member" data-toggle="tab">
                            <i class="material-icons">person</i> Member
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="?p=member&add=1" data-toggle="tab">
                            <i class="material-icons">add</i> Add Member
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
                        MEMBER ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Address
                        </th>
                        <th>
                          Tel.
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                      <?php while($row = $result->fetch_array()) { ?>
                        <tr>
                          <td>
                            <?php echo 'M'; echo $row["Member_id"];?>
                          </td>
                          <td>
                            <?php echo $row["First_Name"]; echo " "; echo $row["Last_Name"]; ?>
                          </td>
                          <td>
                            <?php echo $row["Email"] ?>
                          </td>
                          <td>
                            <?php echo $row["Address"] ?>
                          </td>
                          <td class="text-primary">
                             <?php echo $row["tel"] ?>
                          </td>
                          <td class="text-primary">
                          <a target="" href="?p=member&edit=<?=$row['Member_id'];?>" class="btn btn-round btn-fill btn-warning"><i class="material-icons">edit</i> Edit<div class="ripple-container"></div></a>
                          <a target="" href="?p=member&del=<?=$row['Member_id'];?>" class="btn btn-round btn-fill btn-danger"><i class="material-icons">clear</i> Delete<div class="ripple-container"></div></a>
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
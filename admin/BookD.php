<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Books Detail</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <?php if($_GET["add"] != "" ) {
        include("BookD_add.php"); //'mem_add.php' edit to insert page file
      }elseif($_GET["edit"] != "" ){
        include("BookD_edit.php"); //'mem_edit.php' edit to update page file
      }elseif($_GET["del"] != "" ) {
        include("BookD_del.php"); //'mem_del.php' edit to delete page file
      }else{ ?>  <!-- below this is select page -->
      <div class="content">
        <div class="container-fluid">
        <?php if($_GET["delID"]!=""){ //delete sql command
            $sql = "DELETE FROM Books_detail WHERE ID ='".$_GET["delID"]."'";
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
                $sql = "SELECT * FROM Books_detail WHERE Books_id like '%". $_POST['searchTXT'] . "%' 
                OR First_Name like '%". $_POST['searchTXT'] . "%'
                OR Last_Name like '%". $_POST['searchTXT'] . "%'
                OR Age like '%". $_POST['searchTXT'] . "%'
                OR Sex like '%". $_POST['searchTXT'] . "%'" ;
            }else{
            $sql = "SELECT * FROM Books_detail"; //select sql command
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
                          <a class="nav-link active show" href="?p=books_detail" data-toggle="tab">
                            <i class="material-icons">touch_app</i> Books detail
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="?p=books_detail&add=1" data-toggle="tab">
                            <i class="material-icons">add</i> Add Books detail
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>  
                      </ul>
                      <form class="navbar-form" method="post">
                      <div class="input-group no-border">
                        <input type="text" name="searchTXT" class="form-control" placeholder="Search...">
                        <button type="submit"  action="<?php echo $_SERVER['PHP_SELF'];?>" name="button" value="search" 
                        class="btn btn-white btn-round btn-just-icon">
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
                        ID
                        </th> 
                        <th>
                        First_Name
                        </th>
                        <th>
                        Last_Name
                        </th>
                        <th>
                        Age
                        </th>
                        <th>
                        Sex
                        </th>
                        <th>
                        Books ID
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                      <?php while($row = $result->fetch_array()) { ?>
                        <tr>
                          <td>
                            <?php echo $row["ID"];?>
                          </td>
                          <td>
                          <?php echo $row["First_Name"] ?>
                          </td>
                          <td>
                            <?php echo $row["Last_Name"] ?>
                          </td>
                          <td>
                            <?php echo $row["Age"] ?>
                          </td>
                          <td>
                            <?php echo $row["Sex"] ?>
                          </td> 
                          <td>
                            <a href="?p=books&edit=<?php echo $row["Books_id"];?>"><?php echo $row["Books_id"];?></a>
                          </td>
                          <td class="text-primary">
                          <a target="" href="?p=books_detail&edit=<?=$row['ID'];?>" class="btn btn-round btn-fill btn-warning">
                          <i class="material-icons">edit</i> Edit<div class="ripple-container"></div></a>
                          <a target="" href="?p=books_detail&del=<?=$row['ID'];?>" class="btn btn-round btn-fill btn-danger">
                          <i class="material-icons">clear</i> Delete<div class="ripple-container"></div></a>
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
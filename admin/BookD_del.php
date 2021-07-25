<?php
            $sql = "SELECT * FROM Books_detail WHERE ID ='".$_GET["del"]."'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        ?>
        <div class="content">
        <div class="container-fluid">
        <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Warning - </b> Are you sure for delete this Books Detail ?</span>
        </div>
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
                          <a target="" href="?p=books_detail&delID=<?=$row['ID'];?>" class="btn btn-round btn-fill btn-success">
                          <i class="material-icons">edit</i> Confirm<div class="ripple-container"></div></a>
                          <a target="" href="?p=books_detail" class="btn btn-round btn-fill btn-danger">
                          <i class="material-icons">clear</i> Cancle<div class="ripple-container"></div></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
<?php
            $sql = "SELECT * FROM Books WHERE Books_id ='".$_GET["del"]."'";
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
                      <b> Warning - </b> Are you sure for delete this Books ?</span>
        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
              <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active show" href="?p=books" data-toggle="tab">
                            <i class="material-icons">touch_app</i> Books
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="?p=books&add=1" data-toggle="tab">
                            <i class="material-icons">add</i> Add Books
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
                        Books ID
                        </th>
                        <th>
                         Bookdate
                        </th>
                        <th>
                          Check_in
                        </th>
                        <th>
                          Check_out
                        </th>
                        <th>
                         Deposit
                        </th>
                        <th>
                          UID
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <?php  echo $row["Books_id"];?>
                          </td>
                          <td>
                            <?php echo $row["Bookdate"]; ?>
                          </td>
                          <td>
                            <?php echo $row["Check_in"] ?>
                          </td>
                          <td>
                            <?php echo $row["Check_out"] ?>
                          </td>
                          <td>
                            <?php echo $row["Deposit"] ?>
                          </td>
                          <td class="text-primary">
                             <?php echo $row["UID"] ?>
                          </td>
                          <td class="text-primary">
                          <a target="" href="?p=books&delID=<?=$row['Books_id'];?>" class="btn btn-round btn-fill btn-success"><i class="material-icons">edit</i> Confirm<div class="ripple-container"></div></a>
                          <a target="" href="?p=books" class="btn btn-round btn-fill btn-danger"><i class="material-icons">clear</i> Cancle<div class="ripple-container"></div></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
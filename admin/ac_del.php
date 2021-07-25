<?php
            $sql = "SELECT * FROM account WHERE UID='".$_GET["del"]."'";
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
                      <b> Warning - </b> Are you sure for delete this account ?</span>
        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
              <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active show" href="#profile" data-toggle="tab">
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
                    </div>
                  </div>
                </div>
                <div class="card-body">
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
                        <tr>
                          <td>
                            <?php  echo $row["UID"];?>
                          </td>
                          <td>
                            <?php echo $row["Username"]; ?>
                          </td>
                          <td>
                            <?php echo $row["Password"] ?>
                          </td>
                          <td>
                            <?php echo $row["status"] ?>
                          </td>
                          <td class="text-primary">
                             <?php echo "M".$row["Member_id"] ?>
                          </td>
                          <td class="text-primary">
                          <a target="" href="?p=account&delID=<?=$row['UID'];?>" class="btn btn-round btn-fill btn-success"><i class="material-icons">edit</i> Confirm<div class="ripple-container"></div></a>
                          <a target="" href="?p=account" class="btn btn-round btn-fill btn-danger"><i class="material-icons">clear</i> Cancle<div class="ripple-container"></div></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
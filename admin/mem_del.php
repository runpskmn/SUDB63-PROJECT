<?php
            $sql = "SELECT * FROM member WHERE Member_id='".$_GET["del"]."'";
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
                      <b> Warning - </b> Are you sure for delete this member ?</span>
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
                    </div>
                  </div>
                </div>
                <div class="card-body">
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
                          <a target="" href="?p=member&delID=<?=$row['Member_id'];?>" class="btn btn-round btn-fill btn-success"><i class="material-icons">edit</i> Confirm<div class="ripple-container"></div></a>
                          <a target="" href="?p=member" class="btn btn-round btn-fill btn-danger"><i class="material-icons">clear</i> Cancle<div class="ripple-container"></div></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
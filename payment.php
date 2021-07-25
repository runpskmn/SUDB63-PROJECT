
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Payment</h2>
          <ol>
            <li><a href="?p=home">Payment</a></li>
            <li>Payment</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-left">
          <h2>Payment</h2>
        </div>
        <?php

            if($_POST["button"]=="confirm"){
                $pid =  'P'.mt_rand(10000,99999);
                $date = $_POST["txtDate"]." ".$_POST["txtTime"];
                $sql = "UPDATE Books SET status = '1' WHERE Books_id ='".$_GET["booksID"]."'";
                $conn->query($sql);
                $sql2 = "INSERT INTO payment VALUES('".$pid."','".$date."','".$_POST["vatTXT"]."','".$_POST["txtBank"]."','".$_GET["booksID"]."')";
                $conn->query($sql2);
                echo '<div class="alert alert-success"> Payment successful!!</div>'."<meta http-equiv='refresh' content='2 ;url=./?p=history'>";	
            }
            $sql = "SELECT * FROM books JOIN room ON books.Books_id = room.Books_id WHERE books.Books_id ='".$_GET["booksID"]."'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

        ?>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        Books ID : <?php echo $row["Deposit"]; ?>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-md-2">
                        Room number : <?php echo $row["Room_id"]; ?>
                    </div>
                    <div class="col-md-2">
                        Room type : <?php 
                            if($row["Room_type"]=="STD"){
                                echo 'Standard';
                            }else if($row["Room_type"]=="DEL"){
                                echo 'Deluxe';
                            }
                        ?>
                    </div>
                    <div class="col-md-3">
                        Check in : <?php echo $row["Check_in"]; ?>
                    </div>
                    <div class="col-md-3">
                        Check out : <?php echo $row["Check_out"]; ?>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-md-2">
                        Price : <?php echo $row["Deposit"]; ?>
                    </div><p></p>
                    <div class="col-md-10 text-danger">
                        โปรดอ่านก่อนกดยืนยัน : ราคานี้เป็นราคา 50% จากราคาเต็ม อีก 50% ที่เหลือจะจ่ายเมื่อเข้าพักที่โรงแรม
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="col-md-4">
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
                    <input type="text" hidden class="form-control" name = "vatTXT" value="<?php echo $row["Deposit"]*0.07; ?>" required>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Transfer Date</label>
                          <input type="date" class="form-control" name = "txtDate" value="" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Transfer Time</label>
                          <input type="time" class="form-control" name = "txtTime" value="" required>
                        </div>
                      </div>
                </div>
                <p></p>
                <button class="btn btn-success" type="submit" name="button" value="confirm">Confirm payment</button>
            </form>
      </div>
    </section><!-- End Portfolio Section -->

<?php
    $sql = "SELECT * FROM books JOIN books_detail ON books.Books_id = books_detail.Books_id WHERE books_detail.Books_id ='".$_GET["id"]."'";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql);
    echo $conn->error;
    $r = $result2->fetch_assoc();
?>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Books Detail</h2>
          <ol>
            <li><a href="?p=home">Home</a></li>
            <li><a href="?p=history">History</a></li>
            <li>Books Detail</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-left">
          <h2>Books Detail #<?php echo $r["Books_id"] ?></h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="row" data-aos="fade-up" data-aos-delay="200">
        <table width="100%" id="customers">
          <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Sex</th>
          </tr>
          <?php while($row = $result->fetch_array()) { ?>
          <tr>
            <td><?php echo $row["First_Name"].' '.$row["Last_Name"]; ?></td>
            <td><?php echo $row["Age"] ?></td>
            <td><?php echo $row["Sex"] ?></td>  
          </tr>
          <?php } ?> 
        </table>
        </div>

      </div>
    </section><!-- End Portfolio Section -->

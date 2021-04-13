<?php
  /*FILE CURRENTLY NOT IN USE
  require 'dbh.inc.php';

  if (isset($_POST['search-submit'])) {
      $search = mysqli_real_escape_string($connection, $_POST['search']);
      $type;
      $sql = "SELECT * FROM products WHERE prodName LIKE '%$search%' OR productDescription LIKE '%$search%' OR manufacturerName LIKE '%$search%' OR categoryName LIKE '%$search%'";
      $result = mysqli_query($connection, $sql);
      $queryResult = mysqli_num_rows($result);

      if ($queryResult > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<div class='container'
                      <h1>".$row['prodName']."</h1>
                      <p>".$row['manufacturerName']."</p>
                      <p>Price: ".$row['prodPrice']."</p>
                    </div>";
          }
      } else {
          echo '<p> There are no results matching your search.</p>';
      }
  }

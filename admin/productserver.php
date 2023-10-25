
                  <?php

                  $sql = "SELECT * FROM product";
                  $result = $conn->query($sql);
                  $rows = array();
                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                      /*echo "<tr><td> " . $row["idProduct"]. " </td><td> " . $row["title"]. " </td><td> " . $row["category"]. "</td><td>" . $row["size"]. "</td><td>" . $row["color"]. "</td><td>" . $row["category"]. "</td><td>" . $row["description"]. "</td><td>
                      <a href='viewproduct.php?id=". $row["idProduct"]."&action=del'><small class='label  bg-red'>Delete</small></a>
                      <a href='viewproduct.php?id=". $row["idProduct"]."&action=update'><small class='label  bg-blue'>Update</small></a>



                      </td></tr>";*/ $rows[]=$row;

                       }
                       echo json_encode($rows);
                                  }

                  ?>
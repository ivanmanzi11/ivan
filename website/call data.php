<?php
   $conn = new mysqli("localhost", "root", "", "codescracker");
   
   if(!$conn -> connect_errno)
   {
      $sql = "SELECT * FROM amazona";
      if($result = $conn -> query($sql))
      {
         while($row = $result -> fetch_row())
         {
            echo "username", $row[1];
            echo "<BR>";
            echo "email ", $row[2];
            echo "<BR>";
            echo "register_time ", $row[3];
            echo "<HR>";
         }
         $result -> free_result();
      }
   }
   $conn -> close();
?>
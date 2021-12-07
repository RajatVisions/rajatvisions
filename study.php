<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "study";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    // MYSQL Query 
    $sql = "SELECT Employee.id,  Employee.employee_id, Employee.firstname, Employee.email, Employee.salary, leaves.regular_leave FROM Employee INNER JOIN leaves ON Employee.employee_id = leaves.employee_id";
    $res = $conn->query($sql);
        if ($res) {
?>

        <table id='customers'><tr><th>ID</th><th>Employee ID</th><th>Firstname</th><th>Email</th><th>Salary</th><th>Regular leave</th></tr>
        <?php  
        echo customerData($res);
        ?>
        </table>
<?php
        }
    // Closing connection
    $conn->close();
    // Funtion customerData();
    function customerData($res){
      $result = "<tr>";
          while($row = $res->fetch_assoc()) {
            foreach ($row as $key => $value){
            $result .= "<td>". $value . "</td>";
            }
            $result .= "</tr>";
          }
          return $result;
        }

?>
<style>
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
  background-color: #04AA6D;
  color: white;
}
</style>
  
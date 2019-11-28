<html>
<head>
<style>
table{
background-color:white;
  font-family: arial;
  margin-left:auto; 
    margin-right:auto;
    
}
td, th {
   padding: 8px;
}
th{
 text-align: center;
}
tr:hover {background-color: #f5f5f5;}
.button {
 
  padding: 15px 15px;
  padding-left: 5%;
  padding-right: 5%;

  text-align: center;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body >

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "student_details";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM student";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo '<table border="1" cellspacing="2" cellpadding="2" class="table" style="width:70%"  >

      <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Branch</th>
        <th>College</th>
        <th>DELETE</th>
        <th>UPDATE</th>
     </tr>
     </thead>';
   while($row = $result->fetch_assoc()) {
       
   echo '<tr>';
   echo'<td>'.$row["Id"].'</td>';
   echo '<td>'.$row["Name"].'</td>';
   echo '<td>'.$row["Branch"].'</td>';
   echo'<td>'.$row["College"].'</td>';
    echo '<td><a href="/demo/delete.php?id='.$row['Id'].'">DELETE</a></td>';
    echo '<td><a href="/demo/update1.php?id='.$row['Id'].'&name='.$row['Name'].'&branch='.$row['Branch'].'&college='.$row['College'].'">UPDATE</a></td>';
   echo '</tr>';

     
    }
 
} else {
    echo "0 results";
}

$conn->close();

?>
<center> <button onclick="window.location.href = '/demo/Insert.php';" class="button" >ADD</button></center>
</body>
</html>

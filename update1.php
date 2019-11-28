<html>
       <head>
<style>
table{
  font-family: arial;

  margin-left:auto; 
    margin-right:auto;
    padding:10%;
    
}
td, th {
   padding: 8px;john
}
th{
 text-align: center;
}

.button {
 
  padding: 10px 10px;
  padding-left: 5%;
  padding-right: 5%;

  text-align: center;
  display: inline-block;
  font-size: 16px;
  margin: 20px 50px;
  cursor: pointer;
}
h3{
margin: 100px 600px;
margin-top:400px;
}
</style>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
   <body >
      <?php
         if(isset($_POST['add'])) {
         $id = $_GET['id'];
            $dbhost = "127.0.0.1";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "student_details";
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                 
            
      
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
        
            
            if(! get_magic_quotes_gpc() ) {
               $Id = addslashes ($_POST['Id']);
               $Name = addslashes ($_POST['Name']);
            }else {
               $Id = $_POST['Id'];
               $Name = $_POST['Name'];
            }
            
            $Branch = $_POST['Branch'];
            $College = $_POST['College'];
            
            $sql = "UPDATE `student_details`.`student` SET `Id`='$Id' ,`Name` = '$Name', `Branch` = '$Branch',`College`='$College' WHERE `student`.`Id` = '$id'";
               
            //mysql_select_db('student_details');
            $retval = mysqli_query( $conn, $sql );
         
           
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            header("Location:/demo/test.php");
            
            
            mysql_close($conn);
         }else {
            ?>
           
            
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                  <h3 color="red">Update your Values here</h3>
                     <tr>
                        <td width = "100">Id</td>
                        <td><input name = "Id" type = "text"  value="
                        <?php $id=$_GET['id'];$servername = 'localhost';$username ='root';$password = '';$dbname ='Student_details';$conn = new mysqli($servername, $username, $password, $dbname);  echo $id; ?>" id = "Id" readonly ></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Name</td>
                        <td><input name = "Name" type = "text" value="
                        <?php $name=$_GET['name'];$servername = 'localhost';$username ='root';$password = '';$dbname ='Student_details';$conn = new mysqli($servername, $username, $password, $dbname);  echo $name; ?>" id = "Name" ></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Branch</td>
                   
                        <td><input name = "Branch" type = "text" value="
                        <?php $branch=$_GET['branch'];$servername = 'localhost';$username ='root';$password = '';$dbname ='Student_details';$conn = new mysqli($servername, $username, $password, $dbname);  echo $branch; ?>" id = "Branch" ></td>
                     </tr>
                     
                      <tr>
                        <td width = "100">College</td>
                        <td><input name = "College" type = "text" value="
                        <?php $college=$_GET['college'];$servername = 'localhost';$username ='root';$password = '';$dbname ='Student_details';$conn = new mysqli($servername, $username, $password, $dbname);  echo $college; ?>" id = "College" ></td>
                     </tr>
                  
                  
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" class="button"
                              value = "Update">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
            <?php
         }
      ?>
   
   </body>
</html>

<html>

      <head>
<style>
table{
  font-family: arial;
  
  margin-left:auto; 
    margin-right:auto;
    padding:10%;
    
}
td, th,thead {
   padding: 8px;
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
margin: 100px 500px;
margin-top:20px;
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
            $dbhost = "127.0.0.1";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "student_details";
            $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            
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
            
            $sql = "INSERT INTO student ". "(Name, Branch,College) ". "VALUES('$Name','$Branch','$College')";
               
            mysqli_select_db('student_details');
            $retval = mysqli_query($conn,$sql );
            
            if(! $retval ) {
               echo('Could not enter data:Id already present ');
               //header("Location:/demo/Insert.php");
            }
            header("Location:/demo/test.php");
            
            mysqli_close($conn);
         }else {
            ?>
            
               <form method = "post" action = "<?php $_PHP_SELF ?>" width="100%">
                  <table width = "50%" border = "0" cellspacing = "2" 
                     cellpadding = "3">
                  <h3 align="center">Enter the details</h3>
                     
                  
                     <tr>
                        <td width = "100">Name</td>
                        <td><input name = "Name" type = "text" 
                           id = "Name"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Branch</td>
                        <td><input name = "Branch" type = "text" 
                           id = "Branch"></td>
                     </tr>
                     
                      <tr>
                        <td width = "100">College</td>
                        <td><input name = "College" type = "text" 
                           id = "College"></td>
                     </tr>
                  
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                          <input name = "add" type = "submit" id = "add" class="button"
                              value = "Insert">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
            <?php
         }
      ?>
   
   </body>
</html>

<!DOCTYPE html>
<html>
<head>
    
<style>
.box
{
    width: 400px;
                 height: 340px;
                border: dotted ;
                border-color: white;
                background-color:rgb(238, 199, 199);
                position: absolute;
                left:38%;
                top:30%;
}
</style>
</head>
<h1 style="color:purple;font-size: 50px; text-align: center;">Student Register Panel</h1>
<body style="background-color: lightyellow;";>
    <div class="box">

        <form  action="" method="Post">
        
    
        <table border="5">
                  <tr>
                <td>Student id : *</td>
                <td>
                     <input type="text" name="std_id" size="40" required/>
                           </td>
                </tr>
            <tr>
                <td>Name : *</td>
                <td>
                               <input type="text" name="name" size="40" required/>
                           </td>
                </tr>
                       <tr>
                <td>Surname: *</td>
                <td>
                               <input type="text" name="surname" size="40" required/>
                           </td>
                </tr>
                <tr>
                <td>E-Mail: *</td>
                <td>
                               <input type="email" name="email" size="40" required/>
                           </td>
                </tr>
                       <tr>
                <td>Password: *</td>
                <td>
                               <input type="password" name="password" size="40" maxlength="12" required/>
                           </td>
                </tr>
              
                <tr>
                <td>Tel: *</td>
                <td>
                               <input type="tel" name="telno" placeholder="(xxx)(xxxxxx)" maxlength="10" size="40" required/>
                           </td>
                </tr>
               
               
                <tr>
                   <td>Faculty *</td>
                   <td>
                                  <input type="text" name="faculty" size="40" required/>
                              </td>
                   </tr>
                   <tr>
                       <td>Department *</td>
                       <td>
                                      <input type="text" name="department" size="40" required/>
                                  </td>
                       </tr>
                       <tr>
                <td colspan="2">
                               <input type="submit"  onclick="SaveData()" value="Register" />
                           </td>
                </tr>       
                </table>
            </form>
     </div>   
</body>

<script type="text/javascript">
    function SaveData()
    {
      
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname ="inventory";

   
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO user_table (std_num) VALUES (5)";

               $result = mysqli_query($connection,"INSERT INTO user_table(std_num)
            VALUES (5)");

            echo "calisti möi";

            ?>
            alert("ddsdgsagds");
    }
</script>

</html>
    


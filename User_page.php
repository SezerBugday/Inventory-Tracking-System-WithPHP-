<!Doctype html>
    <html>
    <head>

        <style type="text/css">
   
         .item_request
            {
                position: absolute;
                left:0%;
                top:62%;
                 overflow: scroll;
                height: 150px;
                width: 720px;
            }
            .room_request
            {
                position: absolute;
                left:0%;
                top:30%;
                 overflow: scroll;
                height: 150px;
                width: 720px;
            }
            .user_table
            {
                position: absolute;
                left:0%;
                top:30%;
                 overflow: scroll;
                height: 150px;
                width: 720px;
            }
            .item_table
            {
                position: absolute;
                left:50%;
                top:62%;
                 overflow: scroll;
                height: 150px;
                width: 720px;
            }
            .room_table
            {
                position: absolute;
                left:50%;
                top:30%;
                 overflow: scroll;
                height: 150px;
                width: 720px;

            }

            .mini_box {
               float: left;
               width: 80px;
               height: 20px;
               margin: 5px;
               border: 1px solid rgba(0, 0, 0, .2);
            }
            .lightgray {
               background:lightgray;
            }
            .pink {
               background: pink;
            }
            .lightgreen {
               background:lightgreen;
            }

        </style>
        <h1 style="color:purple; font-size: 60px; text-align:center ;"> Inventory System Student Panel</h1>
        <?php
        echo '<h2 style="color:purple; font-size: 40px;"> My Request </h2>';

        ?>

    </head>

    <body style="background-color: lightyellow;">

<?php


require_once("AnaEkranLogin.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="inventory";


$connection = new mysqli($servername, $username, $password,$dbname);
$new = mysqli_set_charset($connection,"utf8");
if($connection->connect_error)
{
    die("Bağlantı hatası ".$connection->connect_error);

}

$kullanıcı_no=$_SESSION['giris_isim'];

       

/******************************************************* Item__________Request*******************************************************************************/


    $sorgu = " SELECT user_item_request.Request_num,user_table.std_num,user_table.Name,user_table.Surname,item_table.Item_Name,user_item_request.Start_date,user_item_request.Finish_date,user_item_request.Confirmation FROM user_item_request INNER JOIN user_table ON user_table.std_num = user_item_request.std_num INNER JOIN item_table ON user_item_request.item_id = item_table.item_id  Where user_table.std_num =$kullanıcı_no";


    $kayit= $connection->query($sorgu);


    if($kayit->num_rows>0)
    {
       echo '<div class="item_request" id ="tablo" >';
        echo "<h2>Item Request </h2>";
        echo '<table  border=5 >';
        echo '<tr style="background-color:skyblue";>' ;
        echo   '<th> Request_num</th>';
        echo   '<th> Student_Name</th>';
        echo   '<th> Student_Surname </th>';
        echo   '<th> Item_Name </th>';
        echo   '<th> Start_date </th>';
        echo   '<th> Finish_date </th>';
        echo '</tr>';

        while($satir = $kayit ->fetch_assoc()) 
        {
            if($satir["Confirmation"]==0)
            {
                 echo '<tr style="background-color:pink; text-align: center;";>';
                echo '<td>'  . $satir["Request_num"]. '</td>';
                 echo '<td>'  . $satir["Name"]. '</td>';
                 echo '<td>'  . $satir["Surname"]. '</td>';
                echo '<td>'  . $satir["Item_Name"]. '</td>';
                echo '<td>'  . $satir["Start_date"]. '</td>';
                 echo '<td>'  . $satir["Finish_date"]. '</td>';
                 echo '</tr>';
            }
          else  if($satir["Confirmation"]==1)
            {
                 echo '<tr style="background-color:lightgreen; text-align: center;";>';
                echo '<td>'  . $satir["Request_num"]. '</td>';
                 echo '<td>'  . $satir["Name"]. '</td>';
                 echo '<td>'  . $satir["Surname"]. '</td>';
                echo '<td>'  . $satir["Item_Name"]. '</td>';
                echo '<td>'  . $satir["Start_date"]. '</td>';
                 echo '<td>'  . $satir["Finish_date"]. '</td>';
                 echo '</tr>';
            }
            
        else    {
                echo '<tr style="background-color:lightgray; text-align: center;";>';
                 echo '<td>'  . $satir["Request_num"]. '</td>';
                echo '<td>'  . $satir["Name"]. '</td>';
                echo '<td>'  . $satir["Surname"]. '</td>';
                echo '<td>'  . $satir["Item_Name"]. '</td>';
                echo '<td>'  . $satir["Start_date"]. '</td>';
                 echo '<td>' . $satir["Finish_date"]. '</td>';
               
                 echo '</tr>';
            }

              
        }
       echo  '</table>';


           echo '</div>';

    }
    echo '     <label style="position: absolute; left:0%; top:82%; text-align:center;">
                      <p class="mini_box lightgreen">  Approved </p> 
                      <p class="mini_box pink">  Denied  </p>
                      <p class="mini_box lightgray"> On hold </p>  </label> ' ;


    echo '<form action="" method="POST"> <label style="position: absolute; left:0%; top:87%;">
     Number <input type="number" min="100000000" name="hangi_sayi_item_istek" required>
    
     Start Date : <input type="date" name="_item_start_date required">
     Finish Date : <input type="date" name="_item_finish_date required">
    </label> </form>';


   echo '<form action="" method="POST"> <label style="position: absolute; left:40%; top:91%;">


    <input  style="background-color:lightgreen";  type="submit" name="item_ask" value ="Item Ask"> 
    </label> </form>';

    

    if(isset($_POST['item_ask']))
    {
        if(isset($_POST['hangi_sayi_item_istek'])&&isset($_POST['_item_start_date'])&&isset($_POST['_item_finish_date']))
        {
         $num =$_POST['hangi_sayi_item_istek'] ;





         $StaItem=$_POST['_item_start_date'];
         $finItem=$_POST['_item_finish_date'];
        
         $result = mysqli_query($connection,"INSERT INTO user_room_request(std_num,item_id,Start_date,Finish_date,Confirmation)
            VALUES ('".$kullanıcı_no."','".$num."',2)");


        }
    }
  
 
/***************************************************          Item____Table       ***************************************************************************/


 $item_sorgu = " SELECT * FROM item_table"; 
 $kayit= $connection->query($item_sorgu);
          
  if($kayit->num_rows>0)
    {

   echo '<div class="item_table" id ="tablo" >';
    echo "<h2>Item Table </h2>";
    echo '<table  border=5 >';
    echo '<tr style="background-color:skyblue";>' ;
      echo   '<th> Item_Id </th>';
    echo   '<th> Item_Name </th>';
      echo   '<th> Item_Amount </th>';

    echo '</tr>';

    while($satir = $kayit ->fetch_assoc()) 
    {
        if($satir["Amount"]<=0)
        {
            $satir['Amount'] =0;

             echo '<tr style="background-color:pink; text-align: center;";>';
              echo '<td>'  . $satir["item_id"]. '</td>';
             echo '<td>'  . $satir["Item_Name"]. '</td>';
             echo '<td>'  . $satir["Amount"]. '</td>';
             echo '</tr>';
        }
        else
        {
            

             echo '<tr style="background-color:lightgreen; text-align: center;";>';
              echo '<td>'  . $satir["item_id"]. '</td>';
             echo '<td>'  . $satir["Item_Name"]. '</td>';
             echo '<td>'  . $satir["Amount"]. '</td>';
             echo '</tr>';
        }

           
    }
   echo  '</table>';


       echo '</div>';

    }     
    echo '     <label style="position: absolute; left:50%; top:82%; text-align:center;">
                      <p class="mini_box lightgreen">  Available </p> 
                      <p class="mini_box pink">  Unavailable  </p>
                      </label> ' ;
       
  

/************************************************************   Rooms Table         *************************************************************************/

 $room_sorgu = " SELECT * FROM room_table "; 
 $kayit= $connection->query($room_sorgu);
          
  if($kayit->num_rows>0)
    {

   echo '<div class="room_table" id ="tablo" >';
    echo "<h2>Room Table </h2>";
    echo '<table  border=5 >';
    echo '<tr style="background-color:skyblue";>' ;
      echo   '<th> Room Id </th>';
    echo   '<th> Room Name </th>';
      echo   '<th> Room Faculty </th>';

    echo '</tr>';

    while($satir = $kayit ->fetch_assoc()) 
    {   
        if($satir['Room_Avaliable']==0)
        {
            echo '<tr style="background-color:pink; text-align: center;";>';
            echo '<td>'  . $satir['room_id']. '</td>';
             echo '<td>'  . $satir["room_name"]. '</td>';
             echo '<td>'  . $satir["room_faculty"]. '</td>';
             echo '</tr>';
        }
        else 
        {
            echo '<tr style="background-color:lightgreen; text-align: center;";>';
            echo '<td>'  . $satir['room_id']. '</td>';
             echo '<td>'  . $satir["room_name"]. '</td>';
             echo '<td>'  . $satir["room_faculty"]. '</td>';
             echo '</tr>';
        }
      

    }
   echo  '</table>';


       echo '</div>';

    }     

         echo '<<label style="position: absolute; left:50%; top:50%; text-align:center;">

                      <p class="mini_box lightgreen">  Available </p> 
                      <p class="mini_box pink">  Unavailable  </p>
                      </label> ' ;
           

/*********************************************************    Room____________Request  *********************************************************************/


  $room_request_sorgu = " SELECT user_room_request.Request_num,user_room_request.Confirmation,user_room_request.Start_date,user_room_request.Finish_date,user_table.Name,user_table.Surname,room_table.room_name FROM user_room_request INNER JOIN user_table ON user_room_request.std_num = user_table.std_num INNER JOIN room_table ON user_room_request.room_id = room_table.room_id  Where user_table.std_num =$kullanıcı_no";



    $kayit= $connection->query($room_request_sorgu);


    if($kayit->num_rows>0)
    {
       echo '<div class="room_request" id ="tablo" >';
        echo "<h2>Room Request </h2>";
        echo '<table  border=5 >';
        echo '<tr style="background-color:skyblue";>' ;
        echo   '<th> Request_num</th>';
        echo   '<th> Student_Name</th>';
        echo   '<th> Student_Surname </th>';
        echo   '<th> Room_Name </th>';
        echo   '<th> Start_date </th>';
        echo   '<th> Finish_date </th>';

        echo '</tr>';

        while($satir = $kayit ->fetch_assoc()) 
        {
            if($satir["Confirmation"]==0)
            {
  
                 echo '<tr style="background-color:pink; text-align: center;";>';
                echo '<td>'  . $satir["Request_num"]. '</td>';
                 echo '<td>'  . $satir["Name"]. '</td>';
                 echo '<td>'  . $satir["Surname"]. '</td>';
                echo '<td>'  . $satir["room_name"]. '</td>';
                echo '<td>'  . $satir["Start_date"]. '</td>';
                 echo '<td>'  . $satir["Finish_date"]. '</td>';
                
                 echo '</tr>';
            }
          else  if($satir["Confirmation"]==1)
            {
                            echo '<tr style="background-color:lightgreen; text-align: center;";>';
                echo '<td>'  . $satir["Request_num"]. '</td>';
                 echo '<td>'  . $satir["Name"]. '</td>';
                 echo '<td>'  . $satir["Surname"]. '</td>';
                     echo '<td>'  . $satir["room_name"]. '</td>';
                echo '<td>'  . $satir["Start_date"]. '</td>';
                 echo '<td>'  . $satir["Finish_date"]. '</td>';
 
                 echo '</tr>';
            }
            
        else    {
         
                echo '<tr style="background-color:lightgray; text-align: center;";>'; //beklemede
                 echo '<td>'  . $satir["Request_num"]. '</td>';
                echo '<td>'  . $satir["Name"]. '</td>';
                echo '<td>'  . $satir["Surname"]. '</td>';
                echo '<td>'  . $satir["room_name"]. '</td>';
                echo '<td>'  . $satir["Start_date"]. '</td>';
                 echo '<td>' . $satir["Finish_date"]. '</td>';
  
                 echo '</tr>';
            }

              
        }
       echo  '</table>';


           echo '</div>';

    }
    echo '     <label style="position: absolute; left:0%; top:50%; text-align:center;">
                      <p class="mini_box lightgreen">  Approved </p> 
                      <p class="mini_box pink">  Denied  </p>
                      <p class="mini_box lightgray"> On hold </p>  </label> ' ;

    echo '<form action="" method="POST"> 
    <label style="position: absolute; left:0%; top:57%;">
     Room id: <input type="number" min="100000000" name="room_istek_id" required>
     Start Date: <input type="date"  name="room_baslangic_tarihi" required>
     Finish Date: <input type="date"  name="room_finish_tarihi" required>

   </label> </form>';

       echo '<form action="" method="POST"> 
    <label style="position: absolute; left:39%; top:61%;">
    <input  style="background-color:lightblue";  type="submit" name="room_ask" value ="Room Ask"> 
   </label> </form>';

    if(isset($_POST['room_ask']))
    {
        if(isset($_POST['room_istek_id'])&&isset($_POST['room_baslangic_tarihi'])&&isset($_POST['room_finish_tarihi']))
        {
         $num =$_POST['room_istek_id'] ;





         $StaRoom=$_POST['room_baslangic_tarihi'];
         $finRoom=$_POST['room_finish_tarihi'];
        
         $result = mysqli_query($connection,"INSERT INTO user_room_request(std_num,room_id,Start_date,Finish_date,Confirmation)
            VALUES ('".$kullanıcı_no."','".$num."','".$StaRoom."','".$finRoom."',2)");


        }
    }
  
  
  

/***********************************************************************************************************************************************************/

?>

    </body>
    </html>
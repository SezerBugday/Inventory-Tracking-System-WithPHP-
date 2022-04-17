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
                left:50%;
                top:62%;
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
                top:0%;
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
               width: 75px;
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
        <h1 style="color:purple; font-size: 60px;"> Inventory System</h1>
          <h1 style="color:purple; font-size: 40px;"> Admin's Page</h1>
    </head>


    <body style="background-color: lightyellow;">

<?php


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

/******************************************************* Item__________Request*******************************************************************************/


    $sorgu = " SELECT user_item_request.Request_num,user_table.std_num,user_table.Name,user_table.Surname,item_table.Item_Name,user_item_request.Start_date,user_item_request.Finish_date,user_item_request.Confirmation FROM user_item_request INNER JOIN user_table ON user_table.std_num = user_item_request.std_num INNER JOIN item_table ON user_item_request.item_id = item_table.item_id  ";


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
     Number <input type="number" min="1" name="hangi_sayi" required>
    <input  style="background-color:lightgreen";  type="submit" name="Onay" value ="Onayla"> 
    <input  style="background-color:pink"; type="submit" name="Red" value="Red et"> </label> </form>';




    
    if(isset($_POST['Onay']))
    {
        if(isset($_POST['hangi_sayi']))
        {
         $num =$_POST['hangi_sayi'] ;
         $onay_sorgu = mysqli_query($connection,"UPDATE user_item_request SET Confirmation= 1 WHERE Request_num =$num"); 
        }
    }
  
  
  if(isset($_POST['Red']))
  {
       if(isset($_POST['hangi_sayi']))
        {
         $numa =$_POST['hangi_sayi'] ;
         $red_sorgu = mysqli_query($connection,"UPDATE user_item_request SET Confirmation= 0 WHERE Request_num =$numa"); 
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
             echo '<tr style="background-color:lightgray; text-align: center;";>';
            echo '<td>'  . $satir["item_id"]. '</td>';
             echo '<td>'  . $satir["Item_Name"]. '</td>';
             echo '<td>'  . $satir["Amount"]. '</td>';
             echo '</tr>';
    }
   echo  '</table>';


       echo '</div>';

    }     

         echo '<form action="" method="POST"> <label style="position: absolute; left:50%; top:21%;">
          Item_Id :<input type="number" min="100000000" name="item_id" placeholder="enter item id" required>
           Item_Name : <input type="text" name="item_name" placeholder="enter item name" required>
           Amount : <input type="number" name="item_amount"  min="1" style ="width:40px;"; placeholder="0" required>

    <input  style="background-color:lightgreen";  type="submit" name="item_ekle" value ="Add">  </label> </form>';



    echo '<form action="" method="POST"> <label style="position: absolute; left:50%; top:25%;">
    Item_Id :<input type="number" min="100000000" name="item_id_del" placeholder="enter item id" required>
   Amount : <input type="number" name="item_amount_del"  min="1" style ="width:40px;"; placeholder="0" required>
    <input  style="background-color:pink";  type="submit" name="item_sil" value ="Delete">  </label> </form>';



     if(isset($_POST['item_ekle']))
    {
      if(isset($_POST['item_id'])&&isset($_POST['item_name'])&&isset($_POST['item_amount']))
       {
                  $id = $_POST['item_id'];
                $isim =$_POST['item_name'];
                $adet = $_POST['item_amount'];
                $result = mysqli_query($connection, "insert into item_table(item_id , Item_Name , Amount) values ('".$id."','".$isim."','".$adet."')");
           
       }
    }
  

  
    if(isset(($_POST['item_sil'])))
          {

                 $id = $_POST['item_id_del'];
               
              $adet = $_POST['item_amount_del'];
              $result = mysqli_query($connection,"UPDATE item_table SET Amount= Amount-$adet WHERE item_id =$id ");
         
            
                
          }
  
/***************************************************          Student_Table       ***************************************************************************/
    $user_sorgu = " SELECT * FROM user_table  ";

    $kayit= $connection->query($user_sorgu);


    if($kayit->num_rows>0)
    {
       echo '<div class="user_table" id ="tablo" >';
       echo "<h2>Student Table </h2>";
        echo '<table  border=5 >';
        echo '<tr style="background-color:skyblue";>' ;
        echo   '<th> Std_Num</th>';
        echo   '<th> Std_Name</th>';
        echo   '<th> Std_Surname </th>';
        echo   '<th> Passwword </th>';
        echo   '<th> Tel no </th>';
        echo   '<th> Department </th>';
        echo   '<th> Faculty </th>';
         echo  '<th> E-Mail</th>';

        echo '</tr>';

        while($satir = $kayit ->fetch_assoc()) 
        {

            if($satir["Confirmation"]==0)
            {
                 echo '<tr style="background-color:pink; text-align: center;";>';
                echo '<td>'  . $satir["std_num"]. '</td>';
                 echo '<td>'  . $satir["Name"]. '</td>';
                 echo '<td>'  . $satir["Surname"]. '</td>';
                 echo '<td>'  . $satir["Password"]. '</td>';
                echo '<td>'  . $satir["Tel"]. '</td>';
                echo '<td>'  . $satir["Department"]. '</td>';
                 echo '<td>'  . $satir["Faculty"]. '</td>';
                    echo '<td>'  . $satir["eMail"]. '</td>';
                 echo '</tr>';
            }

         else   if($satir["Confirmation"]==1)
            {
                 echo '<tr style="background-color:lightgreen; text-align: center;";>';
                echo '<td>'  . $satir["std_num"]. '</td>';
                 echo '<td>'  . $satir["Name"]. '</td>';
                  echo '<td>'  . $satir["Surname"]. '</td>';
                 echo '<td>'  . $satir["Password"]. '</td>';
                echo '<td>'  . $satir["Tel"]. '</td>';
                echo '<td>'  . $satir["Department"]. '</td>';
                 echo '<td>'  . $satir["Faculty"]. '</td>';
                    echo '<td>'  . $satir["eMail"]. '</td>';
                 echo '</tr>';
            }

             else
             {
                 echo '<tr style="background-color:lightgray; text-align: center;";>';
                echo '<td>'  . $satir["std_num"]. '</td>';
                 echo '<td>'  . $satir["Name"]. '</td>';
                 echo '<td>'  . $satir["Surname"]. '</td>';
                 echo '<td>'  . $satir["Password"]. '</td>';
                echo '<td>'  . $satir["Tel"]. '</td>';
                echo '<td>'  . $satir["Department"]. '</td>';
                 echo '<td>'  . $satir["Faculty"]. '</td>';
                    echo '<td>'  . $satir["eMail"]. '</td>';
                 echo '</tr>';
            }


          
        }
       echo  '</table>';


           echo '</div>';

    }

        echo '     <label style="position: absolute; left:0%; top:51%; text-align:center;">
                      <p class="mini_box lightgreen">  Approved </p> 
                      <p class="mini_box pink">  Denied  </p>
                      <p class="mini_box lightgray"> On hold </p>  </label> ' ;
     echo '<form action="" method="POST"> <label style="position: absolute; left:0%; top:56%;">
      Number <input type="number" min="1" name="ogrenci_no" required>
    <input  style="background-color:lightgreen";  type="submit" name="std_Onay" value ="Onayla"> 
    <input  style="background-color:pink"; type="submit" name="std_Red" value="Red et"> </label> </form>';




    
    if(isset($_POST['std_Onay']))
    {
        if(isset($_POST['ogrenci_no']))
        {
         $num =$_POST['ogrenci_no'] ;
         $onay_sorgu = mysqli_query($connection,"UPDATE user_table SET Confirmation= 1 WHERE std_num =$num"); 
     
           
        }
    }
  
  
  if(isset($_POST['std_Red']))
  {
       if(isset($_POST['ogrenci_no']))
        {
         $numa =$_POST['ogrenci_no'] ;
         $red_sorgu = mysqli_query($connection,"UPDATE user_table SET Confirmation= 0 WHERE std_num =$numa"); 
          
        }

  }
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
             echo '<tr style="background-color:lightgray; text-align: center;";>';
            echo '<td>'  . $satir['room_id']. '</td>';
             echo '<td>'  . $satir["room_name"]. '</td>';
             echo '<td>'  . $satir["room_faculty"]. '</td>';
             echo '</tr>';
    }
   echo  '</table>';


       echo '</div>';

    }     

         echo '<form action="" method="POST"> <label style="position: absolute; left:50%; top:53%;">

          Room_Id:<input type="number" min="100000000" name="room_id" placeholder="enter room id " required>
           Room_Name : <input type="text" name="room_name" size="15px" placeholder="enter room name" required>
           Faculty : <input type="text" name="room_faculty" size="15px" placeholder="enter room faculty" required>
            <input  style="background-color:lightgreen";  type="submit" name="room_ekle" value ="Add">  </label> 
    </form>';



    echo '<form action="" method="POST"> <label style="position: absolute; left:50%; top:57%;">

    Item_Id :<input type="number" min="100000000" name="room_id_del" placeholder="enter room id" required>
    <input  style="background-color:pink";  type="submit" name="room_sil" value ="Delete">  </label>

     </form>';



     if(isset($_POST['room_ekle']))
    {
       
                $room_id = $_POST['room_id'];
                $room_isim =$_POST['room_name'];
                $faculty_name = $_POST['room_faculty'];

                $result = mysqli_query($connection, "insert into room_table(room_id , room_name , room_faculty) values ('".$room_id."','".$room_isim."','".$faculty_name."')");
  
    }
  


  

  
          if(isset($_POST['room_sil']))
          {

                 $id = $_POST['room_id_del'];
               
             
              $result = mysqli_query($connection," DELETE FROM room_table WHERE room_id =$id");
         
            
                
          }

/*********************************************************    Room____________Request  *********************************************************************/


    $room_request_sorgu = " SELECT user_room_request.Request_num,user_room_request.Confirmation,user_room_request.Start_date,user_room_request.Finish_date,user_table.Name,user_table.Surname,room_table.room_name FROM user_room_request INNER JOIN user_table ON user_room_request.std_num = user_table.std_num INNER JOIN room_table ON user_room_request.room_id = room_table.room_id ";


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
                echo '<tr style="background-color:lightgray; text-align: center;";>';
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
    echo '     <label style="position: absolute; left:50%; top:82%; text-align:center;">
                      <p class="mini_box lightgreen">  Approved </p> 
                      <p class="mini_box pink">  Denied  </p>
                      <p class="mini_box lightgray"> On hold </p>  </label> ' ;

    echo '<form action="" method="POST"> <label style="position: absolute; left:50%; top:87%;">
     Number <input type="number" min="1" name="hangi_sayi_room" required>
    <input  style="background-color:lightgreen";  type="submit" name="Onay_room" value ="Onayla"> 
    <input  style="background-color:pink"; type="submit" name="Red_room" value="Red et"> </label> </form>';




    
    if(isset($_POST['Onay_room']))
    {
        if(isset($_POST['hangi_sayi_room']))
        {
         $num =$_POST['hangi_sayi_room'] ;
         $onay_sorgu = mysqli_query($connection,"UPDATE user_room_request SET Confirmation= 1 WHERE Request_id =$num"); 

        }
    }
  
  
  if(isset($_POST['Red_room']))
  {
       if(isset($_POST['hangi_sayi_room']))
        {
         $numa =$_POST['hangi_sayi_room'] ;
         $red_sorgu = mysqli_query($connection,"UPDATE user_room_request SET Confirmation= 0 WHERE Request_id =$numa"); 
        }
  }

/***********************************************************************************************************************************************************/

?>

    </body>
    </html>
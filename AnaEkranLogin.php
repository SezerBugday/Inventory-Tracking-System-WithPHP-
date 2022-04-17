<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname ="inventory";

session_start();

    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    $admin_giris_sorgu=$conn->query("Select * From admin_table");
    $user_giris_sorgu=$conn->query("Select std_num,Password From user_table");

    if(isset($_POST['User/Admin']))
    {
        if($_POST['User/Admin']=="admin") // admin için
        {
            if(isset($_POST['ana_ekran_isim']) && isset($_POST['ana_ekran_sifre']))
            {
            if ($admin_giris_sorgu->num_rows > 0)
                {
                while($veri=$admin_giris_sorgu->fetch_assoc())
                    {
                    if($_POST['ana_ekran_isim']==$veri['Name']  && $_POST['ana_ekran_sifre']==$veri['Password'] )
                        {
                            
                           header('Location: /Examples/Admin_page.php');
                            
                
                        }   
                    else
                        {
                            echo "Sifre veya kullanıcı adı yanlış";
                    
                        }
                    }
                }
            }

        }

        else if($_POST['User/Admin']=="user") //user için
        {
            if(isset($_POST['ana_ekran_isim']) && isset($_POST['ana_ekran_sifre']))
            {
            if ($user_giris_sorgu->num_rows > 0)
                {
                while($veri=$user_giris_sorgu->fetch_assoc())
                    {
                    if($_POST['ana_ekran_isim']==$veri['std_num']  && $_POST['ana_ekran_sifre']==$veri['Password'] )
                        {
                          $_SESSION['giris_isim'] = $_POST['ana_ekran_isim'];
                            header('Location: /Examples/User_page.php');
            
                        }   
                    else
                        {
                            echo "Sifre veya kullanıcı adı yanlış";
                    
                        }
                    }
                }
                else
                {
                    echo "Kullanıcı bulunamadı";
                }
            }

        }

        else
        {
            echo "Lütfen bir seçim yapınız";
        }

    }

    $conn->close();

?>
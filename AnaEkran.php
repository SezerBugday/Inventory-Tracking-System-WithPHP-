<!DOCTYPE html>
<html>



    <head>
        
        <style>
            body{
                background-image: url('background.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
            }
        .box
            {
               
                width: 500px;
                 height: 230px;
                border: dotted ;
                border-color: white;
                background-color:rgb(37, 36, 36);
                position: absolute;
                left:33%;
                top:40%;
            }   
            .yazi
            {
                text-align: center;

            }
         label{
             color: white;
         }

         h1{
             color:rgb(255, 255, 255);
             text-align: center;
             font-size: 100px;
             text-shadow: 5px 5px 5px rgb(17, 0, 255);
         }
        </style>


    </head>
    <body>
        
        <h1>Inventory System </h1>
       
        <div class=box>
          <input type="image"  img src="flag_turk.png" alt="Smiley face" width="40" height="30" > 
            <input type="image" img src="flag_eng.png" alt="Smiley face" width="40" height="30" >
            <div class= yazi>
                <form action="AnaEkranLogin.php" method="POST">
                     <label>User/Admin
                    <select id="User/Admin" name="User/Admin">
                    <option value="" selected="selected">Select One</option>
                    <option value="user" >User</option>
                    <option value="admin" >Admin</option>
                    </select>
                    </label> 
                    </p>
                    <p>
                    <label >Name :
                    <input type="text" name="ana_ekran_isim"required>
                    </label> 
                    </p>
                    <p>
                        <label>Password :
                        <input type="password" password="password"  name="ana_ekran_sifre" required>
                        <br>
                        <button type="submit" name="submit">Login</button>
                       
                        
                        </label> 

                </form>

                  
                 <a href="register.html" target="_blank">    <button>Register</button>   </a>  
            </div>
            
                
               
     
        
            
            
        </div>




    </body>
</html>
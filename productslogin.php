<!DOCTYPE html>
<html lang="en">
<head>
<?php session_start(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>



        * {
            font-family: 'Roboto', sans-serif;
        }
        .container {
    display: flex;
    justify-content: center;  
}


        body {
            background-color:#fffffe;
        }

        .form {
         
            max-width: 320px;
            width: 100%;
            height:300px;
            padding: 20px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            border-radius: 10px;
            text-align: center;
            align-self:center;
            transition: background-color 0.5s ease-in-out, border 0.5s ease-in-out;
            border: 2px solid white;
        }

       

        .label {
            color: #2b2c34;
            margin-bottom: 4px;
            text-align:left;
            font-weight:bold;
        }

        .input {
            padding: 10px;
            margin-bottom: 20px;
            width: 90%;
            font-size: 1rem;
            color: #4a5568;
            outline: none;
            border: 1px solid transparent;
            border-radius: 4px;
            transition: all 0.2s ease-in-out;
        }

        .input:focus {
            background-color: #fff;
            box-shadow: 0 0 0 2px #cbd5e0;
        }

        .input:valid {
            border: 1px solid green;
        }

        .input:invalid {
            border: 1px solid rgba(14, 14, 14, 0.205);
        }

        .submit {
            background-color: #ffd803;
            color: #272343;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            font-size: 1rem;
            cursor: pointer;
            text-decoration:none;
            transition: all 0.2s ease-in-out;
        }

        .form p {
            color:#2b2c34; 
            margin-top: 10px; 
            font-weight:bold;
        }
    
       
        h1 {
 
    text-align:center;
}
@media screen and (max-width: 992px) {
  .container {
    display:flex;
    flex-direction:column;
    margin-left:20px;
    width:80%;
  }
     img{
        width:100%;
          
     }
     .form{
        align-self:center;
        
     }
}
    </style>
</head>
<body>
<body>




    
    
<div data-aos="fade-up"
     data-aos-anchor-placement="top-bottom">
     <h1>Handicraft products sale</h1>
</div>
     

    <div class="container">
    <img src="./images/Computer login (1).gif" alt="" class="image"> 
 <form class="form" method="post" action="" autocomplete="off">
     <label for="username" class="label">Username</label>
     <input type="text" id="username" name="username" required class="input">
     <label for="password" class="label">Password</label>
     <input type="password" id="password" name="password" required class="input">
     <input type="submit" class="submit">
     <p>Don't have an account? Click here</p>
     <a href="productregister.php" class="submit">Signup</a>
 </form>
    </div>
    <?php
require("dbcon.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        $query = "SELECT * FROM registration WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            
           
            $_SESSION['loggedin'] = true;
            $_SESSION["username"] = $username;
            header("Location: products.php");
            exit();
        } else {
          
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
            echo "<script>Swal.fire('Invalid username or password', '', 'error');</script>";
        }

        mysqli_close($conn);
    } else {
        
        echo "Username or password not set";
    }
}
?>


</body>

      
       

    <script>
        setInterval(function() {
            document.querySelectorAll('.form').forEach(function(form) {
                form.style.borderColor = getRandomColor();
            });
        }, 2000);

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
      
     
           
  

        AOS.init();
    </script>

</body>
</html>

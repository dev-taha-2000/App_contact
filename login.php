    <?php
        include'classUser.php';
        if(isset($_POST['submit'])){
           $objie=new Main;   
           $objie->login($_POST['username'],$_POST['password']); 
        } 
    ?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> 
    <title>ContactBrave | login</title> 
</head>
<body>
         <!-- ::::::::::::::::header:::::::::::::::::::::::: -->
         <header class="d-flex justify-content-between p-2">   
            <h2><a href="index.php" style="text-decoration:none;color:black;">ContactBrave</a></h2> 
            <nav> 
                <ul> 
                    <li><a href="login.php" class="login">login</a></li> 
                    <li><a href="signUp.php" class="signUp">signUp</a></li>
                </ul>
            </nav>   
       </header> 
         <!-- ::::::::::::::::header:::::::::::::::::::::::: -->
        
        <form method="POST" class="signup">  
           <div class="form">  
               <div style="text-align:center">  
                    <h1 class="titre">Login</h1> 
                </div>  
                <label for="username">UserName*</label> 
                <input type="text" name="username" id="username" placeholder="usderName" required  class="form-control">  
                <label for="password">password*</label> 
                <input type="password" name="password" id="password" placeholder="password" required class="form-control">  
                <div style="margin:12px"> 
                    <input type="checkbox" id="check" name="check">        
                    <label for="check">Rememberme</label>  
                </div> 
                <div style="text-align:center;margin-top:10px">  
                    <button class="btn btn-primary" name="submit">login</button> 
                    <a href="sinUp.php"><button class="btn btn-light">signUp</button> </a> 
                </div> 
                <p style="text-align:center; margin-top:10px"><a style="color:black" href="#">forget password!</a></p>
           </div>
            <img src="img/const.jpg" id="img"style="height:100px"> 
            
        </form>   
   
</body>
</html>
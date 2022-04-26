
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">   
    <title>Document</title>
</head>
<body>   
    <?php
        session_start(); 
        include'classUser.php'; 
        $objet=new Main;   
        $userRow=$objet->profile(); 
        $_SESSION['id']=$userRow['id']; 
        $img=$userRow['image'];
        if(isset($_POST['apload'])) 
        { 
            $objet->Apload();  
        } 
    ?>          
        <!-- ::::::::::::::::header:::::::::::::::::::::::: --> 
        <header class="d-flex justify-content-between p-2" >     
            <h2><a href="index.php" style="text-decoration:none;color:black;">ContactBrave</a></h2> 
            <nav> 
                <ul>   
                    <li><a href="login.php" class="login"><?php echo $_SESSION['userName'] ?></a></li>
                    <li><a href="contact.php" class="login">Contact</a></li>
                    <li><a href="logout.php" class="signUp">logout</a></li>  
                </ul>
            </nav>   
        </header>    
        <!-- ::::::::::::::::header:::::::::::::::::::::::: -->  
    <div class="consultation"><?php echo '<h1>'.'welecome'.':'.$_SESSION['userName'].'!'.'</h1>'?></div> 
    <div style="overflow:hidden;text-align:center;width:105px;height:100px;margin:auto;border-radius:50%;border:solid black">  
    <img src="img_apload/<?php echo $img; ?>" alt="img" class='img_user' style=" height:100%;width:100%"> 
    </div>  
    <form method="POST" enctype="multipart/form-data"> 
        <input type="file" name="img_profile">   
        <button type="submit" name="apload">ADD image</button>   
    </form>
   
        <h1 style="text-align:center">Your profile:</h1>
    
    <table class="table table-striped table-hover container">  
        <tr>     
            <th>Email</th>  
            <td><?php echo $userRow['Email']?></td>
        </tr>
        <tr>
            <th>userName</th> 
            <td><?php echo $userRow['userName']?></td>
        </tr>
        <tr>
            <th>Date</th>
            <td><?php echo $userRow['Date']?></td> 
        </tr>
       
        
        
    </table>
        
    
</body>
</html>

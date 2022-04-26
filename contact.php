
<?php
  session_start();
  if(empty($_SESSION['userName'])){     
    header('Location:login.php');  
  }
  require'classUser.php';  
  $objet=new Crude();   
  if(isset($_POST['ADD'])){  
    $objet->insert($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['adresse']);   
  }   
  if(isset($_POST['edit'])){   
     $objet->edit($_POST['id_contact'],$_POST['name'],$_POST['phone'],$_POST['adresse'],$_POST['email']);  
  }   
?>   
        

      
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contacts</title>  
</head> 
<body>  
    <!-- ::::::::::::::::::::::::::::::::header::::::::::::::::::::::::::::::::: -->
      <header class="d-flex justify-content-between p-2" >     
            <h2><a href="index.php" style="text-decoration:none;color:black">ContactBrave</a></h2>  
            <nav> 
                <ul> 
                    <li><a href="home.php" class="login">home</a></li>  
                    <li><a href="logout.php" class="signUp">logout</a></li>  
                </ul>
            </nav>    
        </header>     
    <!-- ::::::::::::::::::::::::::::::::header::::::::::::::::::::::::::::::::: -->
    <h1 style="text-align:center">Your contacts:</h1> 
    <div class="buttons">    
      <button   type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD Contact</button>
    </div>  
    <!-- ::::::::::::::::::::::::::::::::::search::::::::::::::::::::::::::::::::: -->
      <form   method="GET" > 
        <div class="input-group mb-3 w-25 float-end">  
            <input type="search" value="<?php if(isset($_GET['search'])) echo $_GET['search'];?>" name="search" class="form-control" placeholder="Search"> 
            <button type="submit" class="btn btn-primary">Search</button>  
         </div>  
      </form> 
     
    <!-- ::::::::::::::::::::::::::::::::::search:::::::::::::::::::::::::::::::::: -->

    <!--:::::::::::::::::::::::::::::::::::modal::::::::::::::::::::::::::::::::::::::: --> 
        
              <form method="POST" >    
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="Modal"> 
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header"> 
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>  
                      <div class="modal-body">   
                        <input type="hidden" id='id_contact'  name="id_contact"                        placeholder="name"    >  
                        <input type="text"   id="name"        name="name"         class="form-control" placeholder="name"    >                                   
                        <span></span> 
                        <input type="text"   id="phone"       name="email"        class="form-control" placeholder="email"   >                          
                        <span></span> 
                        <input type="text"   id="email"       name="phone"        class="form-control" placeholder="phone"   >   
                        <span></span>                       
                        <input type="text"   id="Adresse"     name="adresse"      class="form-control" placeholder="Adresse" >
                        <span></span>                             
                      </div>
                      <div class="modal-footer">
                        <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>  
                        <input id="submit" type="submit" class="btn btn-primary" name="ADD" value="ADD" href="crude.php?id=<?php echo $info['id_contact']?>&edit">  
                      </div>
                    </div>
                  </div>  
                </div>  
              </form> 
                  
    <!-- :::::::::::::::::::::::::::::::::::modal::::::::::::::::::::::::::::::::::::::: -->
    <?php
    $select=new Crude;
    $final=$select->select(); 
    if(isset($_GET['search'])){  
      $search=$_GET['search'];
      $value=$objet->search($search);   
    }  
    ?>   
    <table class="table table-striped">    
        <tr>  
            <th>name</th>
            <th>phone</th>
            <th>email</th>
            <th>adresse</th>  
            <th>delete</th> 
            <th>apdate</th> 
        </tr>  
        <?php 
    if(empty($_GET['search'])) 
    {     foreach($final as $info){  
        ?>     
        <tr>   
          <td><?php  echo $info['name']?></td>   
          <td><?php  echo $info['phone']?></td>    
          <td><?php  echo $info['email'] ?></td>  
          <td><?php  echo $info['adresse']?></td>  
          <form method="POST">     
            <td> 
            <a  href="javascript:DeleteContact(<?php echo $info['id_contact']?>);"style="color:black" >           
              <svg style="margin-left:20px;cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
              </svg> 
            </a>      
            </td>    
    
            <td>  
            <a name="apdate" onclick="update(<?php echo  $info['id_contact']?>,'<?php echo $info['name']?>',<?php echo $info['phone']?>,'<?php echo $info['email']?>','<?php echo $info['adresse']?>')"  data-bs-toggle="modal" data-bs-target="#exampleModal">    
            <svg style="margin-left:20px;cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>  
            </a>  
            </td>  
          </form>  
        </tr>
       <?php  
    }
     }    
       ?>    
               <?php 
    if(!empty($_GET['search'])) 
    {     foreach($value as $valu){    
        ?>     
        <tr>   
          <td><?php  echo $valu['name']?></td>   
          <td><?php  echo $valu['adresse']?></td>    
          <td><?php  echo $valu['phone'] ?></td>  
          <td><?php  echo $valu['email']?></td>  
          <form method="POST">     
            <td> 
            <a  href="javascript:DeleteContact(<?php echo $valu['id_contact']?>);"style="color:black" >           
              <svg style="margin-left:20px;cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
              </svg> 
            </a>      
            </td>    
    
            <td>  
            <a name="apdate" onclick="update(<?php echo  $valu['id_contact']?>,'<?php echo $valu['name']?>',<?php echo $valu['phone']?>,'<?php echo $valu['email']?>','<?php echo $valu['adresse']?>')"  data-bs-toggle="modal" data-bs-target="#exampleModal">    
            <svg style="margin-left:20px;cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>  
            </a>  
            </td>  
          </form>  
        </tr>
       <?php  
    }
     }    
       ?>    
    </table> 
                               
    <script>      
        function DeleteContact(id){    
          if(window.confirm('Voulez-vous vraiment supprimer ?')) 
          {
            window.location.href = "crude.php?id="+id;    
          }    
        }    
        function update(id_contact,name,phone,email,adresse){  
          console.log(id_contact,name,phone,email,adresse);    
          let btn=document.getElementById('submit').value='edit';bt=document.getElementById('submit').name='edit';
              bt=document.getElementById('submit').type='submit'; 
              document.getElementById('id_contact').value=id_contact;  
              document.getElementById('name').value=name;  
              document.getElementById('phone').value=phone;  
              document.getElementById('email').value=email;  
              document.getElementById('Adresse').value=adresse;  
        }   
    </script>   
</body>  
</html>


<!-- if(!empty($_GET['search']))echo $value['name'];else   
if(!empty($_GET['search']))echo $value['email'];else  
if(!empty($_GET['search']))echo $value['phone'];else  
if(!empty($_GET['search']))echo $value['adresse'];else -->
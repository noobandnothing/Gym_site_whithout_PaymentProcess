
<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="gallery.css">
    <script src="my_custome.js"></script>

</head>


<body class="body">

    <header class="header">
        <h2>AAST <br>&nbsp &nbspGym</h2>
        <nav class="navbar">
        <a href="../Main.php">Home</a>
        <a href="#">Gallery </a>
        <a href="../Class/Class.php">Classes</a>
        <a href="../Contact/Contact.php">Contact</a>

        
            <?php session_start(); if(isset($_SESSION['SL'])){?>
                <a  style="width:auto;"><?php echo $_SESSION['username'];?></a>
                <a id="LogOut" onclick="GoTo(this)" style="width:auto;">Log out</a>
            <?php }else {?>
                <a onclick="document.getElementById('id01').style.display='block'" class="btn"  style="font-style:italic;">Login</a>
            <?php }?>
        </nav>
    </header>
       
<section class="home"> 
    
     
           
      <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400&display=swap" rel="stylesheet">
      <div class="space"></div>
<br>
<br>
<br>

<div  class="sizing">
      <div class="gallery">
	<div class="gallery__column">
	
              <figure class="gallery__thumb">
				<img src="https://c0.wallpaperflare.com/preview/541/597/191/exercise-fitnessgear-gymrat-trainhard.jpg"  class="gallery__image">
                
                </figure>
		
         <div class="space2"></div>
		
			
				<img src="https://c0.wallpaperflare.com/preview/704/283/674/casual-close-up-colors-contemporary.jpg"  class="gallery__image">
				
			
	
            <div class="space2"></div>
		
			<figure class="gallery__thumb">
				<img src="https://c1.wallpaperflare.com/preview/296/691/592/training-sport-fit-sporty.jpg"  class="gallery__image">
				
			</figure>
            <div class="space2"></div>
            <figure class="gallery__thumb">
				<img src="https://images.unsplash.com/photo-1554344728-77cf90d9ed26?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"  class="gallery__image">
			
			</figure>
		<br>
	</div>
	<div class="space"></div>
	<div class="gallery__column">
		
			<figure class="gallery__thumb">
				<img src="https://c1.wallpaperflare.com/preview/941/608/14/fitness-studio-training-fitness-room.jpg"  class="gallery__image">
				
			</figure>
            <div class="space2"></div>
		
		
			<figure class="gallery__thumb">
				<img src="https://images.unsplash.com/photo-1526506118085-60ce8714f8c5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"  class="gallery__image">
				
			</figure>
            <div class="space2"></div>

		
			<figure class="gallery__thumb">
				<img src="https://images.unsplash.com/photo-1548690312-e3b507d8c110?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"  class="gallery__image">
				
			</figure>
		
	</div>

    <br>
	<div class="space"></div>
	<div class="gallery__column">
		
			<figure class="gallery__thumb">
				<img src="https://images.unsplash.com/photo-1507398941214-572c25f4b1dc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=773&q=80"  class="gallery__image">
			
			</figure>
		
            <div class="space2"></div>
		
			<figure class="gallery__thumb">
				<img src="https://images.unsplash.com/photo-1632781297772-1d68f375d878?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=327&q=80"  class="gallery__image">
				
			</figure>

           

            <figure class="gallery__thumb">
				<img src="https://images.unsplash.com/photo-1578874691223-64558a3ca096?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80"  class="gallery__image">
			
			</figure>


            
		
	</div>
  
</div>
</div>

      
      </div>
    </div>
</section>
</body>

<video autoplay muted loop id="myVideo">
  <source src="gym1.mp4" type="video/mp4">
</video>



<div id="id01" class="modal">

    <form class="modal-content animate" action="../Customer/Login.php" method="post" style="background-color: black">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="../../uploads/login.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="container-cus">
            <input type="text" placeholder="Enter Username" name="uname" required>

            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit"  class="cus" name="submit">Login</button>
        </div>

        <div class="container-cus" style="background-color: black">
            <button type="button" class=" cancelbtn" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <button style="float: right" type="button" class="cancelbtn" id="REG" onclick="GoTo(this)">Register</button>
        </div>
    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</html>


</html>

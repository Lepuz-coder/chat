<?php
if(isset($_COOKIE['kullaniciad'])){
	header("Location:giris.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    
<title>Giriş</title>
<style>
	#log {
margin-top:20%; 
min-height:250px;
background-color:#FEFEFE;	
border-radius:10px;
border:1px solid #B7B7B7;
}
</style>
	<script type="text/javascript" src="kayit.js"></script>
</head>
<body style="background-color:#EEE;">
<div class="container text-center">
<div class="row text-center">
	    
        
        
        
        
        
        <div class="col-md-4  mx-auto text-center" id="log">     
        <form action="" method="post" id="kayitform">
        
			
		<div class="col-md-12 border-bottom p-2"><h3>CHAT KAYIT</h3></div>
        <div class="col-md-12">
			
		<input type="text" name="kulad" class="form-control mt-2" required="required" placeholder="Kullanıcı Adınız" autofocus="autofocus" />
			
			</div>
        <div class="col-md-12">
			
			
		<input type="password" name="sifre" class="form-control mt-2" required="required" placeholder="Şifreniz" />
		
			
		<input type="password" name="sifre2" class="form-control mt-2" required="required" placeholder="Şifreniz Tekrar" />
		
			
			</div>
        
  <div class="col-md-12"><input type="button" name="buton" class="btn btn-info mt-2" value="KAYIT" /></div>
			<div class="col-md-12" id="info"></div>
        </form>
        <a href="giris.php">Üye misiniz?</a>
     
        </div>
        
        
        
        
        
        
        
        
       

</div>

</div>
</body>
</html>
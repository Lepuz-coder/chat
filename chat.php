<?php
include("islemler.php");
	if(!isset($_COOKIE['kullaniciad'])):

		header("Location:giris.php");

	endif;
	$id = $_COOKIE['kullaniciid'];

	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="chat.js"></script>
	
	<script type="text/javascript">
		
		$(document).ready(function(){
			$.post("islemler.php?islem=dongu",{},function(donen_veri){
				
				var veri = $.parseJSON(donen_veri);
				$('#dropdownistek').html(veri.dropdown);
				$('#frqcount').html(veri.sayi);
				$('#arkadaslar').html(veri.arkadaslar);
				
				
			});
			
			setInterval(function(){
				$.post("islemler.php?islem=dongu",{},function(donen_veri){
				
				var veri = $.parseJSON(donen_veri);
				$('#dropdownistek').html(veri.dropdown);
				$('#frqcount').html(veri.sayi);
				$('#arkadaslar').html(veri.arkadaslar);
			});
			},5000)
			
			$('#isteklertablosu').hide();
			
			var flag=1;
			$('#isteklerigorbuton').click(function(){
				
				flag++;
				
				$('#isteklertablosu').slideToggle(700);
				
				var sonuc = flag % 2;
				if(sonuc == 0){
					$('#isteklerigorbuton').html("Kapat");
					$('#isteklerigorbuton').removeClass("btn-primary").addClass("btn-danger");
				}else{
					$('#isteklerigorbuton').html("İstekleri Gör");
					$('#isteklerigorbuton').removeClass("btn-danger").addClass("btn-primary");
				}
				
			})
			
			$('#istekgonder').click(function(){
				$.ajax({
					type:"POST",
					url:"islemler.php?islem=istekgonder",
					data:$('#istekgondermeform').serialize(),
					success:function(donen){
						$('#istekgondermeform').trigger("reset");
						$('#isteksonuc').html(donen);
						setTimeout(function(){
							$('#isteksonuc').html("");
						},3000);
					}
				})
			})
			
			//Arama kutusu gibi her harfte o harfleri içeren kullanıcı adını yazdır :
			
			$('input[name="istekisim"]').on("keyup",function(){
				
				$.post("islemler.php?islem=dbkullaniciara",{"deger":$(this).val()},function(donen){
					$('#isteksonuc').html(donen);
				})
				
			})
			
			setInterval(function(){
				$('#mesajlarburada').load("islemler.php?islem=mesajgoster");
			},50);
			
			$('#mesajyazma').keyup(function(e){
				
				if(e.keyCode == 13){
					var deger = $('#mesajyazma').val();
					$.post("islemler.php?islem=mesajgonder",{"mesaj":deger},function(d){
						$('#mesajyazma').val("");
						$('#konusmalar').scrollTop($('#konusmalar')[0].scrollHeight+120);
						setTimeout(function(){
							$('#konusmalar').scrollTop($('#konusmalar')[0].scrollHeight+120);
						},100);
						
					});
				}
				
			})
			
		})
		
		
	
	</script>

</head>

<body class="bg-light">
	
	
	<div class="container">
	
	<div class="row col-9 mx-auto border" style="margin-top: 50px; border-radius:3px; background-color:white;">
		
		<div class="container-fluid">
			
			<div class="row" style="height: 500px;">
			
				<div class="col-5 border-right border-light">
				
					<div class="row border-bottom border-light" >
						<div class="alert alert-info w-100 text-center mt-4 mr-4"><?php echo $_COOKIE['kullaniciad']; ?> <button class="btn btn-danger btn-sm btn-block mt-2" id="cik">ÇIK</button> </div>
					<img src="human-icon-png-13.jpg.png" width="50px;" >
						<span style="display: inline-block; margin:auto;"><span class="text-info" id="frqcount"></span> Arkadaşlık İsteği
						
							<!--İsteklerin Görüldüğü Yer-->
							<div class="mr-3" style="display: inline-block;">
  <div class="btn btn-primary ml-2" id="isteklerigorbuton">
    İstekleri Gör
  </div>
	
</div>
		
							
						
						
					</div>
						<!--Bu Bölümde Arkadaş İstekleri Görülür-->
						<div>
						<div class="row mx-auto" id="isteklertablosu" style="position: absolute; z-index: 1000; background-color: white; width: 90%; " >
						<div style="width: 100%; height: 70px; overflow-y:hidden;">
						<table class="table pt-5">
						  <thead>
							<tr>
							  <th colspan="4"></th>
							</tr>
						  </thead>
						  <tbody id="dropdownistek">
							
							
							  
						  </tbody>
						</table>
						</div>
					</div>
						</div>
						
					<div class="row mx-auto bg-white" >
						<div class="alert alert-light w-100 text-center mt-4 mr-4"><button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModalCenter">
  Arkadaş Ekle
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">İstek Gönder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<form id="istekgondermeform">
		  <input type="text" class="form-control" placeholder="Arkadaşlık isteği göndereceğinz kullanıcı adını giriniz.." name="istekisim">
		  <div class="col-12 mt-3" id="isteksonuc"><!--İnputa her klavye tıklamasında array dbkisiler'de o verinin isminde geçenin olup olmadığını kontrol edip olanları liste şeklinde yazdıran sistemi buraya yapıcaksın--></div>
		  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button type="button" class="btn btn-primary" id="istekgonder">Gönder</button>
		  </form>
      </div>
    </div>
  </div>
</div></div>
						<div style="overflow-y: auto; height: 300px; width: 100%">
						<table class="table">
						  <thead>
							<tr>
							  <th colspan="4" class="text-center text-info" >ARKADAŞLAR</th>
							</tr>
						  </thead>
						  <tbody id="arkadaslar">
							
						  </tbody>
						</table>
						</div>
						
					</div>
				</div>
				
				<div class="col-7 mt-5 border-bottom border-light" style="overflow-y: scroll; height: 480px;" id="konusmalar">
				<!--Mesajların Geleceği Kısım-->
					
					
					
					<div id="mesajlarburada">
					
					
					</div>
					
					
				</div>
				
			</div>
			<div class="row mt-3 mb-3">
			
				<div class="col-5">
				
				</div>
				
				<div class="col-7">
				<input class="form-control w-100" style="margin-top: auto; height: 45px;" placeholder="Mesaj Giriniz" id="mesajyazma">
				</div>
			
			</div>
			
			
			
		</div>
		
	</div>
		
		
		
		
	</div>
	

</body>
		
	
		
</html>
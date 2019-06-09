<?php

require_once ("model/Article.php");

if(isset($_POST['submit']))
{
    $article = new Article($_POST['art_nr'],$_POST['art_bez'], $_POST['art_ek'], $_POST['art_vk'], $_POST['art_grp'], $_POST['art_quantityAv'], $_POST['bestandsv']);
    $article->handleReq();

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lager</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="js/validate.js"></script>
<!--===============================================================================================-->
</head>
<body>

	<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact2">
			<div class="wrap-contact2">


				<form method="POST" action="index.php" class="contact2-form validate-form">
					<span class="contact2-form-title">
						Lager
					</span>


					<div class="container">
						<div class="row">
							<div class="col-sm">
								<label>Artikelgruppe</label>
								<select id="artGroup" name="art_grp">
									<option value="Werkzeug">Werkzeug</option>
									<option value="Autoteile">Autoteile</option>
									<option value="Sonstiges">sonstiges</option>
								</select>
							</div>
							<div class="col-sm">
								<div class="wrap-input2">
								<label>Artikelnummer</label>
								<input id="artNr" class="input2" type="text" name="art_nr">
								</div>
							</div>
							<div class="col-sm">
								<div class="wrap-input2">
								<label>Artikelbezeichnung</label>
								<input id="artBez" class="input2" type="text" name="art_bez">
								</div>
							</div>
						</div>
					</div>

					<div class="container">
						<div class="row">
							<div class="col-sm">
								<div class="wrap-input2">
								<label>Verkaufspreis</label>
								<input id="vk" class="input2" type="text" name="art_vk">
								</div>
							</div>
							<div class="col-sm">
								<div class="wrap-input2">
									<label>Einkaufspreis</label>
									<input id="ek" class="input2" type="text" name="art_ek">
								</div>
							</div>
							<div class="col-sm">
								<div class="wrap-input2">
									<label>Lagerbestand</label>
									<input id="lagerbest" class="input2" type="text" name="art_quantityAv">
								</div>
							</div>
						</div>
					</div>

					<div class="container">
						<div class="row">
							<div class="col-sm">
								<div class="wrap-input2">
								<label>Bestandsveränderung</label>
								<input id="bestandsV" class="input2" type="text" name="bestandsv">
									</div>
							</div>
					</div>



                        <div class="row">
                            <div class="col-sm">
                                <div class="container-contact2-form-btn">
                                    <div class="wrap-contact2-form-btn">
                                        <div class="contact2-form-bgbtn"></div>
                                        <input class="select2-container--classic" name="submit" type="submit" onsubmit="return validate()" class="contact2-form-btn">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="container-contact2-form-btn">
                                <div class="wrap-contact2-form-btn">
                                    <div class="contact2-form-bgbtn"></div>
                                    <button class="select2-container--classic" onClick="deckungsbeitrag()">Statistik</button>
                                </div>
                            </div>

                        </div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

</body>
</html>

<?php
/**
 * ============***===========***===========
 * Trombinoscope LP DWM Paris 8 2017-2018
 * 		by rivelson on Wed 1, kali linux
 * ========================================
 */
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>LP DWM Trombino</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<!-- personal css file -->
		<link rel="stylesheet" href="css/master.css">
		<link rel="stylesheet" href="css/hover-min.css">
		<script src="https://d3js.org/d3.v4.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="http://dimplejs.org/dist/dimple.v2.3.0.min.js"></script>
	</head>
<body>
	<div class="wrapper">
		<h2>Trombinoscope LP Design Web Mobile</h2>
		<br><br>
        <h3>Université Paris 8 </h3>
		<h5>Promo 2016 / 2017</h5>
		<br><br>

		<div class="container">
			<div class="row" id="etuCards" >
			</div>
		</div>

		<script>
			var dataPhoto;

			//récupération des photos du groupe flickr
			//merci beaucoup à https://etienner.fr/flickr-json
			var urlFlickr = "https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key=79672885f8a018343cd8849f57e8a50a&photoset_id=72157686701939221&extras=original_format&format=json&jsoncallback=?";
			$.getJSON(urlFlickr,
			function(data){
				dataPhoto = data;
				//récupération des données du formulaire google
				var url = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vT4vIu2pcoPH6Vng35aQzwRAxQV9ogt8B9fyp-3cr1aVEdEh5rAhDfj_sB7OYoeLRZGalhq1trkCLRd/pub?gid=2097717787&single=true&output=csv';
			    //var url = "data/LPDesignWebMobile_17-18.csv";
				d3.csv(url, function(data) {

					var cards = d3.select('#etuCards').selectAll(".col-sm-3 col-md-4").data(data).enter()
						.append('div').attr('class','col-sm-3 mb-4')
						.append("div").attr('class','card');
				  	cards.append("img")
				  			.attr('class','card-img-top hvr-bounce-in')
				  			.attr('src',function(d) {
				    			var item = dataPhoto.photoset.photo[d['num photo']];
					        	var src = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_c.jpg';
				    			return src;
						    });
					var cardBody = cards.append('div').attr('class','card-body');
					cardBody.append('h4').attr('class','card-title')
				    			.text(function(d) {
					    			return d['Votre prénom'].toLowerCase() + '  ' + d['Votre nom'].toLowerCase();
								});
					cards.append('div').attr('class','card-footer')
						.append('small').attr('class','text-muted')
						.text(function(d) {
					    	return d['Votre mail'].toLowerCase();
						});
				});
			});
			//Fin appel JSON
		</script>

	</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>

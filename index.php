<?php
//var_dump($_FILES['up']['name']);
?>
<!Doctype html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="description">
	<meta name="author" content="nom autheur">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>css</title>
	<link rel="stylesheet/css" href="global.css">
</head>
<body>
	<header>
		<nav>
			<ul>
				<li>Home</li>
				<li>lien 1</li>
				<li>lien 2</li>
				<li>lien 3</li>
				<li>lien 4</li>
			</ul>
		</nav>
	</header>
	<main>
		<h1>Titre central</h1>
		<section>
			<article>
				<h2>Titre de section</h2>
				<p>Paragraphe et texte</p>
			</article>
		</section>
		<section>
			<article>
				<h2>Titre de section 2</h2>
				<p>texte et paragraphe 2</p>
			</article>
		</section>
		<div id="demo"></div>
		<form id ="myForm" method="POST" action="" enctype="multipart/form-data">
			<label for="up">Upload</label>
			<input type="file" id="up" name="up">
			<!--<input type="text" name="no" id="no" value="nono le petit robot">-->
			<!--<input type="submit" id="sub" value="envo">-->
			
		</form>
		
	</main>
	<footer>
		© footer
	</footer>
	<script>
		document.getElementById('up').addEventListener("change",function(event){
			event.preventDefault();
			chek();
		});
		function chek() {
			const f = document.getElementById('myForm');
			const data = new FormData(f);
			const xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById('demo').innerHTML = xhr.responseText
				}
			}
			xhr.open("POST", "response.php", true);
			xhr.send(data);
		  
		}
	</script>
</body>
</html>
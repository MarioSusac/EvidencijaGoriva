
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Evidencija goriva</title>
</head>
<body>

<!-- test nav -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navigacija</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="forma.php">Pocetna</a></li>
      <li class="nav-item"><a class="nav-link" href="citaj_xml.php">Pregledaj unose</a></li>
    </ul>
  </div>
</nav>
<!-- gotov nav -->

<!-- tablica -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <h1 class="mb-5 text-center">Pregled svih unosa</h1>
               
				<table class="table table-striped">				
					<thead>
						<tr>
						<td scope="col">Datum</td>
						<td scope="col" align='right'>Kilometara</td>
						<td scope="col" align='right'>Litara</td>
						<td scope="col" align='right'>Prosjek na 100km</td>
						</tr>
					</thead>
					<?php
						$xml=simplexml_load_file("baza.xml") or die("Dogodila se greskica...");
						foreach($xml->children() as $unos) {
						  echo "<tr><td>" . $unos->datum . "</td>";
						  echo "<td align='right'>" . $unos->km . "</td>";
						  echo "<td align='right'>" . $unos->lit . "</td>";
						  	if($unos->km <= 0){
								$vprosjek = "greska !";
							}
							else{
								$vprosjek = $unos->lit/$unos->km*100;
							}
						  echo "<td align='right'>" . round($vprosjek, 2) . "</td></tr>";
						}
					?>
				</table> 

            </div>
        </div>
        <div class="mb-5"></div>
    </div>
<!-- kraj tablice -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous">
	</script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous">
	</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous">
	</script>
</body>
</html>

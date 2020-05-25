<?php
if(isset($_REQUEST['ok'])){
	$xml = new DOMDocument("1.0","UTF-8");
	$xml->load("baza.xml");
		
	$rootTag = $xml->getElementsByTagName("document")->item(0);
	$unosTag = $xml->createElement("unos");
		
	$datumTag = $xml->createElement("datum",$_REQUEST['datum']);
	$kmTag = $xml->createElement("km",$_REQUEST['km']);
	$litTag = $xml->createElement("lit",$_REQUEST['lit']);
	
	$unosTag->appendChild($datumTag);
	$unosTag->appendChild($kmTag);
	$unosTag->appendChild($litTag);
		
	$rootTag->appendChild($unosTag);
	$xml->save("baza.xml");
}
?>

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
      <li class="nav-item"><a class="nav-link" href="forma.php">Početna</a></li>
      <li class="nav-item"><a class="nav-link" href="citaj_xml.php">Pregledaj unose</a></li>
    </ul>
  </div>
</nav>
<!-- gotov nav -->

<!-- forma -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1 class="mb-5 text-center">Unesite podatke o točenju goriva</h1>
                <form action="forma.php" method="post">
                    <!-- Datum točenja -->
                    <div class="form-group">
                        <label for="datum">Datum točenja</label>
                        <input title="Unesite datum utakanja goriva (npr. 31.12.2008.)" type="text" name="datum" class="form-control" id="datum">
                    </div>
                    <!-- Stanje brojčanika -->
                    <div class="form-group">
                        <label for="km">Prijeđeno kilometara od zadnjeg utakanja</label>
                        <input title="Unesite prijeđenu kilometražu od zadnjeg utakanja (npr: 560)" type="text" name="km" class="form-control" id="km">
                    </div>
					<!-- Utočeno litara -->
                    <div class="form-group">
                        <label for="lit">Utočeno litara</label>
                        <input title="Unesite količinu utočenog goriva u litrama (npr 53.66)" type="text" name="lit" class="form-control" id="lit">
                    </div>
					<button type="submit" name="ok" class="btn btn-primary float-right mt-3">Zapiši u XML</button>
                </form>

            </div>
        </div>
        <div class="mb-5"></div>
    </div>
<!-- kraj forme -->

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
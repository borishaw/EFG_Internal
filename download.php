<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location: index.php');
}

$file = fopen("footer.html","w");

file_put_contents('footer.html', $_POST['footer-download']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
	 
	 <script src="js/lib/download.min.js"></script>
	 
</head>
<body>
<!--<a href="footer.html" download>Click to download</a>-->


<p id="downloadLabel">Your file will begin downloading now. If the download doesn't start, <a href="footer.html" download>click here</a>.</p>
<script>
downloadFile('footer.html');

</script>

</body>
</html>

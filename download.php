<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location: index.php');
}

$path = "footers/" . $_POST['username'] . ".html";

$file = fopen($path, "w");

file_put_contents($path, $_POST['footer-download']);
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


<p id="downloadLabel">Your file will begin downloading now. If the download doesn't start, <a href="<?php echo $path ?>" download>click here</a>.</p>
<script>
downloadFile("<?php echo $path ?>");

</script>

</body>
</html>

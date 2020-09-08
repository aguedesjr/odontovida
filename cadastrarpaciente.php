<!DOCTYPE html>
<html lang="en" class=" scrollbar-type-1 sb-cyan">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Metro 4 -->
    <link rel="stylesheet" href="Pandora/source/vendors/metro4/css/metro-all.min.css">
    <link rel="stylesheet" href="Pandora/source/css/index.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
    <title>Odontovida</title>

    <script>
        window.on_page_functions = [];
    </script>

    <? 
        session_start();
        $login = $_SESSION['login']; 
    ?>

</head>
<body class="m4-cloak h-vh-100">
<div data-role="activity" data-type="square" data-style="color"></div>
<div data-role="navview" data-toggle="#paneToggle" data-expand="xl" data-compact="lg" data-active-state="true">
    <? include ("menu.php"); ?>
  </div>
</div>


<!-- jQuery first, then Metro UI JS -->
<script src="Pandora/source/vendors/jquery/jquery-3.4.1.min.js"></script>
<script src="Pandora/source/vendors/chartjs/Chart.bundle.min.js"></script>
<script src="Pandora/source/vendors/qrcode/qrcode.min.js"></script>
<script src="Pandora/source/vendors/jsbarcode/JsBarcode.all.min.js"></script>
<script src="Pandora/source/vendors/ckeditor/ckeditor.js"></script>
<script src="Pandora/source/vendors/metro4/js/metro.min.js"></script>
<script src="Pandora/source/js/index.js"></script>
</body>
</html>
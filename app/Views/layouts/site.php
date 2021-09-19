<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Hello world</title>
  <meta name="description" content="Site description" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="/images/favicon.png" rel="shortcut icon" />
  <link rel="stylesheet"  href="/css/styles.css" />
</head>
<body>
<?php require_once VIEWS.'/layouts/nav.php';?>

{{content}}

<?php require_once VIEWS.'/layouts/footer.php';?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script src="js/db.js"></script> -->
  <script src="/js/app.js"></script>

</body>
</html>
<?php
$_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
?>
<!DOCTYPE html>
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title><?php echo isset($page_title) ? $page_title : "Leder Store"; ?></title>
 
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="libs/css/custom.css" />
</head>
<body>
    <?php include 'navigation.php'; ?>
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="page-header">
                    <h1><?php echo isset($page_title) ? $page_title : "Leder Store"; ?></h1>
                </div>
            </div>
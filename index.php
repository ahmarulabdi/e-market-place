<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>E-MarketPlace</title>
   <!-- Bootstrap Core CSS -->
   <link href="assets/css/bootstrap.min.css" rel="stylesheet">
   <!-- MetisMenu CSS -->
   <link href="assets/css/metisMenu.min.css" rel="stylesheet">
   <!-- Timeline CSS -->
   <link href="assets/css/timeline.css" rel="stylesheet">
   <!-- Custom CSS -->
   <link href="assets/css/startmin.css" rel="stylesheet">
   <link href="assets/css/jack.css" rel="stylesheet">
   <!-- Morris Charts CSS -->
   <link href="assets/css/morris.css" rel="stylesheet">
   <!-- Bootstrap date Picker -->
   <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.css"/>
   <!-- Custom Fonts -->
   <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <!-- jack sidebar -->
   <link href="assets/css/jack-sidebar.css" rel="stylesheet" type="text/css">
   <!-- jack navbar -->
   <link href="assets/css/jack-navbar.css" rel="stylesheet" type="text/css">
   <!-- jack listview -->
   <link href="assets/css/jack-listview.css" rel="stylesheet" type="text/css">

   <!-- jQuery -->
   <script src="assets/js/jquery.min.js"></script>
   <!-- morris -->
   <script src="assets/js/morris.js"></script>
   <!-- raphael -->
   <script src="assets/js/raphael.min.js"></script>

</head>

<body>
    <div id="wrapper">
      <?php include 'core/action.php'; ?>
        <?php session_start(); ?>
        <?php require_once 'pages/navbar.php';?>
        <?php require_once 'pages/sidebar.php';?>

        <!-- Page Content -->
        <?php if (isset($_SESSION['SES_MarketPlace'])): ?>
           <?php if ($hak_akses != 'direktur'): ?>
              <div id="page-wrapper">
           <?php else: ?>
           <div class="col-sm-8 col-sm-offset-2">
           <?php endif; ?>
        <?php endif; ?>
            <!-- <div class="container"> -->
                <!-- <div class="row"> -->
                    <?php require_once 'routing/master.php'; ?>
                <!-- </div> -->
                <!-- ... Your content goes here ... -->
            <!-- </div> -->
        </div>
        <?php require_once 'pages/footbar.php';?>
    </div>


    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/js/metisMenu.min.js"></script>
    <!-- jack form wizard -->
    <script src="assets/js/jack-formwizard.js" charset="utf-8"></script>
    <!-- Custom Theme JavaScript -->
    <script src="assets/js/startmin.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>
      <script type="text/javascript">
         $(document).ready(function () {
             $('.tanggal').datepicker({
                 format: "yyyy-mm-dd",
                 autoclose:true
             });
         });
     </script>
      <script>
         $(function (){
            $("[data-toggle='popover']").popover();
         });
      </script>
      <script type="text/javascript">
      $(document).ready(function() {
         $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
         $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
      });
      </script>


</body>

</html>

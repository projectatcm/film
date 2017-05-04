<?php
if(!isset($_SESSION)){session_start();}
if ($_SESSION['logintype'] !== 'admin'){header('Location: ./index.php ');}
require '../libs/Functions.php' ;
require '../libs/Common.php' ;
$functions = new Functions();
$common = new Common();
// base paths
$jsvendor = '../js/vendors';
$cssvendor = '../css/vendors';
$jscustom = '../js/custom';
$csscustom = '../css/custom';
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Film Booking</title>
    <!-- scripts -->
    <script src="<?=$jsvendor?>/jquery-1.12.4.js" charset="utf-8"></script>
    <script src="<?=$jsvendor?>/bootstrap.min.js" charset="utf-8"></script>
    <script src="<?=$jscustom?>/adminscripts.js" charset="utf-8"></script>
    <!-- css -->
    <link rel="stylesheet" href="<?=$cssvendor?>/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?=$cssvendor?>/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$cssvendor?>/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$cssvendor?>/admin.css">
    <link rel="stylesheet" href="<?=$cssvendor?>/location.css">
    <link rel="stylesheet" href="<?=$csscustom?>/admin.css">

  </head>
  <body>

<div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-image: none !important">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://cijulenlinea.ucr.ac.cr/dev-users/" >
                <img src="http://placehold.it/200x50&text=LOGO" alt="LOGO" >
            </a>
        </div>
        <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin User <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="settings.php"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="../actions.php?action=logout&page=admin"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
              <li><a href="home.php" class="text-capitalize"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
              <li><a href="addcrewdatas.php" class="text-capitalize"><i class="fa fa-fw fa-file-video-o"></i> Add Crews</a></li>
              <li>
                  <a href="#" data-toggle="collapse" data-target="#films"><i class="fa fa-fw fa-video-camera"></i> Films <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                  <ul id="films" class="collapse">
                      <li><a href="addfilms.php" class='text-capitalize'><i class="fa fa-angle-double-right"></i>Add Films</a></li>
                      <li><a href="allfilms.php" class='text-capitalize'><i class="fa fa-angle-double-right"></i>All Films</a></li>
                      <li><a href="filmcategory.php" class='text-capitalize'><i class="fa fa-angle-double-right"></i>Film Categroy</a></li>
                  </ul>
              </li>
              <li><a href="userdetails.php" class="text-capitalize"><i class="fa fa-fw fa-users"></i>User Datas</a></li>
              <li>
            			<a href="#" data-toggle="collapse" data-target="#theaters"><i class="fa fa-fw fa-building"></i> Theaters <i class="fa fa-fw fa-angle-down pull-right"></i></a>
            			<ul id="theaters" class="collapse">
                      <li><a href="addtheaters.php" class='text-capitalize'><i class="fa fa-angle-double-right"></i>Add Theaters</a></li>
                      <li><a href="alltheaters.php" class='text-capitalize'><i class="fa fa-angle-double-right"></i>All Theaters</a></li>
                      <li><a href="theaterrequest.php" class='text-capitalize'><i class="fa fa-angle-double-right"></i>Theater Requests</a></li>
                      <li><a href="approvedtheater.php" class='text-capitalize'><i class="fa fa-angle-double-right"></i>Approved Theaters</a></li>
                      <li><a href="blockedtheater.php" class='text-capitalize'><i class="fa fa-angle-double-right"></i>Blocked Theaters</a></li>
            			</ul>
            	</li>
              <li><a href="addlanguages.php" class="text-capitalize"><i class="fa fa-fw fa-language"></i>Add Languages</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >

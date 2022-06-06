<?php APP_AUTH_ADMIN::authRedirect(false, '/mf-admin'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body >

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><font style="color:limegreen;" >MritunjoY</font><font style="color:gold;" >frame</font></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/admin-dash"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
        <li><a href="/admin-blogs"><span class="glyphicon glyphicon-book"></span> Blogs</a></li>
        <!-- <li><a href="#">Gender</a></li> -->
        <li><a href="javascript:void(0)" " class="text-danger AdminLogout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2><font style="color:limegreen;" >MritunjoY</font><font style="color:gold;" >frame</font></h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="/admin-dash"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
        <li><a href="/admin-blogs"><span class="glyphicon glyphicon-book"></span> Blogs</a></a></li>
        <!-- <li><a href="#section3">Gender</a></li> -->
        <li><a href="javascript:void(0)"  class="text-danger AdminLogout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
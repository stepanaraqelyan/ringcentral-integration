<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Operator</title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/main.js"></script>
	</head>
	<body>
	    <!-- Navigation -->
	    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	      <div class="container">
	        <a class="navbar-brand" href="#">Operators</a>
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	          <span class="navbar-toggler-icon"></span>
	        </button>
	        <div class="collapse navbar-collapse" id="navbarResponsive">
	          <ul class="navbar-nav ml-auto">
	          	<?php if(!empty($me)): ?>
	          		<li class="nav-item">
	          			<a href="?op_type=get_data" class="btn btn-primary">Run API</a>
	          		</li>
		            <li class="nav-item">
		              <a class="nav-link" href="#"><?=$me->username?></a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" href="?action=logout">Logout</a>
		            </li>
		        <?php endif ?>
	          </ul>
	        </div>
	      </div>
	    </nav>

	    <!-- Page Content -->
	    <div class="container">
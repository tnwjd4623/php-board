<?php

	$connect = mysqli_connect("localhost", "tnwjd4623", "1q2w3e4r", "tnwjd4623") or die ("connect fail");
	$id = $_GET[id];
	$comment = $_GET['comment'];
	$number = $_GET['number'];
	$parent = $_GET['parent'];



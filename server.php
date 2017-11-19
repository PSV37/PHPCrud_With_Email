<?php include('mail.php'); 
 
    // Create Object Of Mail.php File
    $mailsend = new Mail();
 
    //Start Session
    session_start();

	//Declear Variables
	$name = '';
	$email ='';
	$address = '';
	$id = '';
	$edit_state = false;

	//Create Connection To Database
	$db = mysqli_connect('localhost','root','','php_mail');


	//Insert New User Into Database
	 if(isset($_POST['submit']))
	 {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$query = "INSERT INTO tbl_user (name , email , address) VALUES ('$name' ,'$email' ,'$address')";
		mysqli_query($db , $query );
		//Call Method Using Object Which Is Written Inside a Mail.php
		$mailsend->send_mail($email , $name);
		$_SESSION['msg'] = 'User Added Successfully And Also Send Mail';
		header('location:index.php');
	 }


    //Update Existing User
   if(isset($_POST['update']))
	  {
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$address = mysqli_real_escape_string($db,$_POST['address']);
		$id = mysqli_real_escape_string($db,$_POST['id']);
		mysqli_query($db,"UPDATE tbl_user SET name='$name', email='$email' ,address='$address'  WHERE id=$id ");
		$_SESSION['msg'] = 'User Address Updated';
		header('location:index.php');   
	  }


    //Delete User From Database
	  if(isset($_GET['del']))
	  {
		$id = $_GET['del'];
		$query = "DELETE FROM tbl_user WHERE id=$id";
		mysqli_query($db,$query);
		$_SESSION['msg'] = 'User Address Deleted';
		header('location:index.php');
	  }

	 //Retrive User Data From Database
	 $resuls = mysqli_query($db , "SELECT * FROM tbl_user");

 ?>
<?php 
	$this->load->view('templates/header.php');

	$this->load->view('templates/nav_bar.php');

	$this->load->view($main_content);

	$this->load->view('templates/footer.php');
 ?>
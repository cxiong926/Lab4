<?php

require_once('Template.php');

$page = new Template('Thank you');

$page->addHeadElement('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>');
$page->addHeadElement('<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>');
$page->addHeadElement('<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>');

$page->addHeadElement('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');

$page->finalizeTopSection();
$page->finalizeBottomSection();

$blank = "";
$errorMsg = "";
$errorMsgTwo = "";
$errorMsgThree = "";
$safeEmail = "";
$safeNumber = "";
$safeurl = "";

$safeEmail = trim($_POST['email']);
$safeEmail = filter_var($safeEmail, FILTER_SANITIZE_EMAIL);
$safeEmail = filter_var($safeEmail, FILTER_VALIDATE_EMAIL);

if (isset($safeEmail) && !empty($safeEmail)){
}
else{
	$errorMsg .= "Error: Please enter a valid email<br>";
}

$safeNumber = trim($_POST['number']);
$safeNumber = filter_var($safeNumber, FILTER_SANITIZE_NUMBER_INT);
$safeNumber = filter_var($safeNumber, FILTER_VALIDATE_INT);

if (isset($_POST['number']) && !empty($_POST["number"])){
}
else{
	
	$errorMsgTwo .= "Error: Please enter a valid number<br>";
	if($safeNumber === 0){
		$errorMsgTwo = "";
	}
}

$safeurl = trim($_POST['url']);
$safeurl = filter_var($safeurl, FILTER_VALIDATE_URL);
$safeurl = filter_var($safeurl, FILTER_SANITIZE_URL);
if (isset($safeurl) && !empty($safeurl)){
}
else{
	$errorMsgThree .= "Error: Please enter a valid url";
}

print $page->getTopSection();
print '<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">';
print '<span class="navbar-brand mb-0 h1">Lab 4:  Sanitization</span>';
print '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
print '<span class="navbar-toggler-icon"></span>';
print '</button>';
print '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
print '<ul class="navbar-nav mr-auto">';
print '<li class="nav-item">';
print '<a class="nav-link" href="search.php">Form<span class="sr-only">(current)</span></a>';
print '</li>';

print '</ul>';

print '</div>';
print '</nav>';

print '<h1 class="mt-5 text-center">' . $errorMsg .'</h1>';
print '<h1 class="text-center">' . $errorMsgTwo .'</h1>';
print '<h1 class="text-center">' . $errorMsgThree .'</h1>';

print '<h3 class="mt-5 text-center">Your email: ' . $safeEmail . '</h3>';
print '<h3 class="text-center">Your number: ' . $safeNumber . '</h3>';
print '<h3 class="text-center">Your URL: ' . $safeurl . '</h3>';

print $page->getBottomSection(); // closes the html

?>
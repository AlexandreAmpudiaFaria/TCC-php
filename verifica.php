<?php

session_start();
if(!SESSION['usuario']){
	header{'login.html'};
	exit;
}
<?php

// PHP Loader class to load all class file and initiate them.
include __DIR__.'/../config.php';

// Load Registration class and initiate it
include_once 'Registration.class.php';
$RegisterUser = new Registration();

// Login Logout Class and initialize it.
include_once 'Login.class.php';
$login = new Login();

// Forgot Password Class and initialize it.
include_once 'ForgotPass.class.php';
$forgotpass = new ForgotPass();

include_once 'PasswordReset.class.php';
$resetpass = new PasswordReset();

// Email Activation class
include_once 'Activation.class.php';
$activate = new Activation();


// Load Website Config class and initiate it
include_once 'WebsiteConfig.class.php';
$websiteConfig = new WebsiteConfig();
$url = $websiteConfig->getConfigValue('url');

//Email Sending Class and initialize it
include_once 'MailSend.class.php';
$MailSend = new MailSend();

// Include Hashing Class
include_once 'Hash.class.php';
$hash = new Hash();

// Include Display Category Class
include_once 'DisplayCat.class.php';
$displaycat = new DisplayCat();

// User Information class and initiate it.
include_once 'DisplayUserInfo.class.php';
$display_user_info = new DisplayUserInfo();

// Project View class
include_once 'ProjectView.class.php';
$project_view = new ProjectView();

//Biddign Class
include_once 'Bid.class.php';
$bid = new Bid();

// Profile and password handling class
include_once 'ProfileSave.class.php';
$profile = new ProfileSave();

include('db_func.php');
?>
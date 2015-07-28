<?php

// PHP Loader class to load all class file and initiate them.
include __DIR__ . '/../config.php';


// Load Website Config class and initiate it
include_once 'WebsiteConfig.class.php';
$websiteConfig = new WebsiteConfig();
$url = $websiteConfig->getConfigValue('url');

//Email Sending Class and initialize it
include_once 'MailSend.class.php';
$MailSend = new MailSend();

// Profile and password handling class
include_once 'ProfileSave.class.php';
$profile = new ProfileSave();

// Include Hashing Class
include_once 'Hash.class.php';
$hash = new Hash();

// User Information class and initiate it.
include_once 'DisplayUserInfo.class.php';
$display_user_info = new DisplayUserInfo();

// Job Posting class
include_once 'PostJob.class.php';
$job_post = new PostJob();

// Project View class
include_once 'ProjectView.class.php';
$project_view = new ProjectView();

//Biddign Class
include_once 'Bid.class.php';
$bid = new Bid();

// Messaging Class
include_once 'Message.class.php';
$message_class = new Message();


include('db_func.php');
?>

<?php

// Database Information:
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'mapleleaf';
$db = 'talisman';

// Dont want to have to type the username and password every time you start the editor?
// Set the two variables below to the values you want to be in the form when you start it up.
// (default login: admin  pw: password)
$login = '';
$password = '';

// Log SQL queries:  1 = on, 0 = off
$logging = 1;

// $log_file = path to the file your sql logs will be saved in.
// If you want a single log file, uncomment next line and comment the two monthly log options.
//$log_file = "logs/sql_log.sql";

// Automatically create new logs monthly.
$filetime = date("m-Y");
$log_file = "logs/sql_log_$filetime.sql";

// Log all MySQL queries (If disabled only write entries are logged - recommended.)
$log_all = 0;

// Log all MySQL queries that result in an error.
$log_error = 1;

// Enable or disable user logins.
$enable_user_login = 1;

// Enable or disable read only guest mode log in.
$enable_guest_mode = 1;

?>
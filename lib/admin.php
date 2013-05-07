<?php
switch ($action) {
  case 0:
    if (session::is_admin()) {
      $body = new Template("templates/admin/admin.tmpl.php");
      $users = list_users();
      $body->set('users', $users);
    }
    else {
      header('Location: index.php');
      exit;
    }
    break;
  case 1:
    if (session::is_admin()) {
      $body = new Template("templates/admin/admin.edit.tmpl.php");
      $user = user_info();
      $body->set('user', $user);
    }
    else {
      header('Location: index.php');
      exit;
    }
    break;
  case 2:
    if (session::is_admin()) {
      edit_user();
      header('Location: index.php?admin');
    }
    else {
      header('Location: index.php');
      exit;
    }
    exit;
  case 3:
    if (session::is_admin()) {
      delete_user();
      header('Location: index.php?admin');
    }
    else {
      header('Location: index.php');
      exit;
    }
    exit;
  case 4:
    if (session::is_admin()) {
      $body = new Template("templates/admin/admin.add.tmpl.php");
    }
    else {
      header('Location: index.php');
      exit;
    }
    break;
  case 5:
    if (session::is_admin()) {
      add_user();
      header('Location: index.php?admin');
    }
    else {
      header('Location: index.php');
      exit;
    }
    exit;
}

$tmpl->set('body', $body);

echo $tmpl->fetch('templates/index.tmpl.php');
exit;

function list_users() {
  global $mysql;
  
  $query = "SELECT * FROM players";
  $results = $mysql->query_mult_assoc($query);
  
  return $results;
}

function user_info() {
  global $mysql;
  $id = $_GET['id'];
  
  $query = "SELECT * FROM players WHERE id=$id";
  $result = $mysql->query_assoc($query);
  
  return $result;
}

function add_user () {
  global $mysql;
  $name = $_POST['name'];
  $password = md5($_POST['password']);
  $administrator = $_POST['administrator'];
  
  $query = "INSERT INTO players SET name=\"$name\", password=\"$password\", administrator=$administrator";
  $mysql->query_no_result($query);
}

function edit_user () {
  global $mysql;
  $id = $_POST['id'];
  $name = $_POST['name'];
  $administrator = $_POST['administrator'];
  
  if ($_POST['password'] != '') {
    $password = md5($_POST['password']);
    $query = "UPDATE players SET name=\"$name\", password=\"$password\", administrator=$administrator WHERE id=$id";
  }
  else {
    $query = "UPDATE players SET name=\"$name\", administrator=$administrator WHERE id=$id";
  }
  $mysql->query_no_result($query);
}

function delete_user () {
  global $mysql;
  $id = $_GET['id'];
  
  $query = "DELETE FROM players WHERE id=$id";
  $mysql->query_no_result($query);
}

?>
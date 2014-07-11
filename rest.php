<?php
/**
 * Created by PhpStorm.
 * User: qwertmax
 * Date: 27.02.14
 * Time: 17:47
 */
$config = array(
  'server' => 'localhost',
  'db' => 'database_name',
  'user' => 'username',
  'pass' => 'password',
);
$db_server = $config['server'];
$db_name = $config['db'];
$db_user = $config['user'];
$db_pass = $config['pass'];

$db_link = mysql_connect($db_server, $db_user, $db_pass);
mysql_select_db($db_name, $db_link);

//$data = json_decode(file_get_contents("php://input"), false);
//print json_encode(array('data' => $data));
//print json_encode(array('data' => $_GET['type']));
//exit;

if(isset($_GET['type'])){
  $type = $_GET['type'];
}else{
  $type = 'profiles';
}

switch($type){
  case 'profiles':
//      $sql = "SELECT p.id uid, p.`name` `name`, p.link link, pt.tid tid
//              FROM profiles p
//              JOIN profile_technology pt ON pt.uid = p.id";
      $sql = "SELECT p.id uid, p.`name` `name`, p.link link FROM profiles p";
      $res = mysql_query($sql, $db_link);

      $profiles = array();
      while($row = mysql_fetch_object($res)){
        $profiles[$row->uid] = $row;
      }

      $sql = "SELECT id tid, `name` FROM technology";
      $res = mysql_query($sql, $db_link);

      $technology = array();
      while($row = mysql_fetch_object($res)){
        $technology[$row->tid] = $row->name;
      }

      $sql = "SELECT uid, tid FROM profile_technology";
      $res = mysql_query($sql, $db_link);

      while($row = mysql_fetch_object($res)){
        $profiles[$row->uid]->tids[] = $technology[$row->tid];
      }

      print json_encode(array('data' => $profiles));
      exit;
    break;
  case 'technology':
      $sql = "SELECT id tid, `name` FROM technology";
      $res = mysql_query($sql, $db_link);

      $technology = array();
      while($row = mysql_fetch_object($res)){
        $technology[$row->tid] = $row->name;
      }

      print json_encode(array('data' => $technology));
      exit;
    break;

}

<?
  include("./DatabaseConnection/classMySQLConnection.php");
  include("./DatabaseConnection/classPessoas.php");

  $pessoas = new Pessoas();
  $json = $pessoas->readAll();
  echo $json;
?>

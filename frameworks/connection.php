<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO('mysql:host=phsm01ws012;dbname=cents', 'cents', 'cents_user01', $pdo_options);
        // self::$instance = new PDO('mysql:host=localhost;dbname=cents', 'root', 'root_admin01', $pdo_options);
      }
      return self::$instance;
    }
  }

  class DbUser {
    private static $instance2 = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance2() {
      if (!isset(self::$instance2)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance2 = new PDO('mysql:host=phsm01ws012;dbname=userlookup', 'usercheecker', 'usercheecker01', $pdo_options);
      }
      return self::$instance2;
    }
  }
?>

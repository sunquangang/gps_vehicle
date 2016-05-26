<?php
namespace Model;
use \DB;

class User extends \Model {

  protected static $_table_name = 'user';

  //-----------------------------------------------------------------------
  public static function getList($arrParam = array()) {
    $result = DB::select()->from(self::$_table_name);

    foreach ($arrParam as $key => $value) {
      switch ($key) {
        case 'limit':
          $result = $result->limit($value);
          break;
        case 'offset':
          $result = $result->offset($value);
          break;
        default:
          $result = $result->where($key, $value);
      }
    }

    $result = $result->execute()->as_array();
    return $result;
  }

  //-----------------------------------------------------------------------
  public static function insert($arrParam = array()) {
    return DB::insert(self::$_table_name)->set($arrParam)->execute();
  }

  //-----------------------------------------------------------------------
  public static function update($condition = array(), $arrParam = array()) {
    $result = DB::update(self::$_table_name)->set($arrParam);

    foreach ($condition as $key => $value) {
      $result = $result->where($key, $value);
    }

    $result = $result->execute();
    return $result;
  }

  //-----------------------------------------------------------------------
  public static function save($arrParam = array()) {
    $sql = DB::insert(self::$_table_name)
                ->columns(array('service', 'email', 'first_name', 'last_name', 'type', 'img_url'));

    if (empty($arrParam)) return false;

    foreach ($arrParam as $value) {
      $sql->values($value);
    }

    $sql = $sql->compile();

    $sql .= " ON DUPLICATE KEY UPDATE first_name = VALUES(`first_name`), last_name = VALUES(`last_name`), type = VALUES(`type`), img_url = VALUES(`img_url`), updated_at = now()";

    return DB::query($sql)->execute()[0];
  }
}

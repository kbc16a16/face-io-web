<?php
class Model_class extends CI_Model{

  //コンストラクタでデータベースライブラリをロード
  public function __construct(){
    $this->load->database();
  }

  //担当しているクラスの情報を取得するメソッド
  public function get_classes($staff_id){
    $sql = "SELECT class_id, department_name, grade, fiscal_year FROM ClassKBC JOIN Department ON ClassKBC.department_id=Department.department_id  WHERE class_id IN (SELECT class_id from Responsible where staff_id = ?) AND fiscal_year = (select YEAR(DATE_SUB(now(),INTERVAL 3 MONTH)))";
    $query = $this->db->query($sql, array($staff_id));
    return $query->result_array();
  }  
}

  ?>

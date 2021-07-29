<?php
class Database{
  private $hostname = "localhost";
  private $username = "root";
  private $password = "";
  private $dbname = 'ql_sinhvien';
  private $conn = NULL;
  private $result = NULL;

  // Ket noi db
  public function connect()
{
    $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
    if(!$this->conn){
      echo "Kết nối db thất bại !";
      exit();
    } else {
      mysqli_set_charset($this->conn,'utf8');
    }
    return $this->conn;
}
  // Thuc thi cau lenh truy van
  public function execute($sql){
      $this->result = $this->conn->query($sql);
      return $this->result;
  }
  // Dem so ban ghi
  public function num_rows(){
    if($this->result){
      $num = mysqli_num_rows($this->result);
    } else{
      $num = 0;
    }
    return $num;
  }
  // Lay du lieu
  public function getData(){
    if($this->result){
      $data = mysqli_fetch_array($this->result);
    } else {
      $data = 0;
    }
    return $data;
  }
  // Lay du lieu
  public function getDataEdit($table,$id){
      // Câu truy vấn lấy sinh vien thuoc id
      $sql = "SELECT * FROM $table where sv_id = '$id'";
      $this->execute($sql);
    if($this->num_rows() == 0){
      $data = 0;
    } else {
      $data = mysqli_fetch_array($this->result);
    }
    return $data;
  }
  // Lay all du lieu
  public function getAllData($table){
    $sql = "SELECT * FROM $table ";
    $this->execute($sql);
    // Kiem tra xem co ban ghi nao khong
    if($this->num_rows() == 0){
      $data = 0;
    } else {
      while($datas = $this->getData()){
        $data[] = $datas;
      }
    }
    return $data;
  }
  // Them du lieu
  public function insertData($name, $mssv,$sex, $birthday){
     // Chống SQL Injection
     $name = addslashes($name);
     $mssv = addslashes($mssv);
     $sex = addslashes($sex);
     $birthday = addslashes($birthday);
     // Câu truy vấn thêm
     $sql = "INSERT INTO sinhvien(sv_name, sv_mssv,sv_sex, sv_birthday) VALUES
     ('$name','$mssv','$sex','$birthday')";
   return  $this->execute($sql);

  }
  // Sua du lieu
  public function editData($id,$name, $mssv,$sex, $birthday){
     // Chống SQL Injection
     $name = addslashes($name);
     $mssv = addslashes($mssv);
     $sex = addslashes($sex);
     $birthday = addslashes($birthday);
      // Câu truy sửa
    $sql = "UPDATE sinhvien SET
    sv_name = '$name',
    sv_mssv = '$mssv',
    sv_sex = '$sex',
    sv_birthday = '$birthday'
    WHERE sv_id = $id";
    return $this->execute($sql);

  }
  // Xoa du lieu
  public function deleteData($table,$id){
  // Câu truy vấn delete
  $sql = "DELETE FROM $table WHERE sv_id = $id";
  return $this->execute($sql);
  }
  }

?>
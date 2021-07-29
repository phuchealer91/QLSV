<?php
// Kiem tra hanh dong 
  if(isset($_GET['action'])){
    $action = $_GET['action'];
  } 
  else{
    $action = '';
  }
  // Cac truong hop hanh dong xay ra
  switch ($action) {
    // TH them student
    case 'add': {
      // Kiem tra submit form
      if(isset($_POST['add-student'])){
        // get data tu view -> model
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $mssv = isset($_POST['mssv']) ? $_POST['mssv'] : '';
        $sex = isset($_POST['sex']) ? $_POST['sex'] : '';
        $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
          // Validate thong tin
      $errors = array();
      if (empty($name)){
          $errors['sv_name'] = 'Bạn chưa nhập tên.';
      }
      if (empty($mssv)){
          $errors['sv_mssv'] = 'Bạn chưa nhập mã số sinh viên.';
      }
      if (empty($sex)){
          $errors['sv_sex'] = 'Bạn chưa chọn giới tính.';
      }
      if (empty($birthday)){
          $errors['sv_birthday'] = 'Bạn chưa nhập ngày sinh.';
      }
      // Neu ko co loi thi insert
      if (!$errors){
          $db->insertData($name, $mssv, $sex, $birthday);
          // Trở về trang danh sách
        header("location: index.php?controller=student&action=list");
      }
    }
    require_once('View/student/add_student.php');
    break;
    }
    // TH sua student
    case 'edit': {
      // Lấy thông tin hiển thị lên để người dùng sửa
     if(isset($_GET['id'])){
       $id = $_GET['id'];
      $qrtable = 'sinhvien';
      $dataId = $db->getDataEdit($qrtable,$id);
      $birthday_format = date('Y-m-d', strtotime($dataId['sv_birthday']));
   // Kiem tra submit form
   if(isset($_POST['edit-student'])){
    // get data tu view -> model
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $mssv = isset($_POST['mssv']) ? $_POST['mssv'] : '';
    $sex = isset($_POST['sex']) ? $_POST['sex'] : '';
    $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
      // Validate thong tin
  $errors = array();
  if (empty($name)){
      $errors['sv_name'] = 'Bạn chưa nhập tên.';
  }
  if (empty($mssv)){
      $errors['sv_mssv'] = 'Bạn chưa nhập mã số sinh viên.';
  }
  if (empty($sex)){
      $errors['sv_sex'] = 'Bạn chưa chọn giới tính.';
  }
  if (empty($birthday)){
      $errors['sv_birthday'] = 'Bạn chưa nhập ngày sinh.';
  }
  // Neu ko co loi thi insert
  if (!$errors){
      $db->editData($id,$name, $mssv, $sex, $birthday);
      // Trở về trang danh sách
    header("location: index.php?controller=student&action=list");
  }
}
     }
  
      require_once('View/student/edit_student.php');
      break;
    }
    // TH danh sach student
    case 'delete': {
      if(isset($_GET['id'])){
        $id = $_GET['id'];
      $qrtable = "sinhvien";
      $data = $db->deleteData($qrtable, $id);
      if($data){

        header("location: index.php?controller=student&action=list");
      }
      }
      break;
    }
    // TH danh sach student
    case 'list': {
      $qrtable = "sinhvien";
      $data = $db->getAllData($qrtable);
      require_once('View/student/list_student.php');
      break;
    }
    default: {
      require_once('View/student/list_student.php');
    break;
    }
    
  }
?>
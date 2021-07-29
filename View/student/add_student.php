<div class="container">
    <div div class="my-5">
   <div class="d-flex align-items-center justify-content-between">
   <h3 class="mb-4">Thêm mới sinh viên</h3>
   <a href="index.php?controller=student&action=list" class="btn btn-primary block">Danh sách sinh viên</a>
   </div>
    <form action="" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6 col-sm-12">
      <label for="fullname">Tên</label>
      <input type="text" class="form-control" name="name" id="fullname" value="<?php echo !empty($name) ? $name : ''; ?>" placeholder="Nhập họ và tên">
      <p class="text-danger mt-2"><?php if (!empty($errors['sv_name'])) echo $errors['sv_name']; ?></p>
    </div>
    <div class="form-group col-md-6 col-sm-12">
      <label for="mssv">Mã số SV</label>
      <input type="text" class="form-control" name="mssv" id="mssv" value="<?php echo !empty($mssv) ? $mssv : ''; ?>" placeholder="Nhập mã số sinh viên">
      <p class="text-danger mt-2"><?php if (!empty($errors['sv_mssv'])) echo $errors['sv_mssv']; ?></p>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6 col-sm-12">
  
  <label for="sex">Giới tính</label>
  <select id="sex" class="form-control" name="sex" >
    <option value="Nam">Nam</option>
    <option value="Nữ" <?php if (!empty($sex) && $sex == 'Nữ') echo 'selected'; ?>>Nữ</option>
    <option value="Khác" <?php if (!empty($sex) && $sex == 'Khác') echo 'selected'; ?>>Khác</option>
  </select>
  <p class="text-danger mt-2"><?php if (!empty($errors['sv_sex'])) echo $errors['sv_sex']; ?></p>
</div>
    <div class="form-group col-md-6 col-sm-12">
      <label for="birth">Ngày sinh</label>
      <input type="date" class="form-control" value="<?php echo !empty($birthday) ? $birthday : ''; ?>" name="birthday" id="birth" placeholder="Nhập ngày sinh">
      <p class="text-danger mt-2"><?php if (!empty($errors['sv_birthday'])) echo $errors['sv_birthday']; ?></p>
    </div>
  </div>
  <a href="index.php?controller=student&action=list" class="btn btn-secondary">Hủy</a>
  <button type="submit" name="add-student" class="btn btn-primary">Thêm</button>
</form>
  </div>
  </div>

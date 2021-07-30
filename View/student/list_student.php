
<div class="container">
    <div div class="my-5">
      <div class="mb-4">
      <form action="" method="GET">
  <div class="d-flex align-items-end ">
    <div class="form-group col-md-12 col-sm-12 mb-0 pl-0 ">
      <label for="search">Tìm kiếm</label>
      <!-- <input type="hidden" name="controller" value="student"> -->
      <input type="text" class="form-control" name="keyword" id="myInput"  placeholder="Tìm kiếm sinh viên">
    </div>
    <!-- <input type="hidden" value="search" name="action"> -->
    <!-- <button type="submit" class="btn btn-primary">Tìm</button> -->
  </div>
      </form>
      </div>
    <div class="d-flex align-items-center justify-content-between">
   <h5 class="mb-4">Danh sách sinh viên</h5>
   <a href="index.php?controller=student&action=add" class="btn btn-primary block">Thêm mới sinh viên</a>
   </div>
    <table class="table table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">MSSV</th>
      <th scope="col">Họ tên</th>
      <th scope="col">Giới tính</th>
      <th scope="col">Ngày sinh</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody id="myTable">
  <?php foreach ($data as $item){ ?>
    <tr>
      <td><?php echo $item['sv_mssv']; ?></td>
      <td><?php echo $item['sv_name']; ?></td>
      <td><?php echo $item['sv_sex']; ?></td>
      <td><?php echo $item['sv_birthday']; ?></td>
      <td><a href="index.php?controller=student&action=edit&id=<?php echo $item['sv_id'] ?>" class="btn btn-success">Sửa</a>
      <a href="index.php?controller=student&action=delete&id=<?php echo $item['sv_id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không?');">Xóa</a>
    </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</div>
<?php
if (isset($_POST['save'])) {
    $id_level = $_POST['id_level'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $insert = mysqli_query($koneksi, "INSERT INTO users (id_level, name, email, password) VALUES ('$id_level', '$name', '$email', '$password')");
    if ($insert) {
        header("location:?page=user&add=success");
    }
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $id_level = $_POST['id_level'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($_POST['password']) {
        $password = sha1($_POST['password']);
    } else {
        $password = $rowEdit['password'];
    }

    $update = mysqli_query($koneksi, "UPDATE users SET id_level = '$id_level', name='$name', email='$email', password='$password' WHERE id ='$id'");
    if ($update) {
        header("location:?page=user&update=success");
    }
}

?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Create Customer</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Level *</label>
                        <select name="id_level" id="level" class="form-select">
                            <option value="" selected disabled>SELECT</option>
                            <?php
                            $sql = mysqli_query($koneksi, "SELECT * FROM levels ORDER BY id DESC");
                            $resultSel = mysqli_fetch_all($sql, MYSQLI_ASSOC);
                            foreach ($resultSel as $row) : ?>
                                <option <?php echo isset($_GET['edit']) ? ($rowEdit['id_level'] == $row['id']) ? 'selected' : '' : '' ?> value="<?php echo $row['id'] ?>"><?php echo $row['level_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!-- <input value="<?php echo isset($_GET['edit']) ? $rowEdit['customer_name'] : ''; ?>" class="form-control"
                            name="customer_name" required placeholder="Enter Customer Name"> -->
                    </div>
                    <div class="mb-3">
                        <label for="">Name *</label>
                        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['name'] : ''; ?>" number class="form-control"
                            name="name" required placeholder="Enter Customer Phone">
                    </div>
                    <div class="mb-3">
                        <label for="">Email *</label>
                        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : ''; ?>" text class="form-control"
                            name="email" required placeholder="Enter Customer Address">
                    </div>
                    <div class="mb-3">
                        <label for="">Password *</label>
                        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['password'] : ''; ?>" text class="form-control"
                            name="password" required placeholder="Enter Customer Address">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'save' ?>">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id Desc");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delate'])) {
    $id = $_GET['delate'];
    $delete = mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id'");
    header("location:?page=user&notif=success");
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Data User</h3>
            </div>
            <div class="card-body">
                <div align="right" class="mb-3 mt-3">
                    <a href="?page=add-user" class="btn btn-primary">Create Data User</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Level</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($row as $rows) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $rows['id_level'] ?></td>
                                <td><?php echo $rows['name'] ?></td>
                                <td><?php echo $rows['email'] ?></td>
                                <td>
                                    <a href="?page=add-user&edit=<?php echo $rows['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="?page=user&delate=<?php echo $rows['id'] ?>"
                                        onclick="return confirm('Are you sure??')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
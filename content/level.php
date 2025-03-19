<?php
$query = mysqli_query($koneksi, "SELECT * FROM levels ORDER BY id Desc");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delate'])) {
    $id = $_GET['delate'];
    $delete = mysqli_query($koneksi, "DELETE FROM levels WHERE id = '$id'");
    header("location:?page=level&notif=success");
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Lavel</h3>
            </div>
            <div class="card-body">
                <div align="right" class="mb-3 mt-3">
                    <a href="?page=add-level" class="btn btn-primary">Create Data Level</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($rows as $row): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['level_name'] ?></td>
                                <td>
                                    <a href="?page=add-level&edit=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="?page=level&delate=<?php echo $row['id'] ?>"
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
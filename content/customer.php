<?php
$queryCustomer = mysqli_query($koneksi, "SELECT * FROM customers ORDER BY id Desc");
$rowCustomers = mysqli_fetch_all($queryCustomer, MYSQLI_ASSOC);

if (isset($_GET['delate'])) {
    $id = $_GET['delate'];
    $delete = mysqli_query($koneksi, "DELETE FROM customers WHERE id = '$id'");
    header("location:?page=customer&notif=success");
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Customer</h3>
            </div>
            <div class="card-body">
                <div align="right" class="mb-3 mt-3">
                    <a href="?page=add-customer" class="btn btn-primary">Create Data Customer</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Telp</th>
                            <th>Alamat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($rowCustomers as $row): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['customer_name'] ?></td>
                                <td><?php echo $row['customer_phone'] ?></td>
                                <td><?php echo $row['customer_address'] ?></td>
                                <td>
                                    <a href="?page=add-customer&edit=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="?page=customer&delate=<?php echo $row['id'] ?>"
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
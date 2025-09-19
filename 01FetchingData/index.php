<?php
include("bootstrap.php");
include("connection.php");
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📋 Students List</h2>
        <a href="create.php" class="btn btn-success">+ Create New</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover bg-white shadow-sm rounded">
            <thead class="table-light">
                <tr>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Student Contact</th>
                    <th>Student Institute Name</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $query=mysqli_query($con,"SELECT * FROM students");
            while($row=mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?php echo $row["Name"]?></td>
                    <td><?php echo $row["Email"]?></td>
                    <td><?php echo $row["Contact"]?></td>
                    <td><?php echo $row["Institute"]?></td>
                    <td class="text-center">
                        <?php if($row["IsActive"]) { ?>
                            <span class="badge bg-success">Active</span>
                        <?php } else { ?>
                            <span class="badge bg-danger">Inactive</span>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <a href="edit.php?id=<?php echo $row['Id']?>" class="btn btn-primary btn-sm me-1">Edit</a>
                        <a href="delete.php?id=<?php echo $row['Id']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

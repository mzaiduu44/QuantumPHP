<?php
include("bootstrap.php");
include("connection.php");

if(@$_POST["btnsub"])
{
    $name=$_POST["txtname"];
    $email=$_POST["txtemail"];
    $contact=$_POST["txtcontact"];
    $isactive=$_POST["isactive"];
    $institute=$_POST["selinstitute"];

    $isactive=$isactive=="on"?1:0;

    $sql="insert into students values(null,'$name','$email','$contact',$isactive,'$institute')";
    $query=mysqli_query($con, $sql);

    if($query)
    {
        header("location:index.php");
    }
    else
    {
        echo "<script>alert('Error in your SQL syntax...')</script>";
    }
}
?>

<div class="container mt-5">
    <div class="card shadow-sm p-4 mx-auto" style="max-width:600px;">
        <h2 class="card-title mb-4 text-primary fw-bold">Add Student</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Student Name</label>
                <input type="text" name="txtname" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Student Email</label>
                <input type="text" name="txtemail" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Student Contact</label>
                <input type="text" name="txtcontact" class="form-control">
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="isactive" class="form-check-input" id="isactive">
                <label class="form-check-label" for="isactive">Is Active</label>
            </div>

            <div class="mb-3">
                <label class="form-label">Student Institute Name</label>
                <select name="selinstitute" class="form-select">
                    <option>Select</option>
                    <option>Aptech SFC</option>
                    <option>Fast University</option>
                    <option>Iqra University</option>
                </select>
            </div>

            <div>
                <input type="submit" name="btnsub" value="Save" class="btn btn-primary w-100">
            </div>
        </form>
    </div>
</div>

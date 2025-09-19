<?php
include("bootstrap.php");
include("connection.php");

if(@$_POST["btnsub"])
{
    $id=$_POST["txtid"];    
    $name=$_POST["txtname"];
    $email=$_POST["txtemail"];
    $contact=$_POST["txtcontact"];
    $isactive=$_POST["isactive"]==""?0:1;
    $institute=$_POST["selinstitute"];

    $sql="UPDATE students 
          SET Name='$name', Email='$email', Contact='$contact', IsActive=$isactive, Institute='$institute' 
          WHERE Id=$id";
    $query=mysqli_query($con, $sql);

    if($query)
    {
        header("location:index.php?status=updated");
    }
    else
    {
        echo "<div class='alert alert-danger w-75 mx-auto mt-3 text-center'>
                ⚠️ Error in your SQL syntax...
              </div>";
    }
}

//--------------Get Record for Edit--
if(@$_GET["id"])
{
    $id=$_GET["id"];
    $query=mysqli_query($con,"SELECT * FROM students WHERE Id=$id");
    $row=mysqli_fetch_assoc($query);
    $isactive=$row["IsActive"]==true?"checked":"";
}
?>

<div class="container mt-5">
    <div class="card shadow-sm p-4 mx-auto" style="max-width:600px;">
        <h2 class="card-title mb-4 text-center text-primary fw-bold">✏️ Edit Student</h2>
        <form method="post">
            <input type="hidden" value="<?php echo $row['Id']?>" name="txtid">

            <div class="mb-3">
                <label class="form-label">Student Name</label>
                <input type="text" value="<?php echo $row['Name']?>" name="txtname" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Student Email</label>
                <input type="text" value="<?php echo $row['Email']?>" name="txtemail" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Student Contact</label>
                <input type="text" value="<?php echo $row['Contact']?>" name="txtcontact" class="form-control">
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="isactive" class="form-check-input" id="isactive" <?php echo $isactive?>>
                <label class="form-check-label" for="isactive">Is Active</label>
            </div>

            <div class="mb-3">
                <label class="form-label">Student Institute Name</label>
                <select name="selinstitute" class="form-select">
                    <option><?php echo $row['Institute']?></option>
                    <option>Aptech SFC</option>
                    <option>Fast University</option>
                    <option>Iqra University</option>
                </select>
            </div>

            <div class="text-center">
                <input type="submit" name="btnsub" value="Update" class="btn btn-primary w-100">
            </div>
        </form>
    </div>
</div>

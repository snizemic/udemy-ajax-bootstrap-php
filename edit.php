<?php
require_once('db.php');

if (!isset($_GET['id']) || !isset($_GET['req'])) {
    die("Bad request");
} elseif ($_GET['req'] === 'upd') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM student WHERE id=$id";
    $result = $conn->query($sql);

    while ($student = $result->fetch_assoc()) {
        ?>
        <div class="form-group row">
            <label for="name" class="col-md-2 control-label">Student Name</label>
            <div class="col-md-10">
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $student['name'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="fee" class="col-md-2 control-label">Student Fee</label>
            <div class="col-md-10">
                <input type="number" id="fee" name="fee" class="form-control" value="<?php echo $student['fee'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="subject" class="col-md-2 control-label">Student Subject</label>
            <div class="col-md-10">
                <select id="subject" name="subject" class="form-control">
                    <option disabled selected value="">Select a subject</option>
                    <option value="Chemistry" <?php if ($student['subject'] === "Chemistry") echo 'selected' ?>>Chemistry</option>
                    <option value="Computers" <?php if ($student['subject'] === "Computers") echo 'selected' ?>>Computers</option>
                    <option value="Physics" <?php if ($student['subject'] === "Physics") echo 'selected' ?>>Physics</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-offset-2 col-md-10">
                <button id="add" name="add" type="button" class="btn btn-success btn-block" onclick="edit_ajax('upd_btn', <?php echo $student['id'] ?>);">Update Record</button>
            </div>
        </div>
        <?php
    }
} elseif ($_GET['req'] === 'upd_btn') {    
    $id = $_GET['id'];
    $name = $_GET['name'];
    $fee = $_GET['fee'];
    $subject = $_GET['subject'];    
    $sql = "UPDATE student SET name='$name', fee=$fee, subject='$subject' WHERE id=$id";
    if ($conn->query($sql) !== true) {            
        echo "Error updating record: " . $conn->error;
    }        
};

$conn->close();

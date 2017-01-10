<?php
require_once('db.php');

if ($_GET['req'] !== 'load') {
    if ($_GET['req'] === 'add') {
        $name = $_GET['name'];
        $fee = $_GET['fee'];
        $subject = $_GET['subject'];
        $sql = "INSERT INTO student (name, fee, subject) VALUES ('$name', '$fee', '$subject')";
        $conn->query($sql);
    }
}

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

while ($student = $result->fetch_assoc()) {
    ?>
    <tr>
        <td><?php echo $student['id'] ?></td>
        <td><?php echo $student['name'] ?></td>
        <td><?php echo $student['fee'] ?></td>
        <td><?php echo $student['subject'] ?></td>
        <td>
            <a class="btn btn-primary btn-xs">Edit</a>
            <a class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>  
<?php
}

$conn->close();

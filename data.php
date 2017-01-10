<?php
require_once('db.php');

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

while ($student = $result->fetch_assoc()){
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
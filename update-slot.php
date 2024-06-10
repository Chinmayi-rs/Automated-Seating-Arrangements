<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="updateslot.php">

        <label>Slot Id</label>
        <select name="slot" id="slot" required>
                <option value="">Select slot ID</option>
                <?php
                include "conn.php";
                $sql = "SELECT * FROM slot";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['slot_no'] . "'>" . $row['slot_no'] . "</option>";
                }
                ?>
                </select>
                <br><br>

        <label>New Start Time</label>
        <input type="time" name="stime">
        <br><br>

        <Label>New End Time</Label>
        <input type="time" name="etime">
        <br><br>

        <input type="submit">

    </form>
</body>
</html>
<?php
$servername = "lrgs.ftsm.ukm.my";
$username = "a189524";
$password = "bigpurplerabbit";
$dbname = "a189524";

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查数据库连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 获取表单输入数据
// $managementid = $_POST['managementid'];
$managementname = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['phone'];
$password = $_POST['password'];


    // ID不存在，插入新管理用户信息

    $managementid = generateManagementID($conn);

    $sql_insert_management = "INSERT INTO tbl_sport_venue_management_sporty (FLD_MANAGEMENTID, FLD_MANAGEMENTNAME, FLD_MANAGEMENTEMAIL, FLD_MANAGEMENTPHONE, FLD_MANAGEMENTPASSWORD, FLD_ACCBALANCE) VALUES ('$managementid', '$managementname', '$email', '$mobile', '$password', 0)";

    if ($conn->query($sql_insert_management) === TRUE) {
            echo '<script>';
            // echo 'alert("Registration successful");';
            echo 'alert("Registration successful. Your Management ID is: ' . $managementid . '");';

            echo 'window.location.href = "login.php";';
            echo '</script>';
    } else {
        echo "Error: " . $sql_insert_management . "<br>" . $conn->error;
    }

 
// 关闭数据库连接
$conn->close();


function generateManagementID($conn) {
    try {
        // Start transaction
        $conn->begin_transaction();

        // Fetch the current counter value
        $stmt = $conn->query("SELECT COUNTER_VALUE FROM booking_counter_sporty WHERE COUNTER_ID = 1");
        
        if ($stmt) {
            $counter = $stmt->fetch_assoc()['COUNTER_VALUE'];

            // Increment the counter
            $counter++;

            // Update the counter value in the database
            $updateStmt = $conn->prepare("UPDATE booking_counter_sporty SET COUNTER_VALUE = ? WHERE COUNTER_ID = 1");
            $updateStmt->bind_param('i', $counter);
            $updateStmt->execute();

            // Commit transaction
            $conn->commit();

            // Format the booking ID with the static prefix and padded counter
            $managementID = "K" . str_pad($counter, 2, '0', STR_PAD_LEFT);

            return $managementID;
        } else {
            throw new Exception("Failed to execute query.");
        }
    } catch (Exception $e) {
        // Rollback on error
        $conn->rollback();
        echo "Error: " . $e->getMessage();
        return null;
    }
}

?>
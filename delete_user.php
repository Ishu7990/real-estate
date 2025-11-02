<?php
include "../db.php"; // database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id'] ?? 0);

    if ($id > 0) {
        // Check if user exists (active or inactive)
        $check = $conn->prepare("SELECT id FROM users WHERE id = ?");
        $check->bind_param("i", $id);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            // Delete user regardless of their status
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                header("Location: user_management.php?msg=deleted");
                exit();
            } else {
                header("Location: user_management.php?msg=error");
                exit();
            }
        } else {
            // User not found
            header("Location: user_management.php?msg=notfound");
            exit();
        }
    } else {
        header("Location: user_management.php?msg=invalid");
        exit();
    }
} else {
    header("Location: user_management.php");
    exit();
}
?>

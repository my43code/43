<?php
// Handle contact form submissions
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = trim($_POST["name"] ?? "");
    $email   = trim($_POST["email"] ?? "");
    $phone   = trim($_POST["phone"] ?? "");
    $service = trim($_POST["service"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "" || $email === "" || $service === "" || $message === "") {
        header("Location: ../contact.php?status=error");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../contact.php?status=error");
        exit();
    }

    $stmt = $conn->prepare(
        "INSERT INTO contact_messages (name, email, phone, service, message)
         VALUES (?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        header("Location: ../contact.php?status=error");
        exit();
    }

    $stmt->bind_param("sssss", $name, $email, $phone, $service, $message);

    if ($stmt->execute()) {
        // (Optional) send yourself an email notification here
        header("Location: ../contact.php?status=success");
    } else {
        header("Location: ../contact.php?status=error");
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>

<?php
session_start();
include "../db.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== "admin") {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_pass = $_POST["current_password"];
    $new_pass = $_POST["new_password"];
    $confirm_pass = $_POST["confirm_password"];

    // Fetch current password hash
    $stmt = $conn->prepare("SELECT password FROM users WHERE id=?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if (!$user || !password_verify($current_pass, $user["password"])) {
        $msg = "❌ Current password is incorrect.";
    } elseif ($new_pass !== $confirm_pass) {
        $msg = "❌ New passwords do not match.";
    } else {
        $hashed = password_hash($new_pass, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET password=? WHERE id=?");
        $stmt->bind_param("si", $hashed, $user_id);

        if ($stmt->execute()) {
            $msg = "✅ Password updated successfully!";
        } else {
            $msg = "❌ Error updating password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - Change Password</title>
  <link rel="stylesheet" href="../assets/css/main.css">
  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>

  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            primary: "#137fec",
            "background-light": "#f6f7f8",
            "sidebar-dark": "#1a202c",
            "content-light": "#ffffff",
          },
          fontFamily: {
            display: ["Inter"]
          },
        },
      },
    }
  </script>
</head>
<body class="font-display bg-light text-slate-800">
  <div class="flex h-screen">
    
    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>
    
    <div class="flex-1 flex flex-col overflow-hidden bg-light">
      
      <!-- Navbar -->
      <?php include 'includes/navbar.php'; ?>

        <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-8 bg-zinc-200">
      <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200 max-w-lg mx-auto">
        <h2 class="text-2xl font-bold text-slate-900 mb-6">🔒 Change Password</h2>

        <!-- Alert Message -->
        <?php if ($msg): ?>
          <div class="mb-4 p-3 rounded-lg 
            <?= strpos($msg, '✅') !== false ? 'bg-green-100 text-green-700 border border-green-300' : 'bg-red-100 text-red-700 border border-red-300' ?>">
            <?= $msg ?>
          </div>
        <?php endif; ?>

        <!-- Change Password Form -->
        <form method="POST" class="space-y-5">
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Current Password</label>
            <input type="password" name="current_password" required
              class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
          </div>

          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">New Password</label>
            <input type="password" name="new_password" required
              class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
          </div>

          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Confirm New Password</label>
            <input type="password" name="confirm_password" required
              class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
          </div>

          <button type="submit" 
            class="w-full bg-primary text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">
            Update Password
          </button>
        </form>
      </div>
    </main>

      <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    </div>
  </div>
</body>
</html>

<?php
session_start();
include "../db.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== "admin") {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$msg = "";

// Fetch current user data
$stmt = $conn->prepare("SELECT name, email FROM users WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

// Update profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);

    $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $email, $user_id);

    if ($stmt->execute()) {
        $_SESSION['name'] = $name; // update session
        $msg = "✅ Profile updated successfully!";
    } else {
        $msg = "❌ Error updating profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin - My Profile</title>
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
      <div class="bg-gray-300 p-3 my-4 rounded-xl border border-slate-200">
        <h2 class="text-2xl font-bold text-slate-900">Manage Profile</h2>
      </div>

      <?php if ($msg): ?>
        <div class="mb-4 p-3 rounded-lg 
                    <?= strpos($msg, '✅') !== false ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>">
          <?= $msg ?>
        </div>
      <?php endif; ?>

      <div class="bg-white p-6 rounded-xl shadow-md w-full max-w-lg">
        <form method="POST" class="space-y-5">
          <div>
            <label class="block text-sm font-medium text-slate-700">Name</label>
            <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" 
              class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
              required>
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700">Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" 
              class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
              required>
          </div>
          <button type="submit" 
            class="w-full bg-primary text-white font-semibold py-2 px-4 rounded-lg hover:bg-primary-dark transition">
            Update Profile
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

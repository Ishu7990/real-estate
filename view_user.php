<?php
include "../db.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid user ID");
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT id, name, email, phone, user_type, status, token_expires FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User not found");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Details - EstateFlow</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
</head>
<body class="font-display bg-gray-100 text-slate-800">
  <div class="flex h-screen">
    <?php include 'includes/sidebar.php'; ?>
    <div class="flex-1 flex flex-col overflow-hidden bg-light">
      <?php include 'includes/navbar.php'; ?>

      <main class="flex-1 overflow-y-auto p-8">
        <div class="bg-white rounded-xl shadow p-8 max-w-3xl mx-auto border border-gray-200">
          <h2 class="text-2xl font-bold mb-6 text-center">User Details</h2>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
              <p class="text-sm text-gray-500">Name</p>
              <p class="font-medium text-gray-900"><?= htmlspecialchars($user['name']); ?></p>
            </div>
            <div>
              <p class="text-sm text-gray-500">Email</p>
              <p class="font-medium text-gray-900"><?= htmlspecialchars($user['email']); ?></p>
            </div>
            <div>
              <p class="text-sm text-gray-500">Phone</p>
              <p class="font-medium text-gray-900"><?= htmlspecialchars($user['phone'] ?? 'N/A'); ?></p>
            </div>
            <div>
              <p class="text-sm text-gray-500">User Type</p>
              <p class="font-medium text-gray-900"><?= ucfirst($user['user_type']); ?></p>
            </div>
            <div>
              <p class="text-sm text-gray-500">Status</p>
              <?php if ($user['status'] == 1): ?>
                <span class="px-3 py-1 rounded-full bg-green-100 text-green-800 text-sm font-medium">Active</span>
              <?php else: ?>
                <span class="px-3 py-1 rounded-full bg-red-100 text-red-800 text-sm font-medium">Inactive</span>
              <?php endif; ?>
            </div>
          </div>

          <div class="mt-8 text-center">
            <a href="user_management.php" class="px-5 py-2 rounded-lg bg-gray-600 text-white text-sm font-medium hover:bg-gray-700">Back to Users</a>
          </div>
        </div>
      </main>

      <?php include 'includes/footer.php'; ?>
    </div>
  </div>
</body>
</html>

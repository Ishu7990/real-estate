<?php
include "../db.php";

# fetch user by type
$type = $_GET['type'] ?? '';

if ($type && $type !== "all") {
    $stmt = $conn->prepare("SELECT id, name,email, user_type FROM users WHERE user_type=? AND user_type!='admin'");
    $stmt->bind_param("s", $type);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT id, name,email, user_type FROM users WHERE user_type!='admin'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Properties Management - EstateFlow</title>

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
        <h2 class="text-2xl font-bold text-slate-900">Manage Users</h2>
      </div>

      <!-- Filter + Add User -->
      <div class="flex items-center gap-2 mb-10">
        <form method="GET" class="inline">
          <select name="type" onchange="this.form.submit()" 
            class="px-4 py-2 rounded-lg border border-gray-300 text-sm w-44">
            <option value="all" <?= $type=="all" ? "selected" : "" ?>>All Users</option>
            <!-- <option value="owner" <?= $type=="owner" ? "selected" : "" ?>>Owner</option> -->
            <option value="agent" <?= $type=="agent" ? "selected" : "" ?>>Agent</option>
            <option value="customer" <?= $type=="customer" ? "selected" : "" ?>>Customer</option>
          </select>
        </form>

        <!-- <a href="add_user.php" 
          class="flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white text-sm font-medium hover:bg-primary/90">
          <span class="material-symbols-outlined">add</span>
          <span>Add User</span>
        </a> -->
      </div>
      
      <!-- Table -->
      <div class="bg-white dark:bg-background-dark rounded-xl shadow-sm overflow-hidden">
        
        <table class="w-full table-fixed text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-md text-gray-700 dark:text-gray-300 uppercase bg-gray-50 dark:bg-gray-800">
            <tr>
              <th class="px-6 py-3 w-1/3 text-center">Name</th>
              <th class="px-6 py-3 w-1/3 text-center">Email</th>
              <th class="px-6 py-3 w-1/3 text-center">User Type</th>
              <th class="px-6 py-3 w-1/3 text-center">Actions</th>
            </tr>
            <tr>
              <th colspan="4">
               <?php if (isset($_GET['msg'])): ?>
                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    let msg = "<?= $_GET['msg']; ?>";
                    if (msg === "deleted") {
                      alert("✅ User deleted successfully.");
                    } else if (msg === "notfound") {
                      alert("⚠️ User not found.");
                    } else if (msg === "invalid") {
                      alert("⚠️ Invalid user ID.");
                    } else if (msg === "error") {
                      alert("❌ Something went wrong.");
                    }
                  });
                </script>
              <?php endif; ?>

              </th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
              <?php 
                $badgeClass = "";
                if ($row['user_type'] === "owner") {
                    $badgeClass = "bg-primary/10 text-primary dark:bg-primary/20 dark:text-primary";
                } elseif ($row['user_type'] === "agent") {
                    $badgeClass = "bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300";
                } else {
                    $badgeClass = "bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300";
                }
              ?>
              <tr class="bg-white dark:bg-background-dark border-b dark:border-gray-700/50 hover:bg-gray-50 dark:hover:bg-gray-900/50">
                <td class="px-6 py-4 text-center font-medium text-gray-900 dark:text-white whitespace-nowrap">
                  <?= htmlspecialchars($row['name']); ?>
                </td>
                <td class="px-6 py-4 text-center">
                  <span class="px-2 py-1 text-xs font-medium rounded-full <?= $badgeClass ?>">
                    <?= ucfirst($row['email']); ?>
                  </span>
                </td>
                <td class="px-6 py-4 text-center">
                  <span class="px-2 py-1 text-xs font-medium rounded-full <?= $badgeClass ?>">
                    <?= ucfirst($row['user_type']); ?>
                  </span>
                </td>
                <td class="px-6 py-4 text-center space-x-2">
                  <a href="view_user.php?id=<?= $row['id']; ?>" 
                    class="px-3 py-1.5 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600">View
                  </a>
                  <form action="delete_user.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                    <button type="submit" 
                            class="px-3 py-1.5 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600"
                            onclick="return confirm('Are you sure you want to delete this user?');">
                      Delete
                    </button>
                  </form>
                  
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </main>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <script>
  // Auto-hide the success/error message after 3 seconds
  document.addEventListener("DOMContentLoaded", function() {
    const alertBox = document.querySelector("div.bg-green-100, div.bg-red-100, div.bg-yellow-100");
    if (alertBox) {
      setTimeout(() => {
        alertBox.style.transition = "opacity 0.5s ease";
        alertBox.style.opacity = "0";
        setTimeout(() => alertBox.remove(), 500); // remove after fade-out
      }, 3000); // 3 seconds
    }
  });
</script>

    </div>
  </div>
</body>
</html>

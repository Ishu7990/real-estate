<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Manage Testimonials - Admin</title>
<link crossorigin="" href="https://fonts.gstatic.com/" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
<script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#137fec",
            "background-light": "#f6f7f8",
            "sidebar-dark": "#1a202c",
            "content-light": "#ffffff",
          },
          fontFamily: {
            "display": ["Inter"]
          }
        },
      },
    }
</script>
<style>
    .material-symbols-outlined {
      font-variation-settings:
      'FILL' 0,
      'wght' 400,
      'GRAD' 0,
      'opsz' 24
    }
</style>
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
          <h2 class="text-2xl font-bold text-slate-900">Manage Testimonials</h2>
        </div>

      <!-- Testimonials Table -->
      <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-left">
            <thead class="bg-slate-50 border-b border-slate-200">
              <tr class="text-sm text-slate-600">
                <th class="p-4 font-medium">#</th>
                <th class="p-4 font-medium">User Name</th>
                <th class="p-4 font-medium">Description</th>
                <th class="p-4 font-medium">Rating</th>
                <th class="p-4 font-medium text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example Row -->
              <tr class="border-b border-slate-200 last:border-b-0">
                <td class="p-4">1</td>
                <td class="p-4 font-medium text-slate-900">John Doe</td>
                <td class="p-4 text-slate-600">Great service! The process was smooth and professional.</td>
                <td class="p-4">
                  ⭐⭐⭐⭐☆
                </td>
                <td class="p-4 text-center">
                  <a href="delete_testimonial.php?id=1" class="px-3 py-1.5 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600">Delete</a>
                </td>
              </tr>

              <tr class="border-b border-slate-200 last:border-b-0">
                <td class="p-4">2</td>
                <td class="p-4 font-medium text-slate-900">Jane Smith</td>
                <td class="p-4 text-slate-600">I am very happy with the support. Highly recommended!</td>
                <td class="p-4">
                  ⭐⭐⭐⭐⭐
                </td>
                <td class="p-4 text-center">
                  <a href="delete_testimonial.php?id=2" class="px-3 py-1.5 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600">Delete</a>
                </td>
              </tr>
              <!-- Loop dynamically from DB -->
            </tbody>
          </table>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
  </div>
</div>
</body>
</html>

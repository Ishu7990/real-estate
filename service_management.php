<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Admin Dashboard</title>
<link crossorigin="" href="https://fonts.gstatic.com/" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
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
            "sidebar-dark": "#1a202c", // New dark sidebar color
            "content-light": "#ffffff", // Light content background
          },
          fontFamily: {
            "display": ["Inter"]
          },
          borderRadius: {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "full": "9999px"
          },
        },
      },
    }
  
     // Modal toggle
    function openModal(type, id = '', title = '', description = '') {
      const modal = document.getElementById("serviceModal");
      const form = document.getElementById("serviceForm");
      const modalTitle = document.getElementById("modalTitle");
      const serviceId = document.getElementById("serviceId");

      if (type === "add") {
        modalTitle.innerText = "Add New Service";
        form.action = "add_service.php";
        serviceId.value = "";
        form.title.value = "";
        form.description.value = "";
      } else if (type === "edit") {
        modalTitle.innerText = "Edit Service";
        form.action = "edit_service.php";
        serviceId.value = id;
        form.title.value = title;
        form.description.value = description;
      }

      modal.classList.remove("hidden");
    }

    function closeModal() {
      document.getElementById("serviceModal").classList.add("hidden");
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
          <h2 class="text-2xl font-bold text-slate-900">Manage Services</h2>
        </div>
    
        <button onclick="openModal('add')" class="px-4 py-2 mb-5 bg-primary text-white rounded-lg w-40 hover:bg-primary/90">
        + Add Service
      </button>
      <!-- Services Table -->
      <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-left">
            <thead class="bg-slate-50 border-b border-slate-200">
              <tr class="text-sm text-slate-600">
                <th class="p-4 font-medium">#</th>
                <th class="p-4 font-medium">Title</th>
                <th class="p-4 font-medium">Description</th>
                <th class="p-4 font-medium text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example Row -->
              <tr class="border-b border-slate-200 last:border-b-0">
                <td class="p-4">1</td>
                <td class="p-4 font-medium text-slate-900">Property Consulting</td>
                <td class="p-4 text-slate-600">We provide expert property consulting services for buyers and sellers.</td>
                <td class="p-4 text-center">
                  <div class="flex justify-center gap-2">
                    <button onclick="openModal('edit','1','Property Consulting','We provide expert property consulting services for buyers and sellers.')" 
                      class="px-3 py-1.5 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600">Edit</button>
                    <a href="delete_service.php?id=1" class="px-3 py-1.5 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600">Delete</a>
                  </div>
                </td>
              </tr>
              <!-- Repeat dynamically -->
            </tbody>
          </table>
        </div>
      </div>
    </main>
    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
  </div>
</div>



<!-- Modal -->
<div id="serviceModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
  <div class="bg-white w-full max-w-lg p-6 rounded-xl shadow-lg">
    <div class="flex justify-between items-center mb-4">
      <h3 id="modalTitle" class="text-lg font-bold text-slate-900">Add/Edit Service</h3>
      <button onclick="closeModal()" class="text-slate-500 hover:text-slate-700">&times;</button>
    </div>
    <form id="serviceForm" action="" method="POST" class="space-y-4">
      <input type="hidden" id="serviceId" name="id">
      <div>
        <label class="block text-sm font-medium text-slate-700">Service Title</label>
        <input type="text" name="title" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
      </div>
      <div>
        <label class="block text-sm font-medium text-slate-700">Description</label>
        <textarea name="description" required rows="3" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"></textarea>
      </div>
      <div class="flex justify-end gap-3">
        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-slate-200 rounded-lg hover:bg-slate-300">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Save</button>
      </div>
    </form>
  </div>
</div>


<script>
  function toggleForm() {
    document.getElementById('serviceForm').classList.toggle('hidden');
  }
</script>

</body>
</html>

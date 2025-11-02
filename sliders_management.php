<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Manage Sliders - Admin</title>
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
          <h2 class="text-2xl font-bold text-slate-900">Manage Sliders</h2>
        </div>

      <!-- Page Heading -->
      <div class="flex justify-between items-center mb-6">
        <button onclick="toggleForm()" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">
          + Add Slider
        </button>
      </div>

      <!-- Add/Edit Slider Form (Popup) -->
      <div id="sliderForm" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-lg">
          <div class="flex justify-between items-center mb-4">
            <h3 id="formTitle" class="text-lg font-bold text-slate-900">Add New Slider</h3>
            <button onclick="toggleForm()" class="text-slate-500 hover:text-slate-800">&times;</button>
          </div>
          <form id="sliderFormElement" action="add_slider.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" name="id" id="sliderId" />

            <div>
              <label class="block text-sm font-medium text-slate-700">Property Image</label>
              <input type="file" name="image" id="image" required class="mt-1 block w-full text-sm border border-slate-300 rounded-lg cursor-pointer focus:outline-none focus:ring-primary focus:border-primary">
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700">Property City</label>
              <input type="text" name="city" id="city" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700">Property Size</label>
              <select name="size" id="size" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                <option value="">Select Size</option>
                <option value="1BHK">1 BHK</option>
                <option value="2BHK">2 BHK</option>
                <option value="3BHK">3 BHK</option>
                <option value="4BHK">4 BHK</option>
              </select>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700">Price (₹)</label>
              <input type="number" name="price" id="price" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
            </div>

            <div class="flex justify-end gap-3">
              <button type="button" onclick="toggleForm()" class="px-4 py-2 bg-slate-200 rounded-lg hover:bg-slate-300">Cancel</button>
              <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Save</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Sliders Table -->
      <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-left">
            <thead class="bg-slate-50 border-b border-slate-200">
              <tr class="text-sm text-slate-600">
                <th class="p-4 font-medium">#</th>
                <th class="p-4 font-medium">Image</th>
                <th class="p-4 font-medium">City</th>
                <th class="p-4 font-medium">Size</th>
                <th class="p-4 font-medium">Price</th>
                <th class="p-4 font-medium text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example Row -->
              <tr class="border-b border-slate-200 last:border-b-0">
                <td class="p-4">1</td>
                <td class="p-4">
                  <img src="uploads/property1.jpg" alt="Property" class="w-24 h-16 rounded-lg object-cover">
                </td>
                <td class="p-4 font-medium text-slate-900">Mumbai</td>
                <td class="p-4 text-slate-600">2BHK</td>
                <td class="p-4 text-slate-600">₹ 75,00,000</td>
                <td class="p-4 text-center">
                  <div class="flex justify-center gap-2">
                    <button onclick="editSlider(1,'Mumbai','2BHK','7500000')" class="px-3 py-1.5 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600">Edit</button>
                    <a href="delete_slider.php?id=1" class="px-3 py-1.5 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600">Delete</a>
                  </div>
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

<script>
  function toggleForm() {
    document.getElementById('sliderForm').classList.toggle('hidden');
  }

  function editSlider(id, city, size, price) {
    document.getElementById('formTitle').innerText = "Edit Slider";
    document.getElementById('sliderId').value = id;
    document.getElementById('city').value = city;
    document.getElementById('size').value = size;
    document.getElementById('price').value = price;
    document.getElementById('sliderFormElement').action = "edit_slider.php";
    toggleForm();
  }
</script>

</body>
</html>

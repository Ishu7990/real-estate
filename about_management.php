<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Manage About Us - Admin</title>
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
          <h2 class="text-2xl font-bold text-slate-900">Manage About Info</h2>
        </div>

      <!-- Page Heading -->
      <div class="flex justify-between items-center mb-6">
        <button onclick="toggleForm()" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">
          + Add Content
        </button>
      </div>

      <!-- Add/Edit About Form (Popup) -->
      <div id="aboutForm" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-2xl overflow-y-auto max-h-[90vh]">
          <div class="flex justify-between items-center mb-4">
            <h3 id="formTitle" class="text-lg font-bold text-slate-900">Add About Content</h3>
            <button onclick="toggleForm()" class="text-slate-500 hover:text-slate-800">&times;</button>
          </div>
          <form id="aboutFormElement" action="add_about.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" name="id" id="aboutId" />

            <div>
              <label class="block text-sm font-medium text-slate-700">Title</label>
              <input type="text" name="title" id="title" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700">Description</label>
              <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"></textarea>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700">Heading</label>
              <input type="text" name="heading" id="heading" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700">Paragraph</label>
              <textarea name="paragraph" id="paragraph" rows="4" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"></textarea>
            </div>

            <!-- Card Data (Title - Count) -->
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-slate-700">Card Title</label>
                <input type="text" name="card_title" id="card_title" placeholder="Happy Clients" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm">
              </div>
              <div>
                <label class="block text-sm font-medium text-slate-700">Card Count</label>
                <input type="number" name="card_count" id="card_count" placeholder="200+" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm">
              </div>
            </div>

            <!-- Image Upload -->
            <div>
              <label class="block text-sm font-medium text-slate-700">Upload Image</label>
              <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-slate-600">
            </div>

            <div class="flex justify-end gap-3">
              <button type="button" onclick="toggleForm()" class="px-4 py-2 bg-slate-200 rounded-lg hover:bg-slate-300">Cancel</button>
              <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Save</button>
            </div>
          </form>
        </div>
      </div>

      <!-- About Content Table -->
      <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-left">
            <thead class="bg-slate-50 border-b border-slate-200">
              <tr class="text-sm text-slate-600">
                <th class="p-4 font-medium">#</th>
                <th class="p-4 font-medium">Title</th>
                <th class="p-4 font-medium">Heading</th>
                <th class="p-4 font-medium">Card Title</th>
                <th class="p-4 font-medium">Card Count</th>
                <th class="p-4 font-medium">Image</th>
                <th class="p-4 font-medium text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example Row -->
              <tr class="border-b border-slate-200 last:border-b-0">
                <td class="p-4">1</td>
                <td class="p-4 font-medium text-slate-900">About EstateFlow</td>
                <td class="p-4 text-slate-600">Who We Are</td>
                <td class="p-4 text-slate-600">Happy Clients</td>
                <td class="p-4 text-slate-600">250+</td>
                <td class="p-4">
                  <img src="uploads/about1.jpg" class="h-12 w-12 rounded object-cover"/>
                </td>
                <td class="p-4 text-center">
                  <div class="flex justify-center gap-2">
                    <button onclick="editAbout(1,'About EstateFlow','Who We Are','We are leaders in real estate...','Happy Clients','250+')" class="px-3 py-1.5 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600">Edit</button>
                    <a href="delete_about.php?id=1" class="px-3 py-1.5 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600">Delete</a>
                  </div>
                </td>
              </tr>
              <!-- Repeat rows dynamically from DB -->
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
    document.getElementById('aboutForm').classList.toggle('hidden');
  }

  function editAbout(id, title, heading, paragraph, cardTitle, cardCount) {
    document.getElementById('formTitle').innerText = "Edit About Content";
    document.getElementById('aboutId').value = id;
    document.getElementById('title').value = title;
    document.getElementById('heading').value = heading;
    document.getElementById('paragraph').value = paragraph;
    document.getElementById('card_title').value = cardTitle;
    document.getElementById('card_count').value = cardCount;
    document.getElementById('aboutFormElement').action = "edit_about.php";
    toggleForm();
  }
</script>

</body>
</html>

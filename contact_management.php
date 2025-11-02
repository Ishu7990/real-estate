<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Manage Contact Info - Admin</title>
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
          <h2 class="text-2xl font-bold text-slate-900">Manage Contact Info</h2>
        </div>

      <!-- Page Heading -->
      <div class="flex justify-between items-center mb-6">
        <button onclick="toggleForm()" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">
          + Add Contact
        </button>
      </div>

      <!-- Add/Edit Contact Form (Popup) -->
      <div id="contactForm" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-lg">
          <div class="flex justify-between items-center mb-4">
            <h3 id="formTitle" class="text-lg font-bold text-slate-900">Add New Contact</h3>
            <button onclick="toggleForm()" class="text-slate-500 hover:text-slate-800">&times;</button>
          </div>
          <form id="contactFormElement" action="add_contact.php" method="POST" class="space-y-4">
            <input type="hidden" name="id" id="contactId" />
            <div>
              <label class="block text-sm font-medium text-slate-700">Phone</label>
              <input type="text" name="phone" id="phone" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700">Email</label>
              <input type="email" name="email" id="email" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700">Address</label>
              <textarea name="address" id="address" required rows="3" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"></textarea>
            </div>
            <div class="flex justify-end gap-3">
              <button type="button" onclick="toggleForm()" class="px-4 py-2 bg-slate-200 rounded-lg hover:bg-slate-300">Cancel</button>
              <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Save</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Contact Info Table -->
      <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-left">
            <thead class="bg-slate-50 border-b border-slate-200">
              <tr class="text-sm text-slate-600">
                <th class="p-4 font-medium">#</th>
                <th class="p-4 font-medium">Phone</th>
                <th class="p-4 font-medium">Email</th>
                <th class="p-4 font-medium">Address</th>
                <th class="p-4 font-medium text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Example Row -->
              <tr class="border-b border-slate-200 last:border-b-0">
                <td class="p-4">1</td>
                <td class="p-4 font-medium text-slate-900">+91 9876543210</td>
                <td class="p-4 text-slate-600">admin@estateflow.com</td>
                <td class="p-4 text-slate-600">123, MG Road, Bangalore</td>
                <td class="p-4 text-center">
                  <div class="flex justify-center gap-2">
                    <button onclick="editContact(1,'+91 9876543210','admin@estateflow.com','123, MG Road, Bangalore')" class="px-3 py-1.5 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600">Edit</button>
                    <a href="delete_contact.php?id=1" class="px-3 py-1.5 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600">Delete</a>
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
    document.getElementById('contactForm').classList.toggle('hidden');
  }

  function editContact(id, phone, email, address) {
    document.getElementById('formTitle').innerText = "Edit Contact";
    document.getElementById('contactId').value = id;
    document.getElementById('phone').value = phone;
    document.getElementById('email').value = email;
    document.getElementById('address').value = address;
    document.getElementById('contactFormElement').action = "edit_contact.php";
    toggleForm();
  }
</script>

</body>
</html>

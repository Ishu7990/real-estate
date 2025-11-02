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

  <!-- Tailwind Custom Config -->
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
    <style>
    .material-symbols-outlined {
      font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24
    }
    .table-container {
      width: 100%;
      overflow-x: auto;
    }
    main {
  flex-grow: 1;
  width: 100%;
}
.sidebar {
  height: 100vh;
  position: sticky;
  top: 0;
}
html, body {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  overflow-x: hidden;
  background-color: #f6f7f8;
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
          <h2 class="text-2xl font-bold text-slate-900">Manage Properties</h2>
        </div>
        <!-- Removed max-w-7xl -->
        <div class="px-4 sm:px-6 lg:px-8 py-8 md:py-12 w-full">

          <div class="space-y-6">
            <div class="p-4 bg-white/50 dark:bg-white/5 rounded-xl border border-black/5 dark:border-white/10 shadow-sm">
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">
                <div class="relative lg:col-span-2">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg aria-hidden="true" class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                      <path clip-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" fill-rule="evenodd"></path>
                    </svg>
                  </div>
                  <input class="w-full pl-10 pr-3 py-2 rounded-lg border border-gray-300/80 dark:border-gray-700 bg-background-light dark:bg-background-dark text-gray-900 dark:text-gray-100 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-1 focus:ring-primary focus:border-primary" placeholder="Search by address, seller name, or agent..." type="text"/>
                </div>
                <select class="w-full px-3 py-2 rounded-lg border border-gray-300/80 dark:border-gray-700 bg-background-light dark:bg-background-dark text-gray-900 dark:text-gray-100 focus:ring-1 focus:ring-primary focus:border-primary">
                  <option>City/Location</option>
                  <option>New York</option>
                  <option>Los Angeles</option>
                  <option>Chicago</option>
                </select>
                <select class="w-full px-3 py-2 rounded-lg border border-gray-300/80 dark:border-gray-700 bg-background-light dark:bg-background-dark text-gray-900 dark:text-gray-100 focus:ring-1 focus:ring-primary focus:border-primary">
                  <option>Price Range</option>
                  <option>$100k - $300k</option>
                  <option>$300k - $600k</option>
                  <option>$600k+</option>
                </select>
                <select class="w-full px-3 py-2 rounded-lg border border-gray-300/80 dark:border-gray-700 bg-background-light dark:bg-background-dark text-gray-900 dark:text-gray-100 focus:ring-1 focus:ring-primary focus:border-primary">
                  <option>Property Size</option>
                  <option>1 BHK</option>
                  <option>2 BHK</option>
                  <option>3 BHK</option>
                </select>
                <select class="w-full px-3 py-2 rounded-lg border border-gray-300/80 dark:border-gray-700 bg-background-light dark:bg-background-dark text-gray-900 dark:text-gray-100 focus:ring-1 focus:ring-primary focus:border-primary">
                  <option>Status</option>
                  <option>Sold</option>
                  <option>Unsold</option>
                </select>
              </div>
            </div>
            <div class="table-container bg-white rounded-xl border border-black/5 shadow-sm w-full">
              <table class="min-w-full table-auto divide-y divide-gray-200">
                <thead class="bg-gray-50/50 dark:bg-gray-800/20">
                  <tr>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" scope="col">Seller Name</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" scope="col">Seller Type</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" scope="col">Property Name and Type</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" scope="col">Property Price for Sell</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" scope="col">Property Address</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" scope="col">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider" scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Olivia Harper</td>
                    <td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-primary/10 text-primary dark:bg-primary/20 dark:text-primary">Owner</span></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">Maple House, 3BHK</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">$450,000</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">123 Maple Street, Anytown</td>
                    <td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">Unsold</span></td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                      <button class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition-colors">View Photos</button>
                      <button class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 transition-colors">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Ethan Carter</td>
                    <td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">Agent</span></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">Oak Villa, 4BHK</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">$620,000</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">456 Oak Avenue, Anytown</td>
                    <td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">Sold</span></td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                      <button class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition-colors">View Photos</button>
                      <button class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 transition-colors">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Sophia Bennett</td>
                    <td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-primary/10 text-primary dark:bg-primary/20 dark:text-primary">Owner</span></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">Pine Cottage, 2BHK</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">$310,000</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">789 Pine Lane, Anytown</td>
                    <td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">Unsold</span></td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                      <button class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition-colors">View Photos</button>
                      <button class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 transition-colors">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Liam Foster</td>
                    <td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">Agent</span></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">Cedar Heights, 5BHK</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">$850,000</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">101 Cedar Road, Anytown</td>
                    <td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">Unsold</span></td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                      <button class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition-colors">View Photos</button>
                      <button class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 transition-colors">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Ava Morgan</td>
                    <td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-primary/10 text-primary dark:bg-primary/20 dark:text-primary">Owner</span></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">Birch Place, 3BHK</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">$480,000</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">222 Birch Court, Anytown</td>
                    <td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">Sold</span></td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                      <button class="text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary transition-colors">View Photos</button>
                      <button class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 transition-colors">Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    </div>
  </div>
</body>
</html>



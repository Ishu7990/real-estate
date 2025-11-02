<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Admin Dashboard</title>
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
          <h2 class="text-2xl font-bold text-slate-900">Dashboard</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
        <div class="bg-white p-6 rounded-xl border border-slate-200">
        <h3 class="text-sm font-medium text-slate-500">Total Properties</h3>
        <p class="text-3xl font-bold text-slate-900 mt-1">120</p>
        </div>
        <div class="bg-white p-6 rounded-xl border border-slate-200">
        <h3 class="text-sm font-medium text-slate-500">Sold Properties</h3>
        <p class="text-3xl font-bold text-slate-900 mt-1">85</p>
        </div>
        <div class="bg-white p-6 rounded-xl border border-slate-200">
        <h3 class="text-sm font-medium text-slate-500">Total Users</h3>
        <p class="text-3xl font-bold text-slate-900 mt-1">350</p>
        </div>
        <div class="bg-white p-6 rounded-xl border border-slate-200">
        <h3 class="text-sm font-medium text-slate-500">Testimonials</h3>
        <p class="text-3xl font-bold text-slate-900 mt-1">45</p>
        </div>
        <div class="bg-white p-6 rounded-xl border border-slate-200">
        <h3 class="text-sm font-medium text-slate-500">Services</h3>
        <p class="text-3xl font-bold text-slate-900 mt-1">8</p>
        </div>
        </div>
        <div class="mt-8">
        <h3 class="text-xl font-bold text-slate-900 mb-4">Property Sales Monthly Chart</h3>
        <div class="bg-white p-6 rounded-xl border border-slate-200">
        <div class="flex justify-between items-start">
        <div>
        <p class="text-sm font-medium text-slate-500">Sales</p>
        <p class="text-4xl font-bold text-slate-900 mt-1">$2.5M</p>
        <div class="flex items-center gap-2 mt-1">
        <p class="text-sm text-slate-500">This Month</p>
        <p class="text-sm font-medium text-green-500 flex items-center">
        <span class="material-symbols-outlined text-base">arrow_upward</span>
                            15%
                        </p>
        </div>
        </div>
        </div>
        <div class="h-64 mt-6">
        <div class="grid grid-cols-7 gap-4 h-full items-end">
        <div class="flex flex-col items-center justify-end h-full">
        <div class="w-3/4 bg-primary/30 rounded-t-lg hover:bg-primary/40" style="height: 90%;"></div>
        <p class="text-xs text-slate-500 mt-2">April</p>
        </div>
        <div class="flex flex-col items-center justify-end h-full">
        <div class="w-3/4 bg-primary/30 rounded-t-lg hover:bg-primary/40" style="height: 40%;"></div>
        <p class="text-xs text-slate-500 mt-2">May</p>
        </div>
        <div class="flex flex-col items-center justify-end h-full">
        <div class="w-3/4 bg-primary/30 rounded-t-lg hover:bg-primary/40" style="height: 60%;"></div>
        <p class="text-xs text-slate-500 mt-2">June</p>
        </div>
        <div class="flex flex-col items-center justify-end h-full">
        <div class="w-3/4 bg-primary/30 rounded-t-lg hover:bg-primary/40" style="height: 50%;"></div>
        <p class="text-xs text-slate-500 mt-2">July</p>
        </div>
        <div class="flex flex-col items-center justify-end h-full">
        <div class="w-3/4 bg-primary/30 rounded-t-lg hover:bg-primary/40" style="height: 50%;"></div>
        <p class="text-xs text-slate-500 mt-2">August</p>
        </div>
        <div class="flex flex-col items-center justify-end h-full">
        <div class="w-3/4 bg-primary rounded-t-lg hover:bg-primary/40" style="height: 20%;"></div>
        <p class="text-xs font-bold text-primary mt-2">September</p>
        </div>
        <div class="flex flex-col items-center justify-end h-full">
        <div class="w-3/4 bg-primary/10 rounded-t-lg hover:bg-primary/40" style="height: 50%;"></div>
        <p class="text-xs text-slate-500 mt-2">October</p>
        </div>
        </div>
        </div>
        </div>
        </div>
        <div class="mt-8">
        <h3 class="text-xl font-bold text-slate-900 mb-4">Pending Property Approvals</h3>
        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
        <table class="w-full text-left">
        <thead class="bg-slate-50 border-b border-slate-200">
        <tr class="text-sm text-slate-600">
        <th class="font-medium p-4">Seller</th>
        <th class="font-medium p-4">Property</th>
        <th class="font-medium p-4">City</th>
        <th class="font-medium p-4">Price</th>
        <th class="font-medium p-4 text-center">Photos</th>
        <th class="font-medium p-4 text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr class="border-b border-slate-200 last:border-b-0">
        <td class="p-4 align-top">
        <p class="font-medium text-slate-900">John Doe</p>
        <p class="text-sm text-slate-500">Owner</p>
        </td>
        <td class="p-4 align-top">
        <p class="font-medium text-slate-900">Spacious 2BHK Apartment</p>
        <p class="text-sm text-slate-500">2BHK</p>
        </td>
        <td class="p-4 align-top text-slate-900">Mumbai</td>
        <td class="p-4 align-top text-slate-900">$250,000</td>
        <td class="p-4 align-top text-center">
        <button class="px-3 py-1.5 text-sm font-medium text-primary bg-primary/10 rounded-lg hover:bg-primary/20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">View Photos</button>
        </td>
        <td class="p-4 align-top">
        <div class="flex justify-center gap-2">
        <button class="px-3 py-1.5 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Approve</button>
        <button class="px-3 py-1.5 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Reject</button>
        </div>
        </td>
        </tr>
        <tr class="border-b border-slate-200 last:border-b-0">
        <td class="p-4 align-top">
        <p class="font-medium text-slate-900">Jane Smith</p>
        <p class="text-sm text-slate-500">Agent</p>
        </td>
        <td class="p-4 align-top">
        <p class="font-medium text-slate-900">Luxury Villa with Pool</p>
        <p class="text-sm text-slate-500">4BHK</p>
        </td>
        <td class="p-4 align-top text-slate-900">Goa</td>
        <td class="p-4 align-top text-slate-900">$1,200,000</td>
        <td class="p-4 align-top text-center">
        <button class="px-3 py-1.5 text-sm font-medium text-primary bg-primary/10 rounded-lg hover:bg-primary/20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">View Photos</button>
        </td>
        <td class="p-4 align-top">
        <div class="flex justify-center gap-2">
        <button class="px-3 py-1.5 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Approve</button>
        <button class="px-3 py-1.5 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Reject</button>
        </div>
        </td>
        </tr>
        <tr class="border-b border-slate-200 last:border-b-0">
        <td class="p-4 align-top">
        <p class="font-medium text-slate-900">Peter Jones</p>
        <p class="text-sm text-slate-500">Owner</p>
        </td>
        <td class="p-4 align-top">
        <p class="font-medium text-slate-900">Cozy Studio Apartment</p>
        <p class="text-sm text-slate-500">1BHK</p>
        </td>
        <td class="p-4 align-top text-slate-900">Bengaluru</td>
        <td class="p-4 align-top text-slate-900">$150,000</td>
        <td class="p-4 align-top text-center">
        <button class="px-3 py-1.5 text-sm font-medium text-primary bg-primary/10 rounded-lg hover:bg-primary/20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">View Photos</button>
        </td>
        <td class="p-4 align-top">
        <div class="flex justify-center gap-2">
        <button class="px-3 py-1.5 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Approve</button>
        <button class="px-3 py-1.5 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Reject</button>
        </div>
        </td>
        </tr>
        <tr class="border-b border-slate-200 last:border-b-0">
        <td class="p-4 align-top">
        <p class="font-medium text-slate-900">Maria Garcia</p>
        <p class="text-sm text-slate-500">Agent</p>
        </td>
        <td class="p-4 align-top">
        <p class="font-medium text-slate-900">Modern 3BHK Flat</p>
        <p class="text-sm text-slate-500">3BHK</p>
        </td>
        <td class="p-4 align-top text-slate-900">Delhi</td>
        <td class="p-4 align-top text-slate-900">$400,000</td>
        <td class="p-4 align-top text-center">
        <button class="px-3 py-1.5 text-sm font-medium text-primary bg-primary/10 rounded-lg hover:bg-primary/20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">View Photos</button>
        </td>
        <td class="p-4 align-top">
        <div class="flex justify-center gap-2">
        <button class="px-3 py-1.5 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Approve</button>
        <button class="px-3 py-1.5 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Reject</button>
        </div>
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

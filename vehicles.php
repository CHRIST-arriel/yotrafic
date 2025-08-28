<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yotrafic - vehicles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .page {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .page.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .nav-link {
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            transform: translateX(5px);
        }

        .card-stat {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-stat:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .driver-card,
        .vehicle-card,
        .transaction-item {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .driver-card:hover,
        .vehicle-card:hover,
        .transaction-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .active-link {
            color: #2563eb !important;
            font-weight: 600;
        }
    </style>
</head>
<!-- Navigation -->
<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <a href="#" class="flex items-center space-x-2" onclick="navigateTo('dashboard')">
                <div class="w-10 h-10 bg-primary-600 rounded-lg flex items-center justify-center">
                    <i class="ri-truck-line text-white text-xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-primary-600">Yotrafic</h1>
            </a>

            <div class="hidden md:flex items-center space-x-6">
                <a class="nav-link text-gray-600 hover:text-primary-600 transition-colors" href="index.php" onclick="navigateTo('dashboard')">
                    <i class="ri-dashboard-line mr-2"></i>Tableau de Bord
                </a>
                <a class="nav-link text-gray-600 hover:text-primary-600 transition-colors" href="drivers.php">
                    <i class="ri-user-3-line mr-2"></i>Chauffeurs
                </a>
                <a class="nav-link text-primary-600 font-semibold active-link" href="vehicles.php" onclick="navigateTo('vehicles')">
                    <i class="ri-car-line mr-2"></i>Véhicules
                </a>
                <a class="nav-link text-gray-600 hover:text-primary-600 transition-colors" href="transaction.php" onclick="navigateTo('transactions')">
                    <i class="ri-exchange-dollar-line mr-2"></i>Transactions
                </a>
                <a class="nav-link text-gray-600 hover:text-primary-600 transition-colors" href="reports.php" onclick="navigateTo('reports')">
                    <i class="ri-line-chart-line mr-2"></i>Rapports
                </a>
            </div>

            <!-- Mobile menu button -->
            <button class="md:hidden text-gray-600" onclick="toggleMobileMenu()">
                <i class="ri-menu-line text-2xl"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobileMenu" class="hidden md:hidden bg-white shadow-lg">
    <div class="px-4 py-3 space-y-3">
        <a class="block nav-link text-gray-600 hover:text-primary-600" href="index.php" onclick="navigateTo('dashboard')">
            <i class="ri-dashboard-line mr-2"></i>Tableau de Bord
        </a>
        <a class="block nav-link text-gray-600 hover:text-primary-600" href="drivers.php" onclick="navigateTo('drivers')">
            <i class="ri-user-3-line mr-2"></i>Chauffeurs
        </a>
        <a class="block nav-link text-primary-600 font-semibold active-link" href="vehicles.php" onclick="navigateTo('vehicles')">
            <i class="ri-car-line mr-2"></i>Véhicules
        </a>
        <a class="block nav-link text-gray-600 hover:text-primary-600" href="transaction.php" onclick="navigateTo('transactions')">
            <i class="ri-exchange-dollar-line mr-2"></i>Transactions
        </a>
        <a class="block nav-link text-gray-600 hover:text-primary-600" href="reports.php" onclick="navigateTo('reports')">
            <i class="ri-line-chart-line mr-2"></i>Rapports
        </a>
    </div>
</div>
</nav>
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Gestion des Véhicules</h1>
            <p class="text-gray-600 mt-1">Gérez votre flotte de transport en temps réel</p>
        </div>
        <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors whitespace-nowrap cursor-pointer flex items-center space-x-2">
            <i class="ri-add-line"></i>
            <span>Ajouter Véhicule</span>
        </button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Véhicules</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">26</p>
                </div>
                <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                    <i class="ri-truck-line text-white text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Véhicules Actifs</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">22</p>
                </div>
                <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                    <i class="ri-roadster-line text-white text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">En Maintenance</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">3</p>
                </div>
                <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center">
                    <i class="ri-tools-line text-white text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Hors Service</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">1</p>
                </div>
                <div class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center">
                    <i class="ri-close-circle-line text-white text-xl"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-4 lg:space-y-0 lg:space-x-6">
            <div class="flex-1">
                <div class="relative">
                    <i class="ri-search-line absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input type="text" placeholder="Rechercher par ID, modèle ou chauffeur..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" value="" />
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <label class="text-sm font-medium text-gray-700">Statut:</label>
                    <div class="flex bg-gray-100 rounded-lg p-1">
                        <button class="px-3 py-1 text-xs font-medium rounded-full transition-colors whitespace-nowrap cursor-pointer bg-blue-600 text-white">Tous</button>
                        <button class="px-3 py-1 text-xs font-medium rounded-full transition-colors whitespace-nowrap cursor-pointer text-gray-600 hover:text-green-600">Actifs</button>
                        <button class="px-3 py-1 text-xs font-medium rounded-full transition-colors whitespace-nowrap cursor-pointer text-gray-600 hover:text-orange-600">Maintenance</button>
                        <button class="px-3 py-1 text-xs font-medium rounded-full transition-colors whitespace-nowrap cursor-pointer text-gray-600 hover:text-red-600">Inactifs</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <input type="checkbox" class="w-5 h-5 text-blue-600 rounded cursor-pointer" />
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                                <i class="ri-truck-line text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">VH-002</h3>
                                <p class="text-sm text-gray-600">Toyota Mars (2020)</p>
                                <p class="text-xs text-gray-500">CI-123-AC</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                        <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-600 cursor-pointer">
                            <i class="ri-more-2-line"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="ri-user-line text-gray-400"></i>
                                <span class="text-sm font-medium text-gray-700">Chauffeur</span>
                            </div>
                            <p class="text-gray-900 font-medium">Kouame Yao</p>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="ri-map-pin-line text-gray-400"></i>
                                <span class="text-sm font-medium text-gray-700">Position</span>
                            </div>
                            <p class="text-gray-900">Adjamé - Abobo</p>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="ri-speedometer-line text-gray-400"></i>
                                <span class="text-sm font-medium text-gray-700">Vitesse</span>
                            </div>
                            <p class="text-gray-900 font-medium">45 km/h</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center space-x-2">
                                    <i class="ri-gas-station-line text-gray-400"></i>
                                    <span class="text-sm font-medium text-gray-700">Carburant</span>
                                </div>
                                <span class="text-sm font-medium text-gray-900">95%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="h-2 rounded-full bg-green-500" style="width:85%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="ri-tools-line text-gray-400"></i>
                                <span class="text-sm font-medium text-gray-700">Maintenance</span>
                            </div>
                            <p class="font-medium text-green-600">À jour</p>
                            <p class="text-xs text-gray-500">Dernier: 15/09/2024</p>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="ri-money-dollar-circle-line text-gray-400"></i>
                                <span class="text-sm font-medium text-gray-700">Recettes du jour</span>
                            </div>
                            <p class="text-gray-900 font-bold">75,000 FCFA</p>
                        </div>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <i class="ri-roadster-line"></i>
                            <span>32,230 km parcourus</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="w-8 h-8 flex items-center justify-center text-blue-600 hover:bg-blue-50 rounded-lg transition-colors cursor-pointer">
                                <i class="ri-eye-line"></i>
                            </button>
                            <button class="w-8 h-8 flex items-center justify-center text-green-600 hover:bg-green-50 rounded-lg transition-colors cursor-pointer">
                                <i class="ri-map-pin-2-line"></i>
                            </button>
                            <button class="w-8 h-8 flex items-center justify-center text-orange-600 hover:bg-orange-50 rounded-lg transition-colors cursor-pointer">
                                <i class="ri-edit-line"></i>
                            </button>
                            <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-50 rounded-lg transition-colors cursor-pointer">
                                <i class="ri-more-line"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <input type="checkbox" class="w-5 h-5 text-blue-600 rounded cursor-pointer" />
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                                <i class="ri-truck-line text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">VH-001</h3>
                                <p class="text-sm text-gray-600">Toyota Hiace (2020)</p>
                                <p class="text-xs text-gray-500">CI-123-AB</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                        <button class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gray-600 cursor-pointer">
                            <i class="ri-more-2-line"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="ri-user-line text-gray-400"></i>
                                <span class="text-sm font-medium text-gray-700">Chauffeur</span>
                            </div>
                            <p class="text-gray-900 font-medium">Kouassi Jean</p>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="ri-map-pin-line text-gray-400"></i>
                                <span class="text-sm font-medium text-gray-700">Position</span>
                            </div>
                            <p class="text-gray-900">Adjamé - Cocody</p>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="ri-speedometer-line text-gray-400"></i>
                                <span class="text-sm font-medium text-gray-700">Vitesse</span>
                            </div>
                            <p class="text-gray-900 font-medium">45 km/h</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center space-x-2">
                                    <i class="ri-gas-station-line text-gray-400"></i>
                                    <span class="text-sm font-medium text-gray-700">Carburant</span>
                                </div>
                                <span class="text-sm font-medium text-gray-900">85%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="h-2 rounded-full bg-green-500" style="width:85%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="ri-tools-line text-gray-400"></i>
                                <span class="text-sm font-medium text-gray-700">Maintenance</span>
                            </div>
                            <p class="font-medium text-green-600">À jour</p>
                            <p class="text-xs text-gray-500">Dernier: 15/11/2024</p>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="ri-money-dollar-circle-line text-gray-400"></i>
                                <span class="text-sm font-medium text-gray-700">Recettes du jour</span>
                            </div>
                            <p class="text-gray-900 font-bold">125,000 FCFA</p>
                        </div>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <i class="ri-roadster-line"></i>
                            <span>45,230 km parcourus</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="w-8 h-8 flex items-center justify-center text-blue-600 hover:bg-blue-50 rounded-lg transition-colors cursor-pointer">
                                <i class="ri-eye-line"></i>
                            </button>
                            <button class="w-8 h-8 flex items-center justify-center text-green-600 hover:bg-green-50 rounded-lg transition-colors cursor-pointer">
                                <i class="ri-map-pin-2-line"></i>
                            </button>
                            <button class="w-8 h-8 flex items-center justify-center text-orange-600 hover:bg-orange-50 rounded-lg transition-colors cursor-pointer">
                                <i class="ri-edit-line"></i>
                            </button>
                            <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-50 rounded-lg transition-colors cursor-pointer">
                                <i class="ri-more-line"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
<!-- JavaScript -->
<script>
    // Close mobile menu if open
    document.getElementById('mobileMenu').classList.add('hidden');

    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }

    // Handle browser back/forward buttons
    window.addEventListener('popstate', function(event) {
        if (event.state && event.state.page) {
            navigateTo(event.state.page);
        }
    });

    // Initialize with dashboard page
    navigateTo('dashboard');
</script>

<!-- Scripts -->
<script src="_next/static/chunks/webpack-2bd042c2fed1e2ce.js" async=""></script>
<script>
    (self.__next_f = self.__next_f || []).push([0]);
</script>
<script>
    self.__next_f.push([1, "1:\"$Sreact.fragment\"\n2:I[9766,[],\"\"]\n3:I[8924,[],\"\"]\n4:I[1959,[],\"ClientPageRoot\"]\n5:I[6599,[\"619\",\"static/chunks/619-32f9ff4cb103078b.js\",\"602\",\"static/chunks/app/vehicles/page-a893ff3a251f1269.js\"],\"default\"]\n8:I[9390,[],\"MetadataBoundary\"]\na:I[9390,[],\"OutletBoundary\"]\nd:I[5278,[],\"AsyncMetadataOutlet\"]\nf:I[9390,[],\"ViewportBoundary\"]\n11:I[8785,[],\"\"]\n:HL[\"/preview/9d61e74b-c092-44d3-ab80-f0ec6617798d/1931572/_next/static/media/1b3800ed4c918892-s.p.woff2\",\"font\",{\"crossOrigin\":\"\",\"type\":\"font/woff2\"}]\n:HL[\"/preview/9d61e74b-c092-44d3-ab80-f0ec6617798d/1931572/_next/static/media/569ce4b8f30dc480-s.p.woff2\",\"font\",{\"crossOrigin\":\"\",\"type\":\"font/woff2\"}]\n:HL[\"/preview/9d61e74b-c092-44d3-ab80-f0ec6617798d/1931572/_next/static/media/93f479601ee12b01-s.p.woff2\",\"font\",{\"crossOrigin\":\"\",\"type\":\"font/woff2\"}]\n:HL[\"/preview/9d61e74b-c092-44d3-ab80-f0ec6617798d/1931572/_next/static/css/ef11ce96158c0324.css\",\"style\"]\n"]);
</script>
<script>
    self.__next_f.push([1, "0:{\"P\":null,\"b\":\"LsiG0g5T4iBLucaTc1bZg\",\"p\":\"/preview/9d61e74b-c092-44d3-ab80-f0ec6617798d/1931572\",\"c\":[\"\",\"vehicles\"],\"i\":false,\"f\":[[[\"\",{\"children\":[\"vehicles\",{\"children\":[\"__PAGE__\",{}]}]},\"$undefined\",\"$undefined\",true],[\"\",[\"$\",\"$1\",\"c\",{\"children\":[[[\"$\",\"link\",\"0\",{\"rel\":\"stylesheet\",\"href\":\"/preview/9d61e74b-c092-44d3-ab80-f0ec6617798d/1931572/_next/static/css/ef11ce96158c0324.css\",\"precedence\":\"next\",\"crossOrigin\":\"$undefined\",\"nonce\":\"$undefined\"}]],[\"$\",\"html\",null,{\"lang\":\"en\",\"suppressHydrationWarning\":true,\"children\":[\"$\",\"body\",null,{\"className\":\"__variable_b9116a __variable_bf4fb2 __variable_5ff634 antialiased\",\"children\":[\"$\",\"$L2\",null,{\"parallelRouterKey\":\"children\",\"error\":\"$undefined\",\"errorStyles\":\"$undefined\",\"errorScripts\":\"$undefined\",\"template\":[\"$\",\"$L3\",null,{}],\"templateStyles\":\"$undefined\",\"templateScripts\":\"$undefined\",\"notFound\":[[\"$\",\"div\",null,{\"className\":\"flex flex-col items-center justify-center h-screen text-center px-4\",\"children\":[[\"$\",\"h1\",null,{\"className\":\"text-5xl md:text-5xl font-semibold text-gray-100\",\"children\":\"404\"}],[\"$\",\"h1\",null,{\"className\":\"text-2xl md:text-3xl font-semibold mt-6\",\"children\":\"This page has not been generated\"}],[\"$\",\"p\",null,{\"className\":\"mt-4 text-xl md:text-2xl text-gray-500\",\"children\":\"Tell me what you would like on this page\"}]]}],[]],\"forbidden\":\"$undefined\",\"unauthorized\":\"$undefined\"}]}]}]]}],{\"children\":[\"vehicles\",[\"$\",\"$1\",\"c\",{\"children\":[null,[\"$\",\"$L2\",null,{\"parallelRouterKey\":\"children\",\"error\":\"$undefined\",\"errorStyles\":\"$undefined\",\"errorScripts\":\"$undefined\",\"template\":[\"$\",\"$L3\",null,{}],\"templateStyles\":\"$undefined\",\"templateScripts\":\"$undefined\",\"notFound\":\"$undefined\",\"forbidden\":\"$undefined\",\"unauthorized\":\"$undefined\"}]]}],{\"children\":[\"__PAGE__\",[\"$\",\"$1\",\"c\",{\"children\":[[\"$\",\"$L4\",null,{\"Component\":\"$5\",\"searchParams\":{},\"params\":{},\"promises\":[\"$@6\",\"$@7\"]}],[\"$\",\"$L8\",null,{\"children\":\"$L9\"}],null,[\"$\",\"$La\",null,{\"children\":[\"$Lb\",\"$Lc\",[\"$\",\"$Ld\",null,{\"promise\":\"$@e\"}]]}]]}],{},null,false]},null,false]},null,false],[\"$\",\"$1\",\"h\",{\"children\":[null,[\"$\",\"$1\",\"of22qvB6nhM4A_JwzbfMr\",{\"children\":[[\"$\",\"$Lf\",null,{\"children\":\"$L10\"}],[\"$\",\"meta\",null,{\"name\":\"next-size-adjust\",\"content\":\"\"}]]}],null]}],false]],\"m\":\"$undefined\",\"G\":[\"$11\",\"$undefined\"],\"s\":false,\"S\":true}\n"]);
</script>
<script>
    self.__next_f.push([1, "12:\"$Sreact.suspense\"\n13:I[5278,[],\"AsyncMetadata\"]\n6:{}\n7:{}\n9:[\"$\",\"$12\",null,{\"fallback\":null,\"children\":[\"$\",\"$L13\",null,{\"promise\":\"$@14\"}]}]\n"]);
</script>
<script>
    self.__next_f.push([1, "c:null\n"]);
</script>
<script>
    self.__next_f.push([1, "10:[[\"$\",\"meta\",\"0\",{\"charSet\":\"utf-8\"}],[\"$\",\"meta\",\"1\",{\"name\":\"viewport\",\"content\":\"width=device-width, initial-scale=1\"}]]\nb:null\n"]);
</script>
<script>
    self.__next_f.push([1, "14:{\"metadata\":[[\"$\",\"title\",\"0\",{\"children\":\"Readdy Site\"}],[\"$\",\"meta\",\"1\",{\"name\":\"description\",\"content\":\"Generated by Readdy\"}]],\"error\":null,\"digest\":\"$undefined\"}\ne:{\"metadata\":\"$14:metadata\",\"error\":null,\"digest\":\"$undefined\"}\n"]);
</script>
</body>
<!-- Mirrored from readdy.link/preview/9d61e74b-c092-44d3-ab80-f0ec6617798d/1931572/vehicles by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Aug 2025 10:32:31 GMT -->

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yotrafic - Transaction</title>
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
                <a class="nav-link text-gray-600 hover:text-primary-600 transition-colors" href="vehicles.php" onclick="navigateTo('vehicles')">
                    <i class="ri-car-line mr-2"></i>Véhicules
                </a>
                <a class="nav-link text-primary-600 font-semibold active-link" href="transaction.php" onclick="navigateTo('transactions')">
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
        <a class="block nav-link text-gray-600 hover:text-primary-600" href="vehicles.php" onclick="navigateTo('vehicles')">
            <i class="ri-car-line mr-2"></i>Véhicules
        </a>
        <a class="block nav-link text-primary-600 font-semibold active-link" href="transaction.php" onclick="navigateTo('transactions')">
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
                    <h1 class="text-3xl font-bold text-gray-900">Gestion des Transactions</h1>
                    <p class="text-gray-600 mt-1">Suivi des paiements Mobile Money en temps réel</p>
                </div>
                <div class="flex items-center space-x-4">
                    <select class="pr-8 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="today" selected="">Aujourd'hui</option>
                        <option value="week">Cette semaine</option>
                        <option value="month">Ce mois</option>
                    </select>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors whitespace-nowrap cursor-pointer">
                        <i class="ri-download-line mr-2"></i>Exporter
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Recettes Totales</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">41,200 FCFA</p>
                        </div>
                        <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                            <i class="ri-money-dollar-circle-line text-white text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Commissions</p>
                            <p class="text-3xl font-bold text-blue-600 mt-2">4,120 FCFA</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                            <i class="ri-percent-line text-white text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Transactions</p>
                            <p class="text-3xl font-bold text-purple-600 mt-2">5</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center">
                            <i class="ri-exchange-line text-white text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Taux de Réussite</p>
                            <p class="text-3xl font-bold text-orange-600 mt-2">60%</p>
                        </div>
                        <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center">
                            <i class="ri-check-line text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center">
                                <i class="ri-smartphone-line text-white text-lg"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900">MTN Money</h3>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Montant:</span>
                            <span class="text-sm font-semibold text-gray-900">29,200 FCFA</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Transactions:</span>
                            <span class="text-sm font-semibold text-gray-900">2</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-yellow-500 h-2 rounded-full" style="width:70.87%"></div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center">
                                <i class="ri-smartphone-line text-white text-lg"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900">Orange Money</h3>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Montant:</span>
                            <span class="text-sm font-semibold text-gray-900">12,000 FCFA</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Transactions:</span>
                            <span class="text-sm font-semibold text-gray-900">2</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-orange-500 h-2 rounded-full" style="width:29.13%"></div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                <i class="ri-smartphone-line text-white text-lg"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900">Moov Money</h3>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Montant:</span>
                            <span class="text-sm font-semibold text-gray-900">0 FCFA</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Transactions:</span>
                            <span class="text-sm font-semibold text-gray-900">1</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full" style="width:0%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center space-x-4">
                        <label class="text-sm font-medium text-gray-700">Méthode de paiement:</label>
                        <div class="flex bg-gray-100 rounded-lg p-1">
                            <button class="px-4 py-2 text-sm font-medium rounded-md transition-colors whitespace-nowrap cursor-pointer bg-blue-600 text-white">Tous</button>
                            <button class="px-4 py-2 text-sm font-medium rounded-md transition-colors whitespace-nowrap cursor-pointer text-gray-600 hover:text-gray-900">MTN</button>
                            <button class="px-4 py-2 text-sm font-medium rounded-md transition-colors whitespace-nowrap cursor-pointer text-gray-600 hover:text-gray-900">Orange</button>
                            <button class="px-4 py-2 text-sm font-medium rounded-md transition-colors whitespace-nowrap cursor-pointer text-gray-600 hover:text-gray-900">Moov</button>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <input type="text" placeholder="Rechercher une transaction..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" />
                            <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaction</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Véhicule</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Chauffeur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trajet</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paiement</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Passagers</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">TXN-2024-001</div>
                                        <div class="text-sm text-gray-500">08:30</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                                            <i class="ri-truck-line text-white text-sm"></i>
                                        </div>
                                        <span class="text-sm font-medium text-gray-900">VH-001</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Kouassi Jean</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Adjamé - Cocody</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-6 h-6 bg-yellow-500 rounded flex items-center justify-center mr-2">
                                            <i class="ri-smartphone-line text-white text-xs"></i>
                                        </div>
                                        <span class="text-sm text-gray-900">MTN Money</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-gray-900">15,000 FCFA</div>
                                    <div class="text-xs text-gray-500">Commission: 1,500 FCFA</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">18</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Terminée</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-900 cursor-pointer">
                                            <i class="ri-eye-line text-lg"></i>
                                        </button>
                                        <button class="text-green-600 hover:text-green-900 cursor-pointer">
                                            <i class="ri-download-line text-lg"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">TXN-2024-002</div>
                                        <div class="text-sm text-gray-500">09:15</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                                            <i class="ri-truck-line text-white text-sm"></i>
                                        </div>
                                        <span class="text-sm font-medium text-gray-900">VH-007</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Diabaté Ali</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Plateau - Marcory</td>
<td class="px-6 py-4 whitespace-nowrap">
    <div class="flex items-center">
        <div class="w-6 h-6 bg-orange-500 rounded flex items-center justify-center mr-2">
            <i class="ri-smartphone-line text-white text-xs"></i>
        </div>
        <span class="text-sm text-gray-900">Orange Money</span>
    </div>
</td>
<td class="px-6 py-4 whitespace-nowrap">
    <div class="text-sm font-semibold text-gray-900">12,000 FCFA</div>
    <div class="text-xs text-gray-500">Commission: 1,200 FCFA</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">15</td>
<td class="px-6 py-4 whitespace-nowrap">
    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Terminée</span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm">
    <div class="flex items-center space-x-2">
        <button class="text-blue-600 hover:text-blue-900 cursor-pointer">
            <i class="ri-eye-line text-lg"></i>
        </button>
        <button class="text-green-600 hover:text-green-900 cursor-pointer">
            <i class="ri-download-line text-lg"></i>
        </button>
    </div>
</td>
</tr>
<tr class="hover:bg-gray-50">
    <td class="px-6 py-4 whitespace-nowrap">
        <div>
            <div class="text-sm font-medium text-gray-900">TXN-2024-003</div>
            <div class="text-sm text-gray-500">10:45</div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                <i class="ri-truck-line text-white text-sm"></i>
            </div>
            <span class="text-sm font-medium text-gray-900">VH-012</span>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Traoré Marie</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Yopougon - Treichville</td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="w-6 h-6 bg-blue-500 rounded flex items-center justify-center mr-2">
                <i class="ri-smartphone-line text-white text-xs"></i>
            </div>
            <span class="text-sm text-gray-900">Moov Money</span>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm font-semibold text-gray-900">18,500 FCFA</div>
        <div class="text-xs text-gray-500">Commission: 1,850 FCFA</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">22</td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">En cours</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm">
        <div class="flex items-center space-x-2">
            <button class="text-blue-600 hover:text-blue-900 cursor-pointer">
                <i class="ri-eye-line text-lg"></i>
            </button>
            <button class="text-green-600 hover:text-green-900 cursor-pointer">
                <i class="ri-download-line text-lg"></i>
            </button>
        </div>
    </td>
</tr>
<tr class="hover:bg-gray-50">
    <td class="px-6 py-4 whitespace-nowrap">
        <div>
            <div class="text-sm font-medium text-gray-900">TXN-2024-004</div>
            <div class="text-sm text-gray-500">11:20</div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                <i class="ri-truck-line text-white text-sm"></i>
            </div>
            <span class="text-sm font-medium text-gray-900">VH-018</span>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Koné Fatou</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Abobo - Koumassi</td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="w-6 h-6 bg-yellow-500 rounded flex items-center justify-center mr-2">
                <i class="ri-smartphone-line text-white text-xs"></i>
            </div>
            <span class="text-sm text-gray-900">MTN Money</span>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm font-semibold text-gray-900">14,200 FCFA</div>
        <div class="text-xs text-gray-500">Commission: 1,420 FCFA</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">17</td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Terminée</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm">
        <div class="flex items-center space-x-2">
            <button class="text-blue-600 hover:text-blue-900 cursor-pointer">
                <i class="ri-eye-line text-lg"></i>
            </button>
            <button class="text-green-600 hover:text-green-900 cursor-pointer">
                <i class="ri-download-line text-lg"></i>
            </button>
        </div>
    </td>
</tr>
<tr class="hover:bg-gray-50">
    <td class="px-6 py-4 whitespace-nowrap">
        <div>
            <div class="text-sm font-medium text-gray-900">TXN-2024-005</div>
            <div class="text-sm text-gray-500">12:00</div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                <i class="ri-truck-line text-white text-sm"></i>
            </div>
            <span class="text-sm font-medium text-gray-900">VH-024</span>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Ouattara Moussa</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Cocody - Port-Bouët</td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="w-6 h-6 bg-orange-500 rounded flex items-center justify-center mr-2">
                <i class="ri-smartphone-line text-white text-xs"></i>
            </div>
            <span class="text-sm text-gray-900">Orange Money</span>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm font-semibold text-gray-900">16,800 FCFA</div>
        <div class="text-xs text-gray-500">Commission: 0 FCFA</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">20</td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Échec</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm">
        <div class="flex items-center space-x-2">
            <button class="text-blue-600 hover:text-blue-900 cursor-pointer">
                <i class="ri-eye-line text-lg"></i>
            </button>
            <button class="text-green-600 hover:text-green-900 cursor-pointer">
                <i class="ri-download-line text-lg"></i>
            </button>
            <button class="text-orange-600 hover:text-orange-900 cursor-pointer">
                <i class="ri-refresh-line text-lg"></i>
            </button>
        </div>
    </td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-semibold text-gray-900">Alertes Financières en Temps Réel</h3>
        <div class="flex items-center space-x-2">
            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
            <span class="text-sm text-gray-600">Surveillance active</span>
        </div>
    </div>
    <div class="grid md:grid-cols-2 gap-4">
        <div class="bg-white rounded-lg p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-700">Seuil d'Alerte Minimum</p>
                    <p class="text-2xl font-bold text-orange-600">50,000 FCFA</p>
                </div>
                <i class="ri-alarm-warning-line text-2xl text-orange-600"></i>
            </div>
            <p class="text-xs text-gray-500 mt-2">Alerte si recettes &lt; seuil par véhicule</p>
        </div>
        <div class="bg-white rounded-lg p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-700">Transactions Échouées</p>
                    <p class="text-2xl font-bold text-red-600">1</p>
                </div>
                <i class="ri-error-warning-line text-2xl text-red-600"></i>
            </div>
            <p class="text-xs text-gray-500 mt-2">Nécessitent une intervention</p>
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
<!--$--><!--/$--><!--$--><!--/$-->
<script src="_next/static/chunks/webpack-cc564e0910cf6891.js" async=""></script>
<script>
    (self.__next_f = self.__next_f || []).push([0]);
</script>
<script>
    self.__next_f.push([1, "1:\"$Sreact.fragment\"\n2:I[9766,[],\"\"]\n3:I[8924,[],\"\"]\n4:I[1959,[],\"ClientPageRoot\"]\n5:I[8863,[\"619\",\"static/chunks/619-32f9ff4cb103078b.js\",\"790\",\"static/chunks/app/transactions/page-2d6d6f2ddc20b036.js\"],\"default\"]\n8:I[9390,[],\"MetadataBoundary\"]\na:I[9390,[],\"OutletBoundary\"]\nd:I[5278,[],\"AsyncMetadataOutlet\"]\nf:I[9390,[],\"ViewportBoundary\"]\n11:I[8785,[],\"\"]\n:HL[\"/preview/9d61e74b-c092-44d3-ab80-f0ec6617798d/1929846/_next/static/media/1b3800ed4c918892-s.p.woff2\",\"font\",{\"crossOrigin\":\"\",\"type\":\"font/woff2\"}]\n:HL[\"/preview/9d61e74b-c092-44d3-ab80-f0ec6617798d/1929846/_next/static/media/569ce4b8f30dc480-s.p.woff2\",\"font\",{\"crossOrigin\":\"\",\"type\":\"font/woff2\"}]\n:HL[\"/preview/9d61e74b-c092-44d3-ab80-f0ec6617798d/1929846/_next/static/media/93f479601ee12b01-s.p.woff2\",\"font\",{\"crossOrigin\":\"\",\"type\":\"font/woff2\"}]\n:HL[\"/preview/9d61e74b-c092-44d3-ab80-f0ec6617798d/1929846/_next/static/css/3d21f90ad4bbbe97.css\",\"style\"]\n"]);
</script>
<script>
    self.__next_f.push([1, "0:{\"P\":null,\"b\":\"QH94R3Ateg0hjok_cp30I\",\"p\":\"/preview/9d61e74b-c092-44d3-ab80-f0ec6617798d/1929846\",\"c\":[\"\",\"transactions\"],\"i\":false,\"f\":[[[\"\",{\"children\":[\"transactions\",{\"children\":[\"__PAGE__\",{}]}]},\"$undefined\",\"$undefined\",true],[\"\",[\"$\",\"$1\",\"c\",{\"children\":[[[\"$\",\"link\",\"0\",{\"rel\":\"stylesheet\",\"href\":\"/preview/9d61e74b-c092-44d3-ab80-f0ec6617798d/1929846/_next/static/css/3d21f90ad4bbbe97.css\",\"precedence\":\"next\",\"crossOrigin\":\"$undefined\",\"nonce\":\"$undefined\"}]],[\"$\",\"html\",null,{\"lang\":\"en\",\"suppressHydrationWarning\":true,\"children\":[\"$\",\"body\",null,{\"className\":\"__variable_3711d8 __variable_0afd48 __variable_464fe1 antialiased\",\"children\":[\"$\",\"$L2\",null,{\"parallelRouterKey\":\"children\",\"error\":\"$undefined\",\"errorStyles\":\"$undefined\",\"errorScripts\":\"$undefined\",\"template\":[\"$\",\"$L3\",null,{}],\"templateStyles\":\"$undefined\",\"templateScripts\":\"$undefined\",\"notFound\":[[\"$\",\"div\",null,{\"className\":\"flex flex-col items-center justify-center h-screen text-center px-4\",\"children\":[[\"$\",\"h1\",null,{\"className\":\"text-5xl md:text-5xl font-semibold text-gray-100\",\"children\":\"404\"}],[\"$\",\"h1\",null,{\"className\":\"text-2xl md:text-3xl font-semibold mt-6\",\"children\":\"This page has not been generated\"}],[\"$\",\"p\",null,{\"className\":\"mt-4 text-xl md:text-2xl text-gray-500\",\"children\":\"Tell me what you would like on this page\"}]]}],[]],\"forbidden\":\"$undefined\",\"unauthorized\":\"$undefined\"}]}]}]]}],{\"children\":[\"transactions\",[\"$\",\"$1\",\"c\",{\"children\":[null,[\"$\",\"$L2\",null,{\"parallelRouterKey\":\"children\",\"error\":\"$undefined\",\"errorStyles\":\"$undefined\",\"errorScripts\":\"$undefined\",\"template\":[\"$\",\"$L3\",null,{}],\"templateStyles\":\"$undefined\",\"templateScripts\":\"$undefined\",\"notFound\":\"$undefined\",\"forbidden\":\"$undefined\",\"unauthorized\":\"$undefined\"}]]}],{\"children\":[\"__PAGE__\",[\"$\",\"$1\",\"c\",{\"children\":[[\"$\",\"$L4\",null,{\"Component\":\"$5\",\"searchParams\":{},\"params\":{},\"promises\":[\"$@6\",\"$@7\"]}],[\"$\",\"$L8\",null,{\"children\":\"$L9\"}],null,[\"$\",\"$La\",null,{\"children\":[\"$Lb\",\"$Lc\",[\"$\",\"$Ld\",null,{\"promise\":\"$@e\"}]]}]]}],{},null,false]},null,false]},null,false],[\"$\",\"$1\",\"h\",{\"children\":[null,[\"$\",\"$1\",\"ryss3qhIlkRDETJkZv21_\",{\"children\":[[\"$\",\"$Lf\",null,{\"children\":\"$L10\"}],[\"$\",\"meta\",null,{\"name\":\"next-size-adjust\",\"content\":\"\"}]]}],null]}],false]],\"m\":\"$undefined\",\"G\":[\"$11\",\"$undefined\"],\"s\":false,\"S\":true}\n"]);
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
<!-- Mirrored from readdy.link/preview/9d61e74b-c092-44d3-ab80-f0ec6617798d/1929846/transactions by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Aug 2025 09:19:43 GMT -->
</html>

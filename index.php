<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yotrafic - Dashboard</title>
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
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
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
        
        .driver-card, .vehicle-card, .transaction-item {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .driver-card:hover, .vehicle-card:hover, .transaction-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }
        
        .active-link {
            color: #2563eb !important;
            font-weight: 600;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="#" class="flex items-center space-x-2" onclick="navigateTo('dashboard')">
                    <div class="w-10 h-10 bg-primary-600 rounded-lg flex items-center justify-center">
                        <i class="ri-truck-line text-white text-xl"></i>
                        
                    </div>
                    <h1 class="text-2xl font-bold text-primary-600">YoTrafic</h1>
                </a>
                
                <div class="hidden md:flex items-center space-x-6">
                    <a class="nav-link text-primary-600 font-semibold active-link" href="index.php" onclick="navigateTo('dashboard')">
                        <i class="ri-dashboard-line mr-2"></i>Tableau de Bord
                    </a>
                    <a class="nav-link text-gray-600 hover:text-primary-600 transition-colors" href="drivers.php">
                        <i class="ri-user-3-line mr-2"></i>Chauffeurs
                    </a>
                    <a class="nav-link text-gray-600 hover:text-primary-600 transition-colors" href="vehicles.php" onclick="navigateTo('vehicles')">
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
            <a class="block nav-link text-primary-600 font-semibold active-link" href="index.php" onclick="navigateTo('dashboard')">
                <i class="ri-dashboard-line mr-2"></i>Tableau de Bord
            </a>
            <a class="block nav-link text-gray-600 hover:text-primary-600" href="drivers.php" onclick="navigateTo('drivers')">
                <i class="ri-user-3-line mr-2"></i>Chauffeurs
            </a>
            <a class="block nav-link text-gray-600 hover:text-primary-600" href="vehicles.php" onclick="navigateTo('vehicles')">
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

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <!-- Dashboard Page -->
        <div id="dashboard" class="page active">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Tableau de Bord</h1>
                    <p class="text-gray-600 mt-1">Suivi en temps réel de votre flotte de transport</p>
                </div>
                <div class="flex items-center space-x-4">
                    <select class="pr-8 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        <option value="today" selected>Aujourd'hui</option>
                        <option value="week">Cette semaine</option>
                        <option value="month">Ce mois</option>
                    </select>
                    <button class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors whitespace-nowrap cursor-pointer">
                        <i class="ri-refresh-line mr-2"></i>Actualiser
                    </button>
                </div>
            </div>

            <!-- Stat Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Véhicules Actifs -->
                <div class="card-stat bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm">Véhicules Actifs</p>
                            <h2 class="text-3xl font-bold text-gray-800">24</h2>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="ri-truck-line text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-green-600 text-sm mt-2">Tous opérationnels</p>
                </div>

                <!-- Chauffeurs en Service -->
                <div class="card-stat bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm">Chauffeurs en Service</p>
                            <h2 class="text-3xl font-bold text-gray-800">18</h2>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="ri-user-3-line text-green-600 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-green-600 text-sm mt-2">+3 ce mois</p>
                </div>

                <!-- Recettes du Jour -->
                <div class="card-stat bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm">Recettes du Jour</p>
                            <h2 class="text-3xl font-bold text-gray-800">2.4M FCFA</h2>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="ri-money-euro-circle-line text-purple-600 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-green-600 text-sm mt-2">+12% vs hier</p>
                </div>

                <!-- Alertes Actives -->
                <div class="card-stat bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm">Alertes Actives</p>
                            <h2 class="text-3xl font-bold text-gray-800">3</h2>
                        </div>
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                            <i class="ri-alarm-warning-line text-red-600 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-red-600 text-sm mt-2">Attention requise</p>
                </div>
            </div>

            <!-- Carte et Alertes -->
            <div class="grid lg:grid-cols-3 gap-8 mb-8">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-gray-900">Localisation en Temps Réel</h2>
                            <button class="text-primary-600 hover:text-primary-700 cursor-pointer">
                                <i class="ri-fullscreen-line text-xl"></i>
                            </button>
                        </div>
                        <div class="h-96 bg-gray-100 rounded-lg relative overflow-hidden">
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100">
                                <div class="text-center text-gray-600">
                                    <i class="ri-map-2-line text-4xl mb-2"></i>
                                    <p>Carte en temps réel</p>
                                    <p class="text-sm">Intégration Google Maps</p>
                                </div>
                            </div>
                            <div class="absolute top-4 left-4 bg-white px-3 py-2 rounded-lg shadow-lg">
                                <div class="flex items-center space-x-2">
                                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                    <span class="text-sm font-medium">24 véhicules actifs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-gray-900">Alertes Récentes</h2>
                            <a class="text-primary-600 hover:text-primary-700 text-sm font-medium cursor-pointer">Voir tout</a>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3 p-3 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                                <div class="w-2 h-2 rounded-full mt-2 bg-red-500"></div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-medium text-gray-900">Vitesse</p>
                                            <p class="text-sm text-gray-600">VH-001 - Kouassi Jean</p>
                                        </div>
                                        <span class="text-xs text-gray-500">14:32</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 p-3 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                                <div class="w-2 h-2 rounded-full mt-2 bg-orange-500"></div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-medium text-gray-900">Zone</p>
                                            <p class="text-sm text-gray-600">VH-007 - Diabaté Ali</p>
                                        </div>
                                        <span class="text-xs text-gray-500">13:15</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 p-3 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                                <div class="w-2 h-2 rounded-full mt-2 bg-yellow-500"></div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-medium text-gray-900">Paiement</p>
                                            <p class="text-sm text-gray-600">VH-012 - Traoré Marie</p>
                                        </div>
                                        <span class="text-xs text-gray-500">12:45</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Véhicules Actifs -->
            <div class="bg-white rounded-xl shadow-lg">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold text-gray-900">Véhicules Actifs</h2>
                        <a class="text-primary-600 hover:text-primary-700 text-sm font-medium cursor-pointer" onclick="navigateTo('vehicles')">Gérer les véhicules</a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Véhicule</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Chauffeur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trajet</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vitesse</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                                            <i class="ri-truck-line text-white text-sm"></i>
                                        </div>
                                        <div class="font-medium text-gray-900">VH-001</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Kouassi Jean</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Adjamé - Cocody</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">45 km/h</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">En route</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button class="text-primary-600 hover:text-primary-900 mr-3 cursor-pointer">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button class="text-gray-600 hover:text-gray-900 cursor-pointer">
                                        <i class="ri-more-2-line"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                                            <i class="ri-truck-line text-white text-sm"></i>
                                        </div>
                                        <div class="font-medium text-gray-900">VH-007</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Diabaté Ali</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Plateau - Marcory</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">38 km/h</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">En route</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button class="text-primary-600 hover:text-primary-900 mr-3 cursor-pointer">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button class="text-gray-600 hover:text-gray-900 cursor-pointer">
                                        <i class="ri-more-2-line"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Drivers Page -->
        <div id="drivers" class="page">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Gestion des Chauffeurs</h1>
                    <p class="text-gray-600 mt-1">Gérez votre équipe de chauffeurs professionnels</p>
                </div>
                <button class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors">
                    <i class="ri-user-add-line mr-2"></i>Nouveau Chauffeur
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Driver Cards -->
                <div class="driver-card bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="ri-user-3-line text-blue-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Kouassi Jean</h3>
                            <p class="text-sm text-gray-600">Permis C</p>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Téléphone:</span>
                            <span class="text-sm font-medium">+225 07 12 34 56 78</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Statut:</span>
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Véhicule:</span>
                            <span class="text-sm font-medium">VH-001</span>
                        </div>
                    </div>
                </div>

                <div class="driver-card bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="ri-user-3-line text-green-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Diabaté Ali</h3>
                            <p class="text-sm text-gray-600">Permis D</p>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Téléphone:</span>
                            <span class="text-sm font-medium">+225 05 43 21 98 76</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Statut:</span>
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Véhicule:</span>
                            <span class="text-sm font-medium">VH-007</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vehicles Page -->
        <div id="vehicles" class="page">
            <!-- Content for Vehicles page -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Gestion des Véhicules</h1>
                    <p class="text-gray-600 mt-1">Suivez et gérez votre flotte de véhicules</p>
                </div>
                <button class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors">
                    <i class="ri-car-line mr-2"></i>Nouveau Véhicule
                </button>
            </div>
            <div class="bg-white rounded-xl p-6">
                <p class="text-gray-600">Gestion complète de votre flotte de véhicules.</p>
            </div>
        </div>

        <!-- Transactions Page -->
        <div id="transactions" class="page">
            <!-- Content for Transactions page -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Transactions</h1>
                    <p class="text-gray-600 mt-1">Historique des transactions financières</p>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6">
                <p class="text-gray-600">Historique complet des transactions.</p>
            </div>
        </div>

        <!-- Reports Page -->
        <div id="reports" class="page">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Rapports</h1>
            <p class="text-gray-600 mt-1">Analyse complète des performances de votre flotte</p>
        </div>
        <div class="flex space-x-4">
            <button class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors">
                <i class="ri-file-download-line mr-2"></i>Exporter PDF
            </button>
            <button class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors">
                <i class="ri-file-download-line mr-2"></i>Exporter Excel
            </button>
        </div>
    </div>

    <!-- Métriques Principales -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Revenus Totaux</h2>
            <p class="text-2xl font-bold text-gray-800">5,000,000 FCFA</p>
            <p class="text-sm text-gray-600">Comparé à 4,500,000 FCFA le mois dernier</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Trajets Réalisés</h2>
            <p class="text-2xl font-bold text-gray-800">1,200</p>
            <p class="text-sm text-gray-600">+15% par rapport au mois dernier</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Coûts Carburant</h2>
            <p class="text-2xl font-bold text-gray-800">1,200,000 FCFA</p>
            <p class="text-sm text-gray-600">-5% par rapport au mois dernier</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <h2 class="text-lg font-bold text-gray-900">Taux d'Utilisation</h2>
            <p class="text-2xl font-bold text-gray-800">85%</p>
            <p class="text-sm text-gray-600">Stable par rapport au mois dernier</p>
        </div>
    </div>

    <!-- Contrôles Avancés -->
    <div class="bg-white rounded-xl p-6 mb-8 shadow-sm border border-gray-100">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Contrôles Avancés</h2>
        <div class="flex space-x-4 mb-4">
            <select class="pr-8 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                <option value="7days">7 Jours</option>
                <option value="30days">30 Jours</option>
                <option value="90days">90 Jours</option>
                <option value="1year">1 An</option>
            </select>
            <select class="pr-8 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                <option value="overview">Vue d'ensemble</option>
                <option value="financial">Financier</option>
                <option value="operational">Opérationnel</option>
                <option value="drivers">Chauffeurs</option>
                <option value="vehicles">Véhicules</option>
            </select>
        </div>
    </div>

    <!-- Graphiques Interactifs -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Évolution des Revenus Mensuels</h2>
            <canvas id="revenueChart"></canvas>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Performance des Chauffeurs</h2>
            <canvas id="driverPerformanceChart"></canvas>
        </div>
    </div>

    <!-- Analyses Détaillées -->
    <div class="bg-white rounded-xl p-6 mb-8 shadow-sm border border-gray-100">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Analyses Détaillées</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="font-bold text-gray-800">Top Chauffeurs</h3>
                <ul class="mt-2">
                    <li>Kouassi Jean - 95%</li>
                    <li>Diabaté Ali - 90%</li>
                    <li>Traoré Marie - 85%</li>
                </ul>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="font-bold text-gray-800">Utilisation des Véhicules</h3>
                <div class="flex items-center">
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 80%;"></div>
                    </div>
                    <span class="ml-2">80%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Alertes Intelligentes -->
    <div class="bg-white rounded-xl p-6 mb-8 shadow-sm border border-gray-100">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Alertes Intelligentes</h2>
        <ul class="list-disc list-inside">
            <li>Maintenance préventive recommandée pour VH-001</li>
            <li>Optimisation des performances pour Diabaté Ali</li>
            <li>Détection d’anomalies de consommation pour VH-007</li>
        </ul>
    </div>
</div>

<!-- JavaScript pour les Graphiques -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Graphique des Revenus Mensuels
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctxRevenue, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil'],
            datasets: [{
                label: 'Revenus',
                data: [3000000, 4000000, 3500000, 4500000, 5000000, 6000000, 5500000],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Graphique de Performance des Chauffeurs
    const ctxDriverPerformance = document.getElementById('driverPerformanceChart').getContext('2d');
    const driverPerformanceChart = new Chart(ctxDriverPerformance, {
        type: 'bar',
        data: {
            labels: ['Kouassi Jean', 'Diabaté Ali', 'Traoré Marie'],
            datasets: [{
                label: 'Performance (%)',
                data: [95, 90, 85],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

    </main>

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
</body>
</html>


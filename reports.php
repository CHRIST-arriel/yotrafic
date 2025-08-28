<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YoTrafic - Rapports Avancés</title>
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
                        },
                        success: '#10b981',
                        warning: '#f59e0b',
                        danger: '#ef4444',
                        info: '#06b6d4'
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
        
        .progress-bar {
            transition: width 1s ease-in-out;
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
        .stat-card {
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
        }
        
        .alert-card {
            border-left: 4px solid;
            transition: all 0.3s ease;
        }
        
        .alert-card:hover {
            transform: translateX(5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .driver-rank {
            position: relative;
        }
        
        .driver-rank::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 60%;
            border-radius: 2px;
        }
        
        .rank-1::before { background: linear-gradient(180deg, #FFD700, #FFA500); }
        .rank-2::before { background: linear-gradient(180deg, #C0C0C0, #A9A9A9); }
        .rank-3::before { background: linear-gradient(180deg, #CD7F32, #8C6B46); }
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
                    <a class="nav-link text-gray-600 hover:text-primary-600 transition-colors" href="index.php" onclick="navigateTo('dashboard')">
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
                    <a class="nav-link text-primary-600 font-semibold active-link" href="reports.php" onclick="navigateTo('reports')">
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
            <a class="block nav-link text-gray-600 hover:text-primary-600" href="transaction.php" onclick="navigateTo('transactions')">
                <i class="ri-exchange-dollar-line mr-2"></i>Transactions
            </a>
            <a class="block nav-link text-primary-600 font-semibold active-link" href="reports.php" onclick="navigateTo('reports')">
                <i class="ri-line-chart-line mr-2"></i>Rapports
            </a>
        </div>
    </div>
    <!-- Reports Page -->
    <div id="reports" class="page active">
        <!-- En-tête et métriques (identique à votre code) -->
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Rapports Avancés</h1>
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

            <!-- ANALYSES DÉTAILLÉES AMÉLIORÉES -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Top Chauffeurs avec Classement -->
                <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-900">🏆 Top Performers</h2>
                        <span class="text-sm text-gray-500">Mois en cours</span>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- 1er place -->
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-lg driver-rank rank-1">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center text-white font-bold">
                                    1
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Kouassi Jean</h4>
                                    <p class="text-sm text-gray-600">VH-001 • 156 trajets</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-yellow-600">95%</div>
                                <div class="text-sm text-green-600">+12% vs mois dernier</div>
                            </div>
                        </div>

                        <!-- 2ème place -->
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-blue-50 rounded-lg driver-rank rank-2">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-gray-400 rounded-full flex items-center justify-center text-white font-bold">
                                    2
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Diabaté Ali</h4>
                                    <p class="text-sm text-gray-600">VH-007 • 142 trajets</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-gray-600">90%</div>
                                <div class="text-sm text-green-600">+8% vs mois dernier</div>
                            </div>
                        </div>

                        <!-- 3ème place -->
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-amber-50 to-brown-50 rounded-lg driver-rank rank-3">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-amber-700 rounded-full flex items-center justify-center text-white font-bold">
                                    3
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Traoré Marie</h4>
                                    <p class="text-sm text-gray-600">VH-012 • 128 trajets</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-amber-700">85%</div>
                                <div class="text-sm text-green-600">+5% vs mois dernier</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Utilisation des Véhicules avec Graphiques -->
                <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-900">🚗 Utilisation des Véhicules</h2>
                        <span class="text-sm text-gray-500">Taux d'occupation</span>
                    </div>
                    
                    <div class="space-y-6">
                        <!-- Véhicule 1 -->
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-medium text-gray-900">VH-001 (Renault Master)</span>
                                <span class="text-sm font-semibold text-green-600">92%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-gradient-to-r from-green-400 to-green-600 h-3 rounded-full progress-bar" style="width: 92%"></div>
                            </div>
                            <div class="text-xs text-gray-500 mt-1">1,240 km ce mois • 98% de fiabilité</div>
                        </div>

                        <!-- Véhicule 2 -->
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-medium text-gray-900">VH-007 (Toyota Hiace)</span>
                                <span class="text-sm font-semibold text-blue-600">88%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-3 rounded-full progress-bar" style="width: 88%"></div>
                            </div>
                            <div class="text-xs text-gray-500 mt-1">1,180 km ce mois • 95% de fiabilité</div>
                        </div>

                        <!-- Véhicule 3 -->
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-medium text-gray-900">VH-012 (Mercedes Sprinter)</span>
                                <span class="text-sm font-semibold text-amber-600">78%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-gradient-to-r from-amber-400 to-amber-600 h-3 rounded-full progress-bar" style="width: 78%"></div>
                            </div>
                            <div class="text-xs text-gray-500 mt-1">980 km ce mois • Maintenance requise</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ALERTES INTELLIGENTES AMÉLIORÉES -->
            <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-900">🔔 Alertes Intelligentes</h2>
                    <span class="text-sm text-primary-600">3 alertes nécessitent attention</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Alerte Maintenance -->
                    <div class="alert-card bg-red-50 border-l-red-500 p-5 rounded-lg">
                        <div class="flex items-start mb-3">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                <i class="ri-tools-line text-red-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Maintenance Préventive</h3>
                                <p class="text-sm text-gray-600">Véhicule VH-012</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 mb-3">
                            Le véhicule approche les 15,000 km. Planification recommandée pour la maintenance préventive.
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-red-600 font-medium">URGENT</span>
                            <button class="text-primary-600 text-sm font-medium hover:text-primary-700">
                                Planifier <i class="ri-arrow-right-line"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Alerte Performance -->
                    <div class="alert-card bg-amber-50 border-l-amber-500 p-5 rounded-lg">
                        <div class="flex items-start mb-3">
                            <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center mr-3">
                                <i class="ri-line-chart-line text-amber-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Optimisation Performance</h3>
                                <p class="text-sm text-gray-600">Chauffeur Diabaté Ali</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 mb-3">
                            Consommation carburant 15% supérieure à la moyenne. Formation recommandée.
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-amber-600 font-medium">MOYENNE</span>
                            <button class="text-primary-600 text-sm font-medium hover:text-primary-700">
                                Voir détails <i class="ri-arrow-right-line"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Alerte Anomalie -->
                    <div class="alert-card bg-blue-50 border-l-blue-500 p-5 rounded-lg">
                        <div class="flex items-start mb-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                <i class="ri-alert-line text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Anomalie Détectée</h3>
                                <p class="text-sm text-gray-600">Véhicule VH-007</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 mb-3">
                            Consommation carburant anormale détectée sur les 48 dernières heures.
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-blue-600 font-medium">FAIBLE</span>
                            <button class="text-primary-600 text-sm font-medium hover:text-primary-700">
                                Investiguer <i class="ri-arrow-right-line"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Statistiques d'alertes -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-red-600">1</div>
                            <div class="text-sm text-gray-600">Urgent</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-amber-600">1</div>
                            <div class="text-sm text-gray-600">Moyenne</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">1</div>
                            <div class="text-sm text-gray-600">Faible</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">24</div>
                            <div class="text-sm text-gray-600">Résolues</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MÉTHODES DE PAIEMENT -->
            <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                <h2 class="text-xl font-bold text-gray-900 mb-6">💳 Répartition des Paiements Mobile Money</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center p-4 bg-gradient-to-br from-orange-50 to-orange-100 rounded-lg">
                        <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="ri-smartphone-line text-white text-xl"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900">Orange Money</h3>
                        <div class="text-2xl font-bold text-orange-600">45%</div>
                        <p class="text-sm text-gray-600">2,250,000 FCFA</p>
                    </div>

                    <div class="text-center p-4 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-lg">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="ri-smartphone-line text-white text-xl"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900">MTN Money</h3>
                        <div class="text-2xl font-bold text-yellow-600">35%</div>
                        <p class="text-sm text-gray-600">1,750,000 FCFA</p>
                    </div>

                    <div class="text-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg">
                        <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="ri-smartphone-line text-white text-xl"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900">Moov Money</h3>
                        <div class="text-2xl font-bold text-purple-600">20%</div>
                        <p class="text-sm text-gray-600">1,000,000 FCFA</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animation des barres de progression
        document.addEventListener('DOMContentLoaded', function() {
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            });
        });
    </script>
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

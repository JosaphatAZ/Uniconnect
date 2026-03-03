<!DOCTYPE html>
<html lang="fr" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord — Administration</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <style>
        :root {
            --accent: #dc2626;
            --accent-light: #fef2f2;
            --accent-hover: #b91c1c;
            --sidebar-active-text: #dc2626;
            --sidebar-active-bg: #fef2f2;
        }

        [data-theme="dark"] {
            --accent: #f87171;
            --accent-light: #2a0a0a;
            --accent-hover: #fca5a5;
            --sidebar-active-text: #f87171;
            --sidebar-active-bg: #2a0a0a;
        }

        .nav-link.active::before {
            background: var(--accent);
        }

        .topbar-avatar {
            background: linear-gradient(135deg, #dc2626, #9f1239) !important;
        }
    </style>
</head>

<body>
    <div class="layout">

        <?php include '../includes/sidebar-Admin.php'; ?>

        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <div class="main">
            <header class="topbar">
                <button class="menu-toggle" id="menuToggle">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:20px;height:20px">
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <line x1="3" y1="12" x2="21" y2="12" />
                        <line x1="3" y1="18" x2="21" y2="18" />
                    </svg>
                </button>
                <div>
                    <div class="topbar-title">Tableau de bord</div>
                    <div class="topbar-breadcrumb">Administration globale du site</div>
                </div>
                <div class="topbar-spacer"></div>
                <div class="topbar-actions">
                    <button class="theme-toggle" id="themeToggle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="themeIcon">
                            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                        </svg></button>
                    <div class="topbar-avatar">AD</div>
                </div>
            </header>

            <div class="content">

                <!-- Alert en attente -->
                <div class="alert alert-warning fade-in">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                    <span><strong>5 universités</strong> attendent votre validation. <a href="universites-en-attente.php" style="font-weight:700;text-decoration:underline">Traiter maintenant →</a></span>
                </div>

                <!-- Stats -->
                <div class="stats-grid fade-in">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:#fef2f2;color:#dc2626">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                <polyline points="9 22 9 12 15 12 15 22" />
                            </svg>
                        </div>
                        <div class="stat-info">
                            <div class="stat-value">38</div>
                            <div class="stat-label">Universités inscrites</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon amber">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                        </div>
                        <div class="stat-info">
                            <div class="stat-value">5</div>
                            <div class="stat-label">En attente validation</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                            </svg>
                        </div>
                        <div class="stat-info">
                            <div class="stat-value">24 610</div>
                            <div class="stat-label">Étudiants total</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                            </svg>
                        </div>
                        <div class="stat-info">
                            <div class="stat-value">9 847</div>
                            <div class="stat-label">Publications totales</div>
                        </div>
                    </div>
                </div>

                <div class="grid-2">

                    <!-- Universités en attente -->
                    <div class="card fade-in fade-in-1">
                        <div class="card-header">
                            <div class="card-title">Universités en attente</div>
                            <a href="universites-en-attente.php" class="btn btn-outline btn-sm">Voir tout</a>
                        </div>
                        <div class="card-body no-top-pad">
                            <div class="validation-card">
                                <div class="validation-avatar">UB</div>
                                <div class="validation-info">
                                    <div class="validation-name">Université de Bamako</div>
                                    <div class="validation-meta">Mali — Inscrite il y a 6h</div>
                                    <div class="validation-detail">Contact : admin@univ-bamako.ml</div>
                                    <span class="validation-timer">⏱ Expire dans 42h</span>
                                </div>
                                <div class="validation-actions">
                                    <button class="btn btn-green btn-sm">Valider</button>
                                    <button class="btn btn-danger btn-sm">Refuser</button>
                                </div>
                            </div>
                            <div class="validation-card">
                                <div class="validation-avatar" style="background:linear-gradient(135deg,var(--amber),var(--red))">UA</div>
                                <div class="validation-info">
                                    <div class="validation-name">Université d'Abidjan</div>
                                    <div class="validation-meta">Côte d'Ivoire — Inscrite il y a 18h</div>
                                    <div class="validation-detail">Contact : info@univabidjan.ci</div>
                                    <span class="validation-timer">⏱ Expire dans 30h</span>
                                </div>
                                <div class="validation-actions">
                                    <button class="btn btn-green btn-sm">Valider</button>
                                    <button class="btn btn-danger btn-sm">Refuser</button>
                                </div>
                            </div>
                            <div class="validation-card">
                                <div class="validation-avatar" style="background:linear-gradient(135deg,var(--green),#0891b2)">UL</div>
                                <div class="validation-info">
                                    <div class="validation-name">Université de Lomé</div>
                                    <div class="validation-meta">Togo — Inscrite il y a 22h</div>
                                    <div class="validation-detail">Contact : contact@univ-lome.tg</div>
                                    <span class="validation-timer">⏱ Expire dans 26h</span>
                                </div>
                                <div class="validation-actions">
                                    <button class="btn btn-green btn-sm">Valider</button>
                                    <button class="btn btn-danger btn-sm">Refuser</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Activité récente -->
                    <div class="card fade-in fade-in-2">
                        <div class="card-header">
                            <div class="card-title">Activité récente</div>
                            <a href="logs.php" class="btn btn-outline btn-sm">Logs complets</a>
                        </div>
                        <div class="card-body no-top-pad">
                            <div class="log-item">
                                <div class="log-icon ok"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg></div>
                                <div class="log-text"><strong>Université de Dakar</strong> validée par admin</div>
                                <div class="log-time">Il y a 2h</div>
                            </div>
                            <div class="log-item">
                                <div class="log-icon warn"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg></div>
                                <div class="log-text">Nouvelle demande : <strong>Université de Bamako</strong></div>
                                <div class="log-time">Il y a 6h</div>
                            </div>
                            <div class="log-item">
                                <div class="log-icon danger"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <line x1="15" y1="9" x2="9" y2="15" />
                                        <line x1="9" y1="9" x2="15" y2="15" />
                                    </svg></div>
                                <div class="log-text"><strong>Université fictive XY</strong> refusée — données invalides</div>
                                <div class="log-time">Il y a 1j</div>
                            </div>
                            <div class="log-item">
                                <div class="log-icon ok"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg></div>
                                <div class="log-text"><strong>Université de Cotonou</strong> validée par admin</div>
                                <div class="log-time">Il y a 2j</div>
                            </div>
                            <div class="log-item">
                                <div class="log-icon info"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="3" />
                                        <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83" />
                                    </svg></div>
                                <div class="log-text">Configuration site mise à jour</div>
                                <div class="log-time">Il y a 3j</div>
                            </div>
                            <div class="log-item">
                                <div class="log-icon warn"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg></div>
                                <div class="log-text">Nouvelle demande : <strong>Université d'Abidjan</strong></div>
                                <div class="log-time">Il y a 18h</div>
                            </div>
                        </div>
                    </div>

                    <!-- Chiffres clés -->
                    <div class="card fade-in fade-in-3 col-span-2">
                        <div class="card-header">
                            <div class="card-title">Vue d'ensemble — Universités par statut</div>
                        </div>
                        <div class="card-body">
                            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:14px">
                                <div style="text-align:center;padding:20px;background:var(--green-light);border-radius:var(--radius)">
                                    <div style="font-family:'Syne',sans-serif;font-weight:800;font-size:2rem;color:var(--green)">30</div>
                                    <div style="font-size:0.82rem;color:var(--green);font-weight:600;margin-top:4px">Validées</div>
                                </div>
                                <div style="text-align:center;padding:20px;background:var(--amber-light);border-radius:var(--radius)">
                                    <div style="font-family:'Syne',sans-serif;font-weight:800;font-size:2rem;color:var(--amber)">5</div>
                                    <div style="font-size:0.82rem;color:var(--amber);font-weight:600;margin-top:4px">En attente</div>
                                </div>
                                <div style="text-align:center;padding:20px;background:var(--red-light);border-radius:var(--radius)">
                                    <div style="font-family:'Syne',sans-serif;font-weight:800;font-size:2rem;color:var(--red)">3</div>
                                    <div style="font-size:0.82rem;color:var(--red);font-weight:600;margin-top:4px">Refusées</div>
                                </div>
                                <div style="text-align:center;padding:20px;background:var(--accent-light);border-radius:var(--radius)">
                                    <div style="font-family:'Syne',sans-serif;font-weight:800;font-size:2rem;color:var(--accent)">147</div>
                                    <div style="font-size:0.82rem;color:var(--accent);font-weight:600;margin-top:4px">Entités liées</div>
                                </div>
                                <div style="text-align:center;padding:20px;background:var(--purple-light);border-radius:var(--radius)">
                                    <div style="font-family:'Syne',sans-serif;font-weight:800;font-size:2rem;color:var(--purple)">24 610</div>
                                    <div style="font-size:0.82rem;color:var(--purple);font-weight:600;margin-top:4px">Étudiants</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        const toggle = document.getElementById('themeToggle');
        const icon = document.getElementById('themeIcon');
        document.addEventListener('DOMContentLoaded', () => {
            const navLink = document.getElementsByClassName('nav-link dash');
            navLink[0].classList.add('active');
        });

        let dark = localStorage.getItem('theme') === 'dark';

        function applyTheme() {
            document.documentElement.setAttribute('data-theme', dark ? 'dark' : 'light');
            icon.innerHTML = dark ? '<path d="M12 3v1M12 20v1M4.22 4.22l.7.7M18.36 18.36l.7.7M3 12H4M20 12h1M4.22 19.78l.7-.7M18.36 5.64l.7-.7M12 8a4 4 0 100 8 4 4 0 000-8z"/>' : '<path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>';
        }
        applyTheme();
        toggle.addEventListener('click', () => {
            dark = !dark;
            localStorage.setItem('theme', dark ? 'dark' : 'light');
            applyTheme();
        });
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const menuBtn = document.getElementById('menuToggle');
        menuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
        });
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
        });
    </script>
</body>

</html>
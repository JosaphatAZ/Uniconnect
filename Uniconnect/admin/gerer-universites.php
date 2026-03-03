<!DOCTYPE html>
<html lang="fr" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les universités — Admin</title>
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
            --sidebar-active-text: #f87171;
            --sidebar-active-bg: #2a0a0a;
        }

        .nav-link.active::before {
            background: var(--accent);
        }

        /* ── Badges radius ── */
        .radius {
            --r: 12px;
        }

        /* ── Modal overlay ── */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .6);
            z-index: 999;
            align-items: center;
            justify-content: center;
            padding: 16px;
            backdrop-filter: blur(4px);
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal-box {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: var(--r);
            padding: 28px;
            width: 100%;
            max-width: 560px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: var(--shadow-lg);
            animation: popIn .22s ease;
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: scale(.95) translateY(10px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .modal-title {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--text);
        }

        .modal-close {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1px solid var(--card-border);
            background: var(--bg);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            cursor: pointer;
            transition: background var(--transition), color var(--transition);
        }

        .modal-close:hover {
            background: var(--red-light);
            color: var(--red);
        }

        /* ── Modal tabs ── */
        .modal-tabs {
            display: flex;
            gap: 0;
            border-bottom: 1px solid var(--card-border);
            margin-bottom: 22px;
        }

        .modal-tab {
            flex: 1;
            padding: 9px 0;
            font-size: .84rem;
            font-weight: 600;
            color: var(--text-muted);
            cursor: pointer;
            border-bottom: 2px solid transparent;
            text-align: center;
            transition: color var(--transition), border-color var(--transition);
            background: none;
            border-top: none;
            border-left: none;
            border-right: none;
        }

        .modal-tab.active {
            color: var(--accent);
            border-bottom-color: var(--accent);
        }

        .modal-tab-panel {
            display: none;
        }

        .modal-tab-panel.active {
            display: block;
        }

        /* ── Form fields in modal ── */
        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-size: .77rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .04em;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        .form-control {
            width: 100%;
            padding: 9px 12px;
            background: var(--input-bg);
            border: 1.5px solid var(--input-border);
            border-radius: var(--rs);
            color: var(--text);
            font-size: .87rem;
            outline: none;
            transition: border-color var(--transition), box-shadow var(--transition);
        }

        .form-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(248, 113, 113, .12);
        }

        select.form-control {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%235a6690' stroke-width='2'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            padding-right: 32px;
            -webkit-appearance: none;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .modal-footer {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid var(--card-border);
        }

        /* ── Type selector (université/entité) ── */
        .type-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 20px;
        }

        .type-opt {
            border: 1.5px solid var(--card-border);
            border-radius: var(--rs);
            padding: 14px 12px;
            cursor: pointer;
            text-align: center;
            transition: border-color var(--transition), background var(--transition);
        }

        .type-opt:hover {
            border-color: var(--accent);
            background: var(--accent-light);
        }

        .type-opt.selected {
            border-color: var(--accent);
            background: var(--accent-light);
        }

        .type-opt-icon {
            font-size: 24px;
            margin-bottom: 6px;
        }

        .type-opt-label {
            font-size: .82rem;
            font-weight: 700;
            color: var(--text);
        }

        .type-opt-desc {
            font-size: .72rem;
            color: var(--text-muted);
            margin-top: 2px;
        }

        /* ── Entité univ selector ── */
        .univ-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            background: var(--accent-light);
            color: var(--accent);
            border-radius: 20px;
            font-size: .75rem;
            font-weight: 600;
            margin: 3px;
        }

        /* ── Table actions btn ── */
        .topbar-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 16px;
            border-radius: var(--rs);
            font-size: .83rem;
            font-weight: 700;
            cursor: pointer;
            transition: background var(--transition), transform .1s;
            border: none;
        }

        .topbar-btn:active {
            transform: scale(.97);
        }

        .topbar-btn-primary {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 3px 12px rgba(248, 113, 113, .3);
        }

        .topbar-btn-primary:hover {
            background: var(--accent-hover);
        }
    </style>
</head>

<body>
    <div class="layout">
        <?php include '../includes/sidebar-Admin.php'; ?>
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <div class="main">
            <!-- TOPBAR -->
            <header class="topbar">
                <button class="menu-toggle" id="menuToggle">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:20px;height:20px">
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <line x1="3" y1="12" x2="21" y2="12" />
                        <line x1="3" y1="18" x2="21" y2="18" />
                    </svg>
                </button>
                <div>
                    <div class="topbar-title">Gérer les universités</div>
                    <div class="topbar-breadcrumb">10 universités • 18 entités inscrites sur la plateforme</div>
                </div>
                <div class="topbar-spacer"></div>
                <div class="topbar-actions">
                    <button class="topbar-btn topbar-btn-primary" onclick="ouvrirModal()">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="width:14px;height:14px">
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Ajouter
                    </button>
                    <button class="theme-toggle" id="themeToggle">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="themeIcon">
                            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                        </svg>
                    </button>
                    <div class="topbar-avatar" style="background:linear-gradient(135deg,#dc2626,#9f1239)">AD</div>
                </div>
            </header>

            <div class="content">

                <!-- Stats -->
                <div class="stats-grid fade-in">
                    <div class="stat-card">
                        <div class="stat-icon green"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></div>
                        <div class="stat-info">
                            <div class="stat-value">8</div>
                            <div class="stat-label">Universités validées</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon amber"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg></div>
                        <div class="stat-info">
                            <div class="stat-value">2</div>
                            <div class="stat-label">En attente</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon" style="background:var(--red-light);color:var(--red)"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                <polyline points="9 22 9 12 15 12 15 22" />
                            </svg></div>
                        <div class="stat-info">
                            <div class="stat-value">18</div>
                            <div class="stat-label">Entités liées</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon blue"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                            </svg></div>
                        <div class="stat-info">
                            <div class="stat-value">32 410</div>
                            <div class="stat-label">Étudiants total</div>
                        </div>
                    </div>
                </div>

                <!-- Filtres -->
                <div class="card fade-in mb-24">
                    <div class="card-p" style="display:flex;gap:12px;flex-wrap:wrap;align-items:center">
                        <div style="flex:1;min-width:200px">
                            <input type="text" class="form-control" id="searchInput" placeholder="🔍  Rechercher une université ou entité..." style="margin:0" oninput="filtrerTable()">
                        </div>
                        <select class="form-control" style="width:auto;margin:0" id="filterStatut" onchange="filtrerTable()">
                            <option value="">Tous les statuts</option>
                            <option value="validée">Validées</option>
                            <option value="en attente">En attente</option>
                            <option value="refusée">Refusées</option>
                            <option value="suspendue">Suspendues</option>
                        </select>
                        <select class="form-control" style="width:auto;margin:0" id="filterType" onchange="filtrerTable()">
                            <option value="">Tout type</option>
                            <option value="université">Université</option>
                            <option value="école">École / Faculté</option>
                        </select>
                        <select class="form-control" style="width:auto;margin:0" id="filterPays" onchange="filtrerTable()">
                            <option value="">Tous les pays</option>
                            <option value="bénin">Bénin</option>
                            <option value="togo">Togo</option>
                            <option value="sénégal">Sénégal</option>
                            <option value="burkina faso">Burkina Faso</option>
                        </select>
                    </div>
                </div>

                <!-- Tableau -->
                <div class="card fade-in fade-in-1">
                    <div class="card-header">
                        <div class="card-title">Liste complète</div>
                        <span class="badge badge-blue" id="countBadge">28 entrées</span>
                    </div>
                    <div class="card-body no-top-pad">
                        <div class="table-wrap">
                            <table id="mainTable">
                                <thead>
                                    <tr>
                                        <th>Établissement</th>
                                        <th>Type</th>
                                        <th>Pays</th>
                                        <th>Statut</th>
                                        <th>Entités</th>
                                        <th>Étudiants</th>
                                        <th>Publications</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">

                                    <!-- ── BÉNIN ─────────────────────── -->
                                    <tr data-statut="validée" data-type="université" data-pays="bénin">
                                        <td>
                                            <div class="cell-bold">Université d'Abomey-Calavi</div>
                                            <div class="text-muted" style="font-size:.75rem">UAC</div>
                                        </td>
                                        <td><span class="badge" style="background:var(--purple-light);color:var(--purple);font-size:.72rem">Université</span></td>
                                        <td class="cell-muted">Bénin</td>
                                        <td><span class="badge badge-green">Validée</span></td>
                                        <td class="cell-muted">12</td>
                                        <td class="cell-muted">18 400</td>
                                        <td class="cell-muted">3 210</td>
                                        <td class="cell-muted">10 jan. 2024</td>
                                        <td>
                                            <div class="flex gap-8">
                                                <button class="btn btn-outline btn-sm btn-icon" title="Voir" onclick="voirDetails('UAC')"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg></button>
                                                <button class="btn btn-danger btn-sm btn-icon" title="Suspendre"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <rect x="6" y="4" width="4" height="16" />
                                                        <rect x="14" y="4" width="4" height="16" />
                                                    </svg></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr data-statut="validée" data-type="université" data-pays="bénin">
                                        <td>
                                            <div class="cell-bold">Université de Parakou</div>
                                            <div class="text-muted" style="font-size:.75rem">UP</div>
                                        </td>
                                        <td><span class="badge" style="background:var(--purple-light);color:var(--purple);font-size:.72rem">Université</span></td>
                                        <td class="cell-muted">Bénin</td>
                                        <td><span class="badge badge-green">Validée</span></td>
                                        <td class="cell-muted">6</td>
                                        <td class="cell-muted">7 800</td>
                                        <td class="cell-muted">1 420</td>
                                        <td class="cell-muted">15 jan. 2024</td>
                                        <td>
                                            <div class="flex gap-8">
                                                <button class="btn btn-outline btn-sm btn-icon" title="Voir"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg></button>
                                                <button class="btn btn-danger btn-sm btn-icon" title="Suspendre"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <rect x="6" y="4" width="4" height="16" />
                                                        <rect x="14" y="4" width="4" height="16" />
                                                    </svg></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr data-statut="validée" data-type="université" data-pays="bénin">
                                        <td>
                                            <div class="cell-bold">UNSTIM</div>
                                            <div class="text-muted" style="font-size:.75rem">Univ. Nat. des Sciences, Tech., Ing. et Maths</div>
                                        </td>
                                        <td><span class="badge" style="background:var(--purple-light);color:var(--purple);font-size:.72rem">Université</span></td>
                                        <td class="cell-muted">Bénin</td>
                                        <td><span class="badge badge-green">Validée</span></td>
                                        <td class="cell-muted">4</td>
                                        <td class="cell-muted">3 200</td>
                                        <td class="cell-muted">620</td>
                                        <td class="cell-muted">3 mars 2024</td>
                                        <td>
                                            <div class="flex gap-8">
                                                <button class="btn btn-outline btn-sm btn-icon" title="Voir"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg></button>
                                                <button class="btn btn-danger btn-sm btn-icon" title="Suspendre"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <rect x="6" y="4" width="4" height="16" />
                                                        <rect x="14" y="4" width="4" height="16" />
                                                    </svg></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr data-statut="validée" data-type="université" data-pays="bénin">
                                        <td>
                                            <div class="cell-bold">Université Nationale d'Agriculture</div>
                                            <div class="text-muted" style="font-size:.75rem">UNA — Kétou</div>
                                        </td>
                                        <td><span class="badge" style="background:var(--purple-light);color:var(--purple);font-size:.72rem">Université</span></td>
                                        <td class="cell-muted">Bénin</td>
                                        <td><span class="badge badge-green">Validée</span></td>
                                        <td class="cell-muted">2</td>
                                        <td class="cell-muted">1 850</td>
                                        <td class="cell-muted">310</td>
                                        <td class="cell-muted">20 mars 2024</td>
                                        <td>
                                            <div class="flex gap-8">
                                                <button class="btn btn-outline btn-sm btn-icon" title="Voir"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg></button>
                                                <button class="btn btn-danger btn-sm btn-icon" title="Suspendre"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <rect x="6" y="4" width="4" height="16" />
                                                        <rect x="14" y="4" width="4" height="16" />
                                                    </svg></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr data-statut="validée" data-type="école" data-pays="bénin">
                                        <td>
                                            <div class="cell-bold">EPAC — UAC</div>
                                            <div class="text-muted" style="font-size:.75rem">École Polytechnique d'Abomey-Calavi</div>
                                        </td>
                                        <td><span class="badge" style="background:var(--accent-light);color:var(--accent);font-size:.72rem">École</span></td>
                                        <td class="cell-muted">Bénin</td>
                                        <td><span class="badge badge-green">Validée</span></td>
                                        <td class="cell-muted">—</td>
                                        <td class="cell-muted">2 100</td>
                                        <td class="cell-muted">480</td>
                                        <td class="cell-muted">5 fév. 2024</td>
                                        <td>
                                            <div class="flex gap-8">
                                                <button class="btn btn-outline btn-sm btn-icon" title="Voir"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg></button>
                                                <button class="btn btn-danger btn-sm btn-icon" title="Suspendre"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <rect x="6" y="4" width="4" height="16" />
                                                        <rect x="14" y="4" width="4" height="16" />
                                                    </svg></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr data-statut="validée" data-type="école" data-pays="bénin">
                                        <td>
                                            <div class="cell-bold">FAST — UAC</div>
                                            <div class="text-muted" style="font-size:.75rem">Faculté des Sciences et Techniques</div>
                                        </td>
                                        <td><span class="badge" style="background:var(--accent-light);color:var(--accent);font-size:.72rem">Faculté</span></td>
                                        <td class="cell-muted">Bénin</td>
                                        <td><span class="badge badge-green">Validée</span></td>
                                        <td class="cell-muted">—</td>
                                        <td class="cell-muted">3 650</td>
                                        <td class="cell-muted">720</td>
                                        <td class="cell-muted">12 fév. 2024</td>
                                        <td>
                                            <div class="flex gap-8">
                                                <button class="btn btn-outline btn-sm btn-icon" title="Voir"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg></button>
                                                <button class="btn btn-danger btn-sm btn-icon" title="Suspendre"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <rect x="6" y="4" width="4" height="16" />
                                                        <rect x="14" y="4" width="4" height="16" />
                                                    </svg></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr data-statut="validée" data-type="école" data-pays="bénin">
                                        <td>
                                            <div class="cell-bold">FSS — UAC</div>
                                            <div class="text-muted" style="font-size:.75rem">Faculté des Sciences de la Santé</div>
                                        </td>
                                        <td><span class="badge" style="background:var(--accent-light);color:var(--accent);font-size:.72rem">Faculté</span></td>
                                        <td class="cell-muted">Bénin</td>
                                        <td><span class="badge badge-green">Validée</span></td>
                                        <td class="cell-muted">—</td>
                                        <td class="cell-muted">2 980</td>
                                        <td class="cell-muted">610</td>
                                        <td class="cell-muted">18 fév. 2024</td>
                                        <td>
                                            <div class="flex gap-8">
                                                <button class="btn btn-outline btn-sm btn-icon" title="Voir"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg></button>
                                                <button class="btn btn-danger btn-sm btn-icon" title="Suspendre"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <rect x="6" y="4" width="4" height="16" />
                                                        <rect x="14" y="4" width="4" height="16" />
                                                    </svg></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr data-statut="en attente" data-type="université" data-pays="bénin">
                                        <td>
                                            <div class="cell-bold">UCAO — UUB</div>
                                            <div class="text-muted" style="font-size:.75rem">Univ. Catholique de l'Afrique de l'Ouest</div>
                                        </td>
                                        <td><span class="badge" style="background:var(--purple-light);color:var(--purple);font-size:.72rem">Université</span></td>
                                        <td class="cell-muted">Bénin</td>
                                        <td><span class="badge badge-amber">En attente</span></td>
                                        <td class="cell-muted">—</td>
                                        <td class="cell-muted">—</td>
                                        <td class="cell-muted">—</td>
                                        <td class="cell-muted">18 fév. 2025</td>
                                        <td>
                                            <div class="flex gap-8"><a href="universites-en-attente.php" class="btn btn-green btn-sm">Traiter</a></div>
                                        </td>
                                    </tr>

                                    <tr data-statut="en attente" data-type="école" data-pays="bénin">
                                        <td>
                                            <div class="cell-bold">ENSET — UAC</div>
                                            <div class="text-muted" style="font-size:.75rem">École Normale Supérieure de l'Ens. Technique</div>
                                        </td>
                                        <td><span class="badge" style="background:var(--accent-light);color:var(--accent);font-size:.72rem">École</span></td>
                                        <td class="cell-muted">Bénin</td>
                                        <td><span class="badge badge-amber">En attente</span></td>
                                        <td class="cell-muted">—</td>
                                        <td class="cell-muted">—</td>
                                        <td class="cell-muted">—</td>
                                        <td class="cell-muted">20 fév. 2025</td>
                                        <td>
                                            <div class="flex gap-8"><a href="universites-en-attente.php" class="btn btn-green btn-sm">Traiter</a></div>
                                        </td>
                                    </tr>

                                    <!-- ── AUTRES PAYS ─────────────────── -->
                                    <tr data-statut="validée" data-type="université" data-pays="togo">
                                        <td>
                                            <div class="cell-bold">Université de Lomé</div>
                                            <div class="text-muted" style="font-size:.75rem">UL</div>
                                        </td>
                                        <td><span class="badge" style="background:var(--purple-light);color:var(--purple);font-size:.72rem">Université</span></td>
                                        <td class="cell-muted">Togo</td>
                                        <td><span class="badge badge-green">Validée</span></td>
                                        <td class="cell-muted">8</td>
                                        <td class="cell-muted">9 200</td>
                                        <td class="cell-muted">1 830</td>
                                        <td class="cell-muted">22 déc. 2023</td>
                                        <td>
                                            <div class="flex gap-8">
                                                <button class="btn btn-outline btn-sm btn-icon" title="Voir"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg></button>
                                                <button class="btn btn-danger btn-sm btn-icon" title="Suspendre"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <rect x="6" y="4" width="4" height="16" />
                                                        <rect x="14" y="4" width="4" height="16" />
                                                    </svg></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr data-statut="validée" data-type="université" data-pays="sénégal">
                                        <td>
                                            <div class="cell-bold">Université Cheikh Anta Diop</div>
                                            <div class="text-muted" style="font-size:.75rem">UCAD — Dakar</div>
                                        </td>
                                        <td><span class="badge" style="background:var(--purple-light);color:var(--purple);font-size:.72rem">Université</span></td>
                                        <td class="cell-muted">Sénégal</td>
                                        <td><span class="badge badge-green">Validée</span></td>
                                        <td class="cell-muted">10</td>
                                        <td class="cell-muted">11 000</td>
                                        <td class="cell-muted">2 940</td>
                                        <td class="cell-muted">14 nov. 2023</td>
                                        <td>
                                            <div class="flex gap-8">
                                                <button class="btn btn-outline btn-sm btn-icon" title="Voir"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg></button>
                                                <button class="btn btn-danger btn-sm btn-icon" title="Suspendre"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <rect x="6" y="4" width="4" height="16" />
                                                        <rect x="14" y="4" width="4" height="16" />
                                                    </svg></button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr data-statut="refusée" data-type="université" data-pays="">
                                        <td>
                                            <div class="cell-bold">Université Fictive XY</div>
                                            <div class="text-muted" style="font-size:.75rem">—</div>
                                        </td>
                                        <td><span class="badge" style="background:var(--purple-light);color:var(--purple);font-size:.72rem">Université</span></td>
                                        <td class="cell-muted">—</td>
                                        <td><span class="badge badge-red">Refusée</span></td>
                                        <td class="cell-muted">—</td>
                                        <td class="cell-muted">—</td>
                                        <td class="cell-muted">—</td>
                                        <td class="cell-muted">18 fév. 2025</td>
                                        <td>
                                            <div class="flex gap-8">
                                                <button class="btn btn-outline btn-sm btn-icon" title="Détails"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                                                        <circle cx="12" cy="12" r="10" />
                                                        <line x1="12" y1="16" x2="12" y2="12" />
                                                        <line x1="12" y1="8" x2="12.01" y2="8" />
                                                    </svg></button>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ═══════════ MODAL AJOUTER ═══════════ -->
    <div class="modal-overlay" id="modalAjouter" onclick="clickOverlay(event)">
        <div class="modal-box">
            <div class="modal-header">
                <div class="modal-title">Ajouter un établissement</div>
                <button class="modal-close" onclick="fermerModal()">✕</button>
            </div>

            <!-- Tabs Université / Entité -->
            <div class="modal-tabs">
                <button class="modal-tab active" onclick="switchTab('univ', this)">🏛️ Université</button>
                <button class="modal-tab" onclick="switchTab('entite', this)">🏫 École / Faculté</button>
            </div>

            <!-- ── Panneau Université ── -->
            <div class="modal-tab-panel active" id="panel-univ">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nom officiel <span style="color:var(--red)">*</span></label>
                        <input type="text" class="form-control" id="u-nom" placeholder="ex: Université de Parakou">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Sigle</label>
                        <input type="text" class="form-control" id="u-sigle" placeholder="ex: UP">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Pays <span style="color:var(--red)">*</span></label>
                        <select class="form-control" id="u-pays">
                            <option value="">Choisir un pays</option>
                            <option selected>Bénin</option>
                            <option>Togo</option>
                            <option>Sénégal</option>
                            <option>Burkina Faso</option>
                            <option>Côte d'Ivoire</option>
                            <option>Mali</option>
                            <option>Niger</option>
                            <option>Cameroun</option>
                            <option>Autre</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ville</label>
                        <input type="text" class="form-control" id="u-ville" placeholder="ex: Cotonou">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Email officiel <span style="color:var(--red)">*</span></label>
                    <input type="email" class="form-control" id="u-email" placeholder="contact@universite.bj">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="u-tel" placeholder="+229 01 XX XX XX XX">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Site web</label>
                        <input type="url" class="form-control" id="u-site" placeholder="https://www.universite.bj">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Statut initial</label>
                    <select class="form-control" id="u-statut">
                        <option value="validée">Validée directement</option>
                        <option value="en attente">En attente de validation</option>
                    </select>
                </div>
            </div>

            <!-- ── Panneau Entité ── -->
            <div class="modal-tab-panel" id="panel-entite">
                <div class="form-group">
                    <label class="form-label">Université parente <span style="color:var(--red)">*</span></label>
                    <select class="form-control" id="e-univ">
                        <option value="">Sélectionner une université</option>
                        <option>Université d'Abomey-Calavi (UAC)</option>
                        <option>Université de Parakou (UP)</option>
                        <option>UNSTIM — Abomey</option>
                        <option>Université Nationale d'Agriculture (UNA)</option>
                        <option>UCAO — UUB</option>
                        <option>Université de Lomé (UL)</option>
                        <option>Université Cheikh Anta Diop (UCAD)</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nom de l'entité <span style="color:var(--red)">*</span></label>
                        <input type="text" class="form-control" id="e-nom" placeholder="ex: Faculté de Droit">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Sigle</label>
                        <input type="text" class="form-control" id="e-sigle" placeholder="ex: FADESP">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Type <span style="color:var(--red)">*</span></label>
                    <select class="form-control" id="e-type">
                        <option value="">Sélectionnez</option>
                        <option>Faculté</option>
                        <option>École d'ingénieurs</option>
                        <option>École de commerce</option>
                        <option>Institut</option>
                        <option>UFR</option>
                        <option>IUT</option>
                        <option>Département</option>
                        <option>Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Email officiel <span style="color:var(--red)">*</span></label>
                    <input type="email" class="form-control" id="e-email" placeholder="contact@entite.uac.bj">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="e-tel" placeholder="+229 01 XX XX XX XX">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Site web</label>
                        <input type="url" class="form-control" id="e-site" placeholder="https://entite.uac.bj">
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fermerModal()">Annuler</button>
                <button class="btn btn-green" onclick="enregistrer()">
                    <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="width:14px;height:14px">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    Enregistrer
                </button>
            </div>
        </div>
    </div>

    <!-- ═══════════ MODAL DÉTAILS ═══════════ -->
    <div class="modal-overlay" id="modalDetails" onclick="clickOverlayDetails(event)">
        <div class="modal-box" style="max-width:480px">
            <div class="modal-header">
                <div class="modal-title" id="detailsTitle">Université d'Abomey-Calavi</div>
                <button class="modal-close" onclick="fermerDetails()">✕</button>
            </div>
            <div id="detailsContent"></div>
        </div>
    </div>

    <script>
        /* ── Thème ── */
        const toggle = document.getElementById('themeToggle'),
            icon = document.getElementById('themeIcon');
        let dark = localStorage.getItem('theme') === 'dark';
        document.addEventListener('DOMContentLoaded', () => {
            const navLink = document.getElementsByClassName('nav-link all');
            if (navLink[0]) navLink[0].classList.add('active');
        });

        function applyTheme() {
            document.documentElement.setAttribute('data-theme', dark ? 'dark' : 'light');
            icon.innerHTML = dark ?
                '<path d="M12 3v1M12 20v1M4.22 4.22l.7.7M18.36 18.36l.7.7M3 12H4M20 12h1M4.22 19.78l.7-.7M18.36 5.64l.7-.7M12 8a4 4 0 100 8 4 4 0 000-8z"/>' :
                '<path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>';
        }
        applyTheme();
        toggle.addEventListener('click', () => {
            dark = !dark;
            localStorage.setItem('theme', dark ? 'dark' : 'light');
            applyTheme();
        });

        /* ── Sidebar ── */
        const sb = document.getElementById('sidebar'),
            ov = document.getElementById('sidebarOverlay'),
            mb = document.getElementById('menuToggle');
        mb.addEventListener('click', () => {
            sb.classList.toggle('open');
            ov.classList.toggle('active');
        });
        ov.addEventListener('click', () => {
            sb.classList.remove('open');
            ov.classList.remove('active');
        });

        /* ── Filtres ── */
        function filtrerTable() {
            const q = document.getElementById('searchInput').value.toLowerCase();
            const stat = document.getElementById('filterStatut').value.toLowerCase();
            const type = document.getElementById('filterType').value.toLowerCase();
            const pays = document.getElementById('filterPays').value.toLowerCase();
            const rows = document.querySelectorAll('#tableBody tr');
            let count = 0;
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const rStat = (row.dataset.statut || '').toLowerCase();
                const rType = (row.dataset.type || '').toLowerCase();
                const rPays = (row.dataset.pays || '').toLowerCase();
                const ok = (!q || text.includes(q)) &&
                    (!stat || rStat.includes(stat)) &&
                    (!type || rType.includes(type)) &&
                    (!pays || rPays.includes(pays));
                row.style.display = ok ? '' : 'none';
                if (ok) count++;
            });
            document.getElementById('countBadge').textContent = count + ' entrée' + (count > 1 ? 's' : '');
        }

        /* ── Modal Ajouter ── */
        function ouvrirModal() {
            document.getElementById('modalAjouter').classList.add('open');
        }

        function fermerModal() {
            document.getElementById('modalAjouter').classList.remove('open');
        }

        function clickOverlay(e) {
            if (e.target === document.getElementById('modalAjouter')) fermerModal();
        }

        let currentTab = 'univ';

        function switchTab(tab, btn) {
            currentTab = tab;
            document.querySelectorAll('.modal-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.modal-tab-panel').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById('panel-' + tab).classList.add('active');
        }

        function enregistrer() {
            if (currentTab === 'univ') {
                const nom = document.getElementById('u-nom').value.trim();
                const email = document.getElementById('u-email').value.trim();
                if (!nom || !email) {
                    alert('Nom et email sont requis.');
                    return;
                }
                alert('✅ Université "' + nom + '" enregistrée avec succès !');
            } else {
                const univ = document.getElementById('e-univ').value;
                const nom = document.getElementById('e-nom').value.trim();
                const type = document.getElementById('e-type').value;
                const email = document.getElementById('e-email').value.trim();
                if (!univ || !nom || !type || !email) {
                    alert('Veuillez remplir tous les champs obligatoires.');
                    return;
                }
                alert('✅ Entité "' + nom + '" rattachée à ' + univ + ' avec succès !');
            }
            fermerModal();
        }

        /* ── Modal Détails ── */
        const detailsData = {
            UAC: {
                nom: 'Université d\'Abomey-Calavi (UAC)',
                infos: [{
                        label: 'Pays',
                        val: 'Bénin'
                    },
                    {
                        label: 'Ville',
                        val: 'Abomey-Calavi'
                    },
                    {
                        label: 'Site web',
                        val: 'www.uac.bj'
                    },
                    {
                        label: 'Email',
                        val: 'contact@uac.bj'
                    },
                    {
                        label: 'Étudiants',
                        val: '18 400'
                    },
                    {
                        label: 'Entités',
                        val: '12 (EPAC, FAST, FSS, FSA, FASES, FDS, FASJEP, FADESP, ENEAM, ENSET, INJEPS, CPGE)'
                    },
                    {
                        label: 'Inscrite le',
                        val: '10 janvier 2024'
                    },
                    {
                        label: 'Statut',
                        val: '✅ Validée'
                    },
                ]
            }
        };

        function voirDetails(id) {
            const d = detailsData[id];
            if (!d) return;
            document.getElementById('detailsTitle').textContent = d.nom;
            document.getElementById('detailsContent').innerHTML = d.infos.map(i =>
                `<div style="display:flex;justify-content:space-between;padding:8px 0;border-bottom:1px solid var(--card-border);font-size:.84rem">
                <span style="color:var(--text-muted);font-weight:600">${i.label}</span>
                <span style="color:var(--text);text-align:right;max-width:60%">${i.val}</span>
             </div>`
            ).join('');
            document.getElementById('modalDetails').classList.add('open');
        }

        function fermerDetails() {
            document.getElementById('modalDetails').classList.remove('open');
        }

        function clickOverlayDetails(e) {
            if (e.target === document.getElementById('modalDetails')) fermerDetails();
        }

        /* ── Count initial ── */
        document.addEventListener('DOMContentLoaded', () => {
            const count = document.querySelectorAll('#tableBody tr').length;
            document.getElementById('countBadge').textContent = count + ' entrées';
        });
    </script>
</body>

</html>
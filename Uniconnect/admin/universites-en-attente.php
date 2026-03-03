<!DOCTYPE html>
<html lang="fr" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entités en attente — Admin</title>
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

        /* ── Entité row ── */
        .entity-row {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: var(--r);
            padding: 18px 20px;
            margin-bottom: 12px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            flex-wrap: wrap;
            transition: box-shadow var(--transition), border-color var(--transition);
        }

        .entity-row:hover {
            box-shadow: var(--shadow-md);
            border-color: var(--text-muted);
        }

        .entity-row.urgent {
            border-left: 3px solid var(--red);
        }

        .entity-row.treated {
            opacity: .5;
            pointer-events: none;
            filter: grayscale(.5);
        }

        .entity-logo {
            width: 50px;
            height: 50px;
            border-radius: var(--rs);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: .82rem;
            color: #fff;
            flex-shrink: 0;
            letter-spacing: -.5px;
        }

        .entity-name {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: .97rem;
            color: var(--text);
        }

        .entity-sub {
            font-size: .78rem;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .entity-details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 5px;
            margin-top: 10px;
            font-size: .80rem;
            color: var(--text);
        }

        .entity-detail-item {
            display: flex;
            gap: 5px;
        }

        .entity-detail-item strong {
            color: var(--text-muted);
            font-weight: 600;
            white-space: nowrap;
        }

        /* ── Parent university tag ── */
        .parent-tag {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 10px;
            background: var(--accent-light);
            color: var(--accent);
            border-radius: 20px;
            font-size: .72rem;
            font-weight: 700;
            margin-top: 6px;
        }

        /* ── Timer badges ── */
        .timer-warn {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            color: var(--red);
            background: var(--red-light);
            padding: 2px 9px;
            border-radius: 20px;
            font-size: .70rem;
            font-weight: 700;
        }

        .timer-ok {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            color: var(--amber);
            background: var(--amber-light);
            padding: 2px 9px;
            border-radius: 20px;
            font-size: .70rem;
            font-weight: 700;
        }

        /* ── Type badge ── */
        .type-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 9px;
            border-radius: 20px;
            font-size: .70rem;
            font-weight: 700;
            background: var(--purple-light);
            color: var(--purple);
        }

        /* ── Modal ── */
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
            max-width: 500px;
            width: 100%;
            box-shadow: var(--shadow-lg);
            animation: popIn .2s ease;
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: scale(.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .modal-title-text {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            color: var(--text);
            margin-bottom: 4px;
        }

        .modal-sub {
            font-size: .81rem;
            color: var(--text-muted);
            margin-bottom: 18px;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-label {
            display: block;
            font-size: .76rem;
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
            font-size: .86rem;
            outline: none;
            transition: border-color var(--transition), box-shadow var(--transition);
        }

        .form-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(248, 113, 113, .1);
        }

        select.form-control {
            cursor: pointer;
            -webkit-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%235a6690' stroke-width='2'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            padding-right: 32px;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 20px;
        }

        /* ── Empty state ── */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-muted);
        }

        .empty-icon {
            font-size: 48px;
            margin-bottom: 14px;
        }

        .empty-title {
            font-family: 'Syne', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 6px;
        }

        .empty-desc {
            font-size: .83rem;
        }

        /* ── Section label ── */
        .section-label-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
        }

        .section-label-text {
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .section-label-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            animation: blink 1.5s ease infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .3;
            }
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
                    <div class="topbar-title">Entités en attente</div>
                    <div class="topbar-breadcrumb">5 demandes à traiter · Écoles et Facultés</div>
                </div>
                <div class="topbar-spacer"></div>
                <div class="topbar-actions">
                    <button class="theme-toggle" id="themeToggle">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="themeIcon">
                            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                        </svg>
                    </button>
                    <div class="topbar-avatar" style="background:linear-gradient(135deg,#dc2626,#9f1239)">AD</div>
                </div>
            </header>

            <div class="content">

                <!-- Alert -->
                <div class="alert alert-warning fade-in">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <line x1="12" y1="16" x2="12.01" y2="16" />
                    </svg>
                    Les entités disposent de <strong>48 heures</strong> pour être validées après leur inscription. Passé ce délai, leur demande expire et un email leur est envoyé automatiquement.
                </div>

                <!-- Filtres -->
                <div class="card fade-in mb-24">
                    <div class="card-p" style="display:flex;gap:12px;flex-wrap:wrap;align-items:center">
                        <div style="flex:1;min-width:180px">
                            <input type="text" class="form-control" id="searchInput" placeholder="🔍  Rechercher une entité..." style="margin:0" oninput="filtrer()">
                        </div>
                        <select class="form-control" style="width:auto;margin:0" id="filterUniv" onchange="filtrer()">
                            <option value="">Toutes les universités</option>
                            <option value="uac">UAC — Abomey-Calavi</option>
                            <option value="up">Université de Parakou</option>
                            <option value="unstim">UNSTIM — Abomey</option>
                            <option value="una">UNA — Kétou</option>
                        </select>
                        <select class="form-control" style="width:auto;margin:0" id="filterType" onchange="filtrer()">
                            <option value="">Tout type</option>
                            <option value="faculté">Faculté</option>
                            <option value="école">École</option>
                            <option value="institut">Institut</option>
                        </select>
                        <select class="form-control" style="width:auto;margin:0" id="filterSort" onchange="filtrer()">
                            <option value="urgent">Trier : urgence d'abord</option>
                            <option value="recent">Trier : plus récent</option>
                        </select>
                    </div>
                </div>

                <!-- ── Urgentes (< 24h) ── -->
                <div class="section-label-row fade-in fade-in-1">
                    <div class="section-label-text">
                        <span class="section-label-dot" style="background:var(--red)"></span>
                        Urgentes — moins de 24h restantes
                    </div>
                    <span class="badge badge-red" id="countUrgent">2 demandes</span>
                </div>

                <div id="listUrgent">

                    <!-- EPAC -->
                    <div class="entity-row urgent fade-in fade-in-1" id="card-EPAC" data-univ="uac" data-type="école" data-urgence="urgent">
                        <div class="entity-logo" style="background:linear-gradient(135deg,#0891b2,#0f766e)">EPAC</div>
                        <div style="flex:1;min-width:220px">
                            <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">
                                <span class="entity-name">EPAC</span>
                                <span class="type-badge">🏫 École d'ingénieurs</span>
                                <span class="badge badge-amber">En attente</span>
                                <span class="timer-warn">⚠️ Expire dans 6h</span>
                            </div>
                            <div class="entity-sub">École Polytechnique d'Abomey-Calavi</div>
                            <div class="parent-tag">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:11px;height:11px">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                </svg>
                                Université d'Abomey-Calavi (UAC)
                            </div>
                            <div class="entity-details-grid">
                                <div class="entity-detail-item"><strong>Responsable :</strong> Prof. Félicien Avlessi</div>
                                <div class="entity-detail-item"><strong>Email :</strong> direction@epac.uac.bj</div>
                                <div class="entity-detail-item"><strong>Téléphone :</strong> +229 01 97 20 15 00</div>
                                <div class="entity-detail-item"><strong>Site web :</strong> www.epac.uac.bj</div>
                                <div class="entity-detail-item"><strong>Inscrite le :</strong> 20 fév. 2025 à 14h10</div>
                            </div>
                        </div>
                        <div style="display:flex;gap:8px;flex-shrink:0;flex-wrap:wrap;align-items:flex-start">
                            <button class="btn btn-green btn-sm" onclick="valider('EPAC')">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:13px;height:13px">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>Valider
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="ouvreRefus('EPAC')">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:13px;height:13px">
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>Refuser
                            </button>
                        </div>
                    </div>

                    <!-- FAST -->
                    <div class="entity-row urgent fade-in fade-in-1" id="card-FAST" data-univ="uac" data-type="faculté" data-urgence="urgent">
                        <div class="entity-logo" style="background:linear-gradient(135deg,#7c3aed,#4f46e5)">FAST</div>
                        <div style="flex:1;min-width:220px">
                            <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">
                                <span class="entity-name">FAST</span>
                                <span class="type-badge">🎓 Faculté</span>
                                <span class="badge badge-amber">En attente</span>
                                <span class="timer-warn">⚠️ Expire dans 14h</span>
                            </div>
                            <div class="entity-sub">Faculté des Sciences et Techniques</div>
                            <div class="parent-tag">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:11px;height:11px">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                </svg>
                                Université d'Abomey-Calavi (UAC)
                            </div>
                            <div class="entity-details-grid">
                                <div class="entity-detail-item"><strong>Responsable :</strong> Prof. Brice Sinsin</div>
                                <div class="entity-detail-item"><strong>Email :</strong> contact@fast.uac.bj</div>
                                <div class="entity-detail-item"><strong>Téléphone :</strong> +229 01 97 36 00 00</div>
                                <div class="entity-detail-item"><strong>Site web :</strong> www.fast.uac.bj</div>
                                <div class="entity-detail-item"><strong>Inscrite le :</strong> 20 fév. 2025 à 20h48</div>
                            </div>
                        </div>
                        <div style="display:flex;gap:8px;flex-shrink:0;flex-wrap:wrap;align-items:flex-start">
                            <button class="btn btn-green btn-sm" onclick="valider('FAST')">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:13px;height:13px">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>Valider
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="ouvreRefus('FAST')">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:13px;height:13px">
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>Refuser
                            </button>
                        </div>
                    </div>

                </div><!-- /listUrgent -->

                <!-- ── Normales (> 24h) ── -->
                <div class="section-label-row fade-in fade-in-2" style="margin-top:20px">
                    <div class="section-label-text">
                        <span class="section-label-dot" style="background:var(--amber)"></span>
                        En cours — délai suffisant
                    </div>
                    <span class="badge badge-amber" id="countNormal">3 demandes</span>
                </div>

                <div id="listNormal">

                    <!-- FSS -->
                    <div class="entity-row fade-in fade-in-2" id="card-FSS" data-univ="uac" data-type="faculté" data-urgence="normal">
                        <div class="entity-logo" style="background:linear-gradient(135deg,var(--green),#059669)">FSS</div>
                        <div style="flex:1;min-width:220px">
                            <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">
                                <span class="entity-name">FSS — UAC</span>
                                <span class="type-badge">🎓 Faculté</span>
                                <span class="badge badge-amber">En attente</span>
                                <span class="timer-ok">⏱ Expire dans 30h</span>
                            </div>
                            <div class="entity-sub">Faculté des Sciences de la Santé</div>
                            <div class="parent-tag">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:11px;height:11px">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                </svg>
                                Université d'Abomey-Calavi (UAC)
                            </div>
                            <div class="entity-details-grid">
                                <div class="entity-detail-item"><strong>Responsable :</strong> Prof. Dismand Houinato</div>
                                <div class="entity-detail-item"><strong>Email :</strong> doyen@fss.uac.bj</div>
                                <div class="entity-detail-item"><strong>Téléphone :</strong> +229 01 97 36 01 00</div>
                                <div class="entity-detail-item"><strong>Site web :</strong> www.fss.uac.bj</div>
                                <div class="entity-detail-item"><strong>Inscrite le :</strong> 21 fév. 2025 à 08h22</div>
                            </div>
                        </div>
                        <div style="display:flex;gap:8px;flex-shrink:0;flex-wrap:wrap;align-items:flex-start">
                            <button class="btn btn-green btn-sm" onclick="valider('FSS')">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:13px;height:13px">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>Valider
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="ouvreRefus('FSS')">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:13px;height:13px">
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>Refuser
                            </button>
                        </div>
                    </div>

                    <!-- FADESP -->
                    <div class="entity-row fade-in fade-in-2" id="card-FADESP" data-univ="uac" data-type="faculté" data-urgence="normal">
                        <div class="entity-logo" style="background:linear-gradient(135deg,#f59e0b,#d97706)">FADS</div>
                        <div style="flex:1;min-width:220px">
                            <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">
                                <span class="entity-name">FADESP — UAC</span>
                                <span class="type-badge">🎓 Faculté</span>
                                <span class="badge badge-amber">En attente</span>
                                <span class="timer-ok">⏱ Expire dans 38h</span>
                            </div>
                            <div class="entity-sub">Faculté de Droit et de Sciences Politiques</div>
                            <div class="parent-tag">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:11px;height:11px">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                </svg>
                                Université d'Abomey-Calavi (UAC)
                            </div>
                            <div class="entity-details-grid">
                                <div class="entity-detail-item"><strong>Responsable :</strong> Prof. Théodore Holo</div>
                                <div class="entity-detail-item"><strong>Email :</strong> doyen@fadesp.uac.bj</div>
                                <div class="entity-detail-item"><strong>Téléphone :</strong> +229 01 97 36 02 00</div>
                                <div class="entity-detail-item"><strong>Site web :</strong> www.fadesp.uac.bj</div>
                                <div class="entity-detail-item"><strong>Inscrite le :</strong> 21 fév. 2025 à 11h15</div>
                            </div>
                        </div>
                        <div style="display:flex;gap:8px;flex-shrink:0;flex-wrap:wrap;align-items:flex-start">
                            <button class="btn btn-green btn-sm" onclick="valider('FADESP')">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:13px;height:13px">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>Valider
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="ouvreRefus('FADESP')">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:13px;height:13px">
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>Refuser
                            </button>
                        </div>
                    </div>

                    <!-- ENSET -->
                    <div class="entity-row fade-in fade-in-3" id="card-ENSET" data-univ="uac" data-type="école" data-urgence="normal">
                        <div class="entity-logo" style="background:linear-gradient(135deg,#0ea5e9,#0369a1)">ENSE</div>
                        <div style="flex:1;min-width:220px">
                            <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap">
                                <span class="entity-name">ENSET — UAC</span>
                                <span class="type-badge">🏫 École</span>
                                <span class="badge badge-amber">En attente</span>
                                <span class="timer-ok">⏱ Expire dans 44h</span>
                            </div>
                            <div class="entity-sub">École Normale Supérieure de l'Enseignement Technique</div>
                            <div class="parent-tag">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:11px;height:11px">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                </svg>
                                Université d'Abomey-Calavi (UAC)
                            </div>
                            <div class="entity-details-grid">
                                <div class="entity-detail-item"><strong>Responsable :</strong> Prof. Kocou Nuzéhat</div>
                                <div class="entity-detail-item"><strong>Email :</strong> direction@enset.uac.bj</div>
                                <div class="entity-detail-item"><strong>Téléphone :</strong> +229 01 97 36 05 00</div>
                                <div class="entity-detail-item"><strong>Site web :</strong> www.enset.uac.bj</div>
                                <div class="entity-detail-item"><strong>Inscrite le :</strong> 21 fév. 2025 à 14h30</div>
                            </div>
                        </div>
                        <div style="display:flex;gap:8px;flex-shrink:0;flex-wrap:wrap;align-items:flex-start">
                            <button class="btn btn-green btn-sm" onclick="valider('ENSET')">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:13px;height:13px">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>Valider
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="ouvreRefus('ENSET')">
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:13px;height:13px">
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>Refuser
                            </button>
                        </div>
                    </div>

                </div><!-- /listNormal -->

            </div><!-- /content -->
        </div>
    </div>

    <!-- ═══════════ MODAL REFUS ═══════════ -->
    <div class="modal-overlay" id="modalRefus" onclick="clickOverlay(event)">
        <div class="modal-box">
            <div class="modal-title-text">Motif du refus</div>
            <div class="modal-sub">Ce message sera envoyé par email à l'entité concernée.</div>
            <div class="form-group">
                <label class="form-label">Raison <span style="color:var(--red)">*</span></label>
                <select class="form-control" id="selectRaison">
                    <option>Informations incomplètes ou incorrectes</option>
                    <option>Email non institutionnel</option>
                    <option>Entité non reconnue par l'université parente</option>
                    <option>L'université parente n'est pas inscrite sur la plateforme</option>
                    <option>Documents manquants</option>
                    <option>Doublon — entité déjà inscrite</option>
                    <option>Autre (préciser ci-dessous)</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Message complémentaire <span style="color:var(--text-muted);font-weight:400;text-transform:none">(optionnel)</span></label>
                <textarea class="form-control" id="refusMessage" style="min-height:80px" placeholder="Précisez la raison pour aider l'entité à corriger sa demande..."></textarea>
            </div>
            <div class="modal-actions">
                <button class="btn btn-outline" onclick="fermerModal()">Annuler</button>
                <button class="btn btn-danger" onclick="confirmerRefus()">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                    Confirmer le refus
                </button>
            </div>
        </div>
    </div>

    <script>
        /* ── Thème ── */
        const toggle = document.getElementById('themeToggle'),
            icon = document.getElementById('themeIcon');
        let dark = localStorage.getItem('theme') === 'dark';
        document.addEventListener('DOMContentLoaded', () => {
            const navLink = document.getElementsByClassName('nav-link att');
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

        /* ── Filtrer ── */
        function filtrer() {
            const q = document.getElementById('searchInput').value.toLowerCase();
            const univ = document.getElementById('filterUniv').value.toLowerCase();
            const type = document.getElementById('filterType').value.toLowerCase();
            document.querySelectorAll('.entity-row').forEach(row => {
                const text = row.textContent.toLowerCase();
                const rUniv = (row.dataset.univ || '').toLowerCase();
                const rType = (row.dataset.type || '').toLowerCase();
                const ok = (!q || text.includes(q)) &&
                    (!univ || rUniv.includes(univ)) &&
                    (!type || rType.includes(type));
                row.style.display = ok ? '' : 'none';
            });
        }

        /* ── Valider ── */
        function valider(id) {
            const card = document.getElementById('card-' + id);
            const nom = card.querySelector('.entity-name').textContent.trim();
            if (!confirm('Valider "' + nom + '" ?\nUn email de confirmation sera envoyé automatiquement à l\'entité.')) return;

            card.querySelector('.badge-amber').className = 'badge badge-green';
            card.querySelector('.badge.badge-green').textContent = 'Validée ✓';
            card.querySelectorAll('.btn-green, .btn-danger, .timer-ok, .timer-warn').forEach(el => el.remove());

            const msg = document.createElement('div');
            msg.style.cssText = 'font-size:.76rem;color:var(--green);font-weight:600;margin-top:8px;display:flex;align-items:center;gap:5px';
            msg.innerHTML = '<svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="width:13px;height:13px"><polyline points="20 6 9 17 4 12"/></svg> Validée — email envoyé';
            card.querySelector('[style*="flex:1"]').appendChild(msg);
            card.classList.add('treated');
            card.classList.remove('urgent');
        }

        /* ── Refuser ── */
        let targetId = null;

        function ouvreRefus(id) {
            targetId = id;
            document.getElementById('refusMessage').value = '';
            document.getElementById('modalRefus').classList.add('open');
        }

        function fermerModal() {
            document.getElementById('modalRefus').classList.remove('open');
        }

        function clickOverlay(e) {
            if (e.target === document.getElementById('modalRefus')) fermerModal();
        }

        function confirmerRefus() {
            if (!targetId) return;
            const card = document.getElementById('card-' + targetId);
            const nom = card.querySelector('.entity-name').textContent.trim();

            card.querySelector('.badge-amber').className = 'badge badge-red';
            card.querySelector('.badge.badge-red').textContent = 'Refusée';
            card.querySelectorAll('.btn-green, .btn-danger, .timer-ok, .timer-warn').forEach(el => el.remove());

            const msg = document.createElement('div');
            msg.style.cssText = 'font-size:.76rem;color:var(--red);font-weight:600;margin-top:8px;display:flex;align-items:center;gap:5px';
            msg.innerHTML = '<svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="width:13px;height:13px"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg> Refusée — email envoyé';
            card.querySelector('[style*="flex:1"]').appendChild(msg);
            card.classList.add('treated');
            card.classList.remove('urgent');

            fermerModal();
            targetId = null;
        }
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="fr" data-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes Programmes — Entité</title>
  <link rel="stylesheet" href="../assets/css/dashboard_entite.css">
  <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
</head>

<body>
  <div class="layout">
    <!-- sidebar-section -->
    <?php include '../includes/sidebar-Enti.php'; ?>

    <div class="main">
      <header class="topbar">
        <div>
          <div class="topbar-title">Mes Programmes</div>
          <div class="topbar-breadcrumb">Plannings et emplois du temps publiés</div>
        </div>
        <div class="topbar-spacer"></div>
        <div class="topbar-actions">
          <a href="publier-programme.php" class="btn btn-green btn-sm">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
              <circle cx="12" cy="12" r="10" />
              <line x1="12" y1="8" x2="12" y2="16" />
              <line x1="8" y1="12" x2="16" y2="12" />
            </svg>
            Nouveau programme
          </a>
          <button class="theme-toggle" id="themeToggle" title="Changer le thème">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="themeIcon">
              <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
            </svg>
          </button>
          <a href="profil.php" class="topbar-avatar">FS</a>
        </div>
      </header>

      <div class="content">

        <div class="card fade-in mb-24">
          <div class="card-p" style="display:flex;align-items:center;gap:12px;flex-wrap:wrap">
            <div style="flex:1;min-width:200px"><input type="text" class="form-control" placeholder="🔍  Rechercher un programme..." style="margin:0"></div>
            <select class="form-control" style="width:auto;margin:0">
              <option>Tous les niveaux</option>
              <option>Licence 1</option>
              <option>Licence 2</option>
              <option>Licence 3</option>
              <option>Master 1</option>
              <option>Master 2</option>
            </select>
            <select class="form-control" style="width:auto;margin:0">
              <option>Toutes les visibilités</option>
              <option>Privé</option>
              <option>Public</option>
              <option>Tout le monde</option>
            </select>
          </div>
        </div>

        <div class="card fade-in fade-in-1">
          <div class="card-header">
            <div class="card-title">7 programmes actifs</div>
          </div>
          <div class="card-body no-top-pad">
            <div class="table-wrap">
              <table>
                <thead>
                  <tr>
                    <th>Titre du programme</th>
                    <th>Niveau</th>
                    <th>Semestre</th>
                    <th>Année</th>
                    <th>Visibilité</th>
                    <th>Fichier</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="cell-bold">Emploi du temps S2 — Licence 2</div>
                      <div class="cell-muted">Mis à jour le 18 fév. 2025</div>
                    </td>
                    <td><span class="badge badge-purple">Licence 2</span></td>
                    <td class="cell-muted">Semestre 2</td>
                    <td class="cell-muted">2024-2025</td>
                    <td><span class="badge badge-amber">Tout le monde</span></td>
                    <td><span class="badge badge-grey">PDF</span></td>
                    <td>
                      <div class="flex gap-8">
                        <button class="btn btn-outline btn-sm btn-icon"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" />
                            <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                          </svg></button>
                        <button class="btn btn-danger btn-sm btn-icon"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <polyline points="3 6 5 6 21 6" />
                            <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6" />
                          </svg></button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="cell-bold">Programme des cours Master 1 — Physique</div>
                      <div class="cell-muted">Mis à jour le 12 fév. 2025</div>
                    </td>
                    <td><span class="badge badge-blue">Master 1</span></td>
                    <td class="cell-muted">Annuel</td>
                    <td class="cell-muted">2024-2025</td>
                    <td><span class="badge badge-green">Public</span></td>
                    <td><span class="badge badge-grey">PDF</span></td>
                    <td>
                      <div class="flex gap-8">
                        <button class="btn btn-outline btn-sm btn-icon"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" />
                            <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                          </svg></button>
                        <button class="btn btn-danger btn-sm btn-icon"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <polyline points="3 6 5 6 21 6" />
                            <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6" />
                          </svg></button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="cell-bold">Planning soutenances — Master 2 Chimie</div>
                      <div class="cell-muted">Mis à jour le 5 janv. 2025</div>
                    </td>
                    <td><span class="badge badge-amber">Master 2</span></td>
                    <td class="cell-muted">Semestre 1</td>
                    <td class="cell-muted">2024-2025</td>
                    <td><span class="badge badge-blue">Privé</span></td>
                    <td><span class="badge badge-grey">Excel</span></td>
                    <td>
                      <div class="flex gap-8">
                        <button class="btn btn-outline btn-sm btn-icon"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" />
                            <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                          </svg></button>
                        <button class="btn btn-danger btn-sm btn-icon"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <polyline points="3 6 5 6 21 6" />
                            <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6" />
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
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const navLink = document.getElementsByClassName('nav-link prog');
      navLink[0].classList.add('active');
    });
    const toggle = document.getElementById('themeToggle');
    const icon = document.getElementById('themeIcon');
    let dark = true;
    toggle.addEventListener('click', () => {
      dark = !dark;
      document.documentElement.setAttribute('data-theme', dark ? 'dark' : 'light');
      icon.innerHTML = dark ? '<path d="M12 3v1M12 20v1M4.22 4.22l.7.7M18.36 18.36l.7.7M3 12H4M20 12h1M4.22 19.78l.7-.7M18.36 5.64l.7-.7M12 8a4 4 0 100 8 4 4 0 000-8z"/>' : '<path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>';
    });
  </script>
</body>

</html>
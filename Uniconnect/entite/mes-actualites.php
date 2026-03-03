<!DOCTYPE html>
<html lang="fr" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes Actualités — Entité</title>
  <link rel="stylesheet" href="../assets/css/dashboard_entite.css">
  <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">

</head>
<body>
<div class="layout">


  <!-- sidebar-Section -->
  <?php include '../includes/sidebar-Enti.php'; ?>

  <div class="main">
    <header class="topbar">
      <div>
        <div class="topbar-title">Mes Actualités</div>
        <div class="topbar-breadcrumb">Toutes vos actualités publiées</div>
      </div>
      <div class="topbar-spacer"></div>
      <div class="topbar-actions">
        <a href="publier-actualite.php" class="btn btn-primary btn-sm">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
          Nouvelle actualité
        </a>
        <button class="theme-toggle" id="themeToggle" title="Changer le thème">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="themeIcon"><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
        </button>
        <a href="profil.php" class="topbar-avatar">FS</a>
      </div>
    </header>

    <div class="content">

      <!-- Filtres -->
      <div class="card fade-in mb-24">
        <div class="card-p" style="display:flex;align-items:center;gap:12px;flex-wrap:wrap">
          <div style="flex:1;min-width:200px">
            <input type="text" class="form-control" placeholder="🔍  Rechercher une actualité..." style="margin:0">
          </div>
          <select class="form-control" style="width:auto;margin:0">
            <option value="">Toutes les visibilités</option>
            <option>Privé</option>
            <option>Public</option>
            <option>Tout le monde</option>
          </select>
          <select class="form-control" style="width:auto;margin:0">
            <option value="">Toutes les dates</option>
            <option>Ce mois</option>
            <option>Cette semaine</option>
            <option>Aujourd'hui</option>
          </select>
        </div>
      </div>

      <!-- Table -->
      <div class="card fade-in fade-in-1">
        <div class="card-header">
          <div class="card-title">14 actualités</div>
        </div>
        <div class="card-body no-top-pad">
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>Titre</th>
                  <th>Visibilité</th>
                  <th>Date de publication</th>
                  <th>Vues</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="cell-bold">Résultats d'examens S1 2024</div>
                    <div class="cell-muted">Les résultats du semestre 1 sont disponibles...</div>
                  </td>
                  <td><span class="badge badge-green">Public</span></td>
                  <td class="cell-muted">21 fév. 2025</td>
                  <td class="cell-muted">342</td>
                  <td>
                    <div class="flex gap-8">
                      <button class="btn btn-outline btn-sm btn-icon" title="Modifier">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                      </button>
                      <button class="btn btn-danger btn-sm btn-icon" title="Supprimer">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/><path d="M10 11v6M14 11v6"/></svg>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="cell-bold">Calendrier des soutenances Master 2024</div>
                    <div class="cell-muted">Planning complet des soutenances de thèse...</div>
                  </td>
                  <td><span class="badge badge-green">Public</span></td>
                  <td class="cell-muted">18 fév. 2025</td>
                  <td class="cell-muted">218</td>
                  <td>
                    <div class="flex gap-8">
                      <button class="btn btn-outline btn-sm btn-icon" title="Modifier"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                      <button class="btn btn-danger btn-sm btn-icon" title="Supprimer"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg></button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="cell-bold">Réunion département interne — Janvier</div>
                    <div class="cell-muted">Compte rendu de la réunion mensuelle du département...</div>
                  </td>
                  <td><span class="badge badge-blue">Privé</span></td>
                  <td class="cell-muted">15 janv. 2025</td>
                  <td class="cell-muted">45</td>
                  <td>
                    <div class="flex gap-8">
                      <button class="btn btn-outline btn-sm btn-icon" title="Modifier"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                      <button class="btn btn-danger btn-sm btn-icon" title="Supprimer"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg></button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="cell-bold">Appel à candidatures — Bourse d'excellence 2025</div>
                    <div class="cell-muted">Ouverture des candidatures pour la bourse nationale...</div>
                  </td>
                  <td><span class="badge badge-amber">Tout le monde</span></td>
                  <td class="cell-muted">10 janv. 2025</td>
                  <td class="cell-muted">1 204</td>
                  <td>
                    <div class="flex gap-8">
                      <button class="btn btn-outline btn-sm btn-icon" title="Modifier"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                      <button class="btn btn-danger btn-sm btn-icon" title="Supprimer"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg></button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="cell-bold">Ouverture des inscriptions S2 — 2024/2025</div>
                    <div class="cell-muted">Les inscriptions au semestre 2 sont ouvertes...</div>
                  </td>
                  <td><span class="badge badge-green">Public</span></td>
                  <td class="cell-muted">05 janv. 2025</td>
                  <td class="cell-muted">876</td>
                  <td>
                    <div class="flex gap-8">
                      <button class="btn btn-outline btn-sm btn-icon" title="Modifier"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                      <button class="btn btn-danger btn-sm btn-icon" title="Supprimer"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg></button>
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
    const navLink = document.getElementsByClassName('nav-link act');
    navLink[0].classList.add('active');
  });
  const toggle = document.getElementById('themeToggle');
  const icon   = document.getElementById('themeIcon');
  const sun    = '<path d="M12 3v1M12 20v1M4.22 4.22l.7.7M18.36 18.36l.7.7M3 12H4M20 12h1M4.22 19.78l.7-.7M18.36 5.64l.7-.7M12 8a4 4 0 100 8 4 4 0 000-8z"/>';
  const moon   = '<path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>';
  let dark = true;
  toggle.addEventListener('click', () => {
    dark = !dark;
    document.documentElement.setAttribute('data-theme', dark ? 'dark' : 'light');
    icon.innerHTML = dark ? sun : moon;
  });
</script>
</body>
</html>

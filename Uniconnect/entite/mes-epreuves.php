<!DOCTYPE html>
<html lang="fr" data-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes Épreuves — Entité</title>
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
          <div class="topbar-title">Mes Épreuves</div>
          <div class="topbar-breadcrumb">Toutes vos épreuves publiées</div>
        </div>
        <div class="topbar-spacer"></div>
        <div class="topbar-actions">
          <a href="publier-epreuve.php" class="btn btn-amber btn-sm">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
              <circle cx="12" cy="12" r="10" />
              <line x1="12" y1="8" x2="12" y2="16" />
              <line x1="8" y1="12" x2="16" y2="12" />
            </svg>
            Nouvelle épreuve
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

        <!-- Filtres -->
        <div class="card fade-in mb-24">
          <div class="card-p" style="display:flex;align-items:center;gap:12px;flex-wrap:wrap">
            <div style="flex:1;min-width:200px"><input type="text" class="form-control" placeholder="🔍  Rechercher une épreuve..." style="margin:0"></div>
            <select class="form-control" style="width:auto;margin:0">
              <option>Toutes les filières</option>
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
            <select class="form-control" style="width:auto;margin:0">
              <option>Toutes les années</option>
              <option>2024-2025</option>
              <option>2023-2024</option>
              <option>2022-2023</option>
            </select>
          </div>
        </div>

        <div class="card fade-in fade-in-1">
          <div class="card-header">
            <div class="card-title">32 épreuves</div>
          </div>
          <div class="card-body no-top-pad">
            <div class="table-wrap">
              <table>
                <thead>
                  <tr>
                    <th>Intitulé de l'épreuve</th>
                    <th>Filière</th>
                    <th>Niveau</th>
                    <th>Année</th>
                    <th>Visibilité</th>
                    <th>Téléch.</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="flex-center gap-8">
                        <div style="width:32px;height:32px;background:var(--amber-light);border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                          <svg fill="none" stroke="var(--amber)" stroke-width="2" viewBox="0 0 24 24" style="width:16px;height:16px">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" />
                            <polyline points="14 2 14 8 20 8" />
                          </svg>
                        </div>
                        <div>
                          <div class="cell-bold">Examen Algèbre Linéaire</div>
                          <div class="cell-muted">Session Juin 2024</div>
                        </div>
                      </div>
                    </td>
                    <td class="cell-muted">Mathématiques</td>
                    <td><span class="badge badge-blue">Licence 1</span></td>
                    <td class="cell-muted">2023-2024</td>
                    <td><span class="badge badge-blue">Privé</span></td>
                    <td class="cell-muted">124</td>
                    <td>
                      <div class="flex gap-8">
                        <button class="btn btn-outline btn-sm btn-icon" title="Voir"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                            <circle cx="12" cy="12" r="3" />
                          </svg></button>
                        <button class="btn btn-outline btn-sm btn-icon" title="Modifier"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" />
                            <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                          </svg></button>
                        <button class="btn btn-danger btn-sm btn-icon" title="Supprimer"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <polyline points="3 6 5 6 21 6" />
                            <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6" />
                          </svg></button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="flex-center gap-8">
                        <div style="width:32px;height:32px;background:var(--amber-light);border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                          <svg fill="none" stroke="var(--amber)" stroke-width="2" viewBox="0 0 24 24" style="width:16px;height:16px">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" />
                            <polyline points="14 2 14 8 20 8" />
                          </svg>
                        </div>
                        <div>
                          <div class="cell-bold">TP Chimie Organique</div>
                          <div class="cell-muted">Épreuve de contrôle continu</div>
                        </div>
                      </div>
                    </td>
                    <td class="cell-muted">Chimie</td>
                    <td><span class="badge badge-purple">Licence 2</span></td>
                    <td class="cell-muted">2023-2024</td>
                    <td><span class="badge badge-blue">Privé</span></td>
                    <td class="cell-muted">89</td>
                    <td>
                      <div class="flex gap-8">
                        <button class="btn btn-outline btn-sm btn-icon" title="Voir"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                            <circle cx="12" cy="12" r="3" />
                          </svg></button>
                        <button class="btn btn-outline btn-sm btn-icon" title="Modifier"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" />
                            <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                          </svg></button>
                        <button class="btn btn-danger btn-sm btn-icon" title="Supprimer"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <polyline points="3 6 5 6 21 6" />
                            <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6" />
                          </svg></button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="flex-center gap-8">
                        <div style="width:32px;height:32px;background:var(--amber-light);border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                          <svg fill="none" stroke="var(--amber)" stroke-width="2" viewBox="0 0 24 24" style="width:16px;height:16px">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" />
                            <polyline points="14 2 14 8 20 8" />
                          </svg>
                        </div>
                        <div>
                          <div class="cell-bold">Mécanique des Fluides — Final</div>
                          <div class="cell-muted">Session de rattrapage Juillet 2024</div>
                        </div>
                      </div>
                    </td>
                    <td class="cell-muted">Physique</td>
                    <td><span class="badge badge-green">Licence 3</span></td>
                    <td class="cell-muted">2023-2024</td>
                    <td><span class="badge badge-green">Public</span></td>
                    <td class="cell-muted">213</td>
                    <td>
                      <div class="flex gap-8">
                        <button class="btn btn-outline btn-sm btn-icon" title="Voir"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                            <circle cx="12" cy="12" r="3" />
                          </svg></button>
                        <button class="btn btn-outline btn-sm btn-icon" title="Modifier"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" />
                            <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                          </svg></button>
                        <button class="btn btn-danger btn-sm btn-icon" title="Supprimer"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <polyline points="3 6 5 6 21 6" />
                            <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6" />
                          </svg></button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="flex-center gap-8">
                        <div style="width:32px;height:32px;background:var(--amber-light);border-radius:6px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                          <svg fill="none" stroke="var(--amber)" stroke-width="2" viewBox="0 0 24 24" style="width:16px;height:16px">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" />
                            <polyline points="14 2 14 8 20 8" />
                          </svg>
                        </div>
                        <div>
                          <div class="cell-bold">Statistiques et Probabilités</div>
                          <div class="cell-muted">Examen final S2 2024</div>
                        </div>
                      </div>
                    </td>
                    <td class="cell-muted">Mathématiques</td>
                    <td><span class="badge badge-blue">Licence 1</span></td>
                    <td class="cell-muted">2023-2024</td>
                    <td><span class="badge badge-amber">Tout le monde</span></td>
                    <td class="cell-muted">456</td>
                    <td>
                      <div class="flex gap-8">
                        <button class="btn btn-outline btn-sm btn-icon" title="Voir"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                            <circle cx="12" cy="12" r="3" />
                          </svg></button>
                        <button class="btn btn-outline btn-sm btn-icon" title="Modifier"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
                            <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" />
                            <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                          </svg></button>
                        <button class="btn btn-danger btn-sm btn-icon" title="Supprimer"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:14px;height:14px">
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
      const navLink = document.getElementsByClassName('nav-link epr');
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
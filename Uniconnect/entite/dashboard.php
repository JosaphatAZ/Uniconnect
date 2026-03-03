<!DOCTYPE html>
<html lang="fr" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord — Entité</title>
  <link rel="stylesheet" href="../assets/css/dashboard_entite.css">
  <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
</head>
<body>
<div class="layout">

  <!-- ── Sidebar ─────────────────────────────────────────── -->
  <?php include '../includes/sidebar-Enti.php'; ?>

  <!-- ── Main ────────────────────────────────────────────── -->
  <div class="main">

    <!-- Topbar -->
    <header class="topbar">
      <div>
        <div class="topbar-title">Tableau de bord</div>
        <div class="topbar-breadcrumb">Faculté des Sciences — Vue générale</div>
      </div>
      <div class="topbar-spacer"></div>
      <div class="topbar-actions">
        <button class="theme-toggle" id="themeToggle" title="Changer le thème">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="themeIcon"><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
        </button>
        <a href="profil.php" class="topbar-avatar">FS</a>
      </div>
    </header>

    <!-- Content -->
    <div class="content">

      <!-- Stats -->
      <div class="stats-grid fade-in">
        <div class="stat-card">
          <div class="stat-icon blue">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v8a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/></svg>
          </div>
          <div class="stat-info">
            <div class="stat-value">14</div>
            <div class="stat-label">Actualités publiées</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon amber">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
          <div class="stat-info">
            <div class="stat-value">32</div>
            <div class="stat-label">Épreuves publiées</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon green">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          </div>
          <div class="stat-info">
            <div class="stat-value">7</div>
            <div class="stat-label">Programmes actifs</div>
          </div>
        </div>
      </div>

      <!-- Grid principal -->
      <div class="grid-2">

        <!-- Dernières publications -->
        <div class="card fade-in fade-in-1">
          <div class="card-header">
            <div class="card-title">Dernières publications</div>
            <a href="mes-actualites.php" class="btn btn-outline btn-sm">Voir tout</a>
          </div>
          <div class="card-body no-top-pad">
            <div class="activity-list">
              <div class="activity-item">
                <div class="activity-dot blue"></div>
                <div>
                  <div class="activity-text"><strong>Actualité :</strong> Résultats d'examens S1 2024</div>
                  <div class="text-muted">Il y a 2 heures — <span class="badge badge-green" style="font-size:0.68rem;padding:1px 7px">Public</span></div>
                </div>
                <div class="activity-time">Aujourd'hui</div>
              </div>
              <div class="activity-item">
                <div class="activity-dot amber"></div>
                <div>
                  <div class="activity-text"><strong>Épreuve :</strong> Examen Algèbre L1 2023</div>
                  <div class="text-muted">Hier — <span class="badge badge-blue" style="font-size:0.68rem;padding:1px 7px">Privé</span></div>
                </div>
                <div class="activity-time">Hier</div>
              </div>
              <div class="activity-item">
                <div class="activity-dot green"></div>
                <div>
                  <div class="activity-text"><strong>Programme :</strong> Planning L2 Semestre 2</div>
                  <div class="text-muted">Il y a 3 jours — <span class="badge badge-amber" style="font-size:0.68rem;padding:1px 7px">Tout le monde</span></div>
                </div>
                <div class="activity-time">Lun.</div>
              </div>
              <div class="activity-item">
                <div class="activity-dot blue"></div>
                <div>
                  <div class="activity-text"><strong>Actualité :</strong> Calendrier des soutenances</div>
                  <div class="text-muted">Il y a 5 jours — <span class="badge badge-green" style="font-size:0.68rem;padding:1px 7px">Public</span></div>
                </div>
                <div class="activity-time">Sam.</div>
              </div>
              <div class="activity-item">
                <div class="activity-dot amber"></div>
                <div>
                  <div class="activity-text"><strong>Épreuve :</strong> TP Chimie Organique L2</div>
                  <div class="text-muted">Il y a 1 semaine — <span class="badge badge-blue" style="font-size:0.68rem;padding:1px 7px">Privé</span></div>
                </div>
                <div class="activity-time">Ven.</div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Actions rapides -->
      <div class="card fade-in fade-in-3 mt-24">
        <div class="card-p">
          <div class="card-title" style="margin-bottom:16px">Actions rapides</div>
          <div class="flex gap-12" style="flex-wrap:wrap">
            <a href="publier-actualite.php" class="btn btn-primary">
              <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:15px;height:15px"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
              Nouvelle Actualité
            </a>
            <a href="publier-epreuve.php" class="btn btn-amber">
              <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:15px;height:15px"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
              Nouvelle Épreuve
            </a>
            <a href="publier-programme.php" class="btn btn-green">
              <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:15px;height:15px"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
              Nouveau Programme
            </a>
          </div>
        </div>
      </div>

    </div><!-- /content -->
  </div><!-- /main -->
</div><!-- /layout -->

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const navLink = document.getElementsByClassName('nav-link dash');
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

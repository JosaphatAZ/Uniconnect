<!DOCTYPE html>
<html lang="fr" data-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publier un Programme — Entité</title>
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
          <div class="topbar-title">Publier un Programme</div>
          <div class="topbar-breadcrumb">Déposer un emploi du temps ou planning de cours</div>
        </div>
        <div class="topbar-spacer"></div>
        <div class="topbar-actions">
          <button class="theme-toggle" id="themeToggle" title="Changer le thème">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="themeIcon">
              <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
            </svg>
          </button>
          <a href="profil.php" class="topbar-avatar">FS</a>
        </div>
      </header>

      <div class="content">
        <div class="card fade-in">
          <div class="card-header">
            <div class="card-title">Informations du programme</div>
          </div>
          <div class="card-body">

            <div class="form-group">
              <label class="form-label">Titre du programme <span style="color:var(--red)">*</span></label>
              <input type="text" class="form-control" placeholder="Ex: Emploi du temps S2 Licence 2 — 2024/2025">
            </div>

            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Type de programme <span style="color:var(--red)">*</span></label>
                <select class="form-control">
                  <option>Sélectionner le type</option>
                  <option>Emploi du temps hebdomadaire</option>
                  <option>Planning semestriel</option>
                  <option>Planning annuel</option>
                  <option>Planning des examens</option>
                  <option>Planning des soutenances</option>
                  <option>Programme des cours</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Niveau / Promotion <span style="color:var(--red)">*</span></label>
                <select class="form-control">
                  <option>Sélectionner le niveau</option>
                  <option>Licence 1</option>
                  <option>Licence 2</option>
                  <option>Licence 3</option>
                  <option>Master 1</option>
                  <option>Master 2</option>
                  <option>Toutes les promotions</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Semestre / Période</label>
                <select class="form-control">
                  <option>Semestre 1</option>
                  <option>Semestre 2</option>
                  <option>Annuel</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Année académique <span style="color:var(--red)">*</span></label>
                <select class="form-control">
                  <option>2024-2025</option>
                  <option>2023-2024</option>
                  <option>2022-2023</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Date de début</label>
                <input type="date" class="form-control">
              </div>
              <div class="form-group">
                <label class="form-label">Date de fin</label>
                <input type="date" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="form-label">Description (optionnel)</label>
              <textarea class="form-control" style="min-height:90px" placeholder="Informations complémentaires, changements par rapport à la version précédente..."></textarea>
            </div>

            <!-- Upload -->
            <div class="form-group">
              <label class="form-label">Fichier du programme <span style="color:var(--red)">*</span></label>
              <div class="upload-zone" onclick="document.getElementById('fileInput').click()">
                <div class="upload-icon">
                  <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" />
                    <polyline points="14 2 14 8 20 8" />
                    <line x1="12" y1="18" x2="12" y2="12" />
                    <line x1="9" y1="15" x2="15" y2="15" />
                  </svg>
                </div>
                <div class="upload-text">Glissez votre fichier ou <span>cliquez pour parcourir</span></div>
                <div class="upload-text" style="margin-top:4px;font-size:0.75rem">PDF, Excel, Word jusqu'à 20 Mo</div>
                <input type="file" id="fileInput" accept=".pdf,.xls,.xlsx,.doc,.docx" style="display:none">
              </div>
            </div>

            <!-- Visibilité -->
            <div class="form-group">
              <label class="form-label">Visibilité <span style="color:var(--red)">*</span></label>
              <div class="visibility-group">
                <input type="radio" name="visibility" id="vis-private" value="private" class="visibility-option">
                <label for="vis-private" class="visibility-label">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="11" width="18" height="11" rx="2" />
                    <path d="M7 11V7a5 5 0 0110 0v4" />
                  </svg>
                  Privé <span style="font-size:0.72rem;font-weight:400;margin-left:2px;color:var(--text-muted)">Écoles & Facultés</span>
                </label>
                <input type="radio" name="visibility" id="vis-public" value="public" class="visibility-option" checked>
                <label for="vis-public" class="visibility-label">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 00-3-3.87" />
                    <path d="M16 3.13a4 4 0 010 7.75" />
                  </svg>
                  Public <span style="font-size:0.72rem;font-weight:400;margin-left:2px;color:var(--text-muted)">Étudiants inscrits</span>
                </label>
                <input type="radio" name="visibility" id="vis-all" value="all" class="visibility-option">
                <label for="vis-all" class="visibility-label">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="2" y1="12" x2="22" y2="12" />
                    <path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z" />
                  </svg>
                  Tout le monde <span style="font-size:0.72rem;font-weight:400;margin-left:2px;color:var(--text-muted)">Toutes universités</span>
                </label>
              </div>
              <div class="form-hint" id="visHint">Visible par tous les étudiants inscrits dans votre université.</div>
            </div>

            <div class="divider"></div>
            <div class="flex gap-12">
              <button class="btn btn-green">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:15px;height:15px">
                  <path d="M22 2L11 13" />
                  <path d="M22 2L15 22 11 13 2 9l20-7z" />
                </svg>
                Publier le programme
              </button>
              <a href="mes-programmes.php" class="btn btn-outline" style="margin-left:auto;color:var(--text-muted)">Annuler</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const navLink = document.getElementsByClassName('nav-link pub_prog');
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
    const hints = {
      'private': 'Visible uniquement par les autres écoles et facultés de l\'université.',
      'public': 'Visible par tous les étudiants inscrits dans votre université.',
      'all': 'Visible par tout le monde, y compris les étudiants d\'autres universités.'
    };
    document.querySelectorAll('.visibility-option').forEach(radio => {
      radio.addEventListener('change', () => {
        document.getElementById('visHint').textContent = hints[radio.value];
      });
    });
  </script>
</body>

</html>
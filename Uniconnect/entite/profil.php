<!DOCTYPE html>
<html lang="fr" data-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil — Entité</title>
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
          <div class="topbar-title">Profil de l'entité</div>
          <div class="topbar-breadcrumb">Gérer les informations de la Faculté des Sciences</div>
        </div>
        <div class="topbar-spacer"></div>
        <div class="topbar-actions">
        <button class="theme-toggle" id="themeToggle" title="Changer le thème">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="themeIcon"><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
        </button>
          <a href="profil.php" class="topbar-avatar">FS</a>
        </div>
      </header>

      <div class="content">
        <div class="grid-2" style="align-items:start">

          <!-- Infos générales -->
          <div>
            <div class="card fade-in">
              <div class="card-header">
                <div class="card-title">Informations générales</div>
              </div>
              <div class="card-body">

                <div class="avatar-upload">
                  <div class="avatar-preview">FS</div>
                  <div>
                    <button class="btn btn-outline btn-sm">Changer le logo</button>
                    <p>PNG, JPG — max 2 Mo</p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="form-label">Nom officiel de l'entité <span style="color:var(--red)">*</span></label>
                  <input type="text" class="form-control" value="Faculté des Sciences et Techniques">
                </div>

                <div class="form-row">
                  <div class="form-group">
                    <label class="form-label">Type d'entité</label>
                    <select class="form-control">
                      <option selected>Faculté</option>
                      <option>École</option>
                      <option>Institut</option>
                      <option>Département</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Université de rattachement</label>
                    <input type="text" class="form-control" value="Université d'Abomey Calavi" disabled style="opacity:0.6;cursor:not-allowed">
                  </div>
                </div>

                <div class="form-group">
                  <label class="form-label">Description / Présentation</label>
                  <textarea class="form-control" style="min-height:100px">La Faculté des Sciences et Techniques propose des formations de Licence, Master et Doctorat dans les domaines des mathématiques, de la physique, de la chimie et de la biologie.</textarea>
                </div>

                <div class="form-group">
                  <label class="form-label">Site web (optionnel)</label>
                  <input type="url" class="form-control" value="https://fst.univ-dakar.sn" placeholder="https://...">
                </div>

                <div class="divider"></div>
                <button class="btn btn-primary">Enregistrer les modifications</button>
              </div>
            </div>
          </div>

          <!-- Sécurité & Contact -->
          <div>
            <div class="card fade-in fade-in-1 mb-16">
              <div class="card-header">
                <div class="card-title">Coordonnées de contact</div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label class="form-label">Email de contact</label>
                  <input type="email" class="form-control" value="fst@univ-dakar.sn">
                </div>
                <div class="form-group">
                  <label class="form-label">Téléphone</label>
                  <input type="tel" class="form-control" value="+221 33 824 XX XX">
                </div>
                <div class="form-group">
                  <label class="form-label">Adresse</label>
                  <input type="text" class="form-control" value="Avenue Cheikh Anta Diop, Dakar">
                </div>
                <div class="divider"></div>
                <button class="btn btn-outline btn-sm">Mettre à jour le contact</button>
              </div>
            </div>

            <div class="card fade-in fade-in-2">
              <div class="card-header">
                <div class="card-title">Sécurité du compte</div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label class="form-label">Mot de passe actuel</label>
                  <input type="password" class="form-control" placeholder="••••••••">
                </div>
                <div class="form-group">
                  <label class="form-label">Nouveau mot de passe</label>
                  <input type="password" class="form-control" placeholder="••••••••">
                </div>
                <div class="form-group">
                  <label class="form-label">Confirmer le nouveau mot de passe</label>
                  <input type="password" class="form-control" placeholder="••••••••">
                </div>
                <div class="divider"></div>
                <button class="btn btn-outline btn-sm">Changer le mot de passe</button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const navLink = document.getElementsByClassName('nav-link prof');
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
<!DOCTYPE html>
<html lang="fr" data-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publier une Actualité — Entité</title>
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
          <div class="topbar-title">Publier une Actualité</div>
          <div class="topbar-breadcrumb">Créer et diffuser une nouvelle actualité</div>
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
        <div class="grid-2" style="align-items:start">

          <!-- Formulaire principal -->
          <div style="grid-column: span 2" class="fade-in">
            <div class="card">
              <div class="card-header">
                <div class="card-title">Informations de l'actualité</div>
              </div>
              <div class="card-body">

                <div class="form-group">
                  <label class="form-label">Titre de l'actualité <span style="color:var(--red)">*</span></label>
                  <input type="text" class="form-control" placeholder="Ex: Résultats du semestre 1 disponibles..." name="title">
                </div>

                <div class="form-group">
                  <label class="form-label">Contenu / Description <span style="color:var(--red)">*</span></label>
                  <textarea class="form-control" style="min-height:180px" placeholder="Rédigez le contenu de votre actualité ici..." name="contenu"></textarea>
                </div>

                <div class="form-group">
                  <label class="form-label">Catégorie</label>
                  <select class="form-control" name="categorie">
                    <option value="Vie" selected>Vie académique</option>
                    <option value="examens_resultats">Examens & Résultats</option>
                    <option value="inscriptions">Inscriptions</option>
                    <option value="evenements">Événements</option>
                    <option value="bourses">Bourses & Opportunités</option>
                    <option value="autre">Autre</option>
                  </select>
                </div>

                <!-- Image de couverture -->
                <div class="form-group">
                  <label class="form-label">Image de couverture (optionnel)</label>
                  <div class="upload-zone" onclick="document.getElementById('imgInput').click()">
                    <div class="upload-icon">
                      <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 16M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                    </div>
                    <div class="upload-text">Glissez une image ou <span>cliquez pour parcourir</span></div>
                    <div class="upload-text" style="margin-top:4px;font-size:0.75rem">PNG, JPG jusqu'à 5 Mo</div>
                    <input type="file" id="imgInput" name="image" accept="image/*" style="display:none">
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
                      Privé
                      <span style="font-size:0.72rem;font-weight:400;margin-left:2px;color:var(--text-muted)">Etudiants de l'entité</span>
                    </label>

                    <input type="radio" name="visibility" id="vis-public" value="public" class="visibility-option" checked>
                    <label for="vis-public" class="visibility-label">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 00-3-3.87" />
                        <path d="M16 3.13a4 4 0 010 7.75" />
                      </svg>
                      Public
                      <span style="font-size:0.72rem;font-weight:400;margin-left:2px;color:var(--text-muted)">Toute l'université</span>
                    </label>
                  </div>
                  <div class="form-hint" id="visHint">Les étudiants inscrits dans votre université verront cette actualité.</div>
                </div>

                <!-- Actions -->
                <div class="divider"></div>
                <div class="flex gap-12">
                  <button class="btn btn-primary" onclick="submitForm()">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:15px;height:15px">
                      <path d="M22 2L11 13" />
                      <path d="M22 2L15 22 11 13 2 9l20-7z" />
                    </svg>
                    Publier l'actualité
                  </button>
                  <button class="btn btn-outline" onclick="submitForm(1)">
                    Enregistrer comme brouillon
                  </button>
                  <a href="mes-actualites.php" class="btn btn-outline" style="margin-left:auto;color:var(--text-muted)">Annuler</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const navLink = document.getElementsByClassName('nav-link pub_act');
      if (navLink[0]) navLink[0].classList.add('active');
    });

    /* Theme toggle (déjà présent) */
    const toggle = document.getElementById('themeToggle');
    const icon = document.getElementById('themeIcon');
    let dark = true;
    toggle.addEventListener('click', () => {
      dark = !dark;
      document.documentElement.setAttribute('data-theme', dark ? 'dark' : 'light');
      icon.innerHTML = dark ? '<path d="M12 3v1M12 20v1M4.22 4.22l.7.7M18.36 18.36l.7.7M3 12H4M20 12h1M4.22 19.78l.7-.7M18.36 5.64l.7-.7M12 8a4 4 0 100 8 4 4 0 000-8z"/>' : '<path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>';
    });

    /* Upload zone click */
    document.querySelector('.upload-zone').addEventListener('click', () => {
      document.getElementById('imgInput').click();
    });

    /* AJAX Soumission */
    function submitForm(brouillon = 0) {
      const formData = new FormData();
      formData.append('titre', document.querySelector('input[name="title"]').value);
      formData.append('contenu', document.querySelector('textarea[name="contenu"]').value);
      formData.append('categorie', document.querySelector('select[name="categorie"]').value);
      formData.append('visibilité', document.querySelector('input[name="visibility"]:checked').value);
      formData.append('brouillon', brouillon);
      formData.append('image', document.getElementById('imgInput').files[0]);

      const btn = document.querySelector('.btn-primary');
      const originalText = btn.innerHTML;
      btn.innerHTML = '<span class="spinner"></span> Publication en cours...';
      btn.disabled = true;

      fetch('../assets/php/publier-actualite.php', {
          method: 'POST',
          body: formData
        })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            alert('Actualité publiée avec succès !');
            window.location.href = 'mes-actualites.php';
          } else {
            alert('Erreur : ' + data.message);
          }
        })
        .catch(err => {
          alert('Erreur de connexion : ' + err.message);
        })
        .finally(() => {
          btn.innerHTML = originalText;
          btn.disabled = false;
        });
    }

    /* Bouton Brouillon */
    document.querySelector('.btn-outline').addEventListener('click', () => {
      submitForm(1); // 1 = brouillon
    });

    /* Visibility hint */
    const hints = {
      'private': 'Visible uniquement par les étudiants de votre entité.',
      'public': 'Visible par tous les étudiants inscrits dans l\'université.'
    };
    document.querySelectorAll('.visibility-option').forEach(radio => {
      radio.addEventListener('change', () => {
        document.getElementById('visHint').textContent = hints[radio.value];
      });
    });
  </script>
</body>

</html>
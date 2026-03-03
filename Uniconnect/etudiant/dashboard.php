<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UniConnect — Tableau de bord</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Fraunces:ital,opsz,wght@0,9..144,700;1,9..144,400&display=swap" rel="stylesheet" />
  <link rel="icon" href="../assets/img/logo.png" type="image/png"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/student.css" />
</head>

<body>

  <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>
  <div class="toast" id="toast">✅ <span id="toastMsg"></span></div>

  <div class="shell">

    <!-- SIDEBAR -->
    <?php include '../includes/sidebar-etu.php' ?>

    <!-- MAIN -->
    <div class="main-wrap">
      <header class="header">
        <button class="header-hamburger" onclick="openSidebar()"><span></span><span></span><span></span></button>
        <div class="header-welcome">Bonjour, Raphael 👋 <span>Tableau de bord</span></div>
        <a href="profil.php" class="header-avatar">RB</a>
      </header>

      <div class="content">
        <div class="page-title">Tableau de bord</div>
        <div class="page-sub">Bienvenue sur votre espace UniConnect, Raphael</div>

        <!-- Stats -->
        <div class="grid-4" style="margin-bottom:24px">
          <div class="stat-card">
            <div class="stat-icon stat-icon-blue"><i class="fa fa-newspaper"></i></div>
            <div>
              <div class="stat-num">8</div>
              <div class="stat-label">Actualités non lues</div>
              <div class="stat-trend" style="color:var(--green)">↑ +2 aujourd'hui</div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-icon stat-icon-green"><i class="fa fa-book"></i></div>
            <div>
              <div class="stat-num">23</div>
              <div class="stat-label">Épreuves disponibles</div>
              <div class="stat-trend" style="color:var(--blue)">3 nouvelles ce mois</div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-icon stat-icon-purple"><i class="fa fa-calendar"></i></div>
            <div>
              <div class="stat-num">4</div>
              <div class="stat-label">Cours aujourd'hui</div>
              <div class="stat-trend" style="color:var(--amber)">Prochain à 08h00</div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-icon stat-icon-orange"><i class="fa fa-envelope"></i></div>
            <div>
              <div class="stat-num">2</div>
              <div class="stat-label">Messages non lus</div>
              <div class="stat-trend" style="color:var(--orange)">1 urgent</div>
            </div>
          </div>
        </div>

        <div class="grid-main-side">
          <div style="display:flex;flex-direction:column;gap:20px">
            <!-- IFRI -->
            <div class="card">
              <div class="section-hd">
                <h3>🔒 Mon école — IFRI <span class="badge badge-priv" style="margin-left:6px">Privé</span></h3>
                <a class="section-link" href="actualites.php">Voir tout →</a>
              </div>
              <div style="display:flex;flex-direction:column;gap:10px">
                <a href="actualites.php" class="news-card priv" style="text-decoration:none">
                  <div class="news-card-meta"><span class="badge badge-priv">🔒 IFRI</span><span class="news-card-time">Il y a 1h</span></div>
                  <h4>Emploi du temps — Semaine 8 mis à jour</h4>
                  <p>Des modifications ont été apportées au planning. Vérifiez les nouvelles salles pour les TD d'Algorithmique et de Base de données.</p>
                </a>
                <a href="actualites.php" class="news-card priv" style="text-decoration:none">
                  <div class="news-card-meta"><span class="badge badge-priv">🔒 IFRI</span><span class="news-card-time">Hier</span></div>
                  <h4>Examen de Programmation C — Rappel important</h4>
                  <p>L'examen du 26 février aura lieu en Amphi B à 10h00. Documents : aucun. Calculatrice non autorisée.</p>
                </a>
              </div>
            </div>

            <!-- Faculté de Droits -->
            <div class="card">
              <div class="section-hd">
                <h3>🔒 Ma faculté — Fac. de Droits <span class="badge badge-priv" style="margin-left:6px">Privé</span></h3>
                <a class="section-link" href="actualites.php">Voir tout →</a>
              </div>
              <div style="display:flex;flex-direction:column;gap:10px">
                <a href="actualites.php" class="news-card priv" style="text-decoration:none">
                  <div class="news-card-meta"><span class="badge badge-priv">🔒 Faculté de Droits</span><span class="news-card-time">2 jours</span></div>
                  <h4>Introduction au droit civil — Nouveau TD</h4>
                  <p>Un TD de rattrapage est planifié le vendredi 28 février à 14h00 en Salle 12. Présence obligatoire pour les L1.</p>
                </a>
              </div>
            </div>
            
          </div>

          <!-- Right side -->
          <div style="display:flex;flex-direction:column;gap:16px">
            <!-- Programme du jour -->
            <div class="card">
              <h3 style="font-size:14px;font-weight:700;margin-bottom:12px">📅 Aujourd'hui</h3>
              <div class="sched-item">
                <div class="sched-time">08h00</div>
                <div class="sched-bar sched-bar-green"></div>
                <div class="sched-content">
                  <h5>Algorithmique I <span class="sched-type sched-type-cours">Cours</span></h5>
                  <p>Amphi 1 · M. Koffi</p>
                </div>
              </div>
              <div class="sched-item">
                <div class="sched-time">10h00</div>
                <div class="sched-bar sched-bar-green"></div>
                <div class="sched-content">
                  <h5>Programmation C <span class="sched-type sched-type-td">TD</span></h5>
                  <p>Salle Info · Mme Dossou</p>
                </div>
              </div>
              <div class="sched-item">
                <div class="sched-time">14h00</div>
                <div class="sched-bar sched-bar-blue"></div>
                <div class="sched-content">
                  <h5>Introduction au Droit <span class="sched-type sched-type-cours">Cours</span></h5>
                  <p>Amphi Droit · M. Hounkpè</p>
                </div>
              </div>
              <div class="sched-item">
                <div class="sched-time">16h00</div>
                <div class="sched-bar sched-bar-purple"></div>
                <div class="sched-content">
                  <h5>Mathématiques <span class="sched-type sched-type-cours">Cours</span></h5>
                  <p>Salle B · M. Gbaguidi</p>
                </div>
              </div>
              <a href="programmes.php" class="btn btn-outline btn-sm" style="width:100%;margin-top:12px">Voir le programme →</a>
            </div>

            <!-- Accès rapides -->
            <div class="card">
              <h3 style="font-size:14px;font-weight:700;margin-bottom:12px">⚡ Accès rapides</h3>
              <div style="display:flex;flex-direction:column;gap:8px">
                <a href="epreuves.php" class="btn btn-ghost btn-sm" style="width:100%;justify-content:flex-start;gap:10px">📚 Télécharger une épreuve</a>
                <a href="mes-messages.php" class="btn btn-ghost btn-sm" style="width:100%;justify-content:flex-start;gap:10px">✉️ Mes messages <span class="nav-badge" style="margin-left:auto">2</span></a>
                <a href="contacter-universite.php" class="btn btn-ghost btn-sm" style="width:100%;justify-content:flex-start;gap:10px">💬 Contacter IFRI</a>
              </div>
            </div>

            <!-- Mon profil rapide -->
            <div class="card" style="background:var(--blue-light);border-color:var(--blue-bdr)">
              <div style="display:flex;align-items:center;gap:12px;margin-bottom:10px">
                <div style="width:42px;height:42px;border-radius:50%;background:linear-gradient(135deg,var(--blue),#7c84f7);display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:700;color:white;font-family:'Fraunces',serif">RB</div>
                <div>
                  <div style="font-weight:700;color:var(--text)">Raphael BIGNON</div>
                  <div style="font-size:12px;color:var(--text-soft)">raphaelbig@gmail.com</div>
                </div>
              </div>
              <div style="font-size:12.5px;color:var(--text-mid);line-height:1.8">
                🏛️ UAC — Université d'Abomey-Calavi<br>
                🏫 IFRI — L1 Informatique<br>
                ⚖️ Faculté de Droits — L1
              </div>
              <a href="profil.php" class="btn btn-outline btn-sm" style="width:100%;margin-top:12px">Voir mon profil →</a>
            </div>
          </div>
        </div>
      </div><!-- /content -->
    </div><!-- /main-wrap -->
  </div><!-- /shell -->

  <script>
    document.addEventListener('DOMContentLoaded', () => {
            const navLink = document.getElementsByClassName('nav-item dash');
            navLink[0].classList.add('active');
    });
    function openSidebar() {
      document.getElementById('sidebar').classList.add('mobile-open');
      document.getElementById('sidebarOverlay').classList.add('show');
      document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
      document.getElementById('sidebar').classList.remove('mobile-open');
      document.getElementById('sidebarOverlay').classList.remove('show');
      document.body.style.overflow = '';
    }
    let tt;

    function showToast(m) {
      const t = document.getElementById('toast');
      document.getElementById('toastMsg').textContent = m;
      t.classList.add('show');
      clearTimeout(tt);
      tt = setTimeout(() => t.classList.remove('show'), 3000);
    }
  </script>
</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UniConnect — Actualités</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Fraunces:ital,opsz,wght@0,9..144,700;1,9..144,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/student.css" />
  <link rel="icon" href="../assets/img/logo.png" type="image/png"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
        <div class="header-welcome">Bonjour, Raphael 👋 <span>Actualités</span></div>
        <a href="profil.php" class="header-avatar">RB</a>
      </header>

      <div class="content">
        <div class="page-title">Actualités</div>
        <div class="page-sub">Publications de vos établissements et partages d'autres universités</div>

        <!-- Tabs -->
        <div class="tab-strip">
          <button class="tab-strip-btn active" onclick="filterNews('all',this)">Toutes (8)</button>
          <button class="tab-strip-btn" onclick="filterNews('priv',this)"><i class="fa fa-lock"></i> IFRI &amp; Fac. Droits</button>
          <button class="tab-strip-btn" onclick="filterNews('share',this)"><i class="fa fa-globe"></i> Autres univs</button>
        </div>

        <div class="grid-main-side">
          <!-- Feed -->
          <div style="display:flex;flex-direction:column;gap:12px" id="newsFeed">

            <div class="news-card priv" data-type="priv">
              <div class="news-card-meta"><span class="badge badge-priv"><i class="fa fa-lock"></i> IFRI</span><span class="news-card-time">Il y a 1h</span><span class="badge badge-red"><i class="fa fa-exclamation-triangle"></i> Important</span></div>
              <h4>Emploi du temps — Semaine 8 modifié</h4>
              <p>Des modifications ont été apportées au planning de la semaine 8. La salle du TD d'Algorithmique passe en Salle Info 3, et le cours de Réseaux est déplacé au jeudi à 16h.</p>
              <div class="news-card-footer">
                <button class="news-action" onclick="showToast('👍 Réaction ajoutée')"><i class="fa fa-thumbs-up"></i> 12</button>
                <button class="news-action"><i class="fa fa-comment"></i> 4 commentaires</button>
                <button class="news-action" onclick="showToast('📤 Lien copié !')"><i class="fa fa-share-alt"></i> Partager</button>
              </div>
            </div>

            <div class="news-card priv" data-type="priv">
              <div class="news-card-meta"><span class="badge badge-priv"><i class="fa fa-lock"></i> IFRI</span><span class="news-card-time">Hier, 14h</span></div>
              <h4>Examen de Programmation C — Rappel</h4>
              <p>L'examen du 26 février aura lieu en Amphi B à 10h00. Aucun document autorisé. Durée : 2h. Le règlement de salle sera strict.</p>
              <div class="news-card-footer">
                <button class="news-action" onclick="showToast('👍 Réaction ajoutée')"><i class="fa fa-thumbs-up"></i> 45</button>
                <button class="news-action"><i class="fa fa-comment"></i> 11 commentaires</button>
                <button class="news-action" onclick="showToast('📤 Lien copié !')"><i class="fa fa-share-alt"></i> Partager</button>
              </div>
            </div>

            <div class="news-card priv" data-type="priv">
              <div class="news-card-meta"><span class="badge badge-priv"><i class="fa fa-lock"></i> IFRI</span><span class="news-card-time">Il y a 2 jours</span></div>
              <h4>Conférence : Intelligence Artificielle et Développement — IFRI</h4>
              <p>IFRI organise une conférence sur le thème « IA &amp; Développement en Afrique » le vendredi 28 février à 15h00 en Amphi IFRI. Intervenants : Pr. Akpovi (IMSP) et Dr. Sossou (INRAB). Entrée libre.</p>
              <div class="news-card-footer">
                <button class="news-action" onclick="showToast('👍 Réaction ajoutée')"><i class="fa fa-thumbs-up"></i> 78</button>
                <button class="news-action"><i class="fa fa-comment"></i> 19 commentaires</button>
                <button class="news-action" onclick="showToast('📤 Lien copié !')"><i class="fa fa-share-alt"></i> Partager</button>
              </div>
            </div>

            <div class="news-card priv" data-type="priv">
              <div class="news-card-meta"><span class="badge badge-priv"><i class="fa fa-lock"></i> Faculté de Droits</span><span class="news-card-time">Il y a 2 jours</span></div>
              <h4>TD de rattrapage — Introduction au Droit civil</h4>
              <p>Un TD de rattrapage est planifié le vendredi 28 février à 14h00 en Salle 12. Présence obligatoire pour tous les étudiants L1. Apportez votre cours et vos notes de TD.</p>
              <div class="news-card-footer">
                <button class="news-action" onclick="showToast('👍 Réaction ajoutée')"><i class="fa fa-thumbs-up"></i> 23</button>
                <button class="news-action"><i class="fa fa-comment"></i> 7 commentaires</button>
                <button class="news-action" onclick="showToast('📤 Lien copié !')"><i class="fa fa-share-alt"></i> Partager</button>
              </div>
            </div>

            <div class="news-card share" data-type="share">
              <div class="news-card-meta"><span class="badge badge-share">🔗 EPAC — UAC</span><span class="news-card-time">Il y a 4 jours</span></div>
              <h4>Offre de stage en développement web — Cabinet TechBénin</h4>
              <p>Stage de 2 mois proposé aux étudiants en L2/L3 Informatique. Rémunération : 35 000 FCFA/mois. Lieu : Cotonou. Candidatures jusqu'au 10 mars 2026.</p>
              <div class="news-card-footer">
                <button class="news-action" onclick="showToast('👍 Réaction ajoutée')"><i class="fa fa-thumbs-up"></i> 54</button>
                <button class="news-action"><i class="fa fa-comment"></i> 12 commentaires</button>
                <button class="news-action" onclick="showToast('📤 Lien copié !')"><i class="fa fa-share-alt"></i> Partager</button>
              </div>
            </div>

            <div class="news-card share" data-type="share">
              <div class="news-card-meta"><span class="badge badge-share">🔗 FSA — UAC</span><span class="news-card-time">Il y a 5 jours</span></div>
              <h4>Bourse d'excellence — Programme Africa Code Week</h4>
              <p>Africa Code Week offre des bourses de formation aux meilleurs étudiants en informatique. Critères : moyenne &gt; 14/20, lettre de motivation. Dépôt : avant le 28 février 2026.</p>
              <div class="news-card-footer">
                <button class="news-action" onclick="showToast('👍 Réaction ajoutée')"><i class="fa fa-thumbs-up"></i> 97</button>
                <button class="news-action"><i class="fa fa-comment"></i> 25 commentaires</button>
                <button class="news-action" onclick="showToast('📤 Lien copié !')"><i class="fa fa-share-alt"></i>  Partager</button>
              </div>
            </div>

            <div style="text-align:center;margin-top:8px">
              <button class="btn btn-ghost" style="width:100%" onclick="showToast('Chargement...')">Charger plus d'actualités ↓</button>
            </div>
          </div>

          <!-- Sidebar -->
          <div style="display:flex;flex-direction:column;gap:16px">
            <div class="card">
              <h3 style="font-size:14px;font-weight:700;margin-bottom:12px"><i class="fa fa-tags"></i> Catégories</h3>
              <div style="display:flex;flex-wrap:wrap;gap:6px">
                <span class="badge badge-red" style="cursor:pointer" onclick="showToast('Filtre : Examens')"><i class="fa fa-calendar"></i> Examens</span>
                <span class="badge badge-pub" style="cursor:pointer" onclick="showToast('Filtre : Cours')"><i class="fa fa-book"></i> Cours</span>
                <span class="badge badge-priv" style="cursor:pointer" onclick="showToast('Filtre : Événements')"><i class="fa fa-calendar-check"></i> Événements</span>
                <span class="badge badge-info" style="cursor:pointer" onclick="showToast('Filtre : Admin')"><i class="fa fa-building"></i> Administration</span>
                <span class="badge badge-share" style="cursor:pointer" onclick="showToast('Filtre : Stages')"><i class="fa fa-briefcase"></i> Stages &amp; Bourses</span>
              </div>
            </div>

            <div class="card">
              <h3 style="font-size:14px;font-weight:700;margin-bottom:12px"><i class="fa fa-signal"></i> Mes sources</h3>
              <div style="display:flex;flex-direction:column;gap:8px">
                <div style="display:flex;align-items:center;gap:8px;padding:8px;background:var(--bg-2);border-radius:var(--radius)">
                  <div style="font-size:18px"><i class="fa fa-graduation-cap"></i></div>
                  <div style="flex:1">
                    <div style="font-size:13px;font-weight:600">IFRI</div>
                    <div style="font-size:11px;color:var(--text-soft)">Accès privé · Vérifié</div>
                  </div>
                  <span class="badge badge-priv" style="font-size:10px">✓</span>
                </div>
                <div style="display:flex;align-items:center;gap:8px;padding:8px;background:var(--bg-2);border-radius:var(--radius)">
                  <div style="font-size:18px">⚖️</div>
                  <div style="flex:1">
                    <div style="font-size:13px;font-weight:600">Fac. de Droits</div>
                    <div style="font-size:11px;color:var(--text-soft)">Accès privé · Vérifié</div>
                  </div>
                  <span class="badge badge-priv" style="font-size:10px">✓</span>
                </div>
                <div style="display:flex;align-items:center;gap:8px;padding:8px;background:var(--bg-2);border-radius:var(--radius)">
                  <div style="font-size:18px"><i class="fa fa-building"></i></div>
                  <div style="flex:1">
                    <div style="font-size:13px;font-weight:600">UAC</div>
                    <div style="font-size:11px;color:var(--text-soft)">Publication publique</div>
                  </div>
                  <span class="badge badge-pub" style="font-size:10px">Public</span>
                </div>
              </div>
            </div>

            <div class="card" style="background:var(--amber-lt);border-color:rgba(218,170,63,0.35)">
              <div style="font-size:13px;font-weight:700;color:var(--amber);margin-bottom:6px"><i class="fa fa-exclamation-triangle"></i> Prochain examen</div>
              <div style="font-size:13.5px;font-weight:600;color:var(--text)">Programmation C</div>
              <div style="font-size:12px;color:var(--text-soft);margin-top:4px">26 fév. 2026 · 10h00 · Amphi B</div>
              <div style="font-size:12px;color:var(--amber);margin-top:6px;font-weight:600">Dans 5 jours</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
            const navLink = document.getElementsByClassName('nav-item act');
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

    function filterNews(type, btn) {
      document.querySelectorAll('.tab-strip-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      document.querySelectorAll('#newsFeed [data-type]').forEach(card => {
        card.style.display = (type === 'all' || card.dataset.type === type) ? '' : 'none';
      });
    }
  </script>
</body>

</html>
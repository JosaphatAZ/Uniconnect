<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UniConnect — Épreuves &amp; Cours</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Fraunces:ital,opsz,wght@0,9..144,700;1,9..144,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/student.css" />
  <link rel="icon" href="../assets/img/logo.png" type="image/png"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    .prof-card {
      background: var(--bg-2);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 12px;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .prof-avatar {
      width: 46px;
      height: 46px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--blue), var(--purple));
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      font-weight: 700;
      color: white;
      font-family: 'Fraunces', serif;
      flex-shrink: 0;
    }

    .resource-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 14px;
      background: var(--bg-2);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      margin-bottom: 8px;
      transition: border-color .2s;
    }

    .resource-row:hover {
      border-color: var(--blue-bdr);
    }

    .resource-icon {
      width: 38px;
      height: 38px;
      border-radius: var(--radius);
      background: var(--blue-pale);
      border: 1px solid var(--blue-bdr);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      flex-shrink: 0;
    }
  </style>
</head>

<body>
  <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>
  <div class="toast" id="toast">✅ <span id="toastMsg"></span></div>

  <div class="shell">
    <?php include '../includes/sidebar-etu.php' ?>

    <div class="main-wrap">
      <header class="header">
        <button class="header-hamburger" onclick="openSidebar()"><span></span><span></span><span></span></button>
        <div class="header-welcome">Bonjour, Raphael 👋 <span>Épreuves &amp; Cours</span></div>
        <a href="profil.php" class="header-avatar">RB</a>
      </header>

      <div class="content">
        <div class="page-title">Épreuves &amp; Cours</div>
        <div class="page-sub">Annales, cours, exercices et informations sur vos enseignants</div>

        <div class="tab-strip">
          <button class="tab-strip-btn active" onclick="switchTab('epreuves',this)"><i class="fa fa-file-alt"></i> Épreuves / Annales</button>
          <button class="tab-strip-btn" onclick="switchTab('cours',this)"><i class="fa fa-book"></i> Cours &amp; Exercices</button>
        </div>

        <!-- TAB: ÉPREUVES -->
        <div id="tab-epreuves">
          <div class="filter-bar">
            <input class="filter-input" type="text" placeholder=" Rechercher par matière..." style="flex:1;min-width:150px" />
            <select class="filter-select">
              <option>Toutes matières</option>
              <option>Algorithmique</option>
              <option>Programmation C</option>
              <option>Réseaux</option>
              <option>Droit civil</option>
              <option>Mathématiques</option>
            </select>
            <select class="filter-select">
              <option>Toutes années</option>
              <option>2025–2026</option>
              <option>2024–2025</option>
              <option>2023–2024</option>
            </select>
            <select class="filter-select">
              <option>Tous types</option>
              <option>Partiel</option>
              <option>Final</option>
              <option>Rattrapage</option>
              <option>TP noté</option>
            </select>
            <button class="btn btn-primary btn-sm">Appliquer</button>
          </div>

          <div style="font-size:13.5px;color:var(--text-soft);margin-bottom:16px"><i class="fa fa-info-circle"></i> <strong style="color:var(--text)">23 épreuves</strong> trouvées pour votre niveau</div>

          <div class="grid-3">
            <!-- Exam card 1 -->
            <div class="exam-card">
              <div class="news-card-meta" style="margin-bottom:0"><span class="badge badge-priv"><i class="fa fa-lock"></i> IFRI</span></div>
              <div class="exam-subject">Algorithmique I</div>
              <div class="exam-meta">
                <span class="exam-tag"><i class="fa fa-calendar"></i> 2025</span><span class="exam-tag">S1</span>
                <span class="exam-tag" style="background:var(--amber-lt);color:var(--amber);border-color:rgba(218,170,63,.3)">Partiel</span>
              
              </div>
              <div class="exam-stats"><span><i class="fa fa-download"></i> 187 téléch.</span><span><i class="fa fa-file"></i> 1.4 MB</span></div>
              <div class="progress">
                <div class="progress-fill" style="width:72%"></div>
              </div>
              
              <div style="display:flex;gap:8px">
                <button class="btn btn-ghost btn-sm" onclick="showToast('Aperçu en cours...')"><i class="fa fa-eye"></i> Aperçu</button>
                <button class="btn btn-primary btn-sm" style="flex:1" onclick="showToast('📥 Téléchargement démarré !')">⬇ PDF</button>
              </div>
            </div>

            <!-- Exam card 2 -->
            <div class="exam-card">
              <div class="news-card-meta" style="margin-bottom:0"><span class="badge badge-priv"><i class="fa fa-lock"></i> IFRI</span></div>
              <div class="exam-subject">Programmation C</div>
              <div class="exam-meta">
                <span class="exam-tag"><i class="fa fa-calendar"></i> 2025</span><span class="exam-tag">S1</span>
                <span class="exam-tag" style="background:var(--red-lt);color:var(--red);border-color:var(--red-bdr)">Final</span>
              
              </div>
              <div class="exam-stats"><span><i class="fa fa-download"></i> 312 téléch.</span><span><i class="fa fa-file"></i> 2.1 MB</span></div>
              <div class="progress">
                <div class="progress-fill" style="width:88%"></div>
              </div>
              
              <div style="display:flex;gap:8px">
                <button class="btn btn-ghost btn-sm" onclick="showToast('Aperçu en cours...')"><i class="fa fa-eye"></i> Aperçu</button>
                <button class="btn btn-primary btn-sm" style="flex:1" onclick="showToast('📥 Téléchargement démarré !')">⬇ PDF</button>
              </div>
            </div>

            <!-- Exam card 3 -->
            <div class="exam-card">
              <div class="news-card-meta" style="margin-bottom:0"><span class="badge badge-priv"><i class="fa fa-lock"></i> IFRI</span></div>
              <div class="exam-subject">Réseaux Informatiques</div>
              <div class="exam-meta">
                <span class="exam-tag"><i class="fa fa-calendar"></i> 2024</span><span class="exam-tag">S2</span>
                <span class="exam-tag" style="background:var(--amber-lt);color:var(--amber);border-color:rgba(218,170,63,.3)">Partiel</span>
              
              </div>
              <div class="exam-stats"><span><i class="fa fa-download"></i> 98 téléch.</span><span><i class="fa fa-file"></i> 1.8 MB</span></div>
              <div class="progress">
                <div class="progress-fill" style="width:38%"></div>
              </div>
              
              <div style="display:flex;gap:8px">
                <button class="btn btn-ghost btn-sm" onclick="showToast('Aperçu en cours...')"><i class="fa fa-eye"></i> Aperçu</button>
                <button class="btn btn-primary btn-sm" style="flex:1" onclick="showToast('📥 Téléchargement démarré !')">⬇ PDF</button>
              </div>
            </div>

            <!-- Exam card 4 -->
            <div class="exam-card">
              <div class="news-card-meta" style="margin-bottom:0"><span class="badge badge-priv"><i class="fa fa-lock"></i> Faculté de Droits</span></div>
              <div class="exam-subject">Introduction au Droit civil</div>
              <div class="exam-meta">
                <span class="exam-tag"><i class="fa fa-calendar"></i> 2025</span><span class="exam-tag">S1</span>
                <span class="exam-tag" style="background:var(--red-lt);color:var(--red);border-color:var(--red-bdr)">Final</span>
              
              </div>
              <div class="exam-stats"><span><i class="fa fa-download"></i> 241 téléch.</span><span><i class="fa fa-file"></i> 2.3 MB</span></div>
              <div class="progress">
                <div class="progress-fill" style="width:61%"></div>
              </div>
  
              <div style="display:flex;gap:8px">
                <button class="btn btn-ghost btn-sm" onclick="showToast('Aperçu en cours...')"><i class="fa fa-eye"></i> Aperçu</button>
                <button class="btn btn-primary btn-sm" style="flex:1" onclick="showToast('📥 Téléchargement démarré !')">⬇ PDF</button>
              </div>
            </div>

            <!--Exam card 5-->
            <div class="exam-card">
              <div class="news-card-meta" style="margin-bottom:0"><span class="badge badge-pub"><i class="fa fa-university"></i> UAC</span></div>
              <div class="exam-subject">Mathématiques générales</div>
              <div class="exam-meta">
                <span class="exam-tag"><i class="fa fa-calendar"></i> 2024</span><span class="exam-tag">S1</span>
                <span class="exam-tag" style="background:var(--green-lt);color:var(--green);border-color:var(--green-bdr)">Rattrapage</span>
                
              </div>
              <div class="exam-stats"><span><i class="fa fa-download"></i> 456 téléch.</span><span><i class="fa fa-file"></i> 1.2 MB</span></div>
              <div class="progress">
                <div class="progress-fill" style="width:94%"></div>
              </div>
          
              <div style="display:flex;gap:8px">
                <button class="btn btn-ghost btn-sm" onclick="showToast('Aperçu en cours...')"><i class="fa fa-eye"></i> Aperçu</button>
                <button class="btn btn-primary btn-sm" style="flex:1" onclick="showToast('📥 Téléchargement démarré !')">⬇ PDF</button>
              </div>
            </div>

            <!--Exam card 6 -->
            <div class="exam-card">
              <div class="news-card-meta" style="margin-bottom:0"><span class="badge badge-priv"><i class="fa fa-lock"></i> IFRI</span></div>
              <div class="exam-subject">Base de données</div>
              <div class="exam-meta">
                <span class="exam-tag"><i class="fa fa-calendar"></i> 2024</span><span class="exam-tag">S2</span>
                <span class="exam-tag" style="background:var(--amber-lt);color:var(--amber);border-color:rgba(218,170,63,.3)">TP noté</span>
             
              </div>
              <div class="exam-stats"><span><i class="fa fa-download"></i> 134 téléch.</span><span><i class="fa fa-file"></i> 0.9 MB</span></div>
              <div class="progress">
                <div class="progress-fill" style="width:49%"></div>
              </div>
              
              <div style="display:flex;gap:8px">
                <button class="btn btn-ghost btn-sm" onclick="showToast('Aperçu en cours...')"><i class="fa fa-eye"></i> Aperçu</button>
                <button class="btn btn-primary btn-sm" style="flex:1" onclick="showToast('📥 Téléchargement démarré !')">⬇ PDF</button>
              </div>
            </div> 
          </div>

          <div class="pagination">
            <button class="page-btn">‹</button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn">›</button>
          </div>
        </div>

        <!-- TAB: COURS & EXERCICES -->
        <div id="tab-cours" style="display:none">
          <div style="margin-bottom:16px;display:flex;gap:10px;flex-wrap:wrap">
            <select class="filter-select">
              <option>Toutes matières</option>
              <option>Algorithmique</option>
              <option>Programmation C</option>
              <option>Réseaux</option>
              <option>Droit civil</option>
            </select>
            <select class="filter-select">
              <option>Tous types</option>
              <option>Cours magistral</option>
              <option>TD</option>
              <option>TP</option>
              <option>Exercices</option>
              <option>Correction</option>
            </select>
          </div>

          <div style="display:flex;flex-direction:column;gap:8px">
            <div class="resource-row">
              <div class="resource-icon"><i class="fa fa-book"></i></div>
              <div style="flex:1;padding:0 12px">
                <div style="font-size:13.5px;font-weight:700;color:var(--text)">Algorithmique I — Cours Complet S1</div>
                <div style="font-size:12px;color:var(--text-soft)">M. Adjovi Koffi · IFRI · Mis à jour : Jan. 2026 · 4.2 MB</div>
              </div>
              <div style="display:flex;gap:8px;align-items:center">
                <span class="badge badge-priv"><i class="fa fa-lock"></i> IFRI</span>
                <button class="btn btn-primary btn-sm" onclick="showToast('📥 Téléchargement du cours...')">⬇ PDF</button>
              </div>
            </div>

            <div class="resource-row">
              <div class="resource-icon"><i class="fa fa-file-alt"></i></div>
              <div style="flex:1;padding:0 12px">
                <div style="font-size:13.5px;font-weight:700;color:var(--text)">TD Algorithmique — Série 1 à 5 avec corrections</div>
                <div style="font-size:12px;color:var(--text-soft)">M. Adjovi Koffi · IFRI · Fév. 2026 · 1.8 MB</div>
              </div>
              <div style="display:flex;gap:8px;align-items:center">
                <span class="badge badge-priv"><i class="fa fa-lock"></i> IFRI</span>
                <button class="btn btn-primary btn-sm" onclick="showToast('📥 Téléchargement...')">⬇ PDF</button>
              </div>
            </div>

            <div class="resource-row">
              <div class="resource-icon"><i class="fa fa-laptop"></i></div>
              <div style="flex:1;padding:0 12px">
                <div style="font-size:13.5px;font-weight:700;color:var(--text)">TP Programmation C — Exercices pratiques</div>
                <div style="font-size:12px;color:var(--text-soft)">Mme Dossou · IFRI · Jan. 2026 · 2.3 MB</div>
              </div>
              <div style="display:flex;gap:8px;align-items:center">
                <span class="badge badge-priv"><i class="fa fa-lock"></i> IFRI</span>
                <button class="btn btn-primary btn-sm" onclick="showToast('📥 Téléchargement...')">⬇ PDF</button>
              </div>
            </div>

            <div class="resource-row">
              <div class="resource-icon"><i class="fa fa-balance-scale"></i></div>
              <div style="flex:1;padding:0 12px">
                <div style="font-size:13.5px;font-weight:700;color:var(--text)">Introduction au Droit civil — Polycopié L1</div>
                <div style="font-size:12px;color:var(--text-soft)">M. Hounkpè · Fac. Droits · Déc. 2025 · 3.6 MB</div>
              </div>
              <div style="display:flex;gap:8px;align-items:center">
                <span class="badge badge-priv"><i class="fa fa-lock"></i> Fac. Droits</span>
                <button class="btn btn-primary btn-sm" onclick="showToast('📥 Téléchargement...')">⬇ PDF</button>
              </div>
            </div>

            <div class="resource-row">
              <div class="resource-icon"><i class="fa fa-calculator"></i></div>
              <div style="flex:1;padding:0 12px">
                <div style="font-size:13.5px;font-weight:700;color:var(--text)">Mathématiques générales — Exercices corrigés</div>
                <div style="font-size:12px;color:var(--text-soft)">M. Gbaguidi · UAC · Oct. 2025 · 2.0 MB</div>
              </div>
              <div style="display:flex;gap:8px;align-items:center">
                <span class="badge badge-pub"><i class="fa fa-globe"></i> UAC</span>
                <button class="btn btn-primary btn-sm" onclick="showToast('📥 Téléchargement...')">⬇ PDF</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
            const navLink = document.getElementsByClassName('nav-item epr');
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

    function switchTab(tab, btn) {
      ['epreuves', 'cours', 'profs'].forEach(t => {
        document.getElementById('tab-' + t).style.display = t === tab ? '' : 'none';
      });
      document.querySelectorAll('.tab-strip-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    }

    document.querySelectorAll('.page-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        if (this.textContent === '‹' || this.textContent === '›') return;
        this.closest('.pagination').querySelectorAll('.page-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
      });
    });
  </script>
</body>

</html>
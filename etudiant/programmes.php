<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UniConnect — Programme</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Fraunces:ital,opsz,wght@0,9..144,700;1,9..144,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/student.css" />
  <link rel="icon" href="assets/img/logo.png" type="image/png"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
  <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>
  <div class="toast" id="toast">✅ <span id="toastMsg"></span></div>
  <div class="shell">
    <?php include '../includes/sidebar-etu.php' ?>

    <div class="main-wrap">
      <header class="header">
        <button class="header-hamburger" onclick="openSidebar()"><span></span><span></span><span></span></button>
        <div class="header-welcome">Bonjour, Raphael 👋 <span>Programme / Emploi du temps</span></div>
        <a href="profil.php" class="header-avatar">RB</a>
      </header>

      <div class="content">
        <div class="page-title">Programme</div>
        <div class="page-sub">Emploi du temps de la semaine — L1 IFRI &amp; Faculté de Droits, UAC</div>

        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;flex-wrap:wrap;gap:10px">
          <div style="display:flex;align-items:center;gap:10px">
            <button class="btn btn-ghost btn-sm" onclick="showToast('Semaine précédente')">‹ Précédent</button>
            <span style="font-size:15px;font-weight:700;color:var(--text)">Semaine du 17 au 21 Fév. 2026</span>
            <button class="btn btn-ghost btn-sm" onclick="showToast('Semaine suivante')">Suivant ›</button>
          </div>
          <div style="display:flex;gap:8px">
            <button class="btn btn-outline btn-sm" onclick="showToast('Vue : Aujourd\'hui')">Aujourd'hui</button>
            <button class="btn btn-ghost btn-sm" onclick="showToast('Export PDF...')"><i class="fa fa-file-pdf"></i> Exporter PDF</button>
          </div>
        </div>

        <div class="tab-strip" style="margin-bottom:16px">
          <button class="tab-strip-btn" onclick="setTab(this)">Jour</button>
          <button class="tab-strip-btn active" onclick="setTab(this)">Semaine</button>
          <button class="tab-strip-btn" onclick="setTab(this)">Mois</button>
        </div>

        <!-- Grid semaine -->
        <div style="overflow-x:auto;margin-bottom:24px">
          <div class="sched-week" style="min-width:700px">
            <!-- Header -->
            <div class="sched-header-cell" style="font-size:11px;color:var(--text-soft)">Heure</div>
            <div class="sched-header-cell today">Lun 17</div>
            <div class="sched-header-cell">Mar 18</div>
            <div class="sched-header-cell">Mer 19</div>
            <div class="sched-header-cell">Jeu 20</div>
            <div class="sched-header-cell">Ven 21</div>

            <!-- 8h -->
            <div class="sched-time-col">8h</div>
            <div class="sched-cell">
              <div class="sched-event sched-ev-green">Algorithmique I<br><span style="font-weight:400;font-size:10px">Amphi 1 · M. Koffi</span></div>
            </div>
            <div class="sched-cell"></div>
            <div class="sched-cell">
              <div class="sched-event sched-ev-green">Algorithmique I<br><span style="font-weight:400;font-size:10px">Amphi 1 · M. Koffi</span></div>
            </div>
            <div class="sched-cell"></div>
            <div class="sched-cell"></div>

            <!-- 10h -->
            <div class="sched-time-col">10h</div>
            <div class="sched-cell">
              <div class="sched-event sched-ev-green">Programmation C<br><span style="font-weight:400;font-size:10px">Salle Info · Mme Dossou</span></div>
            </div>
            <div class="sched-cell">
              <div class="sched-event sched-ev-green">Réseaux Info.<br><span style="font-weight:400;font-size:10px">Salle Info 2 · M. Hounguè</span></div>
            </div>
            <div class="sched-cell"></div>
            <div class="sched-cell">
              <div class="sched-event sched-ev-green">Prog. C — TD<br><span style="font-weight:400;font-size:10px">Salle Info · Mme Dossou</span></div>
            </div>
            <div class="sched-cell"></div>

            <!-- 12h -->
            <div class="sched-time-col">12h</div>
            <div class="sched-cell"></div>
            <div class="sched-cell"></div>
            <div class="sched-cell"></div>
            <div class="sched-cell"></div>
            <div class="sched-cell"></div>

            <!-- 14h -->
            <div class="sched-time-col">14h</div>
            <div class="sched-cell">
              <div class="sched-event sched-ev-blue">Intro au Droit<br><span style="font-weight:400;font-size:10px">Amphi Droit · M. Hounkpè</span></div>
            </div>
            <div class="sched-cell"></div>
            <div class="sched-cell">
              <div class="sched-event sched-ev-blue">Droit civil — TD<br><span style="font-weight:400;font-size:10px">Salle 12 · M. Hounkpè</span></div>
            </div>
            <div class="sched-cell">
              <div class="sched-event sched-ev-blue">Intro au Droit<br><span style="font-weight:400;font-size:10px">Amphi Droit · M. Hounkpè</span></div>
            </div>
            <div class="sched-cell">
              <div class="sched-event sched-ev-red">⚠️ Examen Prog. C<br><span style="font-weight:400;font-size:10px">Amphi B — 2h</span></div>
            </div>

            <!-- 16h -->
            <div class="sched-time-col">16h</div>
            <div class="sched-cell">
              <div class="sched-event sched-ev-purple">Mathématiques<br><span style="font-weight:400;font-size:10px">Salle B · M. Gbaguidi</span></div>
            </div>
            <div class="sched-cell">
              <div class="sched-event sched-ev-green">Algo. I — TD<br><span style="font-weight:400;font-size:10px">Salle Info 3 · M. Koffi</span></div>
            </div>
            <div class="sched-cell"></div>
            <div class="sched-cell">
              <div class="sched-event sched-ev-purple">Mathématiques<br><span style="font-weight:400;font-size:10px">Salle B · M. Gbaguidi</span></div>
            </div>
            <div class="sched-cell"></div>
          </div>
        </div>

        <!-- Légende -->
        <div style="display:flex;gap:16px;margin-bottom:24px;flex-wrap:wrap">
          <span style="font-size:12.5px;color:var(--text-soft)">Légende :</span>
          <span style="display:flex;align-items:center;gap:6px;font-size:12.5px"><span style="width:12px;height:12px;border-radius:3px;background:var(--green);display:inline-block"></span>🔒 IFRI</span>
          <span style="display:flex;align-items:center;gap:6px;font-size:12.5px"><span style="width:12px;height:12px;border-radius:3px;background:var(--blue);display:inline-block"></span>🔒 Faculté de Droits</span>
          <span style="display:flex;align-items:center;gap:6px;font-size:12.5px"><span style="width:12px;height:12px;border-radius:3px;background:var(--purple);display:inline-block"></span>🌐 UAC commun</span>
          <span style="display:flex;align-items:center;gap:6px;font-size:12.5px"><span style="width:12px;height:12px;border-radius:3px;background:var(--red);display:inline-block;margin-right:6px"></span>⚠️ Examen</span>
        </div>

        <!-- Programme de la semaine — liste -->
        <div class="grid-2">
          <div class="card">
            <h3 style="font-size:14.5px;font-weight:700;margin-bottom:16px">📋 Récap — IFRI (L1 Info)</h3>
            <div class="sched-item">
              <div class="sched-time">Lun 8h</div>
              <div class="sched-bar sched-bar-green"></div>
              <div class="sched-content">
                <h5>Algorithmique I <span class="sched-type sched-type-cours">CM</span></h5>
                <p>Amphi 1 · M. Koffi · 2h</p>
              </div>
            </div>
            <div class="sched-item">
              <div class="sched-time">Lun 10h</div>
              <div class="sched-bar sched-bar-green"></div>
              <div class="sched-content">
                <h5>Programmation C <span class="sched-type sched-type-td">TD</span></h5>
                <p>Salle Info · Mme Dossou · 2h</p>
              </div>
            </div>
            <div class="sched-item">
              <div class="sched-time">Mar 10h</div>
              <div class="sched-bar sched-bar-green"></div>
              <div class="sched-content">
                <h5>Réseaux Informatiques <span class="sched-type sched-type-cours">CM</span></h5>
                <p>Salle Info 2 · M. Hounguè · 2h</p>
              </div>
            </div>
            <div class="sched-item">
              <div class="sched-time">Mar 16h</div>
              <div class="sched-bar sched-bar-green"></div>
              <div class="sched-content">
                <h5>Algorithmique I <span class="sched-type sched-type-td">TD</span></h5>
                <p>Salle Info 3 · M. Koffi · 2h</p>
              </div>
            </div>
            <div class="sched-item">
              <div class="sched-time">Mer 8h</div>
              <div class="sched-bar sched-bar-green"></div>
              <div class="sched-content">
                <h5>Algorithmique I <span class="sched-type sched-type-cours">CM</span></h5>
                <p>Amphi 1 · M. Koffi · 2h</p>
              </div>
            </div>
            <div class="sched-item">
              <div class="sched-time">Jeu 10h</div>
              <div class="sched-bar sched-bar-green"></div>
              <div class="sched-content">
                <h5>Programmation C <span class="sched-type sched-type-td">TD</span></h5>
                <p>Salle Info · Mme Dossou · 2h</p>
              </div>
            </div>
            <div class="sched-item">
              <div class="sched-time">Ven 14h</div>
              <div class="sched-bar" style="background:var(--red)"></div>
              <div class="sched-content">
                <h5>⚠️ Examen Programmation C <span class="sched-type sched-type-exam">Examen</span></h5>
                <p>Amphi B · Durée : 2h · Aucun doc.</p>
              </div>
            </div>
          </div>

          <div class="card">
            <h3 style="font-size:14.5px;font-weight:700;margin-bottom:16px">📋 Récap — Faculté de Droits (L1)</h3>
            <div class="sched-item">
              <div class="sched-time">Lun 14h</div>
              <div class="sched-bar sched-bar-blue"></div>
              <div class="sched-content">
                <h5>Introduction au Droit <span class="sched-type sched-type-cours">CM</span></h5>
                <p>Amphi Droit · M. Hounkpè · 2h</p>
              </div>
            </div>
            <div class="sched-item">
              <div class="sched-time">Mer 14h</div>
              <div class="sched-bar sched-bar-blue"></div>
              <div class="sched-content">
                <h5>Droit civil <span class="sched-type sched-type-td">TD</span></h5>
                <p>Salle 12 · M. Hounkpè · 2h</p>
              </div>
            </div>
            <div class="sched-item">
              <div class="sched-time">Jeu 14h</div>
              <div class="sched-bar sched-bar-blue"></div>
              <div class="sched-content">
                <h5>Introduction au Droit <span class="sched-type sched-type-cours">CM</span></h5>
                <p>Amphi Droit · M. Hounkpè · 2h</p>
              </div>
            </div>
            <div style="margin-top:16px;padding:12px;background:var(--amber-lt);border:1px solid rgba(218,170,63,.3);border-radius:var(--radius)">
              <div style="font-size:12.5px;font-weight:700;color:var(--amber);margin-bottom:4px">⚠️ Rappel important</div>
              <div style="font-size:12.5px;color:var(--text-mid)">TD de rattrapage Droit civil : Ven 28 fév., 14h, Salle 12. Présence obligatoire.</div>
            </div>

            <h3 style="font-size:14.5px;font-weight:700;margin-bottom:12px;margin-top:20px">🔢 Mathématiques — UAC (Commun)</h3>
            <div class="sched-item">
              <div class="sched-time">Lun 16h</div>
              <div class="sched-bar sched-bar-purple"></div>
              <div class="sched-content">
                <h5>Mathématiques générales <span class="sched-type sched-type-cours">CM</span></h5>
                <p>Salle B · M. Gbaguidi · 2h</p>
              </div>
            </div>
            <div class="sched-item">
              <div class="sched-time">Jeu 16h</div>
              <div class="sched-bar sched-bar-purple"></div>
              <div class="sched-content">
                <h5>Mathématiques générales <span class="sched-type sched-type-td">TD</span></h5>
                <p>Salle B · M. Gbaguidi · 2h</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
            const navLink = document.getElementsByClassName('nav-item prog');
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

    function setTab(btn) {
      document.querySelectorAll('.tab-strip-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    }
  </script>
</body>

</html>
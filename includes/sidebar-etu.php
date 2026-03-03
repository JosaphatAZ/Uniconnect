<nav class="sidebar" id="sidebar">
      <button class="mobile-close-btn" onclick="closeSidebar()">✕</button>
      <div class="sidebar-logo">
        <div class="sidebar-logo-icon"><img src="../assets/img/logo.png" width="100%" style="border-radius: 10px;"></div>
        <span class="sidebar-logo-text">UniConnect</span>
      </div>
      <div class="sidebar-user">
        <div class="user-avatar">RB</div>
        <div class="user-info">
          <div class="user-name">Raphael BIGNON</div>
          <div class="user-school">UAC · IFRI / Faculté de Droits</div>
          <span class="user-level">L1</span>
        </div>
      </div>
      <div class="sidebar-nav">
        <div class="nav-section-label">Principal</div>
        <a class="nav-item dash" href="dashboard.php"><span class="nav-icon"><i class="fa fa-chart-line"></i></span> Tableau de bord</a>
        <a class="nav-item act" href="actualites.php"><span class="nav-icon"><i class="fa fa-newspaper"></i></span> Actualités <span class="nav-badge">8</span></a>
        <a class="nav-item epr" href="epreuves.php"><span class="nav-icon"><i class="fa fa-book"></i></span> Épreuves &amp; Cours</a>
        <a class="nav-item prog" href="programmes.php"><span class="nav-icon"><i class="fa fa-calendar"></i></span> Programme</a>
        <!-- <a class="nav-item" href="mes-messages.php"><span class="nav-icon"><i class="fa fa-envelope"></i></span> Mes messages <span class="nav-badge">2</span></a> -->
        <div class="nav-section-label" style="margin-top:6px">Mon compte</div>
        <!-- <a class="nav-item" href="contacter-universite.php"><span class="nav-icon"><i class="fa fa-comment"></i></span> Contacter l'université</a> -->
        <a class="nav-item pro" href="profil.php"><span class="nav-icon"><i class="fa fa-user"></i></span> Mon profil</a>
      </div>
      <div class="sidebar-bottom">
        <a href="../" class="nav-item logout" onclick="showToast('À bientôt Raphael ! 👋')"><span class="nav-icon"><i class="fa fa-sign-out"></i></span> Déconnexion</a>
      </div>
</nav>
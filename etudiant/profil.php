<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UniConnect — Mon Profil</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Fraunces:ital,opsz,wght@0,9..144,700;1,9..144,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/student.css" />
  <link rel="icon" href="assets/img/logo.png" type="image/png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    .school-item {
      background: var(--bg-2);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 14px 16px;
      display: flex;
      align-items: center;
      gap: 14px;
      transition: border-color .2s;
    }

    .school-item:hover {
      border-color: var(--blue-bdr);
    }

    .school-icon {
      width: 42px;
      height: 42px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      flex-shrink: 0;
    }

    .plan-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 20px;
      text-align: center;
      transition: border-color .2s, transform .2s;
    }

    .plan-card:hover {
      border-color: var(--blue-bdr);
      transform: translateY(-2px);
    }

    .plan-card.recommended {
      border-color: var(--blue-bdr);
      background: var(--blue-light);
    }

    .plan-price {
      font-family: 'Fraunces', serif;
      font-size: 28px;
      font-weight: 700;
      color: var(--text);
      margin: 10px 0 4px;
    }

    .plan-price span {
      font-size: 14px;
      font-weight: 400;
      color: var(--text-soft);
    }

    /* Modal */
    .modal-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.7);
      z-index: 500;
      align-items: center;
      justify-content: center;
    }

    .modal-overlay.show {
      display: flex;
    }

    .modal {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 28px;
      width: 100%;
      max-width: 480px;
      max-height: 90vh;
      overflow-y: auto;
    }

    .modal-title {
      font-family: 'Fraunces', serif;
      font-size: 20px;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 6px;
    }
  </style>
</head>

<body>
  <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>
  <div class="toast" id="toast">✅ <span id="toastMsg"></span></div>

  <!-- Modal ajouter école/faculté -->
  <div class="modal-overlay" id="modalEcole">
    <div class="modal">
      <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px">
        <div>
          <div class="modal-title"><i class="fa fa-plus-circle"></i> Ajouter une école / faculté</div>
          <div style="font-size:13px;color:var(--text-soft)">De la même université (UAC)</div>
        </div>
        <button onclick="closeModal('modalEcole')" style="background:none;border:none;color:var(--text-soft);font-size:20px;cursor:pointer;padding:4px">✕</button>
      </div>

      <div class="pay-banner">
        <div style="font-size:22px"><i class="fa fa-wallet"></i></div>
        <div>
          <div style="font-size:13.5px;font-weight:700;color:var(--text)">Option payante</div>
          <div style="font-size:12.5px;color:var(--text-mid)">L'accès à une école ou faculté supplémentaire est facturé <strong style="color:var(--blue)">500 FCFA / mois</strong></div>
        </div>
        <span class="pay-badge">500 FCFA/mois</span>
      </div>

      <div class="form-group">
        <label class="form-label">Université <span style="color:var(--red)">*</span></label>
        <input class="form-input" type="text" value="Université d'Abomey-Calavi (UAC)" readonly style="opacity:0.7" />
      </div>

      <div class="form-group">
        <label class="form-label">Type d'établissement <span style="color:var(--red)">*</span></label>
        <select class="form-select">
          <option><i class="fa fa-school"></i> École (ex: EPAC, ENEAM, FASHS…)</option>
          <option><i class="fa fa-university"></i> Faculté (ex: Faculté des Sciences, Faculté de Médecine…)</option>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">École / Faculté <span style="color:var(--red)">*</span></label>
        <select class="form-select">
          <option value="">Sélectionnez un établissement</option>
          <option>EPAC — École Polytechnique d'Abomey-Calavi</option>
          <option>ENEAM — École Nationale d'Économie Appliquée</option>
          <option>FASHS — Faculté des Arts, Lettres &amp; Sciences Humaines</option>
          <option>FDS — Faculté des Sciences</option>
          <option>FSS — Faculté des Sciences de la Santé</option>
          <option>FLA — Faculté des Lettres, Arts &amp; Sciences Humaines</option>
          <option>Autre (saisir manuellement)</option>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">Numéro matricule dans cet établissement <span style="color:var(--red)">*</span></label>
        <input class="form-input" type="text" placeholder="ex: EPAC/2025/001234" />
        <p style="font-size:11.5px;color:var(--text-soft);margin-top:4px">Votre inscription sera vérifiée par l'établissement sous 48h ouvrées.</p>
      </div>

      <div class="form-group">
        <label class="form-label">Niveau d'étude <span style="color:var(--red)">*</span></label>
        <select class="form-select">
          <option>L1</option>
          <option>L2</option>
          <option>L3</option>
          <option>M1</option>
          <option>M2</option>
          <option>D1</option>
          <option>D2</option>
          <option>D3</option>
        </select>
      </div>

      <div style="background:var(--bg-2);border:1px solid var(--border);border-radius:var(--radius);padding:14px;margin-bottom:18px">
        <div style="font-size:13px;font-weight:700;color:var(--text);margin-bottom:6px"><i class="fa fa-info-circle"></i> Récapitulatif de l'offre</div>
        <div style="font-size:13px;color:var(--text-mid)">1 école / faculté supplémentaire (même université) → <strong style="color:var(--blue)">500 FCFA/mois</strong></div>
        <div style="font-size:12px;color:var(--text-soft);margin-top:4px">Résiliable à tout moment · Facturation mensuelle · Paiement via Mobile Money</div>
      </div>

      <div style="display:flex;gap:10px">
        <button class="btn btn-primary" style="flex:1" onclick="showToast('🔄 Redirection vers le paiement...');closeModal('modalEcole')"><i class="fa fa-credit-card"></i> Payer &amp; Activer (500 FCFA/mois)</button>
        <button class="btn btn-ghost" onclick="closeModal('modalEcole')">Annuler</button>
      </div>
    </div>
  </div>

  <!-- Modal ajouter autre université -->
  <div class="modal-overlay" id="modalUniv">
    <div class="modal">
      <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px">
        <div>
          <div class="modal-title"><i class="fa fa-plus-circle"></i> Ajouter une autre université</div>
          <div style="font-size:13px;color:var(--text-soft)">Accès aux ressources d'un autre établissement</div>
        </div>
        <button onclick="closeModal('modalUniv')" style="background:none;border:none;color:var(--text-soft);font-size:20px;cursor:pointer;padding:4px">✕</button>
      </div>

      <div class="pay-banner" style="border-color:rgba(188,140,255,.35);background:var(--purple-lt)">
        <div style="font-size:22px"><i class="fa fa-wallet"></i></div>
        <div>
          <div style="font-size:13.5px;font-weight:700;color:var(--text)">Option Premium</div>
          <div style="font-size:12.5px;color:var(--text-mid)">L'ajout d'une autre université est facturé <strong style="color:var(--purple)">1 500 FCFA / mois</strong></div>
        </div>
        <span style="background:var(--purple-lt);color:var(--purple);border:1px solid var(--purple-bdr);padding:3px 10px;border-radius:100px;font-size:11.5px;font-weight:700;white-space:nowrap">1 500 FCFA/mois</span>
      </div>

      <div class="form-group">
        <label class="form-label">Université <span style="color:var(--red)">*</span></label>
        <select class="form-select">
          <option value="">Sélectionnez une université</option>
          <option>UNSTIM — Université des Sciences et Technologies</option>
          <option>UA — Université d'Abomey</option>
          <option>UP — Université de Parakou</option>
          <option>UNA — Université Nationale d'Agriculture</option>
          <option>Autre (saisir manuellement)</option>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">École / Faculté dans cette université <span style="color:var(--red)">*</span></label>
        <input class="form-input" type="text" placeholder="ex: Faculté des Sciences" />
      </div>

      <div class="form-group">
        <label class="form-label">Numéro matricule dans cette université <span style="color:var(--red)">*</span></label>
        <input class="form-input" type="text" placeholder="ex: UNSTIM/2025/00456" />
        <p style="font-size:11.5px;color:var(--text-soft);margin-top:4px">Votre inscription sera vérifiée sous 48h ouvrées.</p>
      </div>

      <div class="form-group">
        <label class="form-label">Niveau d'étude <span style="color:var(--red)">*</span></label>
        <select class="form-select">
          <option>L1</option>
          <option>L2</option>
          <option>L3</option>
          <option>M1</option>
          <option>M2</option>
          <option>D1</option>
          <option>D2</option>
          <option>D3</option>
        </select>
      </div>

      <div style="background:var(--bg-2);border:1px solid var(--border);border-radius:var(--radius);padding:14px;margin-bottom:18px">
        <div style="font-size:13px;font-weight:700;color:var(--text);margin-bottom:6px"><i class="fa fa-info-circle "></i> Récapitulatif de l'offre</div>
        <div style="font-size:13px;color:var(--text-mid)">1 université supplémentaire → <strong style="color:var(--purple)">1 500 FCFA/mois</strong></div>
        <div style="font-size:12px;color:var(--text-soft);margin-top:4px">Accès complet aux actualités, épreuves et messages de la nouvelle université · Résiliable</div>
      </div>

      <div style="display:flex;gap:10px">
        <button class="btn btn-primary" style="flex:1;background:var(--purple)" onclick="showToast('🔄 Redirection vers le paiement...');closeModal('modalUniv')"><i class="fa fa-credit-card"></i> Payer &amp; Activer (1 500 FCFA/mois)</button>
        <button class="btn btn-ghost" onclick="closeModal('modalUniv')">Annuler</button>
      </div>
    </div>
  </div>

  <div class="shell">
    <?php include '../includes/sidebar-etu.php' ?>

    <div class="main-wrap">
      <header class="header">
        <button class="header-hamburger" onclick="openSidebar()"><span></span><span></span><span></span></button>
        <div class="header-welcome">Bonjour, Raphael 👋 <span>Mon profil</span></div>
        <a href="profil.php" class="header-avatar">RB</a>
      </header>

      <div class="content">

        <!-- Profile header -->
        <div class="profile-header-card">
          <div class="profile-avatar-large">RB</div>
          <div style="flex:1">
            <div class="profile-header-name">Raphael BIGNON</div>
            <div class="profile-header-email">raphaelbig@gmail.com <span style="background:var(--green);color:white;font-size:10px;padding:2px 7px;border-radius:100px;margin-left:6px">✓ Vérifié</span></div>
            <div style="font-size:13px;color:rgba(255,255,255,0.5)">Membre depuis Octobre 2025 · L1 · Numéro matricule : 12293456</div>
          </div>
          <button class="btn btn-sm" style="background:rgba(255,255,255,0.1);color:white;border:1px solid rgba(255,255,255,0.2)" onclick="showToast('Modification de la photo...')"><i class="fa fa-edit"></i> Modifier la photo</button>
        </div>

        <!-- Tabs -->
        <div class="tab-strip">
          <button class="tab-strip-btn active" id="ptab-info" onclick="switchProfileTab('info')">Informations</button>
          <button class="tab-strip-btn" id="ptab-etablissements" onclick="switchProfileTab('etablissements')"><i class="fa fa-building"></i> Mes établissements</button>
          <button class="tab-strip-btn" id="ptab-security" onclick="switchProfileTab('security')"><i class="fa fa-lock"></i> Sécurité</button>
          <button class="tab-strip-btn" id="ptab-prefs" onclick="switchProfileTab('prefs')"><i class="fa fa-cog"></i> Préférences</button>
        </div>

        <!-- Tab: Informations -->
        <div id="ptab-content-info">
          <div class="grid-2">
            <div class="card">
              <h3 style="font-size:15px;font-weight:700;margin-bottom:18px"><i class="fa fa-user"></i> Informations personnelles</h3>
              <div class="form-row">
                <div class="form-group"><label class="form-label">Prénom</label><input class="form-input" type="text" value="Raphael" /></div>
                <div class="form-group"><label class="form-label">Nom</label><input class="form-input" type="text" value="BIGNON" /></div>
              </div>
              <div class="form-group"><label class="form-label">Email</label><input class="form-input" type="email" value="raphaelbig@gmail.com" /></div>
              <div class="form-group"><label class="form-label">Téléphone <span style="color:var(--text-soft);font-weight:400">(optionnel)</span></label><input class="form-input" type="tel" placeholder="+229 XX XX XX XX" /></div>
              <div class="form-group"><label class="form-label">Date de naissance</label><input class="form-input" type="date" value="2005-03-14" /></div>
              <button class="btn btn-primary" onclick="showToast('✅ Informations sauvegardées !')">Sauvegarder</button>
            </div>

            <div class="card">
              <h3 style="font-size:15px;font-weight:700;margin-bottom:18px"><img src="../assets/img/logo.png" width="20px" style="border-radius: 20px;"> Informations académiques</h3>
              <div class="form-group">
                <label class="form-label">Université principale</label>
                <input class="form-input" type="text" value="Université d'Abomey-Calavi (UAC)" readonly style="opacity:0.7" />
              </div>
              <div class="form-group">
                <label class="form-label">École (IFRI)</label>
                <input class="form-input" type="text" value="Institut de Formation et de Recherche en Informatique (IFRI)" readonly style="opacity:0.7" />
              </div>
              <div class="form-group">
                <label class="form-label">Faculté</label>
                <input class="form-input" type="text" value="Faculté de Droits — UAC" readonly style="opacity:0.7" />
              </div>
              <div class="form-group">
                <label class="form-label">Niveau IFRI</label>
                <select class="form-select">
                  <option selected>L1</option>
                  <option>L2</option>
                  <option>L3</option>
                  <option>M1</option>
                  <option>M2</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Niveau Faculté de Droits</label>
                <select class="form-select">
                  <option selected>L1</option>
                  <option>L2</option>
                  <option>L3</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Numéro matricule UAC</label>
                <input class="form-input" type="text" value="12293456" readonly style="opacity:0.7" />
                <p style="font-size:11.5px;color:var(--green);margin-top:4px">✓ Vérifié par l'IFRI</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Tab: Mes établissements -->
        <div id="ptab-content-etablissements" style="display:none">
          <div class="card" style="margin-bottom:16px">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px">
              <h3 style="font-size:15px;font-weight:700"><i class="fa fa-university"></i> Mon université principale</h3>
              <span class="badge badge-priv">✓ Gratuit</span>
            </div>
            <div class="school-item">
              <div class="school-icon" style="background:var(--blue-pale);border:1px solid var(--blue-bdr)"><i class="fa fa-university"></i></div>
              <div style="flex:1">
                <div style="font-size:14px;font-weight:700;color:var(--text)">Université d'Abomey-Calavi (UAC)</div>
                <div style="font-size:12px;color:var(--text-soft);margin-top:2px">Calavi, Bénin · Université principale</div>
              </div>
              <span class="badge badge-priv">✓ Vérifié</span>
            </div>
          </div>

          <div class="card" style="margin-bottom:16px">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px">
              <h3 style="font-size:15px;font-weight:700"><i class="fa fa-school"></i> Mes écoles &amp; facultés (UAC)</h3>
              <span class="badge badge-priv">✓ Accès gratuit (inscription initiale)</span>
            </div>

            <div style="display:flex;flex-direction:column;gap:10px;margin-bottom:14px">
              <div class="school-item">
                <div class="school-icon" style="background:var(--green-lt);border:1px solid var(--green-bdr)"><i class="fa fa-school"></i></div>
                <div style="flex:1">
                  <div style="font-size:14px;font-weight:700;color:var(--text)">IFRI</div>
                  <div style="font-size:12px;color:var(--text-soft);margin-top:2px">Institut de Formation et de Recherche en Informatique · L1 Informatique</div>
                  <div style="font-size:11.5px;color:var(--text-soft);margin-top:3px">Matricule : 12293456</div>
                </div>
                <div style="display:flex;flex-direction:column;align-items:flex-end;gap:6px">
                  <span class="badge badge-priv">✓ Vérifié</span>
                  <span style="font-size:11px;color:var(--green);font-weight:600">Inclus (gratuit)</span>
                </div>
              </div>

              <div class="school-item">
                <div class="school-icon" style="background:var(--purple-lt);border:1px solid var(--purple-bdr)">⚖️</div>
                <div style="flex:1">
                  <div style="font-size:14px;font-weight:700;color:var(--text)">Faculté de Droits</div>
                  <div style="font-size:12px;color:var(--text-soft);margin-top:2px">Faculté de Droit et de Sciences Politiques — UAC · L1 Droit</div>
                  <div style="font-size:11.5px;color:var(--text-soft);margin-top:3px">Matricule : UAC/FDROIT/2025/04821</div>
                </div>
                <div style="display:flex;flex-direction:column;align-items:flex-end;gap:6px">
                  <span class="badge badge-priv">✓ Vérifié</span>
                  <span style="font-size:11px;color:var(--green);font-weight:600">Inclus (gratuit)</span>
                </div>
              </div>
            </div>

            <!-- Add more ecole/faculte -->
            <div style="background:var(--bg-2);border:1px dashed var(--border);border-radius:var(--radius-md);padding:16px;text-align:center">
              <div style="font-size:22px;margin-bottom:8px"><i class="fa fa-plus-circle"></i></div>
              <div style="font-size:14px;font-weight:600;color:var(--text);margin-bottom:4px">Ajouter une école ou faculté (UAC)</div>
              <div style="font-size:13px;color:var(--text-soft);margin-bottom:10px">Accédez aux ressources d'une autre école ou faculté de l'UAC</div>
              <div class="pay-banner" style="margin-bottom:12px;text-align:left">
                <div style="font-size:20px"><i class="fa fa-coins"></i></div>
                <div>
                  <div style="font-size:13px;font-weight:700;color:var(--text)">Option payante</div>
                  <div style="font-size:12px;color:var(--text-mid)">500 FCFA/mois par école ou faculté supplémentaire</div>
                </div>
              </div>
              <button class="btn btn-outline" onclick="openModal('modalEcole')"><i class="fa fa-plus"></i> Ajouter une école / faculté (500 FCFA/mois)</button>
            </div>
          </div>

          <div class="card">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px">
              <h3 style="font-size:15px;font-weight:700"><i class="fa fa-university"></i> Autres universités</h3>
              <span style="background:var(--purple-lt);color:var(--purple);border:1px solid var(--purple-bdr);padding:3px 10px;border-radius:100px;font-size:11.5px;font-weight:700">Premium</span>
            </div>

            <div style="background:var(--bg-2);border:1px dashed var(--border);border-radius:var(--radius-md);padding:16px;text-align:center">
              <div style="font-size:26px;margin-bottom:8px"><i class="fa fa-university"></i></div>
              <div style="font-size:14px;font-weight:600;color:var(--text);margin-bottom:4px">Accéder à une autre université</div>
              <div style="font-size:13px;color:var(--text-soft);margin-bottom:12px">Consultez les actualités, épreuves et programmes d'une autre université au Bénin</div>
              <div class="pay-banner" style="margin-bottom:12px;text-align:left;border-color:var(--purple-bdr);background:var(--purple-lt)">
                <div style="font-size:20px"><i class="fa fa-coins"></i></div>
                <div>
                  <div style="font-size:13px;font-weight:700;color:var(--text)">Option Premium</div>
                  <div style="font-size:12px;color:var(--text-mid)">1 500 FCFA/mois par université supplémentaire</div>
                </div>
              </div>
              <button class="btn btn-primary" style="background:var(--purple)" onclick="openModal('modalUniv')"><i class="fa fa-plus"></i> Ajouter une autre université (1 500 FCFA/mois)</button>
            </div>
          </div>
        </div>

        <!-- Tab: Sécurité -->
        <div id="ptab-content-security" style="display:none">
          <div class="grid-2">
            <div class="card">
              <h3 style="font-size:15px;font-weight:700;margin-bottom:18px"><i class="fa fa-key"></i> Changer le mot de passe</h3>
              <div class="form-group"><label class="form-label">Mot de passe actuel</label><input class="form-input" type="password" placeholder="••••••••" /></div>
              <div class="form-group"><label class="form-label">Nouveau mot de passe</label><input class="form-input" type="password" placeholder="Min. 8 caractères" /></div>
              <div class="form-group"><label class="form-label">Confirmer</label><input class="form-input" type="password" placeholder="Répétez" /></div>
              <button class="btn btn-primary" onclick="showToast('✅ Mot de passe mis à jour !')">Mettre à jour</button>
            </div>
            <div class="card">
              <h3 style="font-size:15px;font-weight:700;margin-bottom:18px"><i class="fa fa-shield-alt"></i> Double authentification</h3>
              <div class="toggle-row">
                <div class="toggle-info">
                  <h5>Authentification 2FA</h5>
                  <p>Code SMS à la connexion</p>
                </div><label class="toggle"><input type="checkbox" onchange="showToast('2FA '+(this.checked?'activée':'désactivée')+'!')" /><span class="toggle-slider"></span></label>
              </div>
              <div style="margin-top:16px">
                <h3 style="font-size:14px;font-weight:700;margin-bottom:10px">Sessions actives</h3>
                <div style="display:flex;flex-direction:column;gap:8px">
                  <div style="display:flex;justify-content:space-between;align-items:center;padding:10px;background:var(--bg-2);border-radius:var(--radius);border:1px solid var(--border)">
                    <div>
                      <div style="font-size:13px;font-weight:600"><i class="fa fa-laptop"></i> Chrome — Windows</div>
                      <div style="font-size:12px;color:var(--green)">Session actuelle</div>
                    </div>
                  </div>
                  <div style="display:flex;justify-content:space-between;align-items:center;padding:10px;background:var(--bg-2);border-radius:var(--radius);border:1px solid var(--border)">
                    <div>
                      <div style="font-size:13px;font-weight:600"><i class="fa fa-mobile-alt"></i> Chrome — Android</div>
                      <div style="font-size:12px;color:var(--text-soft)">Hier à 20h12</div>
                    </div>
                    <button class="btn btn-ghost btn-xs" onclick="showToast('Session déconnectée')">Déconnecter</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Tab: Préférences -->
        <div id="ptab-content-prefs" style="display:none">
          <div class="card">
            <h3 style="font-size:15px;font-weight:700;margin-bottom:18px"><i class="fa fa-cog"></i> Préférences</h3>
            <div class="toggle-row">
              <div class="toggle-info">
                <h5>Notifications push</h5>
                <p>Alertes en temps réel</p>
              </div><label class="toggle"><input type="checkbox" checked onchange="showToast('Mis à jour')" /><span class="toggle-slider"></span></label>
            </div>
            <div class="form-group" style="margin-top:18px"><label class="form-label">Langue</label><select class="form-select" style="width:200px">
                <option><i class="fa fa-flag"></i> Français</option>
                <option><i class="fa fa-flag"></i> English</option>
              </select></div>
            <div style="margin-top:24px;padding-top:20px;border-top:1px solid var(--border)">
              <h3 style="font-size:14px;font-weight:700;color:var(--red);margin-bottom:12px"><i class="fa fa-exclamation-triangle"></i> Zone dangereuse</h3>
              <button class="btn" style="background:var(--red-lt);color:var(--red);border:1.5px solid var(--red-bdr)" onclick="showToast('Confirmation envoyée par email')">Supprimer mon compte</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const navLink = document.getElementsByClassName('nav-item pro');
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
      document.getElementById('toastMsg').innerHTML = m;
      t.classList.add('show');
      clearTimeout(tt);
      tt = setTimeout(() => t.classList.remove('show'), 3000);
    }

    function switchProfileTab(tab) {
      ['info', 'etablissements', 'security', 'prefs'].forEach(t => {
        document.getElementById('ptab-' + t).classList.toggle('active', t === tab);
        document.getElementById('ptab-content-' + t).style.display = t === tab ? '' : 'none';
      });
    }

    function openModal(id) {
      document.getElementById(id).classList.add('show');
      document.body.style.overflow = 'hidden';
    }

    function closeModal(id) {
      document.getElementById(id).classList.remove('show');
      document.body.style.overflow = '';
    }

    // Close modals on overlay click
    document.querySelectorAll('.modal-overlay').forEach(m => {
      m.addEventListener('click', function(e) {
        if (e.target === this) closeModal(this.id);
      });
    });
  </script>
</body>

</html>
<?php
/**
 * Template Name: Area Personale
 * Gestisce: Libreria, Salvati, Gestione Newsletter, Abbonamento, Profilo
 * Layout bilanciato a 2 colonne con Sidebar Informativa Membri
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$current_user = wp_get_current_user();
$is_logged_in = is_user_logged_in();
$user_id      = get_current_user_id();

$sub_plan    = get_user_meta($user_id, 'ampelos_subscription_plan', true) ?: 'annuale';
$sub_status  = get_user_meta($user_id, 'ampelos_subscription_status', true) ?: 'active';
$saved_posts = (array) get_user_meta($user_id, 'ampelos_saved_articles', true) ?: array();
?>

<main id="primary" class="site-main ampelos-dashboard">
    <div class="ampelos-container">

        <?php if (!$is_logged_in) : ?>
            <!-- Utente non connesso: Box di Login -->
            <div style="max-width: 480px; margin: 40px auto; background: #fff; padding: 40px 32px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border); box-shadow: var(--shadow-md);">
                <div style="text-align: center; margin-bottom: 24px;">
                    <span class="ampelos-section-tag">Accesso Membri</span>
                    <h2>Area Personale</h2>
                    <p style="color: var(--ampelos-text-muted); font-size: 14px;">Accedi con il tuo account di abbonato per gestire il tuo profilo e visualizzare i tuoi articoli salvati.</p>
                </div>
                <form id="ampelos-form-login">
                    <div class="ampelos-form-message"></div>
                    <div class="ampelos-form-group">
                        <label for="dash-login-user">Username o Email</label>
                        <input type="text" id="dash-login-user" name="username" class="ampelos-form-input" required>
                    </div>
                    <div class="ampelos-form-group">
                        <label for="dash-login-pass">Password</label>
                        <input type="password" id="dash-login-pass" name="password" class="ampelos-form-input" required>
                    </div>
                    <button type="submit" class="ampelos-btn ampelos-btn-primary" style="width: 100%; margin-top: 10px;">
                        Accedi all'Area Personale
                    </button>
                    <div style="text-align: center; margin-top: 20px; font-size: 13.5px;">
                        Non hai ancora un abbonamento? <a href="<?php echo esc_url(home_url('/abbonati/')); ?>" style="color: var(--ampelos-terracotta); font-weight: 600;">Abbonati ora</a>
                    </div>
                </form>
            </div>

        <?php else : ?>

            <!-- Dashboard Intestazione -->
            <div class="ampelos-dashboard-header">
                <div>
                    <span class="ampelos-section-tag">Area Personale Ampelos</span>
                    <h1 style="font-size: 32px; margin: 0;"><?php echo esc_html($current_user->display_name); ?></h1>
                    <p style="color: var(--ampelos-text-muted); margin: 4px 0 0; font-size: 14px;">
                        Iscritto con piano <strong><?php echo esc_html(ucfirst($sub_plan)); ?></strong> • Stato: 
                        <span style="color: #27794d; font-weight: 600;">Attivo</span>
                    </p>
                </div>
                <div>
                    <a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm">
                        Disconnetti account
                    </a>
                </div>
            </div>

            <!-- Tab di Navigazione Dashboard -->
            <nav class="ampelos-dashboard-nav" role="tablist">
                <button type="button" class="ampelos-dash-tab active" data-tab="libreria" role="tab">Libreria</button>
                <button type="button" class="ampelos-dash-tab" data-tab="salvati" role="tab">Salvati (<?php echo count($saved_posts); ?>)</button>
                <button type="button" class="ampelos-dash-tab" data-tab="newsletter" role="tab">Gestione newsletter</button>
                <button type="button" class="ampelos-dash-tab" data-tab="abbonamento" role="tab">Abbonamento</button>
                <button type="button" class="ampelos-dash-tab" data-tab="profilo" role="tab">Profilo</button>
            </nav>

            <!-- ARCHITETTURA A 2 COLONNE: CONTENUTO PRINCIPALE + SIDEBAR INFORMATIVA -->
            <div class="ampelos-dashboard-layout">
                
                <!-- COLONNA SINISTRA: PANNELLI ATTIVI -->
                <div class="ampelos-dashboard-main">

                    <!-- 1. PANNELLO LIBRERIA -->
                    <div id="panel-libreria" class="ampelos-dash-panel active">
                        <div style="background: #fff; padding: 32px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border);">
                            <h3 style="margin-bottom: 8px;">La tua Libreria Digitale</h3>
                            <p style="color: var(--ampelos-text-muted); font-size: 14.5px; margin-bottom: 24px;">
                                Qui trovi le collezioni monografiche lette di recente e i numeri speciali pubblicati durante il tuo periodo di abbonamento.
                            </p>

                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 18px;">
                                <div style="border: 1px solid var(--ampelos-border-light); padding: 22px 20px; border-radius: var(--radius-sm); background: var(--ampelos-bg); display: flex; flex-direction: column;">
                                    <span class="ampelos-tag-future" style="margin-left: 0; align-self: flex-start;">Edizione Digitale</span>
                                    <h4 style="margin: 12px 0 6px; font-size: 18px;">Quaderno I • Terroir d'Alta Quota</h4>
                                    <p style="font-size: 13.5px; color: var(--ampelos-text-muted); line-height: 1.5; margin-bottom: 16px; flex: 1;">
                                        Raccolta di 8 saggi sulle viticolture alpine e pirenaiche, suoli morenici e resistenze climatiche.
                                    </p>
                                    <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm" style="align-self: flex-start;">
                                        Apri Quaderno →
                                    </a>
                                </div>
                                <div style="border: 1px solid var(--ampelos-border-light); padding: 22px 20px; border-radius: var(--radius-sm); background: var(--ampelos-bg); display: flex; flex-direction: column;">
                                    <span class="ampelos-tag-future" style="margin-left: 0; align-self: flex-start;">Edizione Digitale</span>
                                    <h4 style="margin: 12px 0 6px; font-size: 18px;">Quaderno II • L'Uva nel Tempo</h4>
                                    <p style="font-size: 13.5px; color: var(--ampelos-text-muted); line-height: 1.5; margin-bottom: 16px; flex: 1;">
                                        Antologia sulle fermentazioni ancestrali, l'uso delle argille e le memorie del vino naturale.
                                    </p>
                                    <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm" style="align-self: flex-start;">
                                        Apri Quaderno →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. PANNELLO SALVATI -->
                    <div id="panel-salvati" class="ampelos-dash-panel">
                        <div style="background: #fff; padding: 32px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border);">
                            <h3 style="margin-bottom: 8px;">I tuoi Articoli Salvati</h3>
                            <p style="color: var(--ampelos-text-muted); font-size: 14.5px; margin-bottom: 24px;">
                                Gli approfondimenti che hai contrassegnato per una lettura successiva.
                            </p>

                            <?php if (empty($saved_posts)) : ?>
                                <div style="text-align: center; padding: 40px 24px; background: var(--ampelos-bg); border-radius: var(--radius-sm);">
                                    <p style="color: var(--ampelos-text-muted); margin-bottom: 16px; font-size: 15px;">Non hai ancora salvato nessun articolo.</p>
                                    <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-primary ampelos-btn-sm">
                                        Esplora l'Archivio dei Saggi
                                    </a>
                                </div>
                            <?php else : ?>
                                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 18px;">
                                    <?php foreach ($saved_posts as $saved_id) :
                                        $post_obj = get_post($saved_id);
                                        if (!$post_obj) continue;
                                    ?>
                                        <div class="ampelos-article-card" style="box-shadow: none; border: 1px solid var(--ampelos-border-light); background: var(--ampelos-bg); padding: 18px; border-radius: var(--radius-sm);">
                                            <div class="ampelos-article-content" style="padding: 0;">
                                                <h4 style="margin-bottom: 8px; font-size: 17px; line-height: 1.35;">
                                                    <a href="<?php echo get_permalink($post_obj); ?>" style="color: var(--ampelos-primary); text-decoration: none;">
                                                        <?php echo esc_html($post_obj->post_title); ?>
                                                    </a>
                                                </h4>
                                                <div style="margin-top: 16px; display: flex; justify-content: space-between; align-items: center; border-top: 1px solid rgba(0,0,0,0.06); padding-top: 10px;">
                                                    <a href="<?php echo get_permalink($post_obj); ?>" style="font-weight: 600; font-size: 13px; color: var(--ampelos-primary);">Leggi saggio →</a>
                                                    <button type="button" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm" style="padding: 4px 8px; font-size: 11.5px;" onclick="AmpelosUI.toggleSaveArticle(<?php echo $saved_id; ?>, this)">Rimuovi</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- 3. PANNELLO GESTIONE NEWSLETTER -->
                    <div id="panel-newsletter" class="ampelos-dash-panel">
                        <div style="background: #fff; padding: 32px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border);">
                            <h3 style="margin-bottom: 8px;">Preferenze Newsletter</h3>
                            <p style="color: var(--ampelos-text-muted); font-size: 14.5px; margin-bottom: 24px;">
                                Scegli quali comunicazioni e approfondimenti via email desideri ricevere dalla redazione.
                            </p>

                            <form onsubmit="event.preventDefault(); alert('Preferenze newsletter aggiornate con successo.');">
                                <div style="display: grid; gap: 16px; margin-bottom: 24px;">
                                    <label style="display: flex; gap: 14px; align-items: flex-start; cursor: pointer; padding: 14px; background: var(--ampelos-bg); border-radius: var(--radius-sm); border: 1px solid var(--ampelos-border-light);">
                                        <input type="checkbox" checked style="margin-top: 4px; accent-color: var(--ampelos-primary);">
                                        <div>
                                            <strong style="font-size: 15px; color: var(--ampelos-primary);">La Lettera del Giovedì</strong>
                                            <div style="font-size: 13px; color: var(--ampelos-text-muted); margin-top: 3px;">Editoriale settimanale del Direttore e retroscena delle inchieste in corso sul campo.</div>
                                        </div>
                                    </label>
                                    <label style="display: flex; gap: 14px; align-items: flex-start; cursor: pointer; padding: 14px; background: var(--ampelos-bg); border-radius: var(--radius-sm); border: 1px solid var(--ampelos-border-light);">
                                        <input type="checkbox" checked style="margin-top: 4px; accent-color: var(--ampelos-primary);">
                                        <div>
                                            <strong style="font-size: 15px; color: var(--ampelos-primary);">Note dal Vigneto &amp; Territori</strong>
                                            <div style="font-size: 13px; color: var(--ampelos-text-muted); margin-top: 3px;">Segnalazioni su geologie, nuove carte dell'Atlante e reportage dalle vigne d'Europa.</div>
                                        </div>
                                    </label>
                                    <label style="display: flex; gap: 14px; align-items: flex-start; cursor: pointer; padding: 14px; background: var(--ampelos-bg); border-radius: var(--radius-sm); border: 1px solid var(--ampelos-border-light);">
                                        <input type="checkbox" checked style="margin-top: 4px; accent-color: var(--ampelos-primary);">
                                        <div>
                                            <strong style="font-size: 15px; color: var(--ampelos-primary);">Aggiornamenti sul Volume 2027</strong>
                                            <div style="font-size: 13px; color: var(--ampelos-text-muted); margin-top: 3px;">Diario di tipografia, campionari carte Fedrigoni e dettagli sulla spedizione tracciata del libro.</div>
                                        </div>
                                    </label>
                                </div>
                                <button type="submit" class="ampelos-btn ampelos-btn-primary">Salva preferenze</button>
                            </form>
                        </div>
                    </div>

                    <!-- 4. PANNELLO ABBONAMENTO -->
                    <div id="panel-abbonamento" class="ampelos-dash-panel">
                        <div style="background: #fff; padding: 32px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border);">
                            <h3 style="margin-bottom: 8px;">Dettagli dell'Abbonamento</h3>
                            <p style="color: var(--ampelos-text-muted); font-size: 14.5px; margin-bottom: 24px;">
                                Gestisci lo stato della tua sottoscrizione, il metodo di pagamento o scarica le ricevute fiscali.
                            </p>

                            <!-- Box Piano Attivo -->
                            <div style="background: var(--ampelos-bg); padding: 24px; border-radius: var(--radius-sm); margin-bottom: 24px; border: 1px solid var(--ampelos-border-light);">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; flex-wrap: wrap; gap: 10px;">
                                    <div>
                                        <span style="font-size: 11.5px; text-transform: uppercase; font-weight: 700; color: var(--ampelos-sage); letter-spacing: 0.08em;">Piano Sottoscritto</span>
                                        <h4 style="margin: 4px 0 0; font-size: 22px; color: var(--ampelos-primary);">Digitale <?php echo esc_html(ucfirst($sub_plan)); ?></h4>
                                    </div>
                                    <span style="background: #e2f0e6; color: #1e6939; font-size: 12px; font-weight: 700; padding: 5px 12px; border-radius: var(--radius-pill); display: inline-flex; align-items: center; gap: 6px;">
                                        <span style="width: 7px; height: 7px; border-radius: 50%; background: #22c55e;"></span> Attivo &amp; Rinnovabile
                                    </span>
                                </div>
                                <div style="font-size: 14px; color: var(--ampelos-text-muted); line-height: 1.6;">
                                    Prossimo rinnovo previsto: <strong style="color: var(--ampelos-text);"><?php echo date('j F Y', strtotime('+1 year')); ?></strong> • Metodo: Carta di Credito (•••• 4022)
                                </div>
                            </div>

                            <!-- Vantaggi Inclusi nel Piano Attivo -->
                            <div style="margin-bottom: 28px;">
                                <h4 style="font-size: 16px; margin-bottom: 14px; color: var(--ampelos-primary);">Vantaggi Inclusi nella tua formula:</h4>
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; font-size: 13.5px; color: #323d36;">
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <span style="color: #2e7d32; font-weight: bold;">✓</span> Accesso illimitato all'archivio storico dei saggi
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <span style="color: #2e7d32; font-weight: bold;">✓</span> 4 Rubriche (Questioni, Luoghi, Idee, Voci)
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <span style="color: #2e7d32; font-weight: bold;">✓</span> Lettera settimanale del Direttore
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <span style="color: #2e7d32; font-weight: bold;">✓</span> Sconto 20% sul Volume Monografico cartaceo
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <span style="color: #2e7d32; font-weight: bold;">✓</span> Area personale con segnalibri e salvati
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <span style="color: #2e7d32; font-weight: bold;">✓</span> Navigazione libera da inserzioni pubblicitarie
                                    </div>
                                </div>
                            </div>

                            <!-- Azioni Gestione Abbonamento -->
                            <div style="display: flex; gap: 14px; flex-wrap: wrap; border-top: 1px solid var(--ampelos-border-light); padding-top: 20px;">
                                <button type="button" class="ampelos-btn ampelos-btn-outline" onclick="alert('Ricevuta fiscale scaricata in formato PDF.');">
                                    Scarica ultima ricevuta PDF
                                </button>
                                <button type="button" class="ampelos-btn ampelos-btn-outline" style="color: #9d3a3a; border-color: #d8aaaa;" onclick="if(confirm('Vuoi davvero annullare il rinnovo automatico? Manterrai l\'accesso fino alla scadenza del periodo pagato.')) alert('Rinnovo automatico disattivato con successo.');">
                                    Disattiva rinnovo automatico
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- 5. PANNELLO PROFILO -->
                    <div id="panel-profilo" class="ampelos-dash-panel">
                        <div style="background: #fff; padding: 32px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border);">
                            <h3 style="margin-bottom: 8px;">Dati del Profilo</h3>
                            <p style="color: var(--ampelos-text-muted); font-size: 14.5px; margin-bottom: 24px;">
                                Aggiorna le tue informazioni anagrafiche e la password di accesso.
                            </p>

                            <form onsubmit="event.preventDefault(); alert('Profilo aggiornato con successo.');">
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                                    <div class="ampelos-form-group">
                                        <label>Nome Visualizzato</label>
                                        <input type="text" class="ampelos-form-input" value="<?php echo esc_attr($current_user->display_name); ?>" required>
                                    </div>
                                    <div class="ampelos-form-group">
                                        <label>Indirizzo Email</label>
                                        <input type="email" class="ampelos-form-input" value="<?php echo esc_attr($current_user->user_email); ?>" required>
                                    </div>
                                </div>
                                <div class="ampelos-form-group">
                                    <label>Nuova Password (lascia vuoto per mantenere quella attuale)</label>
                                    <input type="password" class="ampelos-form-input" placeholder="Nuova password sicura...">
                                </div>
                                <div style="margin-top: 20px;">
                                    <button type="submit" class="ampelos-btn ampelos-btn-primary">Salva Modifiche Profilo</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <!-- COLONNA DESTRA: SIDEBAR INFORMATIVA PERSISTENTE (COLMA LO SPAZIO VUOTO) -->
                <aside class="ampelos-dashboard-sidebar">
                    
                    <!-- 1. TESSERA MEMBRO DIGITALE AMPELOS -->
                    <div style="background: linear-gradient(145deg, #15271d, #1c3829); color: #fff; border-radius: var(--radius-md); padding: 26px 22px; box-shadow: var(--shadow-md); border: 1px solid rgba(255,255,255,0.08); position: relative; overflow: hidden;">
                        <div style="position: absolute; right: -15px; bottom: -20px; opacity: 0.08; pointer-events: none;">
                            <img src="<?php echo esc_url(AMPELOS_THEME_URI . '/assets/images/ampelos.png'); ?>" alt="" style="width: 170px; filter: brightness(0) invert(1);">
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                            <span style="font-size: 11px; letter-spacing: 0.14em; text-transform: uppercase; color: #a1beae; font-weight: 700;">Tessera Membro Ampelos</span>
                            <span style="background: rgba(39, 174, 96, 0.2); color: #4ade80; border: 1px solid rgba(74, 222, 128, 0.3); font-size: 11px; font-weight: 700; padding: 2px 8px; border-radius: var(--radius-pill); display: flex; align-items: center; gap: 5px;">
                                <span style="width: 6px; height: 6px; border-radius: 50%; background: #4ade80;"></span> Attivo
                            </span>
                        </div>
                        <div style="font-family: var(--font-serif); font-size: 25px; font-weight: 700; margin-bottom: 4px; color: #faf7f2; letter-spacing: 0.02em;">
                            <?php echo esc_html($current_user->display_name); ?>
                        </div>
                        <div style="font-size: 12.5px; color: #b8cfc2; margin-bottom: 18px;">
                            Piano <strong><?php echo esc_html(ucfirst($sub_plan)); ?></strong> • ID #AMP-<?php echo str_pad($user_id, 5, '0', STR_PAD_LEFT); ?>
                        </div>
                        <div style="border-top: 1px solid rgba(255,255,255,0.12); padding-top: 14px; display: flex; justify-content: space-between; align-items: center; font-size: 12px; color: #9ab4a4;">
                            <span>Scadenza: <?php echo date('d/m/Y', strtotime('+1 year')); ?></span>
                            <span style="font-style: italic; font-family: var(--font-serif);">Rivista Trimestrale</span>
                        </div>
                    </div>

                    <!-- 2. BOX VOLUME MONOGRAFICO 2027 -->
                    <div style="background: #ffffff; border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 24px; box-shadow: var(--shadow-sm);">
                        <span class="ampelos-section-tag" style="color: var(--ampelos-terracotta);">Edizione da Collezione</span>
                        <h4 style="font-size: 18px; margin: 6px 0 10px; color: var(--ampelos-primary);">Volume I • Edizione 2027</h4>
                        <p style="font-size: 13.5px; color: var(--ampelos-text-muted); line-height: 1.6; margin-bottom: 16px;">
                            312 pagine rilegate in tela Fedrigoni con impressioni in lamina. Come abbonato attivo hai diritto allo <strong>sconto esclusivo del 20%</strong> (o copia inclusa nel piano Sostenitore).
                        </p>
                        <a href="<?php echo esc_url(home_url('/volume/')); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm" style="width: 100%; justify-content: center;">
                            Dettagli e Prenotazione Volume →
                        </a>
                    </div>

                    <!-- 3. BOX ASSISTENZA RISERVATA ABBONATI -->
                    <div style="background: var(--ampelos-bg); border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 22px 20px;">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                            <span style="font-size: 18px;">💬</span>
                            <h4 style="font-size: 16px; margin: 0; color: var(--ampelos-primary);">Supporto Riservato</h4>
                        </div>
                        <p style="font-size: 13px; color: var(--ampelos-text-muted); line-height: 1.6; margin-bottom: 14px;">
                            Per qualsiasi necessità sulla sottoscrizione, spedizioni o richieste editoriali, la segreteria è a tua disposizione:
                        </p>
                        <div style="display: flex; flex-direction: column; gap: 8px;">
                            <a href="mailto:abbonamenti@ampelos.it" style="font-size: 13px; font-weight: 600; color: var(--ampelos-primary); text-decoration: none; display: flex; align-items: center; gap: 6px;">
                                <span>abbonamenti@ampelos.it</span>
                                <span>→</span>
                            </a>
                            <a href="<?php echo esc_url(home_url('/contatti/')); ?>" style="font-size: 13px; font-weight: 600; color: var(--ampelos-terracotta); text-decoration: none; display: flex; align-items: center; gap: 6px;">
                                <span>Modulo di contatto redazione</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>

                </aside>

            </div>

        <?php endif; ?>

    </div>
</main>

<?php
get_footer();

<?php
/**
 * Template Name: Area Personale
 * Gestisce: Libreria, Salvati, Gestione Newsletter, Abbonamento, Profilo
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

            <!-- Tab di Navigazione Dashboard (Libreria, Salvati, Gestione newsletter, Abbonamento, Profilo) -->
            <nav class="ampelos-dashboard-nav" role="tablist">
                <button type="button" class="ampelos-dash-tab active" data-tab="libreria" role="tab">Libreria</button>
                <button type="button" class="ampelos-dash-tab" data-tab="salvati" role="tab">Salvati (<?php echo count($saved_posts); ?>)</button>
                <button type="button" class="ampelos-dash-tab" data-tab="newsletter" role="tab">Gestione newsletter</button>
                <button type="button" class="ampelos-dash-tab" data-tab="abbonamento" role="tab">Abbonamento</button>
                <button type="button" class="ampelos-dash-tab" data-tab="profilo" role="tab">Profilo</button>
            </nav>

            <!-- 1. PANNELLO LIBRERIA -->
            <div id="panel-libreria" class="ampelos-dash-panel active">
                <div style="background: #fff; padding: 32px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border); margin-bottom: 30px;">
                    <h3 style="margin-bottom: 8px;">La tua Libreria Digitale</h3>
                    <p style="color: var(--ampelos-text-muted); font-size: 14.5px; margin-bottom: 24px;">
                        Qui trovi le collezioni monografiche lette di recente e i numeri speciali pubblicati durante il tuo periodo di abbonamento.
                    </p>

                    <div class="ampelos-grid-3">
                        <div style="border: 1px solid var(--ampelos-border-light); padding: 20px; border-radius: var(--radius-sm); background: var(--ampelos-bg);">
                            <span class="ampelos-tag-future" style="margin-left: 0;">Edizione Digitale</span>
                            <h4 style="margin: 10px 0 6px;">Quaderno I • Terroir d'Alta Quota</h4>
                            <p style="font-size: 13px; color: var(--ampelos-text-muted);">Raccolta di 8 saggi sulle viticolture alpine e pirenaiche.</p>
                            <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm" style="margin-top: 10px;">Apri Quaderno</a>
                        </div>
                        <div style="border: 1px solid var(--ampelos-border-light); padding: 20px; border-radius: var(--radius-sm); background: var(--ampelos-bg);">
                            <span class="ampelos-tag-future" style="margin-left: 0;">Edizione Digitale</span>
                            <h4 style="margin: 10px 0 6px;">Quaderno II • L'Uva nel Tempo</h4>
                            <p style="font-size: 13px; color: var(--ampelos-text-muted);">Antologia sulle fermentazioni ancestrali e l'uso delle argille.</p>
                            <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm" style="margin-top: 10px;">Apri Quaderno</a>
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
                        <div style="text-align: center; padding: 40px; background: var(--ampelos-bg); border-radius: var(--radius-sm);">
                            <p style="color: var(--ampelos-text-muted); margin-bottom: 16px;">Non hai ancora salvato nessun articolo.</p>
                            <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-primary ampelos-btn-sm">
                                Esplora gli articoli
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="ampelos-grid-3">
                            <?php foreach ($saved_posts as $saved_id) :
                                $post_obj = get_post($saved_id);
                                if (!$post_obj) continue;
                            ?>
                                <div class="ampelos-article-card" style="box-shadow: none;">
                                    <div class="ampelos-article-content">
                                        <h4 style="margin-bottom: 8px;">
                                            <a href="<?php echo get_permalink($post_obj); ?>"><?php echo esc_html($post_obj->post_title); ?></a>
                                        </h4>
                                        <div style="margin-top: 12px; display: flex; justify-content: space-between; align-items: center;">
                                            <a href="<?php echo get_permalink($post_obj); ?>" style="font-weight: 600; font-size: 13px;">Leggi ora →</a>
                                            <button type="button" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm" onclick="AmpelosUI.toggleSaveArticle(<?php echo $saved_id; ?>, this)">Rimuovi</button>
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
                <div style="background: #fff; padding: 32px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border); max-width: 680px;">
                    <h3 style="margin-bottom: 8px;">Preferenze Newsletter</h3>
                    <p style="color: var(--ampelos-text-muted); font-size: 14.5px; margin-bottom: 24px;">
                        Scegli quali comunicazioni e approfondimenti via email desideri ricevere dalla redazione.
                    </p>

                    <form onsubmit="event.preventDefault(); alert('Preferenze newsletter aggiornate con successo.');">
                        <div style="display: grid; gap: 16px; margin-bottom: 24px;">
                            <label style="display: flex; gap: 12px; align-items: flex-start; cursor: pointer;">
                                <input type="checkbox" checked style="margin-top: 4px;">
                                <div>
                                    <strong>La Lettera del Giovedì</strong>
                                    <div style="font-size: 13px; color: var(--ampelos-text-muted);">Editoriale del Direttore e retroscena delle inchieste in corso.</div>
                                </div>
                            </label>
                            <label style="display: flex; gap: 12px; align-items: flex-start; cursor: pointer;">
                                <input type="checkbox" checked style="margin-top: 4px;">
                                <div>
                                    <strong>Note dal Vigneto &amp; Territori</strong>
                                    <div style="font-size: 13px; color: var(--ampelos-text-muted);">Segnalazioni su geologie, nuove mappe dell'Atlante e reportage.</div>
                                </div>
                            </label>
                            <label style="display: flex; gap: 12px; align-items: flex-start; cursor: pointer;">
                                <input type="checkbox" checked style="margin-top: 4px;">
                                <div>
                                    <strong>Aggiornamenti sul Volume 2027</strong>
                                    <div style="font-size: 13px; color: var(--ampelos-text-muted);">Diario di stampa e dettagli sulla spedizione dell'edizione rilegata.</div>
                                </div>
                            </label>
                        </div>
                        <button type="submit" class="ampelos-btn ampelos-btn-primary">Salva preferenze</button>
                    </form>
                </div>
            </div>

            <!-- 4. PANNELLO ABBONAMENTO -->
            <div id="panel-abbonamento" class="ampelos-dash-panel">
                <div style="background: #fff; padding: 32px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border); max-width: 720px;">
                    <h3 style="margin-bottom: 8px;">Dettagli dell'Abbonamento</h3>
                    <p style="color: var(--ampelos-text-muted); font-size: 14.5px; margin-bottom: 24px;">
                        Gestisci il rinnovo, il metodo di pagamento o effettua l'upgrade della tua sottoscrizione.
                    </p>

                    <div style="background: var(--ampelos-bg); padding: 24px; border-radius: var(--radius-sm); margin-bottom: 24px; border: 1px solid var(--ampelos-border-light);">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                            <div>
                                <span style="font-size: 12px; text-transform: uppercase; font-weight: 700; color: var(--ampelos-sage);">Piano Attivo</span>
                                <h4 style="margin: 4px 0 0; font-size: 20px;">Digitale <?php echo esc_html(ucfirst($sub_plan)); ?></h4>
                            </div>
                            <span style="background: #e2f0e6; color: #1e6939; font-size: 12px; font-weight: 700; padding: 4px 12px; border-radius: var(--radius-pill);">
                                Attivo &amp; Rinnovabile
                            </span>
                        </div>
                        <div style="font-size: 13.5px; color: var(--ampelos-text-muted);">
                            Prossimo rinnovo previsto: <strong><?php echo date('j F Y', strtotime('+1 year')); ?></strong> • Metodo: Carta di Credito (•••• 4022)
                        </div>
                    </div>

                    <div style="display: flex; gap: 14px; flex-wrap: wrap;">
                        <button type="button" class="ampelos-btn ampelos-btn-outline" onclick="alert('Scarica la ricevuta in formato PDF.');">
                            Scarica ultima ricevuta
                        </button>
                        <button type="button" class="ampelos-btn ampelos-btn-outline" style="color: #9d3a3a; border-color: #d8aaaa;" onclick="if(confirm('Vuoi davvero annullare il rinnovo automatico? Manterrai l\'accesso fino alla scadenza del periodo pagato.')) alert('Rinnovo automatico disattivato.');">
                            Disattiva rinnovo automatico
                        </button>
                    </div>
                </div>
            </div>

            <!-- 5. PANNELLO PROFILO -->
            <div id="panel-profilo" class="ampelos-dash-panel">
                <div style="background: #fff; padding: 32px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border); max-width: 600px;">
                    <h3 style="margin-bottom: 8px;">Dati del Profilo</h3>
                    <p style="color: var(--ampelos-text-muted); font-size: 14.5px; margin-bottom: 24px;">
                        Aggiorna le tue informazioni anagrafiche e la password di accesso.
                    </p>

                    <form onsubmit="event.preventDefault(); alert('Profilo aggiornato con successo.');">
                        <div class="ampelos-form-group">
                            <label>Nome Visualizzato</label>
                            <input type="text" class="ampelos-form-input" value="<?php echo esc_attr($current_user->display_name); ?>">
                        </div>
                        <div class="ampelos-form-group">
                            <label>Indirizzo Email</label>
                            <input type="email" class="ampelos-form-input" value="<?php echo esc_attr($current_user->user_email); ?>">
                        </div>
                        <div class="ampelos-form-group">
                            <label>Nuova Password (lascia vuoto per non modificare)</label>
                            <input type="password" class="ampelos-form-input" placeholder="••••••••••••">
                        </div>
                        <button type="submit" class="ampelos-btn ampelos-btn-primary">Aggiorna profilo</button>
                    </form>
                </div>
            </div>

        <?php endif; ?>

    </div>
</main>

<?php
get_footer();

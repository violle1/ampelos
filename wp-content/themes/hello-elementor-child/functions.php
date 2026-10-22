<?php
/**
 * Hello Elementor Child - Ampelos Functions
 * Architettura editoriale della rivista Ampelos (ampelos.it)
 * Modello a sottoscrizione / Abbonamento esclusivo
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('AMPELOS_VERSION', '1.0.0');
define('AMPELOS_THEME_DIR', get_stylesheet_directory());
define('AMPELOS_THEME_URI', get_stylesheet_directory_uri());

/**
 * 1. ENQUEUE SCRIPTS & STYLES
 */
add_action('wp_enqueue_scripts', 'ampelos_enqueue_theme_assets', 20);
function ampelos_enqueue_theme_assets() {
    // Parent theme style
    wp_enqueue_style('hello-elementor-parent-style', get_template_directory_uri() . '/style.css');

    // Child theme style
    wp_enqueue_style('ampelos-child-style', get_stylesheet_uri(), array('hello-elementor-parent-style'), AMPELOS_VERSION);

    // Google Fonts: Cormorant Garamond & Plus Jakarta Sans
    wp_enqueue_style('ampelos-google-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap', array(), null);

    // JavaScript Core
    wp_enqueue_script('ampelos-core-js', AMPELOS_THEME_URI . '/assets/js/ampelos.js', array('jquery'), AMPELOS_VERSION, true);

    // Localize Script for AJAX & User Status
    $current_user_id = get_current_user_id();
    $is_subscribed = ampelos_is_user_subscribed($current_user_id);

    wp_localize_script('ampelos-core-js', 'AmpelosSettings', array(
        'ajaxUrl'       => admin_url('admin-ajax.php'),
        'nonce'         => wp_create_nonce('ampelos_security_nonce'),
        'isLoggedIn'    => is_user_logged_in(),
        'isSubscribed'  => $is_subscribed,
        'userId'        => $current_user_id,
        'homeUrl'       => home_url('/'),
        'strings'       => array(
            'saved'         => __('Salvato nei tuoi articoli', 'hello-elementor-child-ampelos'),
            'removed'       => __('Rimosso dai tuoi articoli', 'hello-elementor-child-ampelos'),
            'loginRequired' => __('È necessario effettuare l\'accesso per salvare questo articolo.', 'hello-elementor-child-ampelos'),
        )
    ));
}

/**
 * 2. REGISTRAZIONE RUOLO "ABBONATO AMPELOS"
 */
add_action('init', 'ampelos_register_subscriber_role');
function ampelos_register_subscriber_role() {
    add_role(
        'abbonato_ampelos',
        __('Abbonato Ampelos', 'hello-elementor-child-ampelos'),
        array(
            'read'                     => true,
            'read_ampelos_articles'    => true,
            'access_ampelos_archive'   => true,
            'read_ampelos_volume'      => true,
        )
    );
}

/**
 * 3. HELPER: VERIFICA SE L'UTENTE HA UN ABBONAMENTO ATTIVO
 */
function ampelos_is_user_subscribed($user_id = null) {
    if (!$user_id) {
        $user_id = get_current_user_id();
    }
    if (!$user_id) {
        return false;
    }

    // Amministratori e redattori hanno sempre accesso illimitato
    if (user_can($user_id, 'manage_options') || user_can($user_id, 'edit_posts')) {
        return true;
    }

    $user = get_userdata($user_id);
    if (!$user) {
        return false;
    }

    // Verifica ruolo o meta di abbonamento
    $is_abbonato_role = in_array('abbonato_ampelos', (array) $user->roles);
    $status = get_user_meta($user_id, 'ampelos_subscription_status', true);

    // Se il ruolo è abbonato o lo status è 'active'
    $has_active_sub = ($is_abbonato_role || $status === 'active');

    return apply_filters('ampelos_is_user_subscribed', $has_active_sub, $user_id);
}

/**
 * 4. REGISTRAZIONE CUSTOM POST TYPES & TASSONOMIE
 * In base allo schema:
 * - Rubriche (Questioni, Luoghi, Idee, Voci)
 * - Autori
 * - Percorsi (Attivazione successiva)
 * - Atlante (Attivazione successiva)
 * - Volume (Presentazione, Edizione 2027)
 */
add_action('init', 'ampelos_register_editorial_structures');
function ampelos_register_editorial_structures() {
    
    // Tassonomia: Rubrica (per post standard o articoli)
    register_taxonomy('rubrica', array('post'), array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => __('Rubriche', 'hello-elementor-child-ampelos'),
            'singular_name'     => __('Rubrica', 'hello-elementor-child-ampelos'),
            'search_items'      => __('Cerca Rubriche', 'hello-elementor-child-ampelos'),
            'all_items'         => __('Tutte le Rubriche', 'hello-elementor-child-ampelos'),
            'edit_item'         => __('Modifica Rubrica', 'hello-elementor-child-ampelos'),
            'add_new_item'      => __('Aggiungi Nuova Rubrica', 'hello-elementor-child-ampelos'),
            'menu_name'         => __('Rubriche Ampelos', 'hello-elementor-child-ampelos'),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'rubrica'),
        'show_in_rest'      => true,
    ));

    // Tassonomia: Territorio / Area Geografica
    register_taxonomy('area_geografica', array('post', 'ampelos_luogo'), array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => __('Aree Geografiche', 'hello-elementor-child-ampelos'),
            'singular_name'     => __('Area Geografica', 'hello-elementor-child-ampelos'),
            'search_items'      => __('Cerca Aree', 'hello-elementor-child-ampelos'),
            'all_items'         => __('Tutte le Aree', 'hello-elementor-child-ampelos'),
            'menu_name'         => __('Aree Geografiche', 'hello-elementor-child-ampelos'),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
    ));

    // CPT: Autori
    register_post_type('ampelos_autore', array(
        'labels' => array(
            'name'               => __('Autori', 'hello-elementor-child-ampelos'),
            'singular_name'      => __('Autore', 'hello-elementor-child-ampelos'),
            'add_new'            => __('Aggiungi Autore', 'hello-elementor-child-ampelos'),
            'add_new_item'       => __('Nuovo Profilo Autore', 'hello-elementor-child-ampelos'),
            'edit_item'          => __('Modifica Autore', 'hello-elementor-child-ampelos'),
        ),
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'autori'),
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'          => 'dashicons-businessperson',
        'show_in_rest'       => true,
    ));

    // CPT: Percorsi (Attivazione successiva)
    register_post_type('ampelos_percorso', array(
        'labels' => array(
            'name'               => __('Percorsi', 'hello-elementor-child-ampelos'),
            'singular_name'      => __('Percorso', 'hello-elementor-child-ampelos'),
            'add_new'            => __('Aggiungi Percorso', 'hello-elementor-child-ampelos'),
            'add_new_item'       => __('Nuovo Percorso', 'hello-elementor-child-ampelos'),
        ),
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'percorsi'),
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'          => 'dashicons-location-alt',
        'show_in_rest'       => true,
    ));

    // CPT: Atlante / Luoghi (Attivazione successiva)
    register_post_type('ampelos_luogo', array(
        'labels' => array(
            'name'               => __('Atlante dei Luoghi', 'hello-elementor-child-ampelos'),
            'singular_name'      => __('Luogo', 'hello-elementor-child-ampelos'),
            'add_new'            => __('Aggiungi Luogo', 'hello-elementor-child-ampelos'),
            'add_new_item'       => __('Nuovo Luogo dell\'Atlante', 'hello-elementor-child-ampelos'),
        ),
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'atlante'),
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'          => 'dashicons-admin-site',
        'show_in_rest'       => true,
    ));

    // CPT: Volumi
    register_post_type('ampelos_volume', array(
        'labels' => array(
            'name'               => __('Volumi & Edizioni', 'hello-elementor-child-ampelos'),
            'singular_name'      => __('Volume', 'hello-elementor-child-ampelos'),
            'add_new'            => __('Aggiungi Edizione', 'hello-elementor-child-ampelos'),
            'add_new_item'       => __('Nuova Edizione Annuale', 'hello-elementor-child-ampelos'),
        ),
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'volume'),
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon'          => 'dashicons-book-alt',
        'show_in_rest'       => true,
    ));
}

/**
 * 5. CREAZIONE AUTOMATICA RUBRICHE PREDEFINITE
 */
add_action('after_switch_theme', 'ampelos_populate_default_terms');
function ampelos_populate_default_terms() {
    $rubriche = array(
        'questioni' => array(
            'name'        => 'Questioni',
            'description' => 'Fatti e cambiamenti nel mondo del vino e della viticoltura.'
        ),
        'luoghi' => array(
            'name'        => 'Luoghi',
            'description' => 'Territori, comunità, geografie e paesaggi viticoli.'
        ),
        'idee' => array(
            'name'        => 'Idee',
            'description' => 'Saggi, interpretazioni, filosofia e cultura.'
        ),
        'voci' => array(
            'name'        => 'Voci',
            'description' => 'Interviste, ritratti e dialoghi con i protagonisti.'
        )
    );

    foreach ($rubriche as $slug => $data) {
        if (!term_exists($slug, 'rubrica')) {
            wp_insert_term($data['name'], 'rubrica', array(
                'slug'        => $slug,
                'description' => $data['description']
            ));
        }
    }
}

/**
 * 6. PAYWALL & CONTROLLO ACCESSO AI CONTENUTI
 * Mostra l'anteprima (primi paragrafi) + box elegante di abbonamento per i non iscritti
 */
add_filter('the_content', 'ampelos_filter_content_for_subscription', 10);
function ampelos_filter_content_for_subscription($content) {
    if (!is_singular('post') && !is_singular('ampelos_percorso') && !is_singular('ampelos_luogo')) {
        return $content;
    }

    // Se l'utente è abbonato, visualizza il contenuto completo
    if (ampelos_is_user_subscribed()) {
        return $content;
    }

    // Per utenti non abbonati: estrai i primi 2 paragrafi per teaser
    $paragraphs = explode('</p>', $content);
    $teaser = '';
    $teaser_count = min(2, count($paragraphs));

    for ($i = 0; $i < $teaser_count; $i++) {
        if (!empty(trim($paragraphs[$i]))) {
            $teaser .= $paragraphs[$i] . '</p>';
        }
    }

    if (empty($teaser)) {
        $teaser = wp_trim_words($content, 50, '...');
    }

    // HTML del paywall card
    $paywall_html = '
    <div class="ampelos-paywall-gate">
        <div class="ampelos-paywall-card">
            <span class="ampelos-paywall-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                Articolo riservato agli abbonati
            </span>
            <h3>Continua a leggere con l\'abbonamento Ampelos</h3>
            <p>Questo approfondimento fa parte dell\'edizione per i membri. Sostieni il nostro giornalismo indipendente e la ricerca culturale senza pubblicità per accedere all\'intero archivio e a tutte le edizioni.</p>
            <div class="ampelos-paywall-actions">
                <a href="' . esc_url(home_url('/abbonati/')) . '" class="ampelos-btn ampelos-btn-terracotta ampelos-btn-lg">
                    Sottoscrivi l\'abbonamento da 9€/mese
                </a>
                <button type="button" class="ampelos-btn ampelos-btn-outline ampelos-btn-lg" onclick="AmpelosUI.openModal(\'modal-login\')">
                    Hai già un account? Accedi
                </button>
            </div>
            <p class="ampelos-paywall-note">
                Nessun vincolo. Disdici in qualsiasi momento dall\'Area Personale con un semplice clic.
            </p>
        </div>
    </div>';

    return $teaser . $paywall_html;
}

/**
 * 7. GESTIONE TEMPLATE: HOME PUBBLICA (LANDING) VS HOME MEMBRI
 */
add_filter('template_include', 'ampelos_custom_front_page_template');
function ampelos_custom_front_page_template($template) {
    if (is_front_page()) {
        if (!ampelos_is_user_subscribed()) {
            $landing_template = locate_template(array('templates/landing-page.php', 'front-page-landing.php'));
            if ($landing_template) {
                return $landing_template;
            }
        }
    }
    return $template;
}

/**
 * 8. ENDPOINTS AJAX: LOGIN, REGISTRAZIONE & ABBONAMENTO
 */
add_action('wp_ajax_nopriv_ampelos_ajax_login', 'ampelos_handle_ajax_login');
add_action('wp_ajax_ampelos_ajax_login', 'ampelos_handle_ajax_login');
function ampelos_handle_ajax_login() {
    check_ajax_referer('ampelos_security_nonce', 'security');

    $creds = array(
        'user_login'    => sanitize_text_field($_POST['username']),
        'user_password' => $_POST['password'],
        'remember'      => isset($_POST['remember']) ? true : false,
    );

    $user = wp_signon($creds, is_ssl());

    if (is_wp_error($user)) {
        wp_send_json_error(array('message' => __('Credenziali non valide. Verifica username o password.', 'hello-elementor-child-ampelos')));
    } else {
        $is_sub = ampelos_is_user_subscribed($user->ID);
        wp_send_json_success(array(
            'message'      => __('Accesso effettuato con successo.', 'hello-elementor-child-ampelos'),
            'redirect'     => home_url('/'),
            'isSubscribed' => $is_sub,
        ));
    }
}

add_action('wp_ajax_nopriv_ampelos_ajax_register', 'ampelos_handle_ajax_register');
add_action('wp_ajax_ampelos_ajax_register', 'ampelos_handle_ajax_register');
function ampelos_handle_ajax_register() {
    check_ajax_referer('ampelos_security_nonce', 'security');

    $email = sanitize_email($_POST['email']);
    $name  = sanitize_text_field($_POST['name']);
    $plan  = sanitize_text_field($_POST['plan'] ?? 'annuale');
    $pass  = $_POST['password'];

    if (!is_email($email)) {
        wp_send_json_error(array('message' => __('Inserisci un indirizzo email valido.', 'hello-elementor-child-ampelos')));
    }

    if (email_exists($email)) {
        wp_send_json_error(array('message' => __('Questo indirizzo email è già registrato. Effettua il login.', 'hello-elementor-child-ampelos')));
    }

    $username = sanitize_user(current(explode('@', $email)));
    if (username_exists($username)) {
        $username = $username . '_' . wp_rand(100, 999);
    }

    $user_id = wp_create_user($username, $pass, $email);

    if (is_wp_error($user_id)) {
        wp_send_json_error(array('message' => $user_id->get_error_message()));
    }

    // Assegna dati utente e ruolo Abbonato
    wp_update_user(array(
        'ID'           => $user_id,
        'display_name' => $name,
        'first_name'   => $name,
        'role'         => 'abbonato_ampelos'
    ));

    update_user_meta($user_id, 'ampelos_subscription_status', 'active');
    update_user_meta($user_id, 'ampelos_subscription_plan', $plan);
    update_user_meta($user_id, 'ampelos_subscription_started', current_time('mysql'));

    // Login automatico
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);

    wp_send_json_success(array(
        'message'  => __('Abbonamento attivato con successo! Benvenuto in Ampelos.', 'hello-elementor-child-ampelos'),
        'redirect' => home_url('/')
    ));
}

// AJAX: Salva / Rimuovi articolo nei preferiti
add_action('wp_ajax_ampelos_toggle_save_article', 'ampelos_handle_toggle_save_article');
function ampelos_handle_toggle_save_article() {
    check_ajax_referer('ampelos_security_nonce', 'security');

    if (!is_user_logged_in()) {
        wp_send_json_error(array('message' => __('Accedi per salvare gli articoli.', 'hello-elementor-child-ampelos')));
    }

    $post_id = intval($_POST['post_id']);
    $user_id = get_current_user_id();

    $saved = (array) get_user_meta($user_id, 'ampelos_saved_articles', true);
    if (!is_array($saved)) {
        $saved = array();
    }

    $action = '';
    if (in_array($post_id, $saved)) {
        $saved = array_diff($saved, array($post_id));
        $action = 'removed';
    } else {
        $saved[] = $post_id;
        $action = 'saved';
    }

    update_user_meta($user_id, 'ampelos_saved_articles', array_values($saved));

    wp_send_json_success(array(
        'action' => $action,
        'count'  => count($saved)
    ));
}

/**
 * 9. SHORTCODES EDITORIALI
 */
// Shortcode: Piani di Abbonamento
add_shortcode('ampelos_piani', 'ampelos_shortcode_plans');
function ampelos_shortcode_plans($atts) {
    ob_start();
    ?>
    <section class="ampelos-plans-section" id="piani">
        <div class="ampelos-container">
            <div class="ampelos-section-heading">
                <span class="ampelos-section-tag">Iscrizione e Sottoscrizione</span>
                <h2>Scegli il tuo piano di lettura</h2>
                <p>Nessun banner promozionale, nessun contenuto sponsorizzato. Solo saggistica, reportage territoriali e critica indipendente.</p>
            </div>

            <div class="ampelos-plans-grid">
                <!-- Piano Mensile -->
                <div class="ampelos-plan-card">
                    <h3 class="ampelos-plan-name">Digitale Mensile</h3>
                    <p class="ampelos-plan-desc">Accesso flessibile per scoprire la rivista mese per mese.</p>
                    <div class="ampelos-plan-price">€ 9</div>
                    <div class="ampelos-plan-cycle">al mese, disdici quando vuoi</div>
                    <ul class="ampelos-plan-features">
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Tutti gli articoli di tutte le Rubriche
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Accesso completo all'archivio storico
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Newsletter settimanale della Redazione
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Area personale con segnalibri e salvati
                        </li>
                    </ul>
                    <button type="button" class="ampelos-btn ampelos-btn-outline" onclick="AmpelosUI.openRegisterPlan('mensile')">
                        Attiva Mensile
                    </button>
                </div>

                <!-- Piano Annuale (Consigliato) -->
                <div class="ampelos-plan-card featured">
                    <span class="ampelos-plan-badge-featured">Il più scelto • 2 mesi in omaggio</span>
                    <h3 class="ampelos-plan-name">Digitale Annuale</h3>
                    <p class="ampelos-plan-desc">La formula ideale per seguire l'intero anno editoriale.</p>
                    <div class="ampelos-plan-price">€ 89</div>
                    <div class="ampelos-plan-cycle">all'anno (pari a 7,40€/mese)</div>
                    <ul class="ampelos-plan-features">
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Tutti i vantaggi del piano Mensile
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Accesso a <strong>Percorsi</strong> e <strong>Atlante</strong>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Sconto del 20% sul Volume Monografico cartaceo
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Inviti prioritari agli incontri con gli Autori
                        </li>
                    </ul>
                    <button type="button" class="ampelos-btn ampelos-btn-primary" onclick="AmpelosUI.openRegisterPlan('annuale')">
                        Sottoscrivi Annuale
                    </button>
                </div>

                <!-- Piano Sostenitore + Volume 2027 -->
                <div class="ampelos-plan-card">
                    <h3 class="ampelos-plan-name">Sostenitore + Volume 2027</h3>
                    <p class="ampelos-plan-desc">Per chi desidera sostenere il progetto e collezionare il volume fisico.</p>
                    <div class="ampelos-plan-price">€ 160</div>
                    <div class="ampelos-plan-cycle">all'anno con libro stampato incluso</div>
                    <ul class="ampelos-plan-features">
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Tutto il piano Annuale digitale
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <strong>Copia numerata del Volume Edizione 2027</strong> rilegata in tela Fedrigoni, spedita a domicilio
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Menzione del tuo nome nel Colophon dei sostenitori
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Accesso diretto alla corrispondenza con la Redazione
                        </li>
                    </ul>
                    <button type="button" class="ampelos-btn ampelos-btn-terracotta" onclick="AmpelosUI.openRegisterPlan('sostenitore')">
                        Diventa Sostenitore
                    </button>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * 10. SETUP AUTOMATICO STRUTTURA DEL SITO (MATCHING RADICE SITO AMPELOS)
 * Crea le pagine principali se non esistono già
 */
add_action('admin_init', 'ampelos_check_and_create_pages');
function ampelos_check_and_create_pages() {
    if (!current_user_can('manage_options') || get_option('ampelos_pages_initialized')) {
        return;
    }

    $pages = array(
        'home'                  => array('title' => 'Home', 'template' => 'front-page.php'),
        'tutti-gli-articoli'    => array('title' => 'Tutti gli articoli', 'template' => 'archive.php'),
        'percorsi'              => array('title' => 'Percorsi', 'template' => 'page.php'),
        'atlante'               => array('title' => 'Atlante', 'template' => 'page.php'),
        'autori'                => array('title' => 'Autori', 'template' => 'page-autori.php'),
        'volume'                => array('title' => 'Volume', 'template' => 'page-volume.php'),
        'chi-siamo'             => array('title' => 'Chi siamo', 'template' => 'page-chi-siamo.php'),
        'abbonati'              => array('title' => 'Abbonati', 'template' => 'page-abbonati.php'),
        'area-personale'        => array('title' => 'Area Personale', 'template' => 'page-area-personale.php'),
        'privacy'               => array('title' => 'Privacy Policy', 'template' => 'page.php'),
        'cookie'                => array('title' => 'Cookie Policy', 'template' => 'page.php'),
        'accessibilita'         => array('title' => 'Accessibilità', 'template' => 'page.php'),
        'condizioni-di-utilizzo'=> array('title' => 'Condizioni di utilizzo', 'template' => 'page.php'),
        'condizioni-abbonamento'=> array('title' => 'Condizioni di abbonamento', 'template' => 'page.php'),
        'informazioni-testata'  => array('title' => 'Informazioni sulla testata', 'template' => 'page.php'),
    );

    foreach ($pages as $slug => $data) {
        $existing = get_page_by_path($slug);
        if (!$existing) {
            $page_id = wp_insert_post(array(
                'post_title'     => $data['title'],
                'post_name'      => $slug,
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'comment_status' => 'closed'
            ));
            if ($page_id && !empty($data['template'])) {
                update_post_meta($page_id, '_wp_page_template', $data['template']);
            }
        }
    }

    update_option('ampelos_pages_initialized', 1);
}

/**
 * 11. RESTRIZIONE TOTALE DI NAVIGAZIONE PER I NON ABBONATI
 * I visitatori non iscritti/non abbonati possono visualizzare unicamente la Home Page (e la pagina di sottoscrizione).
 * Qualsiasi tentativo di accedere ad altre sezioni/articoli reindirizza alla Home Page.
 */
add_action('template_redirect', 'ampelos_restrict_navigation_to_subscribers');
function ampelos_restrict_navigation_to_subscribers() {
    // La Home page è sempre permessa a tutti per consultare il progetto e il modello
    if (is_front_page()) {
        return;
    }

    // Pagine ammesse per sottoscrizione e termini legali
    if (is_page(array('abbonati', 'privacy', 'cookie', 'condizioni-abbonamento', 'condizioni-di-utilizzo'))) {
        return;
    }

    // Se l'utente non è abbonato, reindirizza alla home
    if (!ampelos_is_user_subscribed()) {
        wp_safe_redirect(home_url('/'));
        exit;
    }
}

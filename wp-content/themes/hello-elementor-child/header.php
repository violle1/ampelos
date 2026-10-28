<?php
/**
 * Header Template - Ampelos Theme
 */
if (!defined('ABSPATH')) {
    exit;
}
$is_subscribed = ampelos_is_user_subscribed();
$current_user  = wp_get_current_user();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Utility Topbar -->
<aside class="ampelos-topbar" aria-label="Informazioni edizione">
    <div class="ampelos-container">
        <div class="ampelos-topbar-edition">
            <span class="ampelos-badge-edition">Edizione 2027</span>
            <span>Rivista trimestrale di cultura del vino, geografie e pensiero critico</span>
        </div>
        <div class="ampelos-topbar-actions">
            <?php if ($is_subscribed) : ?>
                <a href="<?php echo esc_url(home_url('/chi-siamo/')); ?>" class="ampelos-topbar-link">Manifesto</a>
                <span>•</span>
                <a href="<?php echo esc_url(home_url('/volume/')); ?>" class="ampelos-topbar-link">Volume Monografico</a>
                <span>•</span>
                <a href="<?php echo esc_url(home_url('/area-personale/')); ?>" class="ampelos-topbar-link">
                    Area Personale (<?php echo esc_html($current_user->display_name); ?>)
                </a>
                <span>•</span>
                <a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>" class="ampelos-topbar-link">Esci</a>
            <?php else : ?>
                <span style="color: #9bb5a5;">Accesso Esclusivo per Abbonati</span>
                <span>•</span>
                <a href="javascript:void(0)" onclick="AmpelosUI.openModal('modal-login')" class="ampelos-topbar-link">Accedi</a>
            <?php endif; ?>
        </div>
    </div>
</aside>

<!-- Main Header -->
<header class="ampelos-header" role="banner">
    <div class="ampelos-container">
        <div class="ampelos-header-inner">
            <!-- Left: Cerca solo per abbonati, badge informativo per ospiti -->
            <div class="ampelos-header-left">
                <?php if ($is_subscribed) : ?>
                    <button type="button" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm" onclick="AmpelosUI.openModal('modal-search')" aria-label="Cerca nel sito">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <span>Cerca</span>
                    </button>
                <?php else : ?>
                    <span style="font-size: 11.5px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: var(--ampelos-sage);">
                        Rivista a Sottoscrizione
                    </span>
                <?php endif; ?>
            </div>

            <!-- Center: Logo Ufficiale Ampelos -->
            <div class="ampelos-brand-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" title="Ampelos - Rivista di cultura del vino">
                    <img src="<?php echo esc_url(AMPELOS_THEME_URI . '/assets/images/ampelos.png'); ?>" alt="ἄμπελος AMPELOS - Rivista di cultura del vino e territori" width="220" height="161">
                </a>
            </div>

            <!-- Right: Subscription / User CTA -->
            <div class="ampelos-header-right">
                <?php if ($is_subscribed) : ?>
                    <button type="button" class="ampelos-btn ampelos-btn-outline ampelos-btn-icon" onclick="AmpelosUI.openModal('modal-search')" aria-label="Cerca" title="Cerca nell'archivio">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
                    <a href="<?php echo esc_url(home_url('/area-personale/')); ?>" class="ampelos-btn ampelos-btn-primary ampelos-header-user-btn" aria-label="Area Personale" title="Area Personale (<?php echo esc_html($current_user->display_name); ?>)">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span class="ampelos-btn-text">Area Personale</span>
                    </a>
                    <button type="button" class="ampelos-mobile-toggle" onclick="AmpelosUI.toggleMobileDrawer(true)" aria-label="Menu di navigazione">
                        ☰
                    </button>
                <?php else : ?>
                    <button type="button" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm" onclick="AmpelosUI.openModal('modal-login')">
                        Accedi
                    </button>
                    <a href="<?php echo esc_url(home_url('/abbonati/')); ?>" class="ampelos-btn ampelos-btn-terracotta ampelos-btn-sm">
                        Abbonati
                    </a>
                    <button type="button" class="ampelos-mobile-toggle" onclick="AmpelosUI.toggleMobileDrawer(true)" aria-label="Menu di navigazione">
                        ☰
                    </button>
                <?php endif; ?>
            </div>
        </div>

        <!-- Primary Navigation Menu -->
        <nav class="ampelos-nav-bar" role="navigation" aria-label="Menu Principale">
            <ul class="ampelos-menu-primary">
                <li class="<?php echo is_front_page() ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                </li>
                <li class="has-dropdown <?php echo (is_home() || is_singular('post') || is_tax('rubrica') || (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], 'tutti-gli-articoli') !== false)) ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>">
                        Leggi
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <div class="ampelos-dropdown">
                        <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-dropdown-item">
                            <div class="ampelos-dropdown-title">Tutti gli articoli</div>
                            <div class="ampelos-dropdown-desc">Tutta la produzione editoriale e archivio</div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/rubrica/questioni/')); ?>" class="ampelos-dropdown-item">
                            <div class="ampelos-dropdown-title">Questioni</div>
                            <div class="ampelos-dropdown-desc">Fatti e cambiamenti nel settore vitivinicolo</div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/rubrica/luoghi/')); ?>" class="ampelos-dropdown-item">
                            <div class="ampelos-dropdown-title">Luoghi</div>
                            <div class="ampelos-dropdown-desc">Territori, comunità e paesaggi</div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/rubrica/idee/')); ?>" class="ampelos-dropdown-item">
                            <div class="ampelos-dropdown-title">Idee</div>
                            <div class="ampelos-dropdown-desc">Saggi, interpretazioni e pensiero critico</div>
                        </a>
                        <a href="<?php echo esc_url(home_url('/rubrica/voci/')); ?>" class="ampelos-dropdown-item">
                            <div class="ampelos-dropdown-title">Voci</div>
                            <div class="ampelos-dropdown-desc">Interviste e ritratti ai protagonisti</div>
                        </a>
                    </div>
                </li>
                <li class="<?php echo (is_page('percorsi') || (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], 'percorsi') !== false)) ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo esc_url(home_url('/percorsi/')); ?>">
                        Percorsi
                        <span class="ampelos-tag-future">In arrivo</span>
                    </a>
                </li>
                <li class="<?php echo (is_page('atlante') || (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], 'atlante') !== false)) ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo esc_url(home_url('/atlante/')); ?>">
                        Atlante
                        <span class="ampelos-tag-future">In arrivo</span>
                    </a>
                </li>
                <li class="<?php echo (is_page('autori') || (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], 'autori') !== false)) ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo esc_url(home_url('/autori/')); ?>">Autori</a>
                </li>
                <li class="<?php echo (is_page('volume') || (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], 'volume') !== false)) ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo esc_url(home_url('/volume/')); ?>">Volume</a>
                </li>
                <li class="<?php echo (is_page('chi-siamo') || (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], 'chi-siamo') !== false)) ? 'current-menu-item' : ''; ?>">
                    <a href="<?php echo esc_url(home_url('/chi-siamo/')); ?>">Chi siamo</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

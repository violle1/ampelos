<?php
/**
 * Footer Template - Ampelos Theme
 */
if (!defined('ABSPATH')) {
    exit;
}
?>

<footer class="ampelos-footer" role="contentinfo">
    <div class="ampelos-container">
        <div class="ampelos-footer-grid">
            <!-- Brand & Mission Column -->
            <div class="ampelos-footer-col">
                <div style="margin-bottom: 20px;">
                    <img src="<?php echo esc_url(AMPELOS_THEME_URI . '/assets/images/ampelos.png'); ?>" alt="Ampelos" style="filter: brightness(0) invert(1); height: 75px; width: auto;">
                </div>
                <p style="color: #a2b5aa; font-size: 13.5px; line-height: 1.6; max-width: 320px;">
                    <strong>Ampelos</strong> è una rivista trimestrale indipendente di cultura del vino, geografie e scienze umane. Pubblicata senza inserzioni pubblicitarie, vive unicamente della fiducia e del sostegno dei suoi abbonati.
                </p>
                <div style="margin-top: 18px; font-size: 12px; color: #7f9488;">
                    ISSN: 2984-9128 • Reg. Tribunale di Roma n. 42/2026
                </div>
            </div>

            <!-- Rubriche & Lettura -->
            <div class="ampelos-footer-col">
                <h4>Leggi</h4>
                <ul class="ampelos-footer-links">
                    <li><a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>">Tutti gli articoli</a></li>
                    <li><a href="<?php echo esc_url(home_url('/rubrica/questioni/')); ?>">Questioni (Fatti e cambiamenti)</a></li>
                    <li><a href="<?php echo esc_url(home_url('/rubrica/luoghi/')); ?>">Luoghi (Territori e comunità)</a></li>
                    <li><a href="<?php echo esc_url(home_url('/rubrica/idee/')); ?>">Idee (Saggi e interpretazioni)</a></li>
                    <li><a href="<?php echo esc_url(home_url('/rubrica/voci/')); ?>">Voci (Interviste e ritratti)</a></li>
                    <li><a href="<?php echo esc_url(home_url('/percorsi/')); ?>">Percorsi <span class="ampelos-tag-future">Prossimamente</span></a></li>
                    <li><a href="<?php echo esc_url(home_url('/atlante/')); ?>">Atlante <span class="ampelos-tag-future">Prossimamente</span></a></li>
                </ul>
            </div>

            <!-- Testata & Progetto -->
            <div class="ampelos-footer-col">
                <h4>La Rivista</h4>
                <ul class="ampelos-footer-links">
                    <li><a href="<?php echo esc_url(home_url('/chi-siamo/')); ?>">Manifesto e metodo editoriale</a></li>
                    <li><a href="<?php echo esc_url(home_url('/chi-siamo/#redazione')); ?>">Redazione</a></li>
                    <li><a href="<?php echo esc_url(home_url('/autori/')); ?>">Elenco autori</a></li>
                    <li><a href="<?php echo esc_url(home_url('/volume/')); ?>">Volume Edizione 2027</a></li>
                    <li><a href="<?php echo esc_url(home_url('/chi-siamo/#collabora')); ?>">Collabora con noi</a></li>
                    <li><a href="<?php echo esc_url(home_url('/chi-siamo/#contatti')); ?>">Contatti</a></li>
                </ul>
            </div>

            <!-- Newsletter Box & Abbonamento -->
            <div class="ampelos-footer-col">
                <h4>La Newsletter</h4>
                <p style="color: #a2b5aa; font-size: 13px; margin-bottom: 16px;">
                    Ricevi ogni giovedì la lettera del Direttore con anticipazioni sui saggi e riflessioni settimanali.
                </p>
                <form class="ampelos-form-newsletter" onsubmit="event.preventDefault(); alert('Grazie per esserti iscritto alla newsletter di Ampelos.');">
                    <div style="display: flex; gap: 8px;">
                        <input type="email" placeholder="Il tuo indirizzo email" required class="ampelos-form-input" style="background:#0e1d15; border-color: rgba(255,255,255,0.15); color: #fff;">
                        <button type="submit" class="ampelos-btn ampelos-btn-terracotta" style="flex-shrink: 0;">Iscriviti</button>
                    </div>
                </form>
                <div style="margin-top: 20px;">
                    <a href="<?php echo esc_url(home_url('/abbonati/')); ?>" class="ampelos-btn ampelos-btn-outline" style="border-color: #557563; color: #d0ded6; width: 100%; text-align: center;">
                        Sottoscrivi l'Abbonamento
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom: Pagine di Servizio / Note Legali -->
        <div class="ampelos-footer-bottom">
            <div class="ampelos-legal-links">
                <a href="<?php echo esc_url(home_url('/informazioni-testata/')); ?>">Informazioni sulla testata</a> • 
                <a href="<?php echo esc_url(home_url('/privacy/')); ?>">Privacy</a> • 
                <a href="<?php echo esc_url(home_url('/cookie/')); ?>">Cookie</a> • 
                <a href="<?php echo esc_url(home_url('/accessibilita/')); ?>">Accessibilità</a> • 
                <a href="<?php echo esc_url(home_url('/condizioni-di-utilizzo/')); ?>">Condizioni di utilizzo</a> • 
                <a href="<?php echo esc_url(home_url('/condizioni-abbonamento/')); ?>">Condizioni di abbonamento</a>
            </div>
            <div>
                © <?php echo date('Y'); ?> Ampelos Edizioni S.r.l. Tutti i diritti riservati.
            </div>
        </div>
    </div>
</footer>

<?php $is_subscribed_drawer = ampelos_is_user_subscribed(); ?>
<!-- DRAWER DI NAVIGAZIONE MOBILE (OFF-CANVAS) -->
<div id="ampelos-drawer-overlay" class="ampelos-drawer-overlay" onclick="AmpelosUI.toggleMobileDrawer(false)"></div>
<aside id="ampelos-mobile-drawer" class="ampelos-mobile-drawer" aria-label="Menu Mobile">
    <div class="ampelos-drawer-header">
        <div style="display: flex; align-items: center; gap: 10px;">
            <img src="<?php echo esc_url(AMPELOS_THEME_URI . '/assets/images/ampelos.png'); ?>" alt="Ampelos" style="height: 38px; width: auto;">
            <span style="font-family: var(--font-serif); font-size: 19px; font-weight: 700; color: var(--ampelos-primary); letter-spacing: 0.04em;">ἄμπελος</span>
        </div>
        <button type="button" class="ampelos-drawer-close" onclick="AmpelosUI.toggleMobileDrawer(false)" aria-label="Chiudi menu">&times;</button>
    </div>
    <div class="ampelos-drawer-nav">
        <ul>
            <?php if ($is_subscribed_drawer) : ?>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <li>
                    <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>">
                        <strong>Leggi (Tutti gli articoli)</strong> <span>→</span>
                    </a>
                    <div class="ampelos-drawer-subnav">
                        <a href="<?php echo esc_url(home_url('/rubrica/questioni/')); ?>">• Questioni</a>
                        <a href="<?php echo esc_url(home_url('/rubrica/luoghi/')); ?>">• Luoghi</a>
                        <a href="<?php echo esc_url(home_url('/rubrica/idee/')); ?>">• Idee</a>
                        <a href="<?php echo esc_url(home_url('/rubrica/voci/')); ?>">• Voci</a>
                    </div>
                </li>
                <li><a href="<?php echo esc_url(home_url('/percorsi/')); ?>">Percorsi <span class="ampelos-tag-future">In arrivo</span></a></li>
                <li><a href="<?php echo esc_url(home_url('/atlante/')); ?>">Atlante <span class="ampelos-tag-future">In arrivo</span></a></li>
                <li><a href="<?php echo esc_url(home_url('/autori/')); ?>">Autori</a></li>
                <li><a href="<?php echo esc_url(home_url('/volume/')); ?>">Volume Monografico</a></li>
                <li><a href="<?php echo esc_url(home_url('/chi-siamo/')); ?>">Chi siamo</a></li>
            <?php else : ?>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="ampelos-drawer-footer">
        <?php if ($is_subscribed_drawer) : ?>
            <a href="<?php echo esc_url(home_url('/area-personale/')); ?>" class="ampelos-btn ampelos-btn-primary" style="justify-content: center;">
                Area Personale
            </a>
            <a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm" style="justify-content: center;">
                Disconnetti account
            </a>
        <?php else : ?>
            <a href="<?php echo esc_url(home_url('/abbonati/')); ?>" class="ampelos-btn ampelos-btn-terracotta" style="justify-content: center;">
                Sottoscrivi Abbonamento
            </a>
            <button type="button" class="ampelos-btn ampelos-btn-outline" style="justify-content: center;" onclick="AmpelosUI.toggleMobileDrawer(false); AmpelosUI.openModal('modal-login');">
                Accedi (Membri)
            </button>
        <?php endif; ?>
    </div>
</aside>

<!-- MODAL DI LOGIN (Dialog con Light-Dismiss nativo & containment) -->
<dialog id="modal-login" class="ampelos-modal" aria-labelledby="modal-login-title">
    <div class="ampelos-modal-header">
        <h3 id="modal-login-title">Accedi ad Ampelos</h3>
        <button type="button" class="ampelos-modal-close" aria-label="Chiudi finestra">&times;</button>
    </div>
    <div class="ampelos-modal-body">
        <p style="font-size: 14px; color: var(--ampelos-text-muted); margin-bottom: 16px; line-height: 1.5;">
            Inserisci le tue credenziali di abbonato per accedere ai saggi completi e all'area personale.
        </p>

        <!-- Box Credenziali di Collaudo -->
        <div style="background: var(--ampelos-bg); border: 1px solid var(--ampelos-border-light); border-left: 3px solid var(--ampelos-terracotta); padding: 10px 14px; border-radius: 6px; margin-bottom: 18px; font-size: 12.5px; line-height: 1.5; color: var(--ampelos-text);">
            <div style="font-weight: 700; color: var(--ampelos-primary); margin-bottom: 2px;">🔑 Credenziali demo preimpostate:</div>
            <div>Email: <strong style="color: var(--ampelos-terracotta);">andrea.utenteprova@email.it</strong></div>
            <div>Password: <strong style="color: var(--ampelos-terracotta);">ampelos2026</strong></div>
        </div>

        <form id="ampelos-form-login">
            <div class="ampelos-form-message"></div>
            <div class="ampelos-form-group">
                <label for="login-username">Username o Email</label>
                <input type="text" id="login-username" name="username" class="ampelos-form-input" value="andrea.utenteprova@email.it" required autocomplete="username">
            </div>
            <div class="ampelos-form-group">
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="password" class="ampelos-form-input" value="ampelos2026" required autocomplete="current-password">
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 22px; font-size: 13px;">
                <label style="display: flex; align-items: center; gap: 6px; cursor: pointer; color: var(--ampelos-text);">
                    <input type="checkbox" name="remember" checked> Ricordami
                </label>
                <a href="<?php echo esc_url(wp_lostpassword_url()); ?>" style="text-decoration: underline;">Password dimenticata?</a>
            </div>
            <button type="submit" class="ampelos-btn ampelos-btn-primary ampelos-btn-lg" style="width: 100%;">
                Accedi alla Rivista
            </button>
            <div style="text-align: center; margin-top: 20px; font-size: 13.5px; color: var(--ampelos-text-muted);">
                Non sei ancora abbonato? 
                <a href="javascript:void(0)" onclick="AmpelosUI.closeModal('modal-login'); AmpelosUI.openModal('modal-register');" style="color: var(--ampelos-terracotta); font-weight: 600;">
                    Sottoscrivi un piano →
                </a>
            </div>
        </form>
    </div>
</dialog>

<!-- MODAL DI REGISTRAZIONE & SOTTOSCRIZIONE -->
<dialog id="modal-register" class="ampelos-modal" aria-labelledby="modal-register-title">
    <div class="ampelos-modal-header">
        <h3 id="modal-register-title">Sottoscrivi l'Abbonamento</h3>
        <button type="button" class="ampelos-modal-close" aria-label="Chiudi finestra">&times;</button>
    </div>
    <div class="ampelos-modal-body">
        <p style="font-size: 14px; color: var(--ampelos-text-muted); margin-bottom: 20px;">
            Crea il tuo profilo di lettore e sblocca subito tutti i contenuti della rivista.
        </p>
        <form id="ampelos-form-register">
            <div class="ampelos-form-message"></div>
            <div class="ampelos-form-group">
                <label for="reg-plan">Piano scelto</label>
                <select id="ampelos-register-plan" name="plan" class="ampelos-form-select">
                    <option value="annuale">Digitale Annuale (€ 89/anno - Consigliato)</option>
                    <option value="mensile">Digitale Mensile (€ 9/mese)</option>
                    <option value="sostenitore">Sostenitore + Volume 2027 cartaceo (€ 160/anno)</option>
                </select>
            </div>
            <div class="ampelos-form-group">
                <label for="reg-name">Nome e Cognome</label>
                <input type="text" id="reg-name" name="name" class="ampelos-form-input" required autocomplete="name">
            </div>
            <div class="ampelos-form-group">
                <label for="reg-email">Indirizzo Email</label>
                <input type="email" id="reg-email" name="email" class="ampelos-form-input" required autocomplete="email">
            </div>
            <div class="ampelos-form-group">
                <label for="reg-password">Scegli una Password</label>
                <input type="password" id="reg-password" name="password" class="ampelos-form-input" required minlength="6" autocomplete="new-password">
            </div>
            <p style="font-size: 12px; color: var(--ampelos-text-muted); line-height: 1.4; margin-bottom: 20px;">
                Completando la registrazione accetti i nostri <a href="<?php echo esc_url(home_url('/condizioni-abbonamento/')); ?>" target="_blank">Termini di Abbonamento</a> e l'informativa sulla <a href="<?php echo esc_url(home_url('/privacy/')); ?>" target="_blank">Privacy</a>.
            </p>
            <button type="submit" class="ampelos-btn ampelos-btn-terracotta ampelos-btn-lg" style="width: 100%;">
                Conferma e Attiva Abbonamento
            </button>
        </form>
    </div>
</dialog>

<!-- MODAL DI RICERCA -->
<dialog id="modal-search" class="ampelos-modal" aria-labelledby="modal-search-title">
    <div class="ampelos-modal-header">
        <h3 id="modal-search-title">Cerca nell'archivio Ampelos</h3>
        <button type="button" class="ampelos-modal-close" aria-label="Chiudi finestra">&times;</button>
    </div>
    <div class="ampelos-modal-body">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <div class="ampelos-form-group">
                <input type="search" id="ampelos-search-input" name="s" class="ampelos-form-input" placeholder="Es. Etna, fermentazione spontanea, Barolo, terroir..." autocomplete="off" autofocus>
            </div>
            <div id="ampelos-search-results" style="max-height: 300px; overflow-y: auto; margin-top: 16px;">
                <p class="ampelos-search-placeholder" style="font-size: 13px; color: var(--ampelos-text-muted);">
                    Cerca per parole chiave, titolo di saggio, autore o area geografica.
                </p>
            </div>
        </form>
    </div>
</dialog>

<!-- PULSANTE TORNA SU (BACK TO TOP) -->
<button type="button" id="ampelos-back-to-top" class="ampelos-back-to-top" aria-label="Torna all'inizio della pagina" title="Torna su">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <line x1="12" y1="19" x2="12" y2="5"></line>
        <polyline points="5 12 12 5 19 12"></polyline>
    </svg>
</button>

<?php wp_footer(); ?>
</body>
</html>

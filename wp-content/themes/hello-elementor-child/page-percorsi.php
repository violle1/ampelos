<?php
/**
 * Template Name: Percorsi Tematici
 * Sezione Percorsi Tematici Ampelos (Attivazione Successiva)
 * Perfettamente allineato alla versione di sviluppo index.html
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main" style="padding: 60px 0 90px; background: #ffffff;">
    <div class="ampelos-container">
        <div style="max-width: 820px; margin: 0 auto; text-align: center; background: #fff; border: 1px solid var(--ampelos-border); padding: 60px 40px; border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
            <span class="ampelos-tag-future" style="font-size: 11px; padding: 4px 10px; margin-bottom: 16px; display: inline-block;">
                Attivazione Successiva • In Corso di Realizzazione
            </span>
            <h1 style="font-size: 38px; margin-bottom: 16px; color: var(--ampelos-primary);">I Percorsi Ampelos</h1>
            <p style="font-size: 17px; color: var(--ampelos-text-muted); line-height: 1.7; margin-bottom: 28px;">
                I <strong>Percorsi Tematici</strong> sono fili conduttori di lettura monografica curati dalla redazione, ideati per approfondire questioni verticali attraverso una sequenza ragionata di saggi, carte e interviste.
            </p>

            <div style="display: grid; gap: 16px; text-align: left; margin: 30px 0;">
                <div style="background: #ffffff; padding: 20px; border-radius: var(--radius-sm); border: 1px solid var(--ampelos-border-light);">
                    <h4 style="margin: 0 0 6px; font-size: 17px; color: var(--ampelos-primary);">01 • Clima e quote: la risalita altimetrica dei vitigni</h4>
                    <p style="font-size: 13.5px; color: var(--ampelos-text-muted); margin: 0;">Un percorso in 6 tappe tra Valtellina, Valle d'Aosta e Alto Adige.</p>
                </div>
                <div style="background: #ffffff; padding: 20px; border-radius: var(--radius-sm); border: 1px solid var(--ampelos-border-light);">
                    <h4 style="margin: 0 0 6px; font-size: 17px; color: var(--ampelos-primary);">02 • Il ritorno della terracotta: dall'anfora caucasica al grès contemporaneo</h4>
                    <p style="font-size: 13.5px; color: var(--ampelos-text-muted); margin: 0;">Storia dei vasi vinari e trasformazioni della microssigenazione.</p>
                </div>
            </div>

            <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-primary">
                Leggi gli articoli correnti
            </a>
        </div>
    </div>
</main>

<?php
get_footer();

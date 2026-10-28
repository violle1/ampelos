<?php
/**
 * Template Name: Atlante Geografico
 * Sezione Atlante dei Luoghi Ampelos (Attivazione Successiva)
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
            <h1 style="font-size: 38px; margin-bottom: 16px; color: var(--ampelos-primary);">L'Atlante Geografico di Ampelos</h1>
            <p style="font-size: 17px; color: var(--ampelos-text-muted); line-height: 1.7; margin-bottom: 28px;">
                La prima cartografia digitale interdisciplinare dedicata ai terroir, alle faglie geologiche e ai microclimi, collegata ai saggi di territorio pubblicati nella rubrica Luoghi.
            </p>

            <div style="background: #182e22; border-radius: var(--radius-md); padding: 48px; color: #fff; margin: 30px 0; box-shadow: var(--shadow-md);">
                <div style="font-family: var(--font-serif); font-size: 26px; font-style: italic; margin-bottom: 12px; color: #faf7f2;">
                    Mappa Vettoriale Geologica in Preparazione
                </div>
                <p style="color: #a8c4b3; font-size: 14px; max-width: 480px; margin: 0 auto; line-height: 1.6;">
                    Rilievi topografici ad alta risoluzione, curve di livello e profili pedologici dell'Etna, delle Langhe e delle Alpi centro-occidentali.
                </p>
            </div>

            <a href="<?php echo esc_url(home_url('/rubrica/luoghi/')); ?>" class="ampelos-btn ampelos-btn-primary">
                Esplora la Rubrica Luoghi
            </a>
        </div>
    </div>
</main>

<?php
get_footer();

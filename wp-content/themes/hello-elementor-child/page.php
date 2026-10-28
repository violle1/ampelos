<?php
/**
 * Generic Page Template - Ampelos Theme
 * Utilizzato per Pagine Istituzionali, Pagine di Servizio, Percorsi e Atlante
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
$slug = get_post_field('post_name', get_post());

if (empty($slug) || is_post_type_archive()) {
    if (strpos($request_uri, 'percorsi') !== false) {
        $slug = 'percorsi';
    } elseif (strpos($request_uri, 'atlante') !== false) {
        $slug = 'atlante';
    }
}

$is_future_section = in_array($slug, array('percorsi', 'atlante'));
?>

<main id="primary" class="site-main" style="padding: 60px 0 90px; background: #ffffff;">
    <div class="ampelos-container">

        <?php if ($is_future_section) : ?>
            <!-- SEZIONE IN ATTIVAZIONE SUCCESSIVA (PERCORSI / ATLANTE) IDENTICA A INDEX.HTML -->
            <?php if ($slug === 'percorsi') : ?>
                <div style="max-width: 820px; margin: 0 auto; text-align: center; background: #fff; border: 1px solid var(--ampelos-border); padding: 60px 40px; border-radius: var(--radius-md);">
                    <span class="ampelos-tag-future" style="font-size: 11px; padding: 4px 10px; margin-bottom: 16px; display: inline-block;">
                        Attivazione Successiva • In Corso di Realizzazione
                    </span>
                    <h1 style="font-size: 38px; margin-bottom: 16px;">I Percorsi Ampelos</h1>
                    <p style="font-size: 17px; color: var(--ampelos-text-muted); line-height: 1.7; margin-bottom: 28px;">
                        I <strong>Percorsi Tematici</strong> sono fili conduttori di lettura monografica curati dalla redazione, ideati per approfondire questioni verticali attraverso una sequenza ragionata di saggi, carte e interviste.
                    </p>

                    <div style="display: grid; gap: 16px; text-align: left; margin: 30px 0;">
                        <div style="background: var(--ampelos-paper); padding: 20px; border-radius: var(--radius-sm);">
                            <h4 style="margin: 0 0 6px;">01 • Clima e quote: la risalita altimetrica dei vitigni</h4>
                            <p style="font-size: 13.5px; color: var(--ampelos-text-muted); margin: 0;">Un percorso in 6 tappe tra Valtellina, Valle d'Aosta e Alto Adige.</p>
                        </div>
                        <div style="background: var(--ampelos-paper); padding: 20px; border-radius: var(--radius-sm);">
                            <h4 style="margin: 0 0 6px;">02 • Il ritorno della terracotta: dall'anfora caucasica al grès contemporaneo</h4>
                            <p style="font-size: 13.5px; color: var(--ampelos-text-muted); margin: 0;">Storia dei vasi vinari e trasformazioni della microssigenazione.</p>
                        </div>
                    </div>

                    <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-primary">
                        Leggi gli articoli correnti
                    </a>
                </div>
            <?php else : ?>
                <div style="max-width: 820px; margin: 0 auto; text-align: center; background: #fff; border: 1px solid var(--ampelos-border); padding: 60px 40px; border-radius: var(--radius-md);">
                    <span class="ampelos-tag-future" style="font-size: 11px; padding: 4px 10px; margin-bottom: 16px; display: inline-block;">
                        Attivazione Successiva • In Corso di Realizzazione
                    </span>
                    <h1 style="font-size: 38px; margin-bottom: 16px;">L'Atlante Geografico di Ampelos</h1>
                    <p style="font-size: 17px; color: var(--ampelos-text-muted); line-height: 1.7; margin-bottom: 28px;">
                        La prima cartografia digitale interdisciplinare dedicata ai terroir, alle faglie geologiche e ai microclimi, collegata ai saggi di territorio pubblicati nella rubrica Luoghi.
                    </p>

                    <div style="background: #182e22; border-radius: var(--radius-md); padding: 48px; color: #fff; margin: 30px 0;">
                        <div style="font-family: var(--font-serif); font-size: 26px; font-style: italic; margin-bottom: 12px;">
                            Mappa Vettoriale Geologica in Preparazione
                        </div>
                        <p style="color: #a8c4b3; font-size: 14px; max-width: 480px; margin: 0 auto;">
                            Rilievi topografici ad alta risoluzione, curve di livello e profili pedologici dell'Etna, delle Langhe e delle Alpi centro-occidentali.
                        </p>
                    </div>

                    <a href="<?php echo esc_url(home_url('/rubrica/luoghi/')); ?>" class="ampelos-btn ampelos-btn-primary">
                        Esplora la Rubrica Luoghi
                    </a>
                </div>
            <?php endif; ?>

        <?php else : ?>
            <!-- PAGINE DI SERVIZIO STANDARD (Privacy, Cookie, Accessibilità, Testata, Condizioni) -->
            <div style="max-width: 820px; margin: 0 auto; background: #fff; padding: 48px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border);">
                <header style="margin-bottom: 30px; border-bottom: 1px solid var(--ampelos-border-light); padding-bottom: 20px;">
                    <span class="ampelos-section-tag">Pagine di Servizio</span>
                    <h1 style="font-size: 34px; margin-bottom: 8px;"><?php the_title(); ?></h1>
                    <div style="font-size: 13px; color: var(--ampelos-text-muted);">
                        Ultimo aggiornamento: 22 Ottobre 2026 • Redazione Ampelos
                    </div>
                </header>

                <div class="ampelos-page-content" style="font-size: 16px; line-height: 1.8; color: #2c332e;">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                    else :
                        echo '<p>Contenuto in caricamento.</p>';
                    endif;
                    ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php
get_footer();

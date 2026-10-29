<?php
/**
 * Template Name: Volume & Edizione 2027
 * Presentazione dell'opera fisica stampata e monografia
 * Perfettamente allineato alla versione di sviluppo index.html
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main" style="padding: 60px 0 90px; background: #ffffff;">
    <div class="ampelos-container">

        <!-- INTRODUZIONE VOLUME -->
        <div class="ampelos-section-heading">
            <span class="ampelos-section-tag">Pubblicazione Stampata Annuale</span>
            <h1 style="font-size: clamp(2.4rem, 4.5vw, 4rem); margin-bottom: 16px;">Il Volume Ampelos</h1>
            <p style="font-size: 19px; color: var(--ampelos-text-muted); font-family: var(--font-serif); font-style: italic; max-width: 740px; margin: 0 auto;">
                L'approdo fisico e tattile del lavoro della rivista: un'opera cartacea di pregio da collezionare e consultare negli anni.
            </p>
        </div>

        <!-- HERO VOLUME EDIZIONE 2027 -->
        <div class="ampelos-volume-hero" style="background: #15271d; color: #fff; border-radius: var(--radius-lg); padding: 56px 48px; margin-bottom: 60px; display: grid; grid-template-columns: 1.2fr 1fr; gap: 48px; align-items: center; box-shadow: var(--shadow-lg);">
            <div>
                <span class="ampelos-badge-edition" style="background: var(--ampelos-terracotta); margin-bottom: 16px; display: inline-block;">
                    Volume I • Edizione 2027
                </span>
                <h2 style="color: #fff; font-size: 36px; line-height: 1.2; margin-bottom: 18px;">
                    Le Radici dell'Incertezza: Geografie, Uomini e Climi
                </h2>
                <p style="color: #c0d3c7; font-size: 16px; line-height: 1.7; margin-bottom: 24px;">
                    312 pagine impresse su carta naturale Fedrigoni Arena Ivory 140g, cucitura a filo refe, copertina telata rigida verde bosco con impressioni in lamina di rame.
                </p>
                <div style="display: flex; gap: 16px; align-items: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/abbonati/')); ?>" class="ampelos-btn ampelos-btn-terracotta ampelos-btn-lg">
                        Incluso nel Piano Sostenitore
                    </a>
                    <span style="font-size: 13.5px; color: #a1b7aa;">Tiratura limitata a 1.200 esemplari numerati</span>
                </div>
            </div>

            <div style="background: #0f1c14; border: 1px solid rgba(255,255,255,0.1); border-radius: var(--radius-md); padding: 40px; text-align: center;">
                <div style="font-family: var(--font-serif); font-size: 14px; letter-spacing: 0.2em; color: #9bb2a4; margin-bottom: 8px;">AMPELOS MONOGRAFIE</div>
                <div style="font-family: var(--font-serif); font-size: 42px; font-weight: 700; color: #faf7f2; margin-bottom: 6px;">2027</div>
                <div style="width: 40px; height: 1px; background: var(--ampelos-terracotta); margin: 16px auto;"></div>
                <p style="font-size: 13.5px; color: #b0c4b7; line-height: 1.6; margin: 0 0 16px;">
                    Tavole pieghevoli dell'Atlante dei Suoli e sedici saggi inediti.
                </p>
                <div style="font-size: 12px; color: #7f998a;">ISBN: 978-88-94721-01-4</div>
            </div>
        </div>

        <!-- SPECIFICHE EDITORIALI E CONTENUTI -->
        <div class="ampelos-grid-3">
            <div style="background: #fff; padding: 32px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border); box-shadow: var(--shadow-sm);">
                <h3 style="font-size: 21px; margin-bottom: 12px; color: var(--ampelos-primary);">Cartografia d'Autore</h3>
                <p style="color: var(--ampelos-text-muted); font-size: 14.5px; line-height: 1.6;">
                    Quattro tavole cartografiche pieghevoli a colori di grande formato (70x50 cm) che documentano la tettonica e i suoli dei distretti viticoli indagati.
                </p>
            </div>

            <div style="background: #fff; padding: 32px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border); box-shadow: var(--shadow-sm);">
                <h3 style="font-size: 21px; margin-bottom: 12px; color: var(--ampelos-primary);">Stampa Tipografica d'Arte</h3>
                <p style="color: var(--ampelos-text-muted); font-size: 14.5px; line-height: 1.6;">
                    Curato nei minimi dettagli grafici: caratteri tipografici storici fusi con composizione digitale contemporanea e quadricromia ad altissima fedeltà.
                </p>
            </div>

            <div style="background: #fff; padding: 32px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border); box-shadow: var(--shadow-sm);">
                <h3 style="font-size: 21px; margin-bottom: 12px; color: var(--ampelos-primary);">Colophon Sostenitori</h3>
                <p style="color: var(--ampelos-text-muted); font-size: 14.5px; line-height: 1.6;">
                    Ogni copia include nel colophon finale i nomi di tutti i membri e sostenitori che hanno reso possibile la stampa indipendente del volume.
                </p>
            </div>
        </div>

    </div>
</main>

<?php
get_footer();

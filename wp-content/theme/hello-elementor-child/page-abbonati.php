<?php
/**
 * Template Name: Pagina Abbonati
 * Descrizione e sottoscrizione dei piani di abbonamento
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main" style="padding: 60px 0 90px;">
    <div class="ampelos-container">
        
        <div class="ampelos-section-heading">
            <span class="ampelos-section-tag">Sottoscrivi Ampelos</span>
            <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); margin-bottom: 16px;">Scegli la tua formula di lettura</h1>
            <p style="font-size: 18px; color: var(--ampelos-text-muted); max-width: 680px; margin: 0 auto;">
                Unisciti alla comunità di studiosi, vignaioli e appassionati che scelgono la profondità, il tempo lento e l'indipendenza di pensiero.
            </p>
        </div>

        <!-- Componente Piani -->
        <?php echo do_shortcode('[ampelos_piani]'); ?>

        <!-- Garanzie e FAQ -->
        <div style="max-width: 820px; margin: 70px auto 0;">
            <div style="text-align: center; margin-bottom: 40px;">
                <span class="ampelos-section-tag">Domande Frequenti</span>
                <h2>Tutto quello che c'è da sapere sull'abbonamento</h2>
            </div>

            <div style="display: grid; gap: 20px;">
                <div style="background: #fff; padding: 24px 28px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border);">
                    <h4 style="font-size: 18px; margin-bottom: 8px;">Cosa include esattamente l'abbonamento digitale?</h4>
                    <p style="color: var(--ampelos-text-muted); font-size: 14.5px; line-height: 1.6; margin: 0;">
                        L'accesso completo e illimitato a tutti gli articoli attuali e all'intero archivio storico, alle quattro rubriche (Questioni, Luoghi, Idee, Voci), alla newsletter esclusiva della redazione e alla propria libreria con segnalibri personali.
                    </p>
                </div>

                <div style="background: #fff; padding: 24px 28px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border);">
                    <h4 style="font-size: 18px; margin-bottom: 8px;">Come riceverò il Volume Monografico Edizione 2027?</h4>
                    <p style="color: var(--ampelos-text-muted); font-size: 14.5px; line-height: 1.6; margin: 0;">
                        Per chi sottoscrive il piano <strong>Sostenitore</strong>, la copia fisica cartacea, rilegata in tela con finiture di pregio e numerata a mano, verrà spedita con corriere tracciato direttamente al tuo indirizzo di residenza non appena ultimata la stampa.
                    </p>
                </div>

                <div style="background: #fff; padding: 24px 28px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border);">
                    <h4 style="font-size: 18px; margin-bottom: 8px;">Posso disdire quando voglio?</h4>
                    <p style="color: var(--ampelos-text-muted); font-size: 14.5px; line-height: 1.6; margin: 0;">
                        Certamente. Puoi interrompere il rinnovo automatico in qualunque momento direttamente dalla tua Area Personale con un semplice clic, senza penali né costi aggiuntivi.
                    </p>
                </div>

                <div style="background: #fff; padding: 24px 28px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border);">
                    <h4 style="font-size: 18px; margin-bottom: 8px;">Perché Ampelos richiede un abbonamento?</h4>
                    <p style="color: var(--ampelos-text-muted); font-size: 14.5px; line-height: 1.6; margin: 0;">
                        Perché abbiamo scelto di non ospitare pubblicità, sponsorizzazioni o articoli a pagamento. Questo garantisce la totale libertà intellettuale dei nostri autori e redattori, tutelando la qualità e l'onestà delle inchieste.
                    </p>
                </div>
            </div>
        </div>

    </div>
</main>

<?php
get_footer();

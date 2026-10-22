<?php
/**
 * Generic Page Template - Ampelos Theme
 * Utilizzato per Pagine Istituzionali, Pagine di Servizio, Percorsi e Atlante
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$slug = get_post_field('post_name', get_post());
$is_future_section = in_array($slug, array('percorsi', 'atlante'));
?>

<main id="primary" class="site-main" style="padding: 60px 0 90px;">
    <div class="ampelos-container">

        <?php if ($is_future_section) : ?>
            <!-- SEZIONE IN ATTIVAZIONE SUCCESSIVA (PERCORSI / ATLANTE) -->
            <div style="max-width: 780px; margin: 0 auto; text-align: center; background: #fff; border: 1px solid var(--ampelos-border); padding: 60px 40px; border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
                <span class="ampelos-tag-future" style="font-size: 11px; padding: 4px 10px; margin-bottom: 16px; display: inline-block;">
                    Attivazione Successiva • In Corso di Realizzazione
                </span>
                <h1 style="font-size: 38px; margin-bottom: 16px;"><?php the_title(); ?></h1>
                
                <?php if ($slug === 'percorsi') : ?>
                    <p style="font-size: 17px; color: var(--ampelos-text-muted); line-height: 1.7; margin-bottom: 24px;">
                        I <strong>Percorsi Tematici</strong> di Ampelos sono cicli di lettura monografici curati da studiosi, creati per esplorare in verticale specifiche questioni viticole, geologiche e storiche attraverso una sequenza ragionata di saggi e testimonianze.
                    </p>
                    <div style="background: var(--ampelos-paper); padding: 24px; border-radius: var(--radius-sm); text-align: left; margin: 30px 0;">
                        <h4 style="margin-bottom: 8px;">Primi Percorsi in programma:</h4>
                        <ul style="padding-left: 20px; font-size: 14.5px; line-height: 1.8; color: var(--ampelos-text);">
                            <li><strong>Percorso 01:</strong> La riconquista dei vitigni storici e la resistenza climatica</li>
                            <li><strong>Percorso 02:</strong> Geologia e suoli delle grandi fratture alpine</li>
                            <li><strong>Percorso 03:</strong> Dalla botte grande all'anfora: evoluzione del recipiente enologico</li>
                        </ul>
                    </div>
                <?php else : ?>
                    <p style="font-size: 17px; color: var(--ampelos-text-muted); line-height: 1.7; margin-bottom: 24px;">
                        L'<strong>Atlante di Ampelos</strong> costituirà la prima cartografia digitale interdisciplinare dedicata ai terroir e alle micro-zone viticole, integrata con mappe geologiche vettoriali, quote altimetriche, suoli e dati climatici storici.
                    </p>
                    <div style="background: var(--ampelos-paper); padding: 24px; border-radius: var(--radius-sm); text-align: left; margin: 30px 0;">
                        <h4 style="margin-bottom: 8px;">Aree Geografiche in mappatura:</h4>
                        <ul style="padding-left: 20px; font-size: 14.5px; line-height: 1.8; color: var(--ampelos-text);">
                            <li><strong>Area 01:</strong> I terrazzamenti della Valtellina e del Vallese</li>
                            <li><strong>Area 02:</strong> I basalti vulcanici dell'Etna Nord e del Vulture</li>
                            <li><strong>Area 03:</strong> Le marne calcaree e le sabbie dell'Astigiano e delle Langhe</li>
                        </ul>
                    </div>
                <?php endif; ?>

                <p style="font-size: 14px; color: var(--ampelos-text-muted); margin-bottom: 28px;">
                    Questa funzionalità sarà accessibile in anteprima a tutti i possessori di abbonamento <strong>Annuale</strong> e <strong>Sostenitore</strong>.
                </p>

                <div style="display: flex; justify-content: center; gap: 14px;">
                    <a href="<?php echo esc_url(home_url('/abbonati/')); ?>" class="ampelos-btn ampelos-btn-primary">
                        Sottoscrivi l'Abbonamento
                    </a>
                    <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-outline">
                        Leggi gli articoli disponibili
                    </a>
                </div>
            </div>

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
                        // Contenuto descrittivo standard se la pagina è appena creata
                        if ($slug === 'informazioni-testata') {
                            echo '<p><strong>Ampelos</strong> – Rivista di Cultura del Vino e Territori.<br>Pubblicazione periodica trimestrale registrata presso il Registro della Stampa del Tribunale di Roma al n. 42/2026. Iscrizione ROC n. 39182.<br>Editore: Ampelos Edizioni S.r.l., Via della Vigna Antica 14, 00186 Roma. P.IVA e C.F. 09849120584.<br>Direttore Responsabile: Matteo Rives.</p>';
                        } elseif ($slug === 'privacy') {
                            echo '<p>La presente Privacy Policy descrive le modalità di trattamento dei dati personali degli utenti ai sensi del Regolamento UE 2016/679 (GDPR). Ampelos tratta unicamente i dati necessari per la gestione degli abbonamenti e delle comunicazioni della rivista, senza alcuna cessione a terze parti a scopi commerciali o profilazione pubblicitaria.</p>';
                        } elseif ($slug === 'cookie') {
                            echo '<p>Ampelos utilizza esclusivamente cookie tecnici necessari al funzionamento dell\'autenticazione, della gestione delle sessioni degli abbonati e della sicurezza del sito. Non vengono utilizzati cookie di profilazione o tracciamento commerciale di terze parti.</p>';
                        } elseif ($slug === 'accessibilita') {
                            echo '<p>Ampelos è impegnata a rendere il proprio sito web accessibile al più ampio numero di persone possibile, rispettando i principi delle linee guida WCAG 2.1 livello AA, garantendo contrasto cromatico ottimale, navigabilità da tastiera e supporto per tecnologie assistive.</p>';
                        } elseif ($slug === 'condizioni-di-utilizzo') {
                            echo '<p>L\'accesso e l\'utilizzo del sito ampelos.it sono subordinati all\'accettazione delle presenti condizioni. Tutti i testi, le cartografie e le fotografie sono protetti dalla legge sul diritto d\'autore e sono di proprietà esclusiva di Ampelos Edizioni S.r.l. o dei rispettivi autori.</p>';
                        } elseif ($slug === 'condizioni-abbonamento') {
                            echo '<p>L\'abbonamento ad Ampelos conferisce il diritto di accesso personale e non cedibile a tutti i contenuti digitali della rivista. L\'abbonato può disattivare il rinnovo automatico in qualunque momento dall\'Area Personale. Ai sensi di legge è garantito il diritto di recesso entro 14 giorni dall\'attivazione.</p>';
                        } else {
                            echo '<p>Contenuto in caricamento.</p>';
                        }
                    endif;
                    ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php
get_footer();

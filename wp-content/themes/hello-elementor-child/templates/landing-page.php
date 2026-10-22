<?php
/**
 * Template Name: Landing Page (Pubblica / Non Abbonati)
 * Mostra la presentazione della rivista, come funziona il modello di iscrizione e i piani di abbonamento
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main ampelos-landing-page">

    <!-- HERO SECTION PUBBLICA -->
    <section class="ampelos-hero-landing">
        <div class="ampelos-container">
            <span class="ampelos-hero-kicker">RIVISTA TRIMESTRALE INDIPENDENTE • ACCESSO ESCLUSIVO PER ABBONATI</span>
            <h1 class="ampelos-hero-title">
                Il pensiero del vino, <em>i suoi territori</em>, la sua cultura profonda.
            </h1>
            <p class="ampelos-lead ampelos-hero-lead">
                Ampelos è uno spazio editoriale libero da sponsor e da valutazioni commerciali in centesimi. Un progetto sostenuto unicamente dalla propria comunità di lettori, dedicato al giornalismo approfondito, alla geografia viticola e alla saggistica.
            </p>
            <div class="ampelos-hero-ctas">
                <a href="#piani" class="ampelos-btn ampelos-btn-terracotta ampelos-btn-lg">
                    Scopri i Piani di Abbonamento
                </a>
                <button type="button" class="ampelos-btn ampelos-btn-outline ampelos-btn-lg" onclick="AmpelosUI.openModal('modal-login')">
                    Sei già abbonato? Accedi
                </button>
            </div>
            <div style="margin-top: 24px; font-size: 13px; color: var(--ampelos-text-muted);">
                A partire da <strong>9€ al mese</strong> • Disdici in qualsiasi momento con un clic
            </div>
        </div>
    </section>

    <!-- GUIDA: COME FUNZIONA IL MODELLO DI ISCRIZIONE -->
    <section class="ampelos-model-section">
        <div class="ampelos-container">
            <div class="ampelos-section-heading">
                <span class="ampelos-section-tag">Il Modello Editoriale</span>
                <h2>Come funziona l'accesso ad Ampelos</h2>
                <p>Per preservare l'indipendenza e l'accuratezza della nostra redazione, l'intero sito e gli archivi sono accessibili esclusivamente ai lettori abbonati.</p>
            </div>

            <div class="ampelos-grid-3">
                <!-- Step 1 -->
                <div class="ampelos-step-card">
                    <div class="ampelos-step-num">01</div>
                    <h3>Scegli il piano di abbonamento</h3>
                    <p>
                        Scegli tra la formula <strong>Digitale Mensile</strong> per la massima flessibilità, il <strong>Digitale Annuale</strong> con 2 mesi omaggio, oppure il piano <strong>Sostenitore</strong> che include la copia fisica del Volume Monografico 2027 spedita a casa.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="ampelos-step-card">
                    <div class="ampelos-step-num">02</div>
                    <h3>Iscriviti e attiva il tuo profilo</h3>
                    <p>
                        Crea il tuo profilo personale in meno di due minuti. Riceverai le credenziali riservate con cui accedere su smartphone, tablet e desktop, senza limiti di dispositivi.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="ampelos-step-card">
                    <div class="ampelos-step-num">03</div>
                    <h3>Accedi e naviga l'intera rivista</h3>
                    <p>
                        Esegui il login per sbloccare tutti gli articoli integrali, le quattro rubriche (Questioni, Luoghi, Idee, Voci), l'Atlante geografico, i Percorsi tematici e la tua libreria personale con gli articoli salvati.
                    </p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 48px;">
                <a href="#piani" class="ampelos-btn ampelos-btn-primary ampelos-btn-lg">
                    Iscriviti e Sottoscrivi ora
                </a>
            </div>
        </div>
    </section>

    <!-- ANTEPRIMA DELLE RUBRICHE E DEI CONTENUTI -->
    <section class="ampelos-editorial-preview">
        <div class="ampelos-container">
            <div class="ampelos-section-heading">
                <span class="ampelos-section-tag">Le Sezioni della Rivista</span>
                <h2>Quattro sguardi sul pianeta vino</h2>
                <p>La nostra linea editoriale si articola in quattro direttrici fondamentali, curate da docenti, geografi, agronomi e saggisti.</p>
            </div>

            <div class="ampelos-grid-3" style="grid-template-columns: repeat(4, 1fr);">
                <!-- Questioni -->
                <div class="ampelos-step-card" style="border-top: 3px solid var(--ampelos-primary);">
                    <span style="font-size: 11px; font-weight: 700; color: var(--ampelos-primary); text-transform: uppercase;">Rubrica</span>
                    <h3 style="margin-top: 8px;">Questioni</h3>
                    <p style="font-size: 13.5px; font-weight: 600; color: var(--ampelos-terracotta); margin-bottom: 8px;">Fatti e cambiamenti</p>
                    <p>Inchieste sui mercati globali, impatto del cambio climatico, evoluzioni normative e trasformazioni tecnologiche della filiera.</p>
                </div>

                <!-- Luoghi -->
                <div class="ampelos-step-card" style="border-top: 3px solid var(--ampelos-primary);">
                    <span style="font-size: 11px; font-weight: 700; color: var(--ampelos-primary); text-transform: uppercase;">Rubrica</span>
                    <h3 style="margin-top: 8px;">Luoghi</h3>
                    <p style="font-size: 13.5px; font-weight: 600; color: var(--ampelos-terracotta); margin-bottom: 8px;">Territori e comunità</p>
                    <p>Reportage sul campo, suoli e geologie, comunità rurali e paesaggi culturali dal Vecchio al Nuovo Mondo.</p>
                </div>

                <!-- Idee -->
                <div class="ampelos-step-card" style="border-top: 3px solid var(--ampelos-primary);">
                    <span style="font-size: 11px; font-weight: 700; color: var(--ampelos-primary); text-transform: uppercase;">Rubrica</span>
                    <h3 style="margin-top: 8px;">Idee</h3>
                    <p style="font-size: 13.5px; font-weight: 600; color: var(--ampelos-terracotta); margin-bottom: 8px;">Saggi e interpretazioni</p>
                    <p>Filosofia dell'assaggio, etica dell'agricoltura, estetica del gusto e riflessioni sul valore antropologico del vino.</p>
                </div>

                <!-- Voci -->
                <div class="ampelos-step-card" style="border-top: 3px solid var(--ampelos-primary);">
                    <span style="font-size: 11px; font-weight: 700; color: var(--ampelos-primary); text-transform: uppercase;">Rubrica</span>
                    <h3 style="margin-top: 8px;">Voci</h3>
                    <p style="font-size: 13.5px; font-weight: 600; color: var(--ampelos-terracotta); margin-bottom: 8px;">Interviste e ritratti</p>
                    <p>I dialoghi con i maestri vignaioli, i ricercatori universitari e le figure che sfidano i canoni convenzionali.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SELEZIONE ARTICOLI DI ESEMPIO CON BLUR PAYWALL -->
    <section style="padding: 70px 0; background: #fff; border-top: 1px solid var(--ampelos-border); border-bottom: 1px solid var(--ampelos-border);">
        <div class="ampelos-container">
            <div class="ampelos-section-heading">
                <span class="ampelos-section-tag">Dall'Edizione Corrente</span>
                <h2>Uno sguardo agli articoli recenti</h2>
                <p>Gli articoli integrali sono riservati ai membri. Abbonati per leggere i testi completi e le analisi inedite.</p>
            </div>

            <div class="ampelos-grid-3">
                <!-- Card 1 -->
                <article class="ampelos-article-card">
                    <div class="ampelos-article-thumb">
                        <div class="ampelos-rubrica-badge">Questioni</div>
                        <div style="background: linear-gradient(135deg, #1b3527 0%, #294c39 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-serif); font-size: 24px; font-style: italic;">
                            La quota del vigneto
                        </div>
                    </div>
                    <div class="ampelos-article-content">
                        <div class="ampelos-article-meta">
                            <span>12 Min lettura</span> • <span>Rubrica Questioni</span>
                        </div>
                        <h3 class="ampelos-article-title">
                            La salita verso l'alto: come il riscaldamento globale sposta i confini dei grandi cru alpini
                        </h3>
                        <p class="ampelos-article-excerpt">
                            Dalle valli della Dora Baltea alle pendici orobiche, l'innalzamento delle temperature medie obbliga viticoltori e storiche maison a ripensare l'altitudine...
                        </p>
                        <div class="ampelos-article-footer">
                            <span class="ampelos-author-name">Di Matteo Rives</span>
                            <span style="color: var(--ampelos-terracotta); font-weight: 600; font-size: 12px; display: flex; align-items: center; gap: 4px;">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                Solo abbonati
                            </span>
                        </div>
                    </div>
                </article>

                <!-- Card 2 -->
                <article class="ampelos-article-card">
                    <div class="ampelos-article-thumb">
                        <div class="ampelos-rubrica-badge">Luoghi</div>
                        <div style="background: linear-gradient(135deg, #3d2820 0%, #5e3b2e 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-serif); font-size: 24px; font-style: italic;">
                            Basalti e lave dell'Etna
                        </div>
                    </div>
                    <div class="ampelos-article-content">
                        <div class="ampelos-article-meta">
                            <span>15 Min lettura</span> • <span>Rubrica Luoghi</span>
                        </div>
                        <h3 class="ampelos-article-title">
                            Oltre la lava: la microbiologia invisibile delle sabbie vulcaniche e la longevità del Nerello
                        </h3>
                        <p class="ampelos-article-excerpt">
                            Un viaggio scientifico e antropologico nelle contrade del versante Nord: dove la cenere diventa roccia porosa e l'apparato radicale scende nelle fratture...
                        </p>
                        <div class="ampelos-article-footer">
                            <span class="ampelos-author-name">Di Elena Moretti</span>
                            <span style="color: var(--ampelos-terracotta); font-weight: 600; font-size: 12px; display: flex; align-items: center; gap: 4px;">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                Solo abbonati
                            </span>
                        </div>
                    </div>
                </article>

                <!-- Card 3 -->
                <article class="ampelos-article-card">
                    <div class="ampelos-article-thumb">
                        <div class="ampelos-rubrica-badge">Idee</div>
                        <div style="background: linear-gradient(135deg, #1c2a38 0%, #30465a 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-serif); font-size: 24px; font-style: italic;">
                            L'illusione della purezza
                        </div>
                    </div>
                    <div class="ampelos-article-content">
                        <div class="ampelos-article-meta">
                            <span>18 Min lettura</span> • <span>Rubrica Idee</span>
                        </div>
                        <h3 class="ampelos-article-title">
                            L'illusione della purezza: note filosofiche sul concetto contemporaneo di naturale e artigianale
                        </h3>
                        <p class="ampelos-article-excerpt">
                            Perché sentiamo il bisogno di categorizzare il vino in dicotomie morali? Un saggio che rilegge il rapporto fra tecnica, fermentazione e artificio umano...
                        </p>
                        <div class="ampelos-article-footer">
                            <span class="ampelos-author-name">Di Carlo Ferrini</span>
                            <span style="color: var(--ampelos-terracotta); font-weight: 600; font-size: 12px; display: flex; align-items: center; gap: 4px;">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                Solo abbonati
                            </span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- TABELLA PIANI DI ABBONAMENTO (SEZIONE DEDICATA) -->
    <?php echo do_shortcode('[ampelos_piani]'); ?>

    <!-- PRESENTAZIONE VOLUME 2027 SPOTLIGHT -->
    <section style="padding: 80px 0; background: var(--ampelos-paper); border-bottom: 1px solid var(--ampelos-border);">
        <div class="ampelos-container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;">
                <div>
                    <span class="ampelos-section-tag">Edizione Limitata</span>
                    <h2 style="font-size: 38px; margin-bottom: 18px;">Il Volume Ampelos • Edizione 2027</h2>
                    <p style="font-size: 16px; color: var(--ampelos-text-muted); line-height: 1.7; margin-bottom: 20px;">
                        Una prestigiosa pubblicazione cartacea monografica di oltre 280 pagine in carta uso mano Fedrigoni, con rilegatura in tela e fotografie d'autore inedite. 
                        Un oggetto editoriale da collezionare e consultare negli anni, incluso per tutti gli abbonati con piano <strong>Sostenitore</strong>.
                    </p>
                    <ul style="list-style: none; padding: 0; margin-bottom: 28px; font-size: 14.5px; color: var(--ampelos-primary);">
                        <li style="padding: 6px 0;">✓ Tiratura limitata e numerata a mano</li>
                        <li style="padding: 6px 0;">✓ Atlante cartografico a colori con mappe geologiche pieghevoli</li>
                        <li style="padding: 6px 0;">✓ Sedici saggi inediti non presenti sul sito web</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/volume/')); ?>" class="ampelos-btn ampelos-btn-outline">
                        Scopri tutti i dettagli del Volume
                    </a>
                </div>
                <div style="background: #192a20; border-radius: var(--radius-lg); padding: 48px; color: #fff; text-align: center; box-shadow: var(--shadow-lg);">
                    <div style="font-family: var(--font-serif); font-size: 16px; letter-spacing: 0.15em; color: #a1b7aa; margin-bottom: 10px;">AMPELOS EDIZIONI</div>
                    <div style="font-family: var(--font-serif); font-size: 40px; font-weight: 700; line-height: 1.1; margin-bottom: 14px;">VOLUME I<br>EDIZIONE 2027</div>
                    <div style="font-size: 13px; color: #cedcd3; font-style: italic; margin-bottom: 24px;">"Le Radici dell'Incertezza: Geografie, Uomini e Climi"</div>
                    <div style="display: inline-block; background: var(--ampelos-terracotta); color: #fff; font-size: 12px; font-weight: 700; padding: 6px 16px; border-radius: var(--radius-pill); text-transform: uppercase;">
                        Incluso nel Piano Sostenitore
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();

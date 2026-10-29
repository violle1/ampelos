<?php
/**
 * Template Name: Chi Siamo
 * Struttura: Manifesto e metodo editoriale, Redazione, Collabora, Contatti
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main" style="padding: 60px 0 90px; background: #ffffff;">
    <div class="ampelos-container">

        <!-- INTESTAZIONE CHI SIAMO -->
        <div class="ampelos-section-heading" style="margin-bottom: 60px;">
            <span class="ampelos-section-tag">La Testata Editoriale</span>
            <h1 style="font-size: clamp(2.4rem, 4.5vw, 3.8rem); margin-bottom: 16px;">Chi siamo</h1>
            <p style="font-size: 19px; color: var(--ampelos-text-muted); font-family: var(--font-serif); font-style: italic; max-width: 720px; margin: 0 auto;">
                "ἄμπελος", dal greco antico: la vite. Simbolo di radici tenaci, metamorfosi e legame ancestrale con la terra.
            </p>
        </div>

        <!-- 1. MANIFESTO E METODO EDITORIALE -->
        <section id="manifesto" style="max-width: 820px; margin: 0 auto 70px; background: #fff; padding: 48px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border); box-shadow: var(--shadow-sm);">
            <span class="ampelos-section-tag" style="color: var(--ampelos-primary);">La Nostra Carta dei Valori</span>
            <h2 style="font-size: 32px; margin-bottom: 20px;">Manifesto e Metodo Editoriale</h2>
            
            <div style="font-size: 17px; line-height: 1.8; color: #29302c;">
                <p>
                    Ampelos nasce dall'esigenza impellente di sottrarre la narrazione del vino alle logiche della recensione commerciale istantanea, alla dittatura dei punteggi in centesimi e alla superficialità degli slogan turistici.
                </p>
                <div class="ampelos-quote-callout" style="margin: 30px 0;">
                    "Un vino non è un punteggio numerico, ma il frutto di una civiltà materiale, di una geologia millenaria e delle scelte morali di chi coltiva la terra."
                </div>
                <h3 style="font-size: 20px; margin-top: 30px; margin-bottom: 10px;">I Nostri Quattro Principi Guida:</h3>
                <ul style="padding-left: 20px; margin-bottom: 24px; line-height: 1.8;">
                    <li><strong>Indipendenza assoluta:</strong> Non accettiamo campioni gratuiti in cambio di recensioni positive né accordi di visibilità commerciale con consorzi o cantine.</li>
                    <li><strong>Giornalismo lento e sul campo:</strong> I nostri autori viaggiano, calpestano le zolle, interrogano gli archivi comunali e trascorrono giorni con i vignaioli prima di scrivere una sola riga.</li>
                    <li><strong>Rigore interdisciplinare:</strong> Facciamo dialogare agronomi, storici medievali, geologi e critici per comprendere la complessità ecologica e culturale di ogni calice.</li>
                    <li><strong>Modello a sottoscrizione:</strong> Rispondiamo solo ed esclusivamente ai nostri abbonati, la cui fiducia è il nostro unico sostentamento economico.</li>
                </ul>
            </div>
        </section>

        <!-- 2. LA REDAZIONE -->
        <section id="redazione" style="margin-bottom: 80px;">
            <div class="ampelos-section-heading">
                <span class="ampelos-section-tag">I Protagonisti</span>
                <h2>La Redazione e il Comitato Scientifico</h2>
                <p>Un gruppo eterogeneo di giornalisti, docenti, ricercatori e fotografi uniti dall'amore per il rigore.</p>
            </div>

            <div class="ampelos-grid-3">
                <div style="background: #fff; padding: 30px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border); text-align: center;">
                    <div style="width: 80px; height: 80px; border-radius: var(--radius-pill); background: #243e30; color: #fff; font-family: var(--font-serif); font-size: 32px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                        AF
                    </div>
                    <h3 style="font-size: 20px; margin-bottom: 4px;">Andrea Fattizzo</h3>
                    <p style="font-size: 13px; font-weight: 700; color: var(--ampelos-terracotta); text-transform: uppercase; margin-bottom: 12px;">Direttore Responsabile</p>
                    <p style="font-size: 14px; color: var(--ampelos-text-muted);">Saggista e giornalista agrario. Cura la direzione editoriale e i rapporti con le comunità rurali.</p>
                </div>

                <div style="background: #fff; padding: 30px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border); text-align: center;">
                    <div style="width: 80px; height: 80px; border-radius: var(--radius-pill); background: #3b2a22; color: #fff; font-family: var(--font-serif); font-size: 32px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                        EM
                    </div>
                    <h3 style="font-size: 20px; margin-bottom: 4px;">Elena Moretti</h3>
                    <p style="font-size: 13px; font-weight: 700; color: var(--ampelos-terracotta); text-transform: uppercase; margin-bottom: 12px;">Caporedattrice Geografie &amp; Atlante</p>
                    <p style="font-size: 14px; color: var(--ampelos-text-muted);">Geografa dell'ambiente e cartografa. Coordina le inchieste territoriali e i saggi climatici.</p>
                </div>

                <div style="background: #fff; padding: 30px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border); text-align: center;">
                    <div style="width: 80px; height: 80px; border-radius: var(--radius-pill); background: #1c2b38; color: #fff; font-family: var(--font-serif); font-size: 32px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                        CF
                    </div>
                    <h3 style="font-size: 20px; margin-bottom: 4px;">Carlo Ferrini</h3>
                    <p style="font-size: 13px; font-weight: 700; color: var(--ampelos-terracotta); text-transform: uppercase; margin-bottom: 12px;">Curatore Rubrica Idee</p>
                    <p style="font-size: 14px; color: var(--ampelos-text-muted);">Filosofo e storico della cultura materiale. Docente di estetica dell'alimentazione.</p>
                </div>
            </div>
        </section>

        <!-- 3. COLLABORA & CONTATTI -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
            <!-- Collabora -->
            <section id="collabora" style="background: #fff; padding: 36px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border);">
                <span class="ampelos-section-tag">Scrivi per noi</span>
                <h3 style="font-size: 24px; margin-bottom: 14px;">Collabora con Ampelos</h3>
                <p style="color: var(--ampelos-text-muted); font-size: 14.5px; line-height: 1.6; margin-bottom: 16px;">
                    Valutiamo proposte di saggi inediti, inchieste sul campo e serie fotografiche documentarie coerenti con la nostra linea editoriale. Non pubblichiamo comunicati stampa né recensioni promozionali.
                </p>
                <p style="font-size: 14px;">
                    Invia un abstract di massimo 400 parole con una breve bio a:<br>
                    <strong><a href="mailto:proposte@ampelos.it" style="color: var(--ampelos-primary); text-decoration: underline;">proposte@ampelos.it</a></strong>
                </p>
            </section>

            <!-- Contatti -->
            <section id="contatti" style="background: #fff; padding: 36px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border);">
                <span class="ampelos-section-tag">Recapiti Ufficiali</span>
                <h3 style="font-size: 24px; margin-bottom: 14px;">Contatta la Redazione</h3>
                <p style="color: var(--ampelos-text-muted); font-size: 14.5px; line-height: 1.6; margin-bottom: 16px;">
                    Per informazioni sugli abbonamenti, problemi di accesso all'area personale o richieste editoriali e conferenze.
                </p>
                <div style="font-size: 14px; line-height: 1.8; color: var(--ampelos-text);">
                    <div><strong>Redazione:</strong> Via della Vigna Antica, 14 – 00186 Roma</div>
                    <div><strong>Email abbonati:</strong> <a href="mailto:abbonamenti@ampelos.it">abbonamenti@ampelos.it</a></div>
                    <div><strong>Stampa e diritti:</strong> <a href="mailto:redazione@ampelos.it">redazione@ampelos.it</a></div>
                </div>
                <div style="margin-top: 18px;">
                    <a href="<?php echo esc_url(home_url('/contatti/')); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm">
                        Modulo di contatto &amp; Recapiti completi →
                    </a>
                </div>
            </section>
        </div>

    </div>
</main>

<?php
get_footer();

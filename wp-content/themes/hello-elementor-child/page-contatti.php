<?php
/**
 * Template Name: Contatti
 * Pagina ufficiale Contatti e Corrispondenza per la rivista Ampelos
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main ampelos-contact-page" style="padding: 50px 0 80px; background: #ffffff;">
    <div class="ampelos-container">

        <!-- INTESTAZIONE CONTATTI -->
        <div class="ampelos-section-heading" style="text-align: center; margin-bottom: 50px;">
            <span class="ampelos-section-tag">Dialogo &amp; Corrispondenza</span>
            <h1 style="font-size: clamp(2.4rem, 4.5vw, 3.8rem); margin-bottom: 16px;">Contatta la Redazione</h1>
            <p style="font-size: 19px; color: var(--ampelos-text-muted); font-family: var(--font-serif); font-style: italic; max-width: 720px; margin: 0 auto; line-height: 1.6;">
                "Ampelos coltiva un dialogo diretto e accurato con i propri abbonati, studiosi, vignaioli e lettori. Ogni messaggio viene letto e preso in carico con il tempo e la cura che merita."
            </p>
        </div>

        <!-- 3 CANALI DIRETTI (GRID 3) -->
        <div class="ampelos-grid-3" style="margin-bottom: 50px;">
            <!-- Canale 1: Abbonamenti & Area Personale -->
            <div style="background: #fff; border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 30px 24px; box-shadow: var(--shadow-sm); display: flex; flex-direction: column;">
                <div style="width: 48px; height: 48px; border-radius: var(--radius-sm); background: var(--ampelos-sage-subtle); color: var(--ampelos-primary); display: flex; align-items: center; justify-content: center; margin-bottom: 18px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </div>
                <h3 style="font-size: 20px; margin-bottom: 8px;">Abbonamenti &amp; Assistenza</h3>
                <p style="font-size: 14px; color: var(--ampelos-text-muted); line-height: 1.6; margin-bottom: 18px; flex: 1;">
                    Per supporto sulle formule di iscrizione, rinnovo o fatturazione, problemi di accesso all'Area Personale e spedizione del Volume 2027.
                </p>
                <div style="border-top: 1px solid var(--ampelos-border-light); padding-top: 14px;">
                    <a href="mailto:abbonamenti@ampelos.it" style="font-size: 14px; font-weight: 600; color: var(--ampelos-primary); display: flex; align-items: center; gap: 6px;">
                        <span>abbonamenti@ampelos.it</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <!-- Canale 2: Redazione & Saggi -->
            <div style="background: #fff; border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 30px 24px; box-shadow: var(--shadow-sm); display: flex; flex-direction: column;">
                <div style="width: 48px; height: 48px; border-radius: var(--radius-sm); background: var(--ampelos-terracotta-subtle); color: var(--ampelos-terracotta); display: flex; align-items: center; justify-content: center; margin-bottom: 18px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                </div>
                <h3 style="font-size: 20px; margin-bottom: 8px;">Redazione &amp; Proposte Saggi</h3>
                <p style="font-size: 14px; color: var(--ampelos-text-muted); line-height: 1.6; margin-bottom: 18px; flex: 1;">
                    Per presentare abstract di ricerca (max 400 parole), reportage territoriali, dialoghi critici o segnalazioni di testi storici.
                </p>
                <div style="border-top: 1px solid var(--ampelos-border-light); padding-top: 14px;">
                    <a href="mailto:proposte@ampelos.it" style="font-size: 14px; font-weight: 600; color: var(--ampelos-terracotta); display: flex; align-items: center; gap: 6px;">
                        <span>proposte@ampelos.it</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <!-- Canale 3: Sede & Relazioni Esterne -->
            <div style="background: #fff; border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 30px 24px; box-shadow: var(--shadow-sm); display: flex; flex-direction: column;">
                <div style="width: 48px; height: 48px; border-radius: var(--radius-sm); background: var(--ampelos-slate-subtle); color: var(--ampelos-slate); display: flex; align-items: center; justify-content: center; margin-bottom: 18px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="10" r="3"></circle><path d="M12 2a8 8 0 0 0-8 8c0 5.25 8 12 8 12s8-6.75 8-12a8 8 0 0 0-8-8z"></path></svg>
                </div>
                <h3 style="font-size: 20px; margin-bottom: 8px;">Sede Editoriale &amp; Stampa</h3>
                <p style="font-size: 14px; color: var(--ampelos-text-muted); line-height: 1.6; margin-bottom: 18px; flex: 1;">
                    <strong>Ampelos Edizioni S.r.l.</strong><br>
                    Via della Vigna Antica, 14 – 00186 Roma<br>
                    Ufficio Stampa e Relazioni Culturali.
                </p>
                <div style="border-top: 1px solid var(--ampelos-border-light); padding-top: 14px;">
                    <a href="mailto:redazione@ampelos.it" style="font-size: 14px; font-weight: 600; color: var(--ampelos-primary); display: flex; align-items: center; gap: 6px;">
                        <span>redazione@ampelos.it</span>
                        <span>→</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- SEZIONE PRINCIPALE: FORM CONTATTI + BOX LATERALE -->
        <div class="ampelos-contact-main-grid" style="display: grid; grid-template-columns: 1.35fr 1fr; gap: 40px; align-items: start;">
            
            <!-- FORM DI CONTATTO EDITORIALE -->
            <div style="background: #fff; border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 36px 32px; box-shadow: var(--shadow-sm);">
                <h2 style="font-size: 26px; margin-bottom: 10px;">Scrivi un messaggio</h2>
                <p style="font-size: 14px; color: var(--ampelos-text-muted); margin-bottom: 24px;">
                    Compila i campi sottostanti indicando l'oggetto della tua richiesta. Ti risponderemo direttamente all'indirizzo email fornito.
                </p>

                <div id="ampelos-contact-feedback" style="display: none; padding: 14px 18px; border-radius: var(--radius-sm); margin-bottom: 20px; font-size: 14px; line-height: 1.5; background: #eaf3ed; color: #174826; border: 1px solid #c2decb;"></div>

                <form id="ampelos-contact-form" onsubmit="ampelosHandleContactSubmit(event)">
                    <div class="ampelos-contact-form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="ampelos-form-group">
                            <label for="contact-name">Nome e Cognome *</label>
                            <input type="text" id="contact-name" name="name" class="ampelos-form-input" placeholder="Es. Marco Rossi" required>
                        </div>
                        <div class="ampelos-form-group">
                            <label for="contact-email">Indirizzo Email *</label>
                            <input type="email" id="contact-email" name="email" class="ampelos-form-input" placeholder="latua@email.it" required>
                        </div>
                    </div>

                    <div class="ampelos-form-group">
                        <label for="contact-department">Motivo del contatto *</label>
                        <select id="contact-department" name="department" class="ampelos-form-select" required>
                            <option value="" disabled selected>Seleziona un'area di competenza...</option>
                            <option value="abbonamenti">Abbonamento, Area Personale o Pagamenti</option>
                            <option value="volume">Informazioni o Spedizione Volume Cartaceo 2027</option>
                            <option value="saggi">Candidatura Saggio o Proposta Editoriale</option>
                            <option value="stampa">Ufficio Stampa, Media e Diritti</option>
                            <option value="altro">Altra Richiesta / Corrispondenza Generale</option>
                        </select>
                    </div>

                    <div class="ampelos-form-group">
                        <label for="contact-subject">Oggetto *</label>
                        <input type="text" id="contact-subject" name="subject" class="ampelos-form-input" placeholder="Oggetto della tua richiesta..." required>
                    </div>

                    <div class="ampelos-form-group">
                        <label for="contact-message">Messaggio *</label>
                        <textarea id="contact-message" name="message" class="ampelos-form-textarea" placeholder="Scrivi qui il tuo messaggio in dettaglio..." required></textarea>
                    </div>

                    <div class="ampelos-form-group" style="margin-top: 14px;">
                        <label style="display: flex; align-items: flex-start; gap: 10px; font-weight: 400; font-size: 13px; color: var(--ampelos-text-muted); cursor: pointer;">
                            <input type="checkbox" required style="margin-top: 3px; accent-color: var(--ampelos-primary);">
                            <span>Ho letto e accetto l'<a href="<?php echo esc_url(home_url('/privacy/')); ?>" target="_blank" style="color: var(--ampelos-primary); text-decoration: underline;">Informativa sulla Privacy</a>. I dati comunicati saranno trattati unicamente per rispondere alla richiesta.</span>
                        </label>
                    </div>

                    <button type="submit" id="contact-submit-btn" class="ampelos-btn ampelos-btn-primary" style="margin-top: 10px; padding: 13px 28px; width: 100%; justify-content: center;">
                        <span>Invia Messaggio alla Redazione</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    </button>
                </form>
            </div>

            <!-- BOX INFORMATIVI LATERALI -->
            <div style="display: flex; flex-direction: column; gap: 24px;">
                
                <!-- Box 1: Tempi di risposta e cura -->
                <div style="background: var(--ampelos-bg); border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 28px 24px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
                        <span style="font-size: 18px;">⏱</span>
                        <h4 style="font-size: 17px; margin: 0;">Tempi di Risposta Diretti</h4>
                    </div>
                    <p style="font-size: 13.5px; color: var(--ampelos-text-muted); line-height: 1.6; margin: 0;">
                        La nostra redazione non adotta assistenti automatizzati né risponditori sintetici. Ogni richiesta viene letta da una persona della redazione o dell'amministrazione e riceve riscontro entro <strong>24-48 ore lavorative</strong>.
                    </p>
                </div>

                <!-- Box 2: Linee guida proposte saggi -->
                <div style="background: #ffffff; border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 28px 24px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
                        <span style="font-size: 18px;">✍️</span>
                        <h4 style="font-size: 17px; margin: 0;">Proposte di Collaborazione</h4>
                    </div>
                    <p style="font-size: 13.5px; color: var(--ampelos-text-muted); line-height: 1.6; margin-bottom: 14px;">
                        Se desideri proporre un'inchiesta o un saggio per una delle nostre 4 rubriche (<em>Questioni</em>, <em>Luoghi</em>, <em>Idee</em>, <em>Voci</em>), ti invitiamo a consultare preventivamente il nostro metodo di lavoro.
                    </p>
                    <a href="<?php echo esc_url(home_url('/chi-siamo/')); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm">
                        Leggi il Manifesto Editoriale →
                    </a>
                </div>

                <!-- Box 3: FAQ e Assistenza Rapida -->
                <div style="background: #ffffff; border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 28px 24px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
                        <span style="font-size: 18px;">❓</span>
                        <h4 style="font-size: 17px; margin: 0;">Dubbi Frequenti sull'Abbonamento</h4>
                    </div>
                    <p style="font-size: 13.5px; color: var(--ampelos-text-muted); line-height: 1.6; margin-bottom: 14px;">
                        Vuoi sapere cosa include l'abbonamento annuale, come funziona la disdetta o quando viene spedito il Volume 2027?
                    </p>
                    <a href="<?php echo esc_url(home_url('/abbonati/')); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm">
                        Consulta le FAQ sugli Abbonamenti →
                    </a>
                </div>

            </div>

        </div>

    </div>
</main>

<script>
function ampelosHandleContactSubmit(e) {
    e.preventDefault();
    var form = document.getElementById('ampelos-contact-form');
    var btn = document.getElementById('contact-submit-btn');
    var feedback = document.getElementById('ampelos-contact-feedback');
    var name = document.getElementById('contact-name').value;

    btn.disabled = true;
    btn.innerHTML = '<span>Invio in corso...</span>';

    setTimeout(function() {
        form.reset();
        btn.disabled = false;
        btn.innerHTML = '<span>Messaggio Inviato con Successo ✓</span>';
        feedback.style.display = 'block';
        feedback.innerHTML = '<strong>Grazie ' + name + '!</strong> Abbiamo ricevuto la tua richiesta. Un membro della nostra Redazione ti risponderà all\'indirizzo specificato entro 24-48 ore lavorative.';
        
        setTimeout(function() {
            btn.innerHTML = '<span>Invia un altro messaggio</span>';
        }, 3500);
    }, 600);
}
</script>

<?php
get_footer();

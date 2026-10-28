<?php
/**
 * Template Name: Elenco Autori
 * Elenco e profili dei collaboratori della rivista
 * Perfettamente allineato alla versione di sviluppo index.html
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main" style="padding: 60px 0 90px; background: #ffffff;">
    <div class="ampelos-container">

        <div class="ampelos-section-heading">
            <span class="ampelos-section-tag">I Collaboratori</span>
            <h1 style="font-size: clamp(2.4rem, 4.5vw, 3.8rem); margin-bottom: 16px;">Gli Autori di Ampelos</h1>
            <p style="font-size: 18px; color: var(--ampelos-text-muted); font-family: var(--font-serif); font-style: italic; max-width: 700px; margin: 0 auto;">
                Saggisti, geografi, agronomi e studiosi che curano i testi della rivista.
            </p>
        </div>

        <div class="ampelos-grid-3">
            <!-- Autore 1: Matteo Rives -->
            <div style="background: #fff; border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 32px; text-align: center; box-shadow: var(--shadow-sm); transition: var(--transition);">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: #243e30; color: #fff; font-family: var(--font-serif); font-size: 30px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                    MR
                </div>
                <h3 style="font-size: 21px; margin-bottom: 4px;">Matteo Rives</h3>
                <div style="font-size: 12.5px; font-weight: 700; color: var(--ampelos-terracotta); text-transform: uppercase; margin-bottom: 12px; letter-spacing: 0.05em;">
                    Direttore • Viticoltura Alpina
                </div>
                <p style="font-size: 14px; color: var(--ampelos-text-muted); line-height: 1.6; margin-bottom: 18px;">
                    Docente e ricercatore agrario. Indaga le risposte delle vigne d'alta quota all'instabilità climatica.
                </p>
                <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm">
                    14 Saggi pubblicati →
                </a>
            </div>

            <!-- Autore 2: Elena Moretti -->
            <div style="background: #fff; border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 32px; text-align: center; box-shadow: var(--shadow-sm); transition: var(--transition);">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: #3b2a22; color: #fff; font-family: var(--font-serif); font-size: 30px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                    EM
                </div>
                <h3 style="font-size: 21px; margin-bottom: 4px;">Elena Moretti</h3>
                <div style="font-size: 12.5px; font-weight: 700; color: var(--ampelos-terracotta); text-transform: uppercase; margin-bottom: 12px; letter-spacing: 0.05em;">
                    Geografia dei Suoli &amp; Atlante
                </div>
                <p style="font-size: 14px; color: var(--ampelos-text-muted); line-height: 1.6; margin-bottom: 18px;">
                    Geografa e cartografa. Ha svolto ampi rilievi sui terreni vulcanici etnei e sui basalti europei.
                </p>
                <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm">
                    11 Saggi pubblicati →
                </a>
            </div>

            <!-- Autore 3: Carlo Ferrini -->
            <div style="background: #fff; border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 32px; text-align: center; box-shadow: var(--shadow-sm); transition: var(--transition);">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: #1c2b38; color: #fff; font-family: var(--font-serif); font-size: 30px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                    CF
                </div>
                <h3 style="font-size: 21px; margin-bottom: 4px;">Carlo Ferrini</h3>
                <div style="font-size: 12.5px; font-weight: 700; color: var(--ampelos-terracotta); text-transform: uppercase; margin-bottom: 12px; letter-spacing: 0.05em;">
                    Filosofia dell'Assaggio &amp; Idee
                </div>
                <p style="font-size: 14px; color: var(--ampelos-text-muted); line-height: 1.6; margin-bottom: 18px;">
                    Filosofo e saggista. Esplora l'etica del gusto, il tempo lento e l'antropologia del vino.
                </p>
                <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm">
                    9 Saggi pubblicati →
                </a>
            </div>
        </div>

    </div>
</main>

<?php
get_footer();

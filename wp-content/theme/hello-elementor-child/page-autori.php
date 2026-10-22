<?php
/**
 * Template Name: Elenco Autori
 * Elenco e profili dei collaboratori della rivista
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main" style="padding: 60px 0 90px;">
    <div class="ampelos-container">

        <div class="ampelos-section-heading">
            <span class="ampelos-section-tag">I Collaboratori</span>
            <h1 style="font-size: clamp(2.4rem, 4.5vw, 3.8rem); margin-bottom: 16px;">Gli Autori di Ampelos</h1>
            <p style="font-size: 19px; color: var(--ampelos-text-muted); font-family: var(--font-serif); font-style: italic; max-width: 700px; margin: 0 auto;">
                Saggisti, geografi, storici dell'agricoltura e agronomi che firmano i testi della rivista.
            </p>
        </div>

        <div class="ampelos-grid-3">
            <!-- Autore 1 -->
            <div style="background: #fff; border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 32px; text-align: center; transition: var(--transition);">
                <div style="width: 88px; height: 88px; border-radius: var(--radius-pill); background: #243e30; color: #fff; font-family: var(--font-serif); font-size: 34px; display: flex; align-items: center; justify-content: center; margin: 0 auto 18px;">
                    MR
                </div>
                <h3 style="font-size: 22px; margin-bottom: 6px;">Matteo Rives</h3>
                <div style="font-size: 13px; font-weight: 700; color: var(--ampelos-terracotta); text-transform: uppercase; margin-bottom: 14px;">Viticoltura Alpina &amp; Climi</div>
                <p style="font-size: 14px; color: var(--ampelos-text-muted); line-height: 1.6; margin-bottom: 20px;">
                    Docente e ricercatore. Si occupa di geomorfologia delle alte quote e resilienza dei vitigni storici ai cambiamenti climatici.
                </p>
                <div style="border-top: 1px solid var(--ampelos-border-light); padding-top: 14px; font-size: 13px;">
                    <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" style="font-weight: 600;">14 Saggi pubblicati →</a>
                </div>
            </div>

            <!-- Autore 2 -->
            <div style="background: #fff; border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 32px; text-align: center; transition: var(--transition);">
                <div style="width: 88px; height: 88px; border-radius: var(--radius-pill); background: #3b2a22; color: #fff; font-family: var(--font-serif); font-size: 34px; display: flex; align-items: center; justify-content: center; margin: 0 auto 18px;">
                    EM
                </div>
                <h3 style="font-size: 22px; margin-bottom: 6px;">Elena Moretti</h3>
                <div style="font-size: 13px; font-weight: 700; color: var(--ampelos-terracotta); text-transform: uppercase; margin-bottom: 14px;">Geografia dei Suoli &amp; Atlante</div>
                <p style="font-size: 14px; color: var(--ampelos-text-muted); line-height: 1.6; margin-bottom: 20px;">
                    Geografa ed esperta di cartografia viticola. Ha condotto ricerche estese sui basalti vulcanici dell'Etna e sui suoli calcarei europei.
                </p>
                <div style="border-top: 1px solid var(--ampelos-border-light); padding-top: 14px; font-size: 13px;">
                    <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" style="font-weight: 600;">11 Saggi pubblicati →</a>
                </div>
            </div>

            <!-- Autore 3 -->
            <div style="background: #fff; border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 32px; text-align: center; transition: var(--transition);">
                <div style="width: 88px; height: 88px; border-radius: var(--radius-pill); background: #1c2b38; color: #fff; font-family: var(--font-serif); font-size: 34px; display: flex; align-items: center; justify-content: center; margin: 0 auto 18px;">
                    CF
                </div>
                <h3 style="font-size: 22px; margin-bottom: 6px;">Carlo Ferrini</h3>
                <div style="font-size: 13px; font-weight: 700; color: var(--ampelos-terracotta); text-transform: uppercase; margin-bottom: 14px;">Filosofia dell'Assaggio &amp; Idee</div>
                <p style="font-size: 14px; color: var(--ampelos-text-muted); line-height: 1.6; margin-bottom: 20px;">
                    Scrittore e filosofo della percezione. I suoi saggi indagano l'etica agricola, il tempo nell'invecchiamento e il linguaggio della degustazione.
                </p>
                <div style="border-top: 1px solid var(--ampelos-border-light); padding-top: 14px; font-size: 13px;">
                    <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" style="font-weight: 600;">9 Saggi pubblicati →</a>
                </div>
            </div>
        </div>

    </div>
</main>

<?php
get_footer();

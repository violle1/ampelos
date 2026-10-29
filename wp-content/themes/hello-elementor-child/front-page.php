<?php
/**
 * Front Page Template - Ampelos Theme
 * Controlla se l'utente è un abbonato attivo:
 * - Se non abbonato: carica la landing page pubblica esplicativa del modello di iscrizione
 * - Se abbonato: carica il portale editoriale completo riservato ai lettori
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!ampelos_is_user_subscribed()) {
    // Carica la landing page pubblica per non abbonati
    get_template_part('templates/landing-page');
    exit;
}

// Utente abbonato: mostra il portale riservato ai membri
get_header();
$current_user = wp_get_current_user();
?>

<main id="primary" class="site-main ampelos-subscriber-feed" style="background: #ffffff;">

    <!-- BARRA BENVENUTO ABBONATO -->
    <section style="background: #ffffff; border-bottom: 1px solid var(--ampelos-border); padding: 14px 0;">
        <div class="ampelos-container" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; font-size: 13.5px;">
            <div>
                <strong>Bentornato, <?php echo esc_html($current_user->display_name); ?></strong> • 
                <span style="color: var(--ampelos-primary); font-weight: 600;">Abbonamento Ampelos Attivo</span>
            </div>
            <div style="display: flex; gap: 16px;">
                <a href="<?php echo esc_url(home_url('/area-personale/')); ?>" style="color: var(--ampelos-primary); font-weight: 600;">
                    I tuoi articoli salvati →
                </a>
            </div>
        </div>
    </section>

    <!-- IN PRIMO PIANO / COVER STORY DELLA SETTIMANA -->
    <?php
    $featured_query = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
    ));
    $featured_id = 0;

    if ($featured_query->have_posts()) :
        while ($featured_query->have_posts()) : $featured_query->the_post();
            $featured_id   = get_the_ID();
            $r_terms       = get_the_terms($featured_id, 'rubrica');
            $rubrica_badge = (!empty($r_terms) && !is_wp_error($r_terms)) ? $r_terms[0]->name : 'Luoghi';
            $read_time     = get_post_meta($featured_id, '_ampelos_read_time', true) ?: '16 Min';
            $hero_text     = get_post_meta($featured_id, '_ampelos_hero_caption', true) ?: get_the_title();
            $hero_gradient = get_post_meta($featured_id, '_ampelos_hero_gradient', true) ?: '#253d2f';
    ?>
    <section style="padding: 40px 0 50px; border-bottom: 1px solid var(--ampelos-border); background: #ffffff;">
        <div class="ampelos-container">
            <div class="ampelos-hero-featured-grid">
                <div>
                    <span class="ampelos-rubrica-badge" style="position: static; margin-bottom: 16px; display: inline-block;">
                        In Primo Piano • Rubrica <?php echo esc_html($rubrica_badge); ?>
                    </span>
                    <h1 style="font-size: clamp(2.4rem, 4vw, 3.4rem); line-height: 1.15; margin-bottom: 18px;">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h1>
                    <p style="font-size: 19px; font-family: var(--font-serif); font-style: italic; color: var(--ampelos-text-muted); line-height: 1.5; margin-bottom: 24px;">
                        <?php echo wp_strip_all_tags(get_the_excerpt()); ?>
                    </p>
                    <div style="display: flex; align-items: center; gap: 18px; font-size: 13px; color: var(--ampelos-text-muted);">
                        <span><strong>Di <?php the_author(); ?></strong></span>
                        <span>•</span>
                        <span><?php echo esc_html($read_time); ?> di lettura</span>
                        <span>•</span>
                        <span><?php echo get_the_date('j F Y'); ?></span>
                    </div>
                    <div style="margin-top: 24px; display: flex; gap: 14px; flex-wrap: wrap;">
                        <a href="<?php the_permalink(); ?>" class="ampelos-btn ampelos-btn-primary">
                            Leggi il saggio integrale
                        </a>
                        <button type="button" class="ampelos-btn ampelos-btn-outline" onclick="AmpelosUI.toggleSaveArticle(<?php echo $featured_id; ?>, this)">
                            <span class="ampelos-save-label">Salva per dopo</span>
                        </button>
                    </div>
                </div>
                <div>
                    <?php 
                    $f_sample = function_exists('ampelos_get_article_sample_image_url') ? ampelos_get_article_sample_image_url($featured_id) : '';
                    if (has_post_thumbnail()) : ?>
                        <div style="border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-lg); aspect-ratio: 4/3;">
                            <?php the_post_thumbnail('large', array('style' => 'width:100%;height:100%;object-fit:cover;')); ?>
                        </div>
                    <?php elseif (!empty($f_sample)) : ?>
                        <div style="border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-lg); aspect-ratio: 4/3;">
                            <img src="<?php echo esc_url($f_sample); ?>" alt="<?php the_title_attribute(); ?>" style="width:100%; height:100%; object-fit:cover; display:block;">
                        </div>
                    <?php else : ?>
                        <div style="border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-lg); aspect-ratio: 4/3; background: <?php echo esc_attr($hero_gradient); ?>; display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-serif); font-size: 32px; font-style: italic; text-align: center; padding: 24px;">
                            <?php echo esc_html($hero_text); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
        endwhile;
        wp_reset_postdata();
    else :
    ?>
    <section style="padding: 40px 0 50px; border-bottom: 1px solid var(--ampelos-border); background: #ffffff;">
        <div class="ampelos-container">
            <div class="ampelos-hero-featured-grid">
                <div>
                    <span class="ampelos-rubrica-badge" style="position: static; margin-bottom: 16px; display: inline-block;">
                        In Primo Piano • Rubrica Luoghi
                    </span>
                    <h1 style="font-size: clamp(2.4rem, 4vw, 3.4rem); line-height: 1.15; margin-bottom: 18px;">
                        <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>">
                            Le vigne di pietra calcarea nel Vallese: una memoria geologica millenaria
                        </a>
                    </h1>
                    <p style="font-size: 19px; font-family: var(--font-serif); font-style: italic; color: var(--ampelos-text-muted); line-height: 1.5; margin-bottom: 24px;">
                        Reportage lungo le pareti strapiombanti della valle del Rodano, dove i terrazzamenti sfidano la gravità e i vitigni autoctoni conservano una purezza minerale inviolata.
                    </p>
                    <div style="display: flex; align-items: center; gap: 18px; font-size: 13px; color: var(--ampelos-text-muted);">
                        <span><strong>Di Andrea Fattizzo</strong></span>
                        <span>•</span>
                        <span>16 Minuti di lettura</span>
                        <span>•</span>
                        <span>22 Ottobre 2026</span>
                    </div>
                    <div style="margin-top: 24px; display: flex; gap: 14px; flex-wrap: wrap;">
                        <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-primary">
                            Leggi il saggio integrale
                        </a>
                        <button type="button" class="ampelos-btn ampelos-btn-outline" onclick="AmpelosUI.toggleSaveArticle(1, this)">
                            <span class="ampelos-save-label">Salva per dopo</span>
                        </button>
                    </div>
                </div>
                <div>
                    <div style="border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-lg); aspect-ratio: 4/3; background: #253d2f; display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-serif); font-size: 32px; font-style: italic; text-align: center; padding: 24px;">
                        I muri a secco del Vallese
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ULTIME USCITE DALLE 4 RUBRICHE -->
    <section style="padding: 50px 0 70px; background: #ffffff;">
        <div class="ampelos-container">
            <div class="ampelos-subscriber-section-header">
                <div>
                    <span class="ampelos-section-tag">Archivio Membri</span>
                    <h2 style="margin: 0; font-size: 28px;">Ultimi Saggi e Inchieste</h2>
                </div>
                <div style="display: flex; gap: 12px;">
                    <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm">
                        Visualizza tutto l'archivio →
                    </a>
                </div>
            </div>

            <!-- Griglia Articoli -->
            <div class="ampelos-grid-3">
            <?php
            $recent_query = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post__not_in'   => $featured_id ? array($featured_id) : array(),
                'post_status'    => 'publish',
            ));

            if ($recent_query->have_posts()) :
                while ($recent_query->have_posts()) : $recent_query->the_post();
                    $r_terms       = get_the_terms(get_the_ID(), 'rubrica');
                    $rubrica_badge = (!empty($r_terms) && !is_wp_error($r_terms)) ? $r_terms[0]->name : 'Saggio';
                    $read_time     = get_post_meta(get_the_ID(), '_ampelos_read_time', true) ?: '14 Min';
                    $hero_text     = get_post_meta(get_the_ID(), '_ampelos_hero_caption', true) ?: get_the_title();
                    $hero_gradient = get_post_meta(get_the_ID(), '_ampelos_hero_gradient', true) ?: '#1e3527';
            ?>
                <article class="ampelos-article-card" style="background: #ffffff;">
                    <div class="ampelos-article-thumb">
                        <div class="ampelos-rubrica-badge"><?php echo esc_html($rubrica_badge); ?></div>
                        <?php 
                        $card_sample = function_exists('ampelos_get_article_sample_image_url') ? ampelos_get_article_sample_image_url(get_the_ID()) : '';
                        if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large'); ?>
                        <?php elseif (!empty($card_sample)) : ?>
                            <img src="<?php echo esc_url($card_sample); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                        <?php else : ?>
                            <div style="background: <?php echo esc_attr($hero_gradient); ?>; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-serif); font-size: 22px; text-align: center; padding: 20px;">
                                <?php echo esc_html($hero_text); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="ampelos-article-content">
                        <div class="ampelos-article-meta">
                            <span><?php echo esc_html($read_time); ?> lettura</span> • <span><?php echo esc_html($rubrica_badge); ?></span>
                        </div>
                        <h3 class="ampelos-article-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="ampelos-article-excerpt">
                            <?php echo wp_strip_all_tags(get_the_excerpt()); ?>
                        </p>
                        <div class="ampelos-article-footer">
                            <span class="ampelos-author-name">Di <?php the_author(); ?></span>
                            <a href="<?php the_permalink(); ?>" style="font-weight: 600;">Leggi →</a>
                        </div>
                    </div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <!-- Card 1 (Questioni) Fallback -->
                <article class="ampelos-article-card" style="background: #ffffff;">
                    <div class="ampelos-article-thumb">
                        <div class="ampelos-rubrica-badge">Questioni</div>
                        <?php 
                        $img1 = function_exists('ampelos_get_article_sample_image_url') ? ampelos_get_article_sample_image_url('la-nuova-mappa-dei-dazi') : '';
                        if (!empty($img1)) : ?>
                            <img src="<?php echo esc_url($img1); ?>" alt="La nuova mappa dei dazi" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                        <?php else : ?>
                            <div style="background: #1e3527; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-serif); font-size: 22px;">
                                Geopolitica delle dogane
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="ampelos-article-content">
                        <div class="ampelos-article-meta">
                            <span>14 Min lettura</span> • <span>Questioni</span>
                        </div>
                        <h3 class="ampelos-article-title">
                            La nuova mappa dei dazi: come la geopolitica ridefinisce le rotte del vino europeo
                        </h3>
                        <p class="ampelos-article-excerpt">
                            Analisi degli equilibri commerciali fra Nord America e mercati asiatici emergenti, tra flessione dei volumi e riscoperta delle produzioni di nicchia...
                        </p>
                        <div class="ampelos-article-footer">
                            <span class="ampelos-author-name">Di Elena Moretti</span>
                            <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" style="font-weight: 600;">Leggi →</a>
                        </div>
                    </div>
                </article>

                <!-- Card 2 (Idee) Fallback -->
                <article class="ampelos-article-card" style="background: #ffffff;">
                    <div class="ampelos-article-thumb">
                        <div class="ampelos-rubrica-badge">Idee</div>
                        <?php 
                        $img2 = function_exists('ampelos_get_article_sample_image_url') ? ampelos_get_article_sample_image_url('l-estetica-del-silenzio') : '';
                        if (!empty($img2)) : ?>
                            <img src="<?php echo esc_url($img2); ?>" alt="L'estetica del silenzio" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                        <?php else : ?>
                            <div style="background: #2a2c35; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-serif); font-size: 22px;">
                                Estetica del silenzio
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="ampelos-article-content">
                        <div class="ampelos-article-meta">
                            <span>12 Min lettura</span> • <span>Idee</span>
                        </div>
                        <h3 class="ampelos-article-title">
                            L'estetica del silenzio: perché abbiamo smesso di ascoltare il vino prima di giudicarlo?
                        </h3>
                        <p class="ampelos-article-excerpt">
                            Un saggio contro la fretta delle schede di punteggio e il vocabolario standardizzato dei descrittori sintetici. Verso un'antropologia del tempo lungo...
                        </p>
                        <div class="ampelos-article-footer">
                            <span class="ampelos-author-name">Di Carlo Ferrini</span>
                            <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" style="font-weight: 600;">Leggi →</a>
                        </div>
                    </div>
                </article>

                <!-- Card 3 (Voci) Fallback -->
                <article class="ampelos-article-card" style="background: #ffffff;">
                    <div class="ampelos-article-thumb">
                        <div class="ampelos-rubrica-badge">Voci</div>
                        <?php 
                        $img3 = function_exists('ampelos_get_article_sample_image_url') ? ampelos_get_article_sample_image_url('la-terra-non-ha-fretta') : '';
                        if (!empty($img3)) : ?>
                            <img src="<?php echo esc_url($img3); ?>" alt="La terra non ha fretta" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                        <?php else : ?>
                            <div style="background: #3c2a23; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-serif); font-size: 22px;">
                                Conversazione con Josko
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="ampelos-article-content">
                        <div class="ampelos-article-meta">
                            <span>20 Min lettura</span> • <span>Voci</span>
                        </div>
                        <h3 class="ampelos-article-title">
                            "La terra non ha fretta": quarant'anni di riflessioni tra macerazioni, argille e libertà
                        </h3>
                        <p class="ampelos-article-excerpt">
                            Lungo dialogo a ruota libera sulle colline di confine del Collio: la ricerca della verità del grappolo oltre qualsiasi etichetta e ideologia...
                        </p>
                        <div class="ampelos-article-footer">
                            <span class="ampelos-author-name">Di Andrea Fattizzo</span>
                            <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" style="font-weight: 600;">Leggi →</a>
                        </div>
                    </div>
                </article>
            <?php endif; ?>
            </div>
        </div>
    </section>
            </div>
        </div>
    </section>

    <!-- AREA PROSSIMI ARRIVI: PERCORSI ED ATLANTE -->
    <section style="padding: 60px 0; background: #ffffff; border-top: 1px solid var(--ampelos-border);">
        <div class="ampelos-container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 32px;">
                <div style="background: #fff; padding: 36px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border);">
                    <span class="ampelos-tag-future" style="margin-left: 0; margin-bottom: 12px; display: inline-block;">Attivazione Successiva</span>
                    <h3 style="font-size: 24px;">I Percorsi Ampelos</h3>
                    <p style="color: var(--ampelos-text-muted); font-size: 14.5px; line-height: 1.6;">
                        Cicli monografici di lettura curati da storici e docenti: un filo conduttore che attraversa decenni di annate e scritti per approfondire tematiche verticali.
                    </p>
                    <a href="<?php echo esc_url(home_url('/percorsi/')); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm" style="margin-top: 12px;">
                        Esplora l'anteprima dei percorsi
                    </a>
                </div>

                <div style="background: #fff; padding: 36px; border-radius: var(--radius-md); border: 1px solid var(--ampelos-border);">
                    <span class="ampelos-tag-future" style="margin-left: 0; margin-bottom: 12px; display: inline-block;">Attivazione Successiva</span>
                    <h3 style="font-size: 24px;">L'Atlante Geografico</h3>
                    <p style="color: var(--ampelos-text-muted); font-size: 14.5px; line-height: 1.6;">
                        Una cartografia digitale interattiva dei cru, delle faglie geologiche e dei microclimi, collegata direttamente a ogni saggio e reportage di territorio.
                    </p>
                    <a href="<?php echo esc_url(home_url('/atlante/')); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm" style="margin-top: 12px;">
                        Esplora l'anteprima dell'atlante
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();

<?php
/**
 * Single Post Template - Ampelos Theme
 * Visualizzazione del singolo articolo con reading progress bar, autore e paywall gate
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$is_subscribed = ampelos_is_user_subscribed();
$post_id       = get_the_ID();
$rubriche      = get_the_terms($post_id, 'rubrica');
$rubrica_name  = (!empty($rubriche) && !is_wp_error($rubriche)) ? $rubriche[0]->name : 'Saggi & Approfondimenti';
?>

<!-- Reading Progress Bar -->
<div id="ampelos-reading-progress" style="position: fixed; top: 0; left: 0; height: 3px; background: var(--ampelos-terracotta); z-index: 9999; width: 0; transition: width 0.1s linear;"></div>

<main id="primary" class="site-main ampelos-single-article" style="background: #ffffff;">
    <div class="ampelos-container">

        <?php
        while (have_posts()) :
            the_post();
        ?>
            <!-- Intestazione Articolo -->
            <header class="ampelos-article-header">
                <span class="ampelos-article-rubrica-lead"><?php echo esc_html($rubrica_name); ?></span>
                <h1 class="ampelos-article-headline"><?php the_title(); ?></h1>
                
                <?php if (has_excerpt()) : ?>
                    <div class="ampelos-article-standfirst">
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>

                <?php 
                $read_time = get_post_meta($post_id, '_ampelos_read_time', true) ?: '14 Min';
                ?>
                <div class="ampelos-article-byline">
                    <span>Di <strong><?php the_author(); ?></strong></span>
                    <span>•</span>
                    <span><?php echo get_the_date('j F Y'); ?></span>
                    <span>•</span>
                    <span><?php echo esc_html($read_time); ?> di lettura</span>
                    <span>•</span>
                    <button type="button" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm" onclick="AmpelosUI.toggleSaveArticle(<?php echo $post_id; ?>, this)">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
                        <span class="ampelos-save-label">Salva articolo</span>
                    </button>
                </div>
            </header>

            <!-- Media Principale / Immagine di Copertina -->
            <?php 
            $sample_img = function_exists('ampelos_get_article_sample_image_url') ? ampelos_get_article_sample_image_url($post_id) : '';
            if (has_post_thumbnail()) : ?>
                <div class="ampelos-article-hero-media">
                    <?php the_post_thumbnail('full'); ?>
                    <div class="ampelos-article-hero-caption">
                        <?php echo esc_html(get_post_meta($post_id, '_ampelos_hero_caption', true) ?: 'Fotografia originale dall\'archivio Ampelos. Riproduzione riservata.'); ?>
                    </div>
                </div>
            <?php elseif (!empty($sample_img)) : ?>
                <div class="ampelos-article-hero-media" style="border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-md);">
                    <img src="<?php echo esc_url($sample_img); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: auto; max-height: 520px; object-fit: cover; display: block;">
                    <div class="ampelos-article-hero-caption">
                        <?php echo esc_html(get_post_meta($post_id, '_ampelos_hero_caption', true) ?: 'Fotografia originale dall\'archivio Ampelos. Riproduzione riservata.'); ?>
                    </div>
                </div>
            <?php else : 
                $hero_gradient = get_post_meta($post_id, '_ampelos_hero_gradient', true) ?: 'linear-gradient(135deg, #1b3527, #2f523d)';
                $hero_caption  = get_post_meta($post_id, '_ampelos_hero_caption', true) ?: get_the_title();
            ?>
                <div class="ampelos-article-hero-media" style="background: <?php echo esc_attr($hero_gradient); ?>; aspect-ratio: 16/9; display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-serif); font-size: 32px; font-style: italic; text-align: center; padding: 24px;">
                    <?php echo esc_html($hero_caption); ?>
                </div>
            <?php endif; ?>

            <!-- Corpo dell'Articolo (con filtro paywall se visitatore non iscritto) -->
            <div class="ampelos-article-body">
                <?php the_content(); ?>
            </div>

            <!-- Box Autore & Condivisione riservata -->
            <?php
            $author_name = get_the_author();
            $author_bio  = get_the_author_meta('description');
            if (empty($author_bio)) {
                $author_bio = 'Collaboratore di Ampelos. Scrive regolarmente di geomorfologia, viticoltura rigenerativa e memorie del vino europeo.';
            }
            $initials = '';
            foreach (explode(' ', $author_name) as $part) {
                if (!empty($part)) $initials .= strtoupper($part[0]);
            }
            if (empty($initials)) $initials = 'A';
            ?>
            <footer style="max-width: 720px; margin: 60px auto 0; padding-top: 30px; border-top: 1px solid var(--ampelos-border);">
                <div style="display: flex; gap: 20px; align-items: flex-start;">
                    <div style="width: 64px; height: 64px; border-radius: var(--radius-pill); background: var(--ampelos-sage); color: #fff; display: flex; align-items: center; justify-content: center; font-family: var(--font-serif); font-size: 26px; flex-shrink: 0;">
                        <?php echo esc_html(substr($initials, 0, 2)); ?>
                    </div>
                    <div>
                        <h4 style="margin-bottom: 4px; font-size: 19px;"><?php echo esc_html($author_name); ?></h4>
                        <p style="font-size: 13.5px; color: var(--ampelos-text-muted); line-height: 1.5; margin-bottom: 12px;">
                            <?php echo esc_html($author_bio); ?>
                        </p>
                        <a href="<?php echo esc_url(home_url('/autori/')); ?>" style="font-size: 13px; font-weight: 600; color: var(--ampelos-primary);">
                            Tutti i saggi dell'autore →
                        </a>
                    </div>
                </div>
            </footer>

        <?php endwhile; ?>

    </div>
</main>

<?php
get_footer();

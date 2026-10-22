<?php
/**
 * Archive Template - Ampelos Theme
 * Gestisce "Tutti gli articoli" e le singole Rubriche (Questioni, Luoghi, Idee, Voci)
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$current_term = get_queried_object();
$is_rubrica   = is_tax('rubrica');
$term_name    = $is_rubrica ? $current_term->name : 'Tutti gli articoli';
$term_desc    = $is_rubrica ? $current_term->description : 'L\'intero archivio di saggi, inchieste, territori e conversazioni.';
?>

<main id="primary" class="site-main" style="padding: 50px 0 80px;">
    <div class="ampelos-container">
        
        <!-- Header Archivio con Rubriche Tabs -->
        <header style="border-bottom: 2px solid var(--ampelos-primary); padding-bottom: 24px; margin-bottom: 36px;">
            <div style="max-width: 780px;">
                <span class="ampelos-section-tag">Leggi Ampelos</span>
                <h1 style="font-size: clamp(2.4rem, 4vw, 3.4rem); margin-bottom: 12px;"><?php echo esc_html($term_name); ?></h1>
                <p style="font-size: 17px; color: var(--ampelos-text-muted); font-family: var(--font-serif); font-style: italic; margin-bottom: 24px;">
                    <?php echo esc_html($term_desc); ?>
                </p>
            </div>

            <!-- Filtri Rubriche -->
            <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 20px;">
                <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn <?php echo !$is_rubrica ? 'ampelos-btn-primary' : 'ampelos-btn-outline'; ?> ampelos-btn-sm">
                    Tutti gli articoli
                </a>
                <a href="<?php echo esc_url(home_url('/rubrica/questioni/')); ?>" class="ampelos-btn <?php echo ($is_rubrica && $current_term->slug === 'questioni') ? 'ampelos-btn-primary' : 'ampelos-btn-outline'; ?> ampelos-btn-sm">
                    Questioni (Fatti e cambiamenti)
                </a>
                <a href="<?php echo esc_url(home_url('/rubrica/luoghi/')); ?>" class="ampelos-btn <?php echo ($is_rubrica && $current_term->slug === 'luoghi') ? 'ampelos-btn-primary' : 'ampelos-btn-outline'; ?> ampelos-btn-sm">
                    Luoghi (Territori e comunità)
                </a>
                <a href="<?php echo esc_url(home_url('/rubrica/idee/')); ?>" class="ampelos-btn <?php echo ($is_rubrica && $current_term->slug === 'idee') ? 'ampelos-btn-primary' : 'ampelos-btn-outline'; ?> ampelos-btn-sm">
                    Idee (Saggi e interpretazioni)
                </a>
                <a href="<?php echo esc_url(home_url('/rubrica/voci/')); ?>" class="ampelos-btn <?php echo ($is_rubrica && $current_term->slug === 'voci') ? 'ampelos-btn-primary' : 'ampelos-btn-outline'; ?> ampelos-btn-sm">
                    Voci (Interviste e ritratti)
                </a>
            </div>
        </header>

        <!-- Griglia Articoli -->
        <?php if (have_posts()) : ?>
            <div class="ampelos-grid-3">
                <?php
                while (have_posts()) :
                    the_post();
                    $r_terms = get_the_terms(get_the_ID(), 'rubrica');
                    $badge   = (!empty($r_terms) && !is_wp_error($r_terms)) ? $r_terms[0]->name : 'Saggio';
                ?>
                    <article class="ampelos-article-card">
                        <div class="ampelos-article-thumb">
                            <div class="ampelos-rubrica-badge"><?php echo esc_html($badge); ?></div>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large'); ?>
                            <?php else : ?>
                                <div style="background: #203528; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-serif); font-size: 20px; font-style: italic; padding: 20px; text-align: center;">
                                    <?php the_title(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="ampelos-article-content">
                            <div class="ampelos-article-meta">
                                <span><?php echo get_the_date('j M Y'); ?></span> • <span>12 Min lettura</span>
                            </div>
                            <h3 class="ampelos-article-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <div class="ampelos-article-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="ampelos-article-footer">
                                <span class="ampelos-author-name">Di <?php the_author(); ?></span>
                                <a href="<?php the_permalink(); ?>" style="font-weight: 600; color: var(--ampelos-primary);">Leggi →</a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Paginazione -->
            <div style="margin-top: 50px; text-align: center;">
                <?php the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '← Precedenti',
                    'next_text' => 'Successivi →',
                )); ?>
            </div>

        <?php else : ?>
            <div style="background: #fff; border: 1px solid var(--ampelos-border); padding: 48px; border-radius: var(--radius-md); text-align: center;">
                <h3>Nessun articolo trovato in questa sezione</h3>
                <p style="color: var(--ampelos-text-muted); margin-bottom: 24px;">I redattori stanno curando i nuovi testi per questa rubrica.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="ampelos-btn ampelos-btn-outline">Torna alla Home</a>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php
get_footer();

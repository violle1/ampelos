<?php
/**
 * Archive Template - Ampelos Theme
 * Gestisce "Tutti gli articoli" e le singole Rubriche (Questioni, Luoghi, Idee, Voci)
 */

if (!defined('ABSPATH')) {
    exit;
}

$request_uri = isset($_SERVER['REQUEST_URI']) ? trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') : '';

// Instradamento di sicurezza se WordPress tratta /autori/, /volume/, /percorsi/, /atlante/ come archivi CPT
if (is_post_type_archive('ampelos_autore') || $request_uri === 'autori' || preg_match('#(^|/)autori/?$#', $request_uri)) {
    require __DIR__ . '/page-autori.php';
    return;
}
if (is_post_type_archive('ampelos_volume') || $request_uri === 'volume' || preg_match('#(^|/)volume/?$#', $request_uri)) {
    require __DIR__ . '/page-volume.php';
    return;
}
if (is_post_type_archive('ampelos_percorso') || $request_uri === 'percorsi' || preg_match('#(^|/)percorsi/?$#', $request_uri)) {
    require __DIR__ . '/page-percorsi.php';
    return;
}
if (is_post_type_archive('ampelos_luogo') || $request_uri === 'atlante' || preg_match('#(^|/)atlante/?$#', $request_uri)) {
    require __DIR__ . '/page-atlante.php';
    return;
}

get_header();

$current_term = get_queried_object();
$is_rubrica   = is_tax('rubrica');
$term_name    = $is_rubrica ? $current_term->name : 'Tutti gli articoli';
$term_desc    = $is_rubrica ? $current_term->description : 'L\'intero archivio di saggi, inchieste, territori e conversazioni.';
$rubrica_slug = $is_rubrica ? $current_term->slug : '';

// Setup WP_Query per garantire che i post vengano recuperati sia su /tutti-gli-articoli/ sia su /rubrica/...
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$query_args = array(
    'post_type'      => 'post',
    'posts_per_page' => 12,
    'paged'          => $paged,
    'post_status'    => 'publish',
);

if ($is_rubrica) {
    $query_args['tax_query'] = array(
        array(
            'taxonomy' => 'rubrica',
            'field'    => 'slug',
            'terms'    => $rubrica_slug,
        ),
    );
}

$articles_query = new WP_Query($query_args);
?>

<main id="primary" class="site-main" style="padding: 50px 0 80px; background: #ffffff;">
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
        <?php if ($articles_query->have_posts()) : ?>
            <div class="ampelos-grid-3">
                <?php
                while ($articles_query->have_posts()) :
                    $articles_query->the_post();
                    $r_terms       = get_the_terms(get_the_ID(), 'rubrica');
                    $badge         = (!empty($r_terms) && !is_wp_error($r_terms)) ? $r_terms[0]->name : 'Saggio';
                    $read_time     = get_post_meta(get_the_ID(), '_ampelos_read_time', true) ?: '14 Min';
                    $hero_gradient = get_post_meta(get_the_ID(), '_ampelos_hero_gradient', true) ?: '#203528';
                    $hero_caption  = get_post_meta(get_the_ID(), '_ampelos_hero_caption', true) ?: get_the_title();
                ?>
                    <article class="ampelos-article-card" style="background: #ffffff;">
                        <div class="ampelos-article-thumb">
                            <div class="ampelos-rubrica-badge"><?php echo esc_html($badge); ?></div>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large'); ?>
                            <?php else : ?>
                                <div style="background: <?php echo esc_attr($hero_gradient); ?>; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-serif); font-size: 20px; font-style: italic; padding: 20px; text-align: center;">
                                    <?php echo esc_html($hero_caption); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="ampelos-article-content">
                            <div class="ampelos-article-meta">
                                <span><?php echo get_the_date('j M Y'); ?></span> • <span><?php echo esc_html($read_time); ?> lettura</span>
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
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <!-- Paginazione -->
            <div style="margin-top: 50px; text-align: center;">
                <?php
                echo paginate_links(array(
                    'total'     => $articles_query->max_num_pages,
                    'current'   => max(1, get_query_var('paged')),
                    'prev_text' => '← Precedenti',
                    'next_text' => 'Successivi →',
                ));
                ?>
            </div>

        <?php else : 
            // Fallback elegante con i contenuti demo della versione di sviluppo
            $demo_articles = array(
                array(
                    'title'         => 'Le vigne di pietra calcarea nel Vallese: una memoria geologica millenaria',
                    'slug'          => 'le-vigne-di-pietra-calcarea-nel-vallese',
                    'excerpt'       => 'Reportage lungo le pareti della valle del Rodano, dove i terrazzamenti sfidano la gravità e i vitigni autoctoni conservano una purezza minerale inviolata.',
                    'rubrica'       => 'luoghi',
                    'rubrica_name'  => 'Luoghi',
                    'author'        => 'Matteo Rives',
                    'date'          => '22 Ottobre 2026',
                    'read_time'     => '16 Min',
                    'hero_gradient' => 'linear-gradient(135deg, #1b3527, #2f523d)',
                    'hero_caption'  => 'I muri a secco del Vallese',
                ),
                array(
                    'title'         => 'La nuova mappa dei dazi: come la geopolitica ridefinisce le rotte del vino europeo',
                    'slug'          => 'la-nuova-mappa-dei-dazi',
                    'excerpt'       => 'Analisi degli equilibri commerciali fra Nord America e mercati asiatici emergenti, tra flessione dei volumi e riscoperta delle produzioni di nicchia.',
                    'rubrica'       => 'questioni',
                    'rubrica_name'  => 'Questioni',
                    'author'        => 'Elena Moretti',
                    'date'          => '18 Ottobre 2026',
                    'read_time'     => '14 Min',
                    'hero_gradient' => 'linear-gradient(135deg, #1e3527, #375341)',
                    'hero_caption'  => 'Geopolitica delle dogane',
                ),
                array(
                    'title'         => 'L\'estetica del silenzio: perché abbiamo smesso di ascoltare il vino prima di giudicarlo?',
                    'slug'          => 'l-estetica-del-silenzio',
                    'excerpt'       => 'Un saggio contro la fretta delle schede di punteggio e il vocabolario standardizzato dei descrittori sintetici. Verso un\'antropologia del tempo lungo.',
                    'rubrica'       => 'idee',
                    'rubrica_name'  => 'Idee',
                    'author'        => 'Carlo Ferrini',
                    'date'          => '14 Ottobre 2026',
                    'read_time'     => '12 Min',
                    'hero_gradient' => 'linear-gradient(135deg, #2a2c35, #3f4350)',
                    'hero_caption'  => 'Estetica del silenzio',
                ),
                array(
                    'title'         => '«La terra non ha fretta»: quarant\'anni di riflessioni tra macerazioni, argille e libertà',
                    'slug'          => 'la-terra-non-ha-fretta',
                    'excerpt'       => 'Lungo dialogo a ruota libera sulle colline di confine del Collio: la ricerca della verità del grappolo oltre qualsiasi etichetta e ideologia commerciale.',
                    'rubrica'       => 'voci',
                    'rubrica_name'  => 'Voci',
                    'author'        => 'Matteo Rives',
                    'date'          => '09 Ottobre 2026',
                    'read_time'     => '20 Min',
                    'hero_gradient' => 'linear-gradient(135deg, #3c2a23, #573e33)',
                    'hero_caption'  => 'Conversazione con Josko',
                ),
            );

            $filtered_demo = array();
            foreach ($demo_articles as $da) {
                if (!$is_rubrica || $da['rubrica'] === $rubrica_slug) {
                    $filtered_demo[] = $da;
                }
            }
        ?>
            <div class="ampelos-grid-3">
                <?php foreach ($filtered_demo as $art) : ?>
                    <article class="ampelos-article-card" style="background: #ffffff;">
                        <div class="ampelos-article-thumb">
                            <div class="ampelos-rubrica-badge"><?php echo esc_html($art['rubrica_name']); ?></div>
                            <div style="background: <?php echo esc_attr($art['hero_gradient']); ?>; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-serif); font-size: 20px; font-style: italic; padding: 20px; text-align: center;">
                                <?php echo esc_html($art['hero_caption']); ?>
                            </div>
                        </div>
                        <div class="ampelos-article-content">
                            <div class="ampelos-article-meta">
                                <span><?php echo esc_html($art['date']); ?></span> • <span><?php echo esc_html($art['read_time']); ?> lettura</span>
                            </div>
                            <h3 class="ampelos-article-title">
                                <a href="<?php echo esc_url(home_url('/' . $art['slug'] . '/')); ?>">
                                    <?php echo esc_html($art['title']); ?>
                                </a>
                            </h3>
                            <div class="ampelos-article-excerpt">
                                <p><?php echo esc_html($art['excerpt']); ?></p>
                            </div>
                            <div class="ampelos-article-footer">
                                <span class="ampelos-author-name">Di <?php echo esc_html($art['author']); ?></span>
                                <a href="<?php echo esc_url(home_url('/' . $art['slug'] . '/')); ?>" style="font-weight: 600; color: var(--ampelos-primary);">Leggi →</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php
get_footer();

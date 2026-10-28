<?php
/**
 * Search Results Template - Ampelos Theme
 * Risultati della Ricerca con Gestione Raffinata dello Stato Vuoto
 * Perfettamente allineato all'estetica editoriale di Ampelos
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$search_query  = get_search_query();
global $wp_query;
$total_results = $wp_query->found_posts;
?>

<main id="primary" class="site-main ampelos-search-page" style="padding: 60px 0 100px; min-height: 70vh; background: #ffffff;">
    <div class="ampelos-container">
        
        <!-- Intestazione Ricerca -->
        <header class="ampelos-search-header" style="border-bottom: 2px solid var(--ampelos-primary); padding-bottom: 28px; margin-bottom: 40px;">
            <div style="max-width: 820px;">
                <span class="ampelos-section-tag">Archivio & Ricerca</span>
                <h1 style="font-size: clamp(2.4rem, 4.5vw, 3.6rem); margin-bottom: 12px; line-height: 1.15;">
                    <?php if (!empty($search_query)) : ?>
                        Risultati per: <span style="font-style: italic; color: var(--ampelos-terracotta);">«<?php echo esc_html($search_query); ?>»</span>
                    <?php else : ?>
                        Cerca nell'archivio di Ampelos
                    <?php endif; ?>
                </h1>
                <p style="font-size: 17px; color: var(--ampelos-text-muted); font-family: var(--font-serif); font-style: italic; margin-bottom: 24px;">
                    <?php if (have_posts() && !empty($search_query)) : ?>
                        <?php printf(
                            esc_html(_n(
                                'È stato trovato 1 saggio corrispondente ai tuoi criteri di ricerca.',
                                'Sono stati trovati %s saggi corrispondenti ai tuoi criteri di ricerca.',
                                $total_results,
                                'hello-elementor-child-ampelos'
                            )),
                            number_format_i18n($total_results)
                        ); ?>
                    <?php elseif (!empty($search_query)) : ?>
                        Nessun testo corrisponde esattamente al termine cercato. Puoi affinare la ricerca qui sotto o consultare i saggi consigliati dalla redazione.
                    <?php else : ?>
                        Inserisci un termine, un autore, una regione vitivinicola o un tema enologico.
                    <?php endif; ?>
                </p>

                <!-- Barra di Ricerca Inline Elegante -->
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="ampelos-search-form-inline" style="max-width: 640px; display: flex; gap: 10px; margin-top: 16px;">
                    <div style="position: relative; flex: 1;">
                        <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--ampelos-text-muted); display: flex; align-items: center; pointer-events: none;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </span>
                        <input type="search" name="s" value="<?php echo esc_attr($search_query); ?>" placeholder="Cerca per titolo, territorio, vitigno o autore..." style="width: 100%; padding: 13px 16px 13px 44px; border: 1px solid var(--ampelos-border); border-radius: var(--radius-sm); font-size: 15px; font-family: var(--font-sans); outline: none; background: #ffffff; transition: border-color 0.2s;" onfocus="this.style.borderColor='var(--ampelos-primary)'" onblur="this.style.borderColor='var(--ampelos-border)'">
                    </div>
                    <button type="submit" class="ampelos-btn ampelos-btn-primary" style="padding: 0 24px; white-space: nowrap;">
                        Cerca
                    </button>
                </form>
            </div>
        </header>

        <!-- Sezione Risultati Trovati -->
        <?php if (have_posts()) : ?>
            <div class="ampelos-grid-3">
                <?php
                while (have_posts()) :
                    the_post();
                    $r_terms       = get_the_terms(get_the_ID(), 'rubrica');
                    $badge         = (!empty($r_terms) && !is_wp_error($r_terms)) ? $r_terms[0]->name : 'Saggio';
                    $read_time     = get_post_meta(get_the_ID(), '_ampelos_read_time', true) ?: '14 Min';
                    $hero_gradient = get_post_meta(get_the_ID(), '_ampelos_hero_gradient', true) ?: '#203528';
                    $hero_caption  = get_post_meta(get_the_ID(), '_ampelos_hero_caption', true) ?: get_the_title();
                ?>
                    <article class="ampelos-article-card" style="background: #ffffff;">
                        <div class="ampelos-article-thumb">
                            <div class="ampelos-rubrica-badge"><?php echo esc_html($badge); ?></div>
                            <?php 
                            $sample_img = function_exists('ampelos_get_article_sample_image_url') ? ampelos_get_article_sample_image_url(get_the_ID()) : '';
                            if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large'); ?>
                            <?php elseif (!empty($sample_img)) : ?>
                                <img src="<?php echo esc_url($sample_img); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block;">
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
                <?php endwhile; ?>
            </div>

            <!-- Paginazione -->
            <div style="margin-top: 50px; text-align: center;">
                <?php
                echo paginate_links(array(
                    'total'     => $wp_query->max_num_pages,
                    'current'   => max(1, get_query_var('paged')),
                    'prev_text' => '← Precedenti',
                    'next_text' => 'Successivi →',
                ));
                ?>
            </div>

        <?php else : ?>
            
            <!-- STATO VUOTO ELEGANTE E PROPORZIONATO (NON PIÙ SCHIACCIATO) -->
            <div class="ampelos-search-empty-box" style="background: #ffffff; border: 1px solid var(--ampelos-border); border-radius: var(--radius-md); padding: 50px 36px; margin-bottom: 60px; box-shadow: var(--shadow-sm); text-align: center;">
                <div style="width: 64px; height: 64px; border-radius: var(--radius-pill); background: #f5f2eb; color: var(--ampelos-primary); display: inline-flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        <line x1="8" y1="11" x2="14" y2="11"></line>
                    </svg>
                </div>
                
                <h3 style="font-family: var(--font-serif); font-size: 28px; color: var(--ampelos-primary); margin-bottom: 12px;">
                    Nessun saggio trovato per «<?php echo esc_html($search_query); ?>»
                </h3>
                <p style="font-size: 16px; color: var(--ampelos-text-muted); max-width: 600px; margin: 0 auto 28px; line-height: 1.6;">
                    L'archivio di Ampelos è dedicato a inchieste di fondo, saggi di territorio, antropologia e pensiero critico. Prova a verificare l'ortografia oppure esplora le parole chiave consigliate qui sotto.
                </p>

                <!-- Parole Chiave Suggerite / Tag Chips -->
                <div style="margin-bottom: 32px;">
                    <span style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; color: var(--ampelos-sage); display: block; margin-bottom: 14px;">
                        Termini consigliati dalla redazione
                    </span>
                    <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; max-width: 680px; margin: 0 auto;">
                        <?php
                        $suggested_keywords = array('Vallese', 'Dogane', 'Silenzio', 'Collio', 'Calcarea', 'Geopolitica', 'Clima', 'Terroir');
                        foreach ($suggested_keywords as $kw) :
                        ?>
                            <a href="<?php echo esc_url(home_url('/?s=' . urlencode($kw))); ?>" class="ampelos-btn ampelos-btn-outline ampelos-btn-sm" style="font-size: 13px; padding: 7px 16px; border-radius: var(--radius-pill); background: #ffffff;">
                                <?php echo esc_html($kw); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div style="display: flex; gap: 14px; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" class="ampelos-btn ampelos-btn-primary">
                        Esplora tutti gli articoli
                    </a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="ampelos-btn ampelos-btn-outline">
                        Torna alla Home
                    </a>
                </div>
            </div>

            <!-- SEZIONE: Saggi Consigliati dall'Archivio Ampelos -->
            <section style="margin-top: 50px; border-top: 1px solid var(--ampelos-border-light); padding-top: 45px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 28px; flex-wrap: wrap; gap: 16px;">
                    <div>
                        <span class="ampelos-section-tag" style="margin-bottom: 6px;">Dall'Archivio Editoriale</span>
                        <h2 style="font-size: 28px; margin: 0; color: var(--ampelos-primary);">Potrebbero interessarti</h2>
                    </div>
                    <a href="<?php echo esc_url(home_url('/tutti-gli-articoli/')); ?>" style="font-size: 14px; font-weight: 600; color: var(--ampelos-terracotta);">
                        Vedi tutti i saggi →
                    </a>
                </div>

                <?php
                // Recupera gli ultimi articoli oppure i contenuti demo garantiti
                $recent_query = new WP_Query(array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                ));

                if ($recent_query->have_posts()) :
                ?>
                    <div class="ampelos-grid-3">
                        <?php
                        while ($recent_query->have_posts()) :
                            $recent_query->the_post();
                            $r_terms       = get_the_terms(get_the_ID(), 'rubrica');
                            $badge         = (!empty($r_terms) && !is_wp_error($r_terms)) ? $r_terms[0]->name : 'Saggio';
                            $read_time     = get_post_meta(get_the_ID(), '_ampelos_read_time', true) ?: '14 Min';
                            $hero_gradient = get_post_meta(get_the_ID(), '_ampelos_hero_gradient', true) ?: '#203528';
                            $hero_caption  = get_post_meta(get_the_ID(), '_ampelos_hero_caption', true) ?: get_the_title();
                        ?>
                            <article class="ampelos-article-card" style="background: #ffffff;">
                                <div class="ampelos-article-thumb">
                                    <div class="ampelos-rubrica-badge"><?php echo esc_html($badge); ?></div>
                                    <?php 
                                    $sample_img = function_exists('ampelos_get_article_sample_image_url') ? ampelos_get_article_sample_image_url(get_the_ID()) : '';
                                    if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium_large'); ?>
                                    <?php elseif (!empty($sample_img)) : ?>
                                        <img src="<?php echo esc_url($sample_img); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block;">
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
                <?php else : 
                    // Fallback con i primi 3 articoli demo per garantire una pagina sempre ricca
                    $demo_recs = array(
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
                    );
                ?>
                    <div class="ampelos-grid-3">
                        <?php foreach ($demo_recs as $art) : ?>
                            <article class="ampelos-article-card" style="background: #ffffff;">
                                <div class="ampelos-article-thumb">
                                    <div class="ampelos-rubrica-badge"><?php echo esc_html($art['rubrica_name']); ?></div>
                                    <?php 
                                    $sample_img = function_exists('ampelos_get_article_sample_image_url') ? ampelos_get_article_sample_image_url($art['slug']) : '';
                                    if (!empty($sample_img)) : ?>
                                        <img src="<?php echo esc_url($sample_img); ?>" alt="<?php echo esc_attr($art['title']); ?>" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                                    <?php else : ?>
                                        <div style="background: <?php echo esc_attr($art['hero_gradient']); ?>; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-serif); font-size: 20px; font-style: italic; padding: 20px; text-align: center;">
                                            <?php echo esc_html($art['hero_caption']); ?>
                                        </div>
                                    <?php endif; ?>
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
            </section>

        <?php endif; ?>

    </div>
</main>

<?php
get_footer();

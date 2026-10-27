<?php
/**
 * Template Name: Ampelos - Sito in Allestimento (Coming Soon)
 * Design System Sartoriale Ampelos: sfondo papiro #faf7f2, logo istituzionale, Cormorant Garamond.
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = get_option('ampelos_cs_title', 'La cultura del vino, nei tempi lenti del pensiero.');
$subtitle = get_option('ampelos_cs_subtitle', 'Ampelos è una rivista trimestrale indipendente di cultura del vino, geografie e pensiero critico. Stiamo allestendo la piattaforma editoriale e l\'accesso per gli abbonati.');
$edition_badge = get_option('ampelos_cs_badge', 'Edizione 2027 • In preparazione');
$logo_url = get_stylesheet_directory_uri() . '/assets/images/ampelos.png';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Ampelos • Rivista di Cultura del Vino e Territori</title>
    <meta name="description" content="Rivista trimestrale indipendente di cultura del vino, geografie e pensiero critico. Accesso riservato agli abbonati.">
    <meta name="robots" content="noindex, nofollow">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ampelos-primary: #1a3325;
            --ampelos-primary-light: #2d4f3b;
            --ampelos-sage: #587563;
            --ampelos-terracotta: #c46247;
            --ampelos-bg: #faf7f2;
            --ampelos-paper: #f4eee3;
            --ampelos-card: #ffffff;
            --ampelos-text: #1d211e;
            --ampelos-text-muted: #5f6b64;
            --ampelos-border: rgba(26, 51, 37, 0.12);
            --font-serif: 'Cormorant Garamond', Georgia, 'Times New Roman', serif;
            --font-sans: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            width: 100%;
            min-height: 100%;
            background-color: var(--ampelos-bg);
            color: var(--ampelos-text);
            font-family: var(--font-sans);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            line-height: 1.6;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            min-height: 100vh;
            min-height: 100dvh;
            padding: clamp(24px, 5vw, 48px) clamp(16px, 4vw, 32px);
            position: relative;
            background-image: 
                radial-gradient(circle at 50% 20%, rgba(244, 238, 227, 0.8) 0%, transparent 70%),
                radial-gradient(circle at 80% 80%, rgba(196, 98, 71, 0.04) 0%, transparent 50%);
        }

        /* Cornice sottile decorativa esterna */
        .ampelos-frame {
            position: fixed;
            top: clamp(8px, 1.5vw, 16px);
            bottom: clamp(8px, 1.5vw, 16px);
            left: clamp(8px, 1.5vw, 16px);
            right: clamp(8px, 1.5vw, 16px);
            border: 1px solid var(--ampelos-border);
            pointer-events: none;
            z-index: 1;
        }

        .ampelos-content-wrapper {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 680px;
            margin: auto;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Logo Brand */
        .ampelos-logo-container {
            margin-bottom: clamp(24px, 4vw, 36px);
            transition: transform 0.3s ease;
        }

        .ampelos-logo {
            width: clamp(160px, 32vw, 230px);
            height: auto;
            display: block;
            margin: 0 auto;
        }

        /* Badge di Edizione */
        .ampelos-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 14px;
            background-color: rgba(196, 98, 71, 0.08);
            border: 1px solid rgba(196, 98, 71, 0.25);
            border-radius: 999px;
            color: var(--ampelos-terracotta);
            font-size: clamp(11px, 2.5vw, 12.5px);
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: clamp(20px, 3.5vw, 30px);
        }

        .ampelos-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            background-color: var(--ampelos-terracotta);
            border-radius: 50%;
            display: inline-block;
        }

        /* Titolo Principale in Cormorant Garamond */
        .ampelos-title {
            font-family: var(--font-serif);
            font-weight: 500;
            font-size: clamp(1.9rem, 4.8vw, 2.85rem);
            line-height: 1.18;
            color: var(--ampelos-primary);
            letter-spacing: -0.015em;
            margin-bottom: clamp(16px, 3vw, 22px);
        }

        /* Sottotitolo / Testo editoriale */
        .ampelos-desc {
            font-size: clamp(14.5px, 2.8vw, 16.5px);
            color: var(--ampelos-text-muted);
            line-height: 1.7;
            max-width: 580px;
            margin: 0 auto clamp(28px, 4vw, 38px);
            font-weight: 400;
        }

        /* Separatore decorativo classico */
        .ampelos-divider {
            width: 48px;
            height: 1px;
            background-color: var(--ampelos-border);
            margin: 0 auto clamp(24px, 3vw, 32px);
        }

        /* Box informativo minimale */
        .ampelos-info-box {
            background-color: rgba(255, 255, 255, 0.65);
            border: 1px solid var(--ampelos-border);
            border-radius: 8px;
            padding: clamp(16px, 3vw, 22px) clamp(20px, 4vw, 32px);
            width: 100%;
            max-width: 520px;
            box-shadow: 0 4px 20px rgba(26, 51, 37, 0.03);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
        }

        .ampelos-info-box p {
            font-size: clamp(13px, 2.5vw, 14px);
            color: var(--ampelos-primary);
            margin-bottom: 4px;
            font-weight: 500;
        }

        .ampelos-info-box small {
            font-size: clamp(11.5px, 2.2vw, 12.5px);
            color: var(--ampelos-text-muted);
            display: block;
        }

        /* Footer con copyright e login redazione */
        .ampelos-footer {
            position: relative;
            z-index: 2;
            width: 100%;
            text-align: center;
            padding-top: clamp(24px, 4vw, 36px);
            font-size: 12px;
            color: var(--ampelos-text-muted);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .ampelos-footer a {
            color: var(--ampelos-sage);
            text-decoration: none;
            transition: color 0.2s ease;
            font-size: 11.5px;
            letter-spacing: 0.04em;
        }

        .ampelos-footer a:hover {
            color: var(--ampelos-primary);
            text-decoration: underline;
        }

        /* Responsività fine */
        @media (max-width: 480px) {
            body {
                padding: 24px 16px;
            }
            .ampelos-frame {
                top: 8px;
                bottom: 8px;
                left: 8px;
                right: 8px;
            }
            .ampelos-title {
                font-size: 1.85rem;
            }
        }
    </style>
</head>
<body>

    <!-- Cornice esterna sobria -->
    <div class="ampelos-frame" aria-hidden="true"></div>

    <!-- Contenuto Centrale -->
    <main class="ampelos-content-wrapper" role="main">
        
        <!-- Logo Ufficiale Ampelos -->
        <div class="ampelos-logo-container">
            <img src="<?php echo esc_url($logo_url); ?>" alt="ἄμπεlos • AMPELOS" class="ampelos-logo" width="220" height="161">
        </div>

        <!-- Badge Edizione -->
        <div class="ampelos-badge">
            <?php echo esc_html($edition_badge); ?>
        </div>

        <!-- Titolo Principale in Cormorant Garamond -->
        <h1 class="ampelos-title">
            <?php echo esc_html($title); ?>
        </h1>

        <!-- Descrizione Editoriale -->
        <p class="ampelos-desc">
            <?php echo esc_html($subtitle); ?>
        </p>

        <!-- Separatore elegante -->
        <div class="ampelos-divider" aria-hidden="true"></div>

        <!-- Box Informativo di Cortesia -->
        <div class="ampelos-info-box">
            <p>La piattaforma e l'accesso agli abbonati saranno disponibili a breve.</p>
            <small>Per informazioni editoriali o richieste della stampa: redazione@ampelos.it</small>
        </div>

    </main>

    <!-- Footer Discreto -->
    <footer class="ampelos-footer">
        <div>
            © <?php echo date('Y'); ?> Ampelos Edizioni. Tutti i diritti riservati.
        </div>
        <div>
            <a href="<?php echo esc_url(wp_login_url()); ?>" title="Accesso riservato alla redazione">
                Area Riservata Redazione →
            </a>
        </div>
    </footer>

</body>
</html>

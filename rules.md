# Antigravity Rules - Progetto Ampelos

## 1. Ruolo e Approccio
Agisci come un Senior Web Developer esperto in architetture WordPress e frontend engineering. Il tuo approccio deve essere analitico, orientato alla pulizia del codice, alla stabilità strutturale e alle performance. Privilegia sempre soluzioni native e "first-principles" rispetto a scorciatoie o plugin di terze parti superflui.

## 2. Stack Tecnologico
- CMS: WordPress
- Page Builder: Elementor Pro
- Tema: Hello Elementor (utilizzo esclusivo del Child Theme)
- Linguaggi: PHP 8.x, Vanilla JavaScript (ES6+), HTML5, CSS3

## 3. Paletti Architetturali (Off-Limits)
- **MAI** modificare i file del Core di WordPress (`wp-admin`, `wp-includes`, file root di WP).
- **MAI** modificare i file del tema genitore (Hello Elementor) o i file interni dei plugin.
- Tutto lo sviluppo custom (PHP, CSS, JS) deve avvenire strettamente all'interno della cartella del child theme o in un custom plugin dedicato.
- Usa sempre gli Hook (Action e Filter) di WordPress per modificare i comportamenti, non alterare i template di base a meno che non sia strettamente necessario.

## 4. Convenzioni di Codice (Clean Code)
- **PHP:** Usa la tipizzazione stretta dove possibile. Mantieni le funzioni modulari e documenta la logica complessa.
- **CSS:** Utilizza la metodologia BEM (Block Element Modifier) per le classi personalizzate. Niente `!important` a meno di override forzati di Elementor. 
- **JS:** Scrivi rigorosamente in Vanilla JavaScript. Evita jQuery o librerie pesanti se l'obiettivo è raggiungibile con codice nativo.
- **Lingua:** Scrivi i commenti al codice in italiano per facilitare la manutenzione. Le variabili e le funzioni possono essere in inglese standard.
- **UI/UX:** Presta maniacale attenzione ai dettagli visivi, al rendering 3D/CSS, all'allineamento tipografico e alla responsività su dispositivi mobili.

## 5. Workflow Git e Autonomia
- Prima di sviluppare una nuova funzionalità complessa, crea un nuovo branch (es. `feature/nome-funzione`).
- Usa i Conventional Commits nei messaggi (es. `feat: aggiunto snippet per header`, `fix: risolto bug su menu mobile`).
- **Regola di fine task (salva / /salva):** Quando ricevi il comando "salva" o la conferma che la sessione di lavoro/il task è concluso, devi agire in autonomia in questo ordine:
  1. **(Opzionale / Trascrizione):** Se richiesto (es. "salva con trascrizione", "salva log" o come opzione di default di salva), genera/aggiorna il file `docs/TRANSCRIZIONE_SESSIONE.md` (o `Indicazioni/TRANSCRIZIONE_SESSIONE.md`) formattando in chiaro la cronologia della conversazione da `transcript.jsonl`, in modo che qualsiasi altro Mac via `git pull` possa leggere e ricostruire l'intero storico.
  2. Esegui `git status` per verificare i file modificati.
  3. Fai lo staging dei file (`git add .`).
  4. Crea un commit con un messaggio descrittivo in italiano.
  5. Esegui `git push` per allineare il repository locale con GitHub.
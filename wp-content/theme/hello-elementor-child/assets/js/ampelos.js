/**
 * Ampelos Core JS - Interattività, Dialogs, Paywall & User Area
 */

const AmpelosUI = (() => {
  'use strict';

  // Config fallback if not localized by WP
  const settings = window.AmpelosSettings || {
    ajaxUrl: '/wp-admin/admin-ajax.php',
    nonce: '',
    isLoggedIn: false,
    isSubscribed: false,
    strings: {
      saved: 'Salvato nei tuoi articoli',
      removed: 'Rimosso dai tuoi articoli',
      loginRequired: 'È necessario accedere per salvare l\'articolo.'
    }
  };

  function init() {
    initModals();
    initReadingProgress();
    initMobileNav();
    initTabs();
    initAjaxForms();
    initSearchFilter();
  }

  // Modern HTML <dialog> Management with light dismiss
  function initModals() {
    const dialogs = document.querySelectorAll('dialog.ampelos-modal');

    dialogs.forEach(dialog => {
      // Light-dismiss: click outside the modal bounding rect
      dialog.addEventListener('click', (e) => {
        const rect = dialog.getBoundingClientRect();
        const isInDialog = (
          rect.top <= e.clientY &&
          e.clientY <= rect.top + rect.height &&
          rect.left <= e.clientX &&
          e.clientX <= rect.left + rect.width
        );
        if (!isInDialog) {
          dialog.close();
        }
      });

      // Close buttons inside dialog
      const closeBtns = dialog.querySelectorAll('.ampelos-modal-close, [data-action="close-modal"]');
      closeBtns.forEach(btn => {
        btn.addEventListener('click', () => dialog.close());
      });
    });
  }

  function openModal(modalId) {
    const dialog = document.getElementById(modalId);
    if (dialog && typeof dialog.showModal === 'function') {
      dialog.showModal();
    }
  }

  function closeModal(modalId) {
    const dialog = document.getElementById(modalId);
    if (dialog && typeof dialog.close === 'function') {
      dialog.close();
    }
  }

  function openRegisterPlan(planName) {
    const planSelect = document.getElementById('ampelos-register-plan');
    if (planSelect) {
      planSelect.value = planName;
    }
    openModal('modal-register');
  }

  // Reading Progress Bar for editorial articles
  function initReadingProgress() {
    const progressBar = document.getElementById('ampelos-reading-progress');
    const articleBody = document.querySelector('.ampelos-article-body');

    if (!progressBar || !articleBody) return;

    window.addEventListener('scroll', () => {
      const rect = articleBody.getBoundingClientRect();
      const totalHeight = rect.height;
      const windowHeight = window.innerHeight;
      const scrolled = windowHeight - rect.top;

      let percentage = (scrolled / totalHeight) * 100;
      percentage = Math.max(0, Math.min(100, percentage));

      progressBar.style.width = percentage + '%';
    }, { passive: true });
  }

  // Mobile Navigation Drawer Toggle
  function initMobileNav() {
    const toggleBtn = document.getElementById('ampelos-mobile-toggle');
    if (!toggleBtn) return;

    toggleBtn.addEventListener('click', () => {
      document.body.classList.toggle('ampelos-mobile-menu-open');
    });

    // Submenu click toggles on touch/mobile
    const dropdownToggles = document.querySelectorAll('.ampelos-menu-primary > li.has-dropdown > a');
    dropdownToggles.forEach(link => {
      link.addEventListener('click', (e) => {
        if (window.innerWidth <= 991) {
          e.preventDefault();
          const dropdown = link.parentElement.querySelector('.ampelos-dropdown');
          if (dropdown) {
            dropdown.classList.toggle('open');
          }
        }
      });
    });
  }

  // Dashboard Tabs in Area Personale
  function initTabs() {
    const tabs = document.querySelectorAll('.ampelos-dash-tab');
    if (!tabs.length) return;

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        const targetId = tab.getAttribute('data-tab');

        // Deactivate all
        tabs.forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.ampelos-dash-panel').forEach(p => p.classList.remove('active'));

        // Activate selected
        tab.classList.add('active');
        const targetPanel = document.getElementById('panel-' + targetId);
        if (targetPanel) {
          targetPanel.classList.add('active');
        }
      });
    });
  }

  // Toggle Save Article
  function toggleSaveArticle(postId, buttonElem) {
    if (!settings.isLoggedIn) {
      alert(settings.strings.loginRequired);
      openModal('modal-login');
      return;
    }

    const formData = new FormData();
    formData.append('action', 'ampelos_toggle_save_article');
    formData.append('security', settings.nonce);
    formData.append('post_id', postId);

    fetch(settings.ajaxUrl, {
      method: 'POST',
      body: formData
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        if (buttonElem) {
          buttonElem.classList.toggle('is-saved', data.data.action === 'saved');
          const label = buttonElem.querySelector('.ampelos-save-label');
          if (label) {
            label.textContent = data.data.action === 'saved' ? 'Salvato' : 'Salva articolo';
          }
        }
      }
    })
    .catch(err => console.error('Error saving article:', err));
  }

  // AJAX Login & Register forms
  function initAjaxForms() {
    // Login form
    const loginForm = document.getElementById('ampelos-form-login');
    if (loginForm) {
      loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const submitBtn = loginForm.querySelector('button[type="submit"]');
        const msgBox = loginForm.querySelector('.ampelos-form-message');
        if (submitBtn) submitBtn.disabled = true;

        const formData = new FormData(loginForm);
        formData.append('action', 'ampelos_ajax_login');
        formData.append('security', settings.nonce);

        fetch(settings.ajaxUrl, {
          method: 'POST',
          body: formData
        })
        .then(r => r.json())
        .then(data => {
          if (submitBtn) submitBtn.disabled = false;
          if (data.success) {
            if (msgBox) {
              msgBox.className = 'ampelos-form-message success';
              msgBox.textContent = data.data.message;
            }
            setTimeout(() => {
              window.location.href = data.data.redirect || window.location.href;
            }, 800);
          } else {
            if (msgBox) {
              msgBox.className = 'ampelos-form-message error';
              msgBox.textContent = data.data.message;
            }
          }
        })
        .catch(err => {
          if (submitBtn) submitBtn.disabled = false;
          console.error(err);
        });
      });
    }

    // Register form
    const regForm = document.getElementById('ampelos-form-register');
    if (regForm) {
      regForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const submitBtn = regForm.querySelector('button[type="submit"]');
        const msgBox = regForm.querySelector('.ampelos-form-message');
        if (submitBtn) submitBtn.disabled = true;

        const formData = new FormData(regForm);
        formData.append('action', 'ampelos_ajax_register');
        formData.append('security', settings.nonce);

        fetch(settings.ajaxUrl, {
          method: 'POST',
          body: formData
        })
        .then(r => r.json())
        .then(data => {
          if (submitBtn) submitBtn.disabled = false;
          if (data.success) {
            if (msgBox) {
              msgBox.className = 'ampelos-form-message success';
              msgBox.textContent = data.data.message;
            }
            setTimeout(() => {
              window.location.href = data.data.redirect || window.location.href;
            }, 1000);
          } else {
            if (msgBox) {
              msgBox.className = 'ampelos-form-message error';
              msgBox.textContent = data.data.message;
            }
          }
        })
        .catch(err => {
          if (submitBtn) submitBtn.disabled = false;
          console.error(err);
        });
      });
    }
  }

  // Instant Search in Modal
  function initSearchFilter() {
    const searchInput = document.getElementById('ampelos-search-input');
    const searchResults = document.getElementById('ampelos-search-results');
    if (!searchInput || !searchResults) return;

    let timeout;
    searchInput.addEventListener('input', (e) => {
      clearTimeout(timeout);
      const query = e.target.value.trim().toLowerCase();
      if (query.length < 2) {
        searchResults.innerHTML = '<p class="ampelos-search-placeholder">Digita almeno 2 caratteri per cercare saggi, territori, autori o rubriche...</p>';
        return;
      }

      timeout = setTimeout(() => {
        searchResults.innerHTML = '<p class="ampelos-search-loading">Ricerca in corso nell\'archivio Ampelos...</p>';
        // Client-side quick filter or WP REST API endpoint
        fetch(`${settings.homeUrl}wp-json/wp/v2/posts?search=${encodeURIComponent(query)}&_embed`)
          .then(r => {
            if (!r.ok) throw new Error('Network error');
            return r.json();
          })
          .then(posts => {
            if (!posts.length) {
              searchResults.innerHTML = `<p class="ampelos-search-empty">Nessun articolo trovato per "${query}".</p>`;
              return;
            }
            let html = '<div class="ampelos-search-list">';
            posts.forEach(p => {
              html += `
                <a href="${p.link}" class="ampelos-search-item">
                  <h4>${p.title.rendered}</h4>
                  <p>${p.excerpt ? p.excerpt.rendered.replace(/<[^>]+>/g, '').substring(0, 100) + '...' : ''}</p>
                </a>
              `;
            });
            html += '</div>';
            searchResults.innerHTML = html;
          })
          .catch(() => {
            // Local fallback simulation if REST API not responding
            searchResults.innerHTML = `<p class="ampelos-search-info">Premi Invio per visualizzare tutti i risultati per "<strong>${query}</strong>"</p>`;
          });
      }, 300);
    });
  }

  function toggleMobileDrawer(open) {
    const overlay = document.getElementById('ampelos-drawer-overlay');
    const drawer = document.getElementById('ampelos-mobile-drawer');
    if (!overlay || !drawer) return;
    if (open) {
      overlay.classList.add('active');
      drawer.classList.add('active');
      document.body.style.overflow = 'hidden';
    } else {
      overlay.classList.remove('active');
      drawer.classList.remove('active');
      document.body.style.overflow = '';
    }
  }

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      toggleMobileDrawer(false);
    }
  });

  // Public API
  return {
    init,
    openModal,
    closeModal,
    openRegisterPlan,
    toggleSaveArticle,
    toggleMobileDrawer
  };
})();

document.addEventListener('DOMContentLoaded', AmpelosUI.init);


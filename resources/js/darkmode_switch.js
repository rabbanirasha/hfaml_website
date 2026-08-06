(function() {
  const getStoredTheme = () => localStorage.getItem('theme');
  const setStoredTheme = theme => localStorage.setItem('theme', theme);
  const forcedTheme = document.documentElement.getAttribute('data-bss-forced-theme');

  const getPreferredTheme = () => {
    if (forcedTheme) return forcedTheme;
    const storedTheme = getStoredTheme();
    if (storedTheme) return storedTheme;
    const pageTheme = document.documentElement.getAttribute('data-bs-theme');
    if (pageTheme) return pageTheme;
    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
  };

  const setTheme = theme => {
    if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      document.documentElement.setAttribute('data-bs-theme', 'dark');
    } else {
      document.documentElement.setAttribute('data-bs-theme', theme);
    }
  };

  setTheme(getPreferredTheme());

  const showActiveTheme = (theme) => {
    const themeSwitchers = [].slice.call(document.querySelectorAll('.theme-switcher'));
    if (!themeSwitchers.length) return;

    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
      element.classList.remove('active');
      element.setAttribute('aria-pressed', 'false');
    });

    const iconTheme = theme === 'auto' ? (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light') : theme;

    for (const themeSwitcher of themeSwitchers) {
      const adaptIcon = !!themeSwitcher.dataset.bsAdaptIcon;
      if (adaptIcon) {
        const btnIcon = themeSwitcher.querySelector('[data-bss-adaptable]');
        try {
          const themeIcons = JSON.parse(themeSwitcher.dataset.bssIcons || "{}");
          const newIconMarkup = themeIcons[iconTheme];
          const template = document.createElement("template");
          template.innerHTML = newIconMarkup;
          const newIconFragment = template.content.cloneNode(true);
          if (newIconFragment?.children?.length) {
            newIconFragment.children[0].dataset.bssAdaptable = true;
          }
          btnIcon.replaceWith(newIconFragment);
        } catch (e) {}
      }
      const btnToActivate = themeSwitcher.querySelector('[data-bs-theme-value="' + theme + '"]');
      if (btnToActivate) {
        btnToActivate.classList.add('active');
        btnToActivate.setAttribute('aria-pressed', 'true');
      }
    }
  };

  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    const storedTheme = getStoredTheme();
    if (storedTheme !== 'light' && storedTheme !== 'dark') {
      setTheme(getPreferredTheme());
    }
  });

  // single initializer which attaches delegated click listener and updates UI
  function initThemeSwitchers() {
    showActiveTheme(getPreferredTheme());

    // use delegated listener once
    if (!document._bssThemeDelegated) {
      document.addEventListener('click', (e) => {
        const toggle = e.target.closest('[data-bs-theme-value]');
        if (!toggle) return;
        e.preventDefault();
        const theme = toggle.getAttribute('data-bs-theme-value');
        setStoredTheme(theme);
        setTheme(theme);
        showActiveTheme(theme);
      });
      document._bssThemeDelegated = true;
    }
  }

  // Run on initial load
  document.addEventListener('DOMContentLoaded', initThemeSwitchers);

  // Re-run after Livewire updates (supports Livewire hook and fallback events)
  if (window.livewire && typeof window.livewire.hook === 'function') {
    window.livewire.hook('message.processed', () => initThemeSwitchers());
  } else {
    document.addEventListener('livewire:update', initThemeSwitchers);
    document.addEventListener('livewire:load', initThemeSwitchers);
  }
})();
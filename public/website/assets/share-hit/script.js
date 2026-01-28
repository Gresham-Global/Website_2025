document.addEventListener('DOMContentLoaded', () => {
    const popup = document.getElementById('sharePopup');
    if (!popup) return;

    const urlInput = popup.querySelector('#shareHitUrl');
    const copyBtn = popup.querySelector('.share-hit-copy-btn');

    let currentUrl = '';
    let currentTitle = '';

    /* =========================
       OPEN POPUP
    ========================= */
    window.openSharePopup = (url, title) => {
        currentUrl = url || window.location.href;
        currentTitle = title || document.title;

        urlInput.value = currentUrl;

        // Update share buttons
        popup.querySelectorAll('.share-hit-option[data-platform]')
            .forEach(btn => {
                const platform = btn.dataset.platform;
                const shareUrl = getShareUrl(platform, currentUrl, currentTitle);
                btn.href = shareUrl;

                if (platform !== 'email') {
                    btn.target = '_blank';
                    btn.rel = 'noopener noreferrer';
                } else {
                    btn.removeAttribute('target');
                    btn.removeAttribute('rel');
                }
            });

        popup.style.display = 'flex';
    };

    /* =========================
       CLOSE POPUP
    ========================= */
    popup.querySelector('.share-hit-popup-close')
        .addEventListener('click', () => popup.style.display = 'none');

    window.addEventListener('click', e => {
        if (e.target === popup) popup.style.display = 'none';
    });

    /* =========================
       COPY URL
    ========================= */
    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(currentUrl)
            .then(() => {
                copyBtn.textContent = 'Copied!';
                setTimeout(() => copyBtn.textContent = 'Copy', 1500);
            })
            .catch(err => console.error('Failed to copy URL:', err));
    });

    /* =========================
       SHARE URL BUILDER
    ========================= */
    function getShareUrl(platform, url, title) {
        url = encodeURIComponent(url);
        title = encodeURIComponent(title);

        switch (platform) {
            case 'whatsapp':
                return `https://wa.me/?text=${title}%0A${url}`;
            case 'facebook':
                return `https://www.facebook.com/sharer/sharer.php?u=${url}`;
            case 'twitter':
                return `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
            case 'linkedin':
                return `https://www.linkedin.com/sharing/share-offsite/?url=${url}`;
            case 'email':
                return `mailto:?subject=${title}&body=${title}%0A${url}`;
            default:
                return '#';
        }
    }

    /* =========================
       AUTO BIND SHARE BUTTONS
    ========================= */
    document.addEventListener('click', e => {
        const btn = e.target.closest('.share-blog-hit');
        if (!btn) return;

        const url = btn.dataset.url || window.location.href;
        const title = btn.dataset.title || document.title;

        openSharePopup(url, title);
    });

    /* =========================
       SLIDER NAVIGATION
    ========================= */
    const slider = popup.querySelector('.share-hit-options');
    const btnPrev = popup.querySelector('.slider-arrow.prev');
    const btnNext = popup.querySelector('.slider-arrow.next');

    btnNext.addEventListener('click', () => {
        slider.scrollBy({ left: 80, behavior: 'smooth' });
    });

    btnPrev.addEventListener('click', () => {
        slider.scrollBy({ left: -80, behavior: 'smooth' });
    });
});

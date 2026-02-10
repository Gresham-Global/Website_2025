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

        // Reset buttons to avoid duplicate listeners
        popup.querySelectorAll('.share-hit-option[data-platform]')
            .forEach(oldBtn => {
                const newBtn = oldBtn.cloneNode(true);
                oldBtn.replaceWith(newBtn);
            });

        // Re-select after cloning
        popup.querySelectorAll('.share-hit-option[data-platform]')
            .forEach(btn => {

                const platform = btn.dataset.platform;
                const shareUrl = getShareUrl(platform, currentUrl, currentTitle);

                /* ---------- INSTAGRAM ---------- */
                if (platform === 'instagram') {

                    btn.addEventListener('click', e => {
                        e.preventDefault();

                        // Copy link first
                        navigator.clipboard.writeText(currentUrl);

                        // Try to open Instagram
                        const igUrl = getShareUrl('instagram');
 alert('Link copied! Paste it on Instagram story, bio, or post.');
                        // window.location.href = igUrl;
                         window.open(igUrl, '_blank');

                        // Fallback to web after 1s
                        setTimeout(() => {
                            window.open('https://www.instagram.com/', '_blank');
                        }, 1000);

                       
                    });

                }

                /* ---------- EMAIL ---------- */
                else if (platform === 'email') {

                    btn.addEventListener('click', e => {
                        e.preventDefault();
                        window.location.href = shareUrl;
                    });

                }

                /* ---------- OTHER PLATFORMS ---------- */
                else {

                    btn.href = shareUrl;
                    btn.target = '_blank';
                    btn.rel = 'noopener noreferrer';

                }

            });

        popup.style.display = 'flex';
    };


    /* =========================
       CLOSE POPUP
    ========================= */
    popup.querySelector('.share-hit-popup-close')
        ?.addEventListener('click', () => {
            popup.style.display = 'none';
        });

    window.addEventListener('click', e => {
        if (e.target === popup) {
            popup.style.display = 'none';
        }
    });


    /* =========================
       COPY URL BUTTON
    ========================= */
    copyBtn?.addEventListener('click', () => {

        navigator.clipboard.writeText(currentUrl)
            .then(() => {

                copyBtn.textContent = 'Copied!';

                setTimeout(() => {
                    copyBtn.textContent = 'Copy';
                }, 1500);

            })
            .catch(err => {
                console.error('Copy failed:', err);
            });

    });


    /* =========================
       SHARE URL BUILDER
    ========================= */
    function getShareUrl(platform, url, title) {

        const encUrl = encodeURIComponent(url);
        const encTitle = encodeURIComponent(title);

        switch (platform) {

            case 'whatsapp':
                return `https://wa.me/?text=${encTitle}%0A${encUrl}`;

            case 'facebook':
                return `https://www.facebook.com/sharer/sharer.php?u=${encUrl}`;

            case 'twitter':
                return `https://twitter.com/intent/tweet?url=${encUrl}&text=${encTitle}`;

            case 'linkedin':
                return `https://www.linkedin.com/sharing/share-offsite/?url=${encUrl}`;

            case 'email':
                return `mailto:?subject=${encTitle}&body=${encTitle}%0A${encUrl}`;

            /* Instagram fallback */
           case 'instagram':

                // Try open app first (mobile)
                if (/Android|iPhone|iPad|iPod/i.test(navigator.userAgent)) {
                    return 'instagram://app';
                }

                // Desktop fallback
                return 'https://www.instagram.com/';

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

        window.openSharePopup(url, title);

    });


    /* =========================
       SLIDER NAVIGATION
    ========================= */
    const slider = popup.querySelector('.share-hit-options');
    const btnPrev = popup.querySelector('.slider-arrow.prev');
    const btnNext = popup.querySelector('.slider-arrow.next');

    btnNext?.addEventListener('click', () => {
        slider?.scrollBy({ left: 80, behavior: 'smooth' });
    });

    btnPrev?.addEventListener('click', () => {
        slider?.scrollBy({ left: -80, behavior: 'smooth' });
    });

});


let currentUrl = encodeURIComponent(location.href);
let currentTitle = encodeURIComponent(document.title);

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.share-btn').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            currentUrl = encodeURIComponent(btn.dataset.url || location.href);
            currentTitle = encodeURIComponent(btn.dataset.title || document.title);
            const popup = document.getElementById('sharePopup');
            popup.style.display = (popup.style.display === 'block') ? 'none' : 'block';
        });
    });

    document.querySelectorAll('#sharePopup a').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            let s = link.dataset.s, u = '';
            if (s === 'fb') u = `https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`;
            if (s === 'tw') u = `https://twitter.com/intent/tweet?url=${currentUrl}&text=${currentTitle}`;
            if (s === 'li') u = `https://www.linkedin.com/shareArticle?url=${currentUrl}&title=${currentTitle}`;
            if (s === 'wa') u = `https://api.whatsapp.com/send?text=${currentTitle}%20${currentUrl}`;
            if (s === 'em') u = `mailto:?subject=${currentTitle}&body=${currentUrl}`;
            window.open(u, '_blank', 'width=600,height=400');
            document.getElementById('sharePopup').style.display = 'none';
        });
    });

    document.addEventListener('click', function (e) {
        const popup = document.getElementById('sharePopup');
        if (!e.target.closest('.share-btn') && !e.target.closest('#sharePopup')) {
            popup.style.display = 'none';
        }
    });
});


$(document).ready(function () {
    // Get the height of the header
    var headerHeight = $('.header-class').outerHeight();

    // Set the margin-top of the below class
    $('.below-class').css('margin-top', headerHeight + 'px');
      
});



document.addEventListener('DOMContentLoaded', function() {
    // Function to open the popup and set the URLs
    function openPopup(postUrl, postTitle) {
        var sharePopup = document.querySelector('.share-hit-popup');
        if (sharePopup) {
            var buttons = sharePopup.querySelectorAll('.share-hit-button');
            buttons.forEach(function(button) {
                if (button.classList.contains('share-linkedin')) {
                    button.href = 'https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(postUrl) + '&title=' + encodeURIComponent(postTitle);
                } else if (button.classList.contains('share-twitter')) {
                    button.href = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(postUrl) + '&text=' + encodeURIComponent(postTitle);
                } else if (button.classList.contains('share-email')) {
                    button.href = 'mailto:?subject=' + encodeURIComponent(postTitle) + '&body=' + encodeURIComponent(postUrl);
                } else if (button.classList.contains('share-whatsapp')) {
                    button.href = 'https://wa.me/?text=' + encodeURIComponent(postTitle + '\n' + postUrl);
                } else if (button.classList.contains('share-teams')) {
                    button.href = 'https://teams.microsoft.com/share?href=' + encodeURIComponent(postUrl);
                } else if (button.classList.contains('share-facebook')) {
                    button.href = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(postUrl);
                } else if (button.classList.contains('copy-link')) {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        navigator.clipboard.writeText(postUrl);
                        alert('Link copied to clipboard!');
                    });
                } else if (button.classList.contains('share-instagram')) {
                    alert("Instagram doesn't support direct web sharing. Copy the link instead.");
                }

                button.setAttribute('target', '_blank');
                button.setAttribute('rel', 'noopener noreferrer');
            });

            sharePopup.style.display = 'block';
        }
    }


    // Function to close the popup
    function closePopup() {
        var sharePopup = document.querySelector('.share-hit-popup');
        if (sharePopup) {
            sharePopup.style.display = 'none';
        }
    }

    // Find all share buttons and set their data-post-url attribute
    function setShareButtonUrls() {
        document.querySelectorAll('.share-blog-hit').forEach(function(button) {
            var postUrl = button.getAttribute('data-post-url');
    
            // If no data-post-url is already set, try getting it from a parent <li>
            if (!postUrl) {
                var parentItem = button.closest('li');
                if (parentItem) {
                    var permalink = parentItem.querySelector('a[href]');
                    if (permalink) {
                        postUrl = permalink.getAttribute('href');
                        button.setAttribute('data-post-url', postUrl);
                    }
                }
            }
    
            // Always try to override with sibling .read-more if available
            var readMoreLink = button.closest('.events_footer_card')?.querySelector('.read-more');
            if (readMoreLink) {
                var readMoreHref = readMoreLink.getAttribute('href');
                if (readMoreHref) {
                    button.setAttribute('data-post-url', readMoreHref);
                }
            }
        });
    }
    

    // Initial setup
    setShareButtonUrls();

    // Open the popup when an element with class `share-blog-hit` is clicked
    document.addEventListener('click', function(event) {
        var target = event.target.closest('.share-blog-hit');
        if (target) {
            var postUrl = target.getAttribute('data-url') || window.location.href;
            var postTitle = target.getAttribute('data-title') || document.title;
            openPopup(postUrl, postTitle);
        }
    });


    // Hide the popup when the close button is clicked
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('share-hit-popup-close')) {
            closePopup();
        }
    });

    // Hide the popup when clicking outside of the popup content
    window.addEventListener('click', function(event) {
        var sharePopup = document.querySelector('.share-hit-popup');
        if (sharePopup && event.target === sharePopup) {
            closePopup();
        }
    });
});

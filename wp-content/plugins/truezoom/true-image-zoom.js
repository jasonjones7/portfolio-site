/* True Image Zoom — vanilla JS, no dependencies */
(function () {
    'use strict';

    var overlay    = null;
    var scrollArea = null;
    var zoomImg    = null;

    function init() {
        overlay    = document.getElementById('tiz-overlay');
        scrollArea = document.getElementById('tiz-scroll-area');
        zoomImg    = document.getElementById('tiz-img');

        if (!overlay) return;

        // Mark all content images as zoomable
        markImages();

        // Re-run when the DOM changes (e.g. lazy-loaded content, page builders)
        if (window.MutationObserver) {
            var observer = new MutationObserver(function () { markImages(); });
            observer.observe(document.body, { childList: true, subtree: true });
        }

        // Close button
        document.getElementById('tiz-close').addEventListener('click', closeOverlay);

        // Click the dark backdrop to close
        overlay.addEventListener('click', function (e) {
            if (e.target === overlay || e.target === scrollArea) {
                closeOverlay();
            }
        });

        // Keyboard: Escape to close
        document.addEventListener('keydown', function (e) {
            if ((e.key === 'Escape' || e.keyCode === 27) && overlay.style.display !== 'none') {
                closeOverlay();
            }
        });
    }

    function markImages() {
        // Target images inside post/page content; skip UI images (logos, icons < 100px, etc.)
        var imgs = document.querySelectorAll(
            '.zoom img'
        );

        imgs.forEach(function (img) {
            if (img.classList.contains('tiz-zoomable')) return; // already handled
            if (img.closest('#tiz-overlay')) return;             // skip our own overlay image

            img.classList.add('tiz-zoomable');
            img.addEventListener('click', onImageClick);
        });
    }

    function onImageClick(e) {
        e.preventDefault();

        var clickedImg = e.currentTarget;

        // Prefer the full-size src: check srcset, data-src, parent <a> href, then fallback to src
        var fullSrc = getFullSrc(clickedImg);
        var altText = clickedImg.alt || '';

        // Set image src — browser will load at native resolution
        zoomImg.src   = fullSrc;
        zoomImg.alt   = altText;

        // Remove any previously set size constraints
        zoomImg.removeAttribute('width');
        zoomImg.removeAttribute('height');
        zoomImg.style.width  = '';
        zoomImg.style.height = '';

        // Show overlay
        overlay.style.display = 'flex';
        document.body.style.overflow = 'hidden'; // prevent page scroll while overlay is open

        // Once the image loads, scroll it to the top-left so user sees the beginning
        zoomImg.onload = function () {
            scrollArea.scrollTop  = 0;
            scrollArea.scrollLeft = 0;
        };
    }

    function getFullSrc(img) {
        // 1. Check if wrapped in an <a> tag — WP "link to media file" pattern
        var parent = img.parentElement;
        if (parent && parent.tagName === 'A') {
            var href = parent.getAttribute('href');
            if (href && /\.(jpe?g|png|gif|webp|svg|avif)(\?.*)?$/i.test(href)) {
                return href;
            }
        }

        // 2. Parse srcset and pick the largest listed source
        if (img.srcset) {
            var largest = getLargestSrcset(img.srcset);
            if (largest) return largest;
        }

        // 3. data-full-src / data-large-file / data-src (common lazy-load attrs)
        var dataAttrs = ['data-full-src', 'data-large-file', 'data-src', 'data-original'];
        for (var i = 0; i < dataAttrs.length; i++) {
            var val = img.getAttribute(dataAttrs[i]);
            if (val) return val;
        }

        // 4. Try to strip WordPress size suffix from the URL (e.g. -300x200 → full size)
        var src = img.src;
        var stripped = src.replace(/-\d+x\d+(\.[a-z]+)$/i, '$1');
        if (stripped !== src) return stripped;

        // 5. Fallback: use whatever src is
        return src;
    }

    function getLargestSrcset(srcset) {
        // srcset format: "url 800w, url2 1600w, ..."  or  "url 1x, url 2x"
        var parts   = srcset.split(',').map(function (s) { return s.trim(); });
        var best    = null;
        var bestVal = -1;

        parts.forEach(function (part) {
            var pieces = part.split(/\s+/);
            if (pieces.length < 2) return;
            var url        = pieces[0];
            var descriptor = pieces[pieces.length - 1]; // "800w" or "2x"
            var val        = parseFloat(descriptor);
            if (!isNaN(val) && val > bestVal) {
                bestVal = val;
                best    = url;
            }
        });

        return best;
    }

    function closeOverlay() {
        overlay.style.display        = 'none';
        document.body.style.overflow = '';
        zoomImg.src                  = ''; // release memory
    }

    // Init after DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();

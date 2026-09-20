/**
 * Testimonials & Patient Reviews Carousel & Interactive Engine
 * Handles smooth carousel navigation, desktop popovers with hover bridge, and mobile modal drawers.
 */

function initTestimonials() {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // --- Carousel Controls ---
    const carouselWrappers = document.querySelectorAll('[data-testimonials-carousel]');
    carouselWrappers.forEach((wrapper) => {
        const track = wrapper.querySelector('[data-testimonials-track]');
        const prevBtn = wrapper.querySelector('[data-carousel-prev]');
        const nextBtn = wrapper.querySelector('[data-carousel-next]');

        if (!track) return;

        const getScrollAmount = () => {
            const firstCard = track.querySelector('[data-review-card]');
            return firstCard ? firstCard.getBoundingClientRect().width + 24 : 340;
        };

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                track.scrollBy({
                    left: -getScrollAmount(),
                    behavior: prefersReducedMotion ? 'auto' : 'smooth',
                });
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                track.scrollBy({
                    left: getScrollAmount(),
                    behavior: prefersReducedMotion ? 'auto' : 'smooth',
                });
            });
        }
    });

    // --- Star Rating Generator ---
    const renderStars = (rating) => {
        const count = Math.max(1, Math.min(5, parseInt(rating, 10) || 5));
        let starsHtml = '';
        for (let i = 1; i <= 5; i++) {
            const color = i <= count ? 'text-brass-500 fill-current' : 'text-stone-warm-300 fill-current';
            starsHtml += `<svg class="w-3.5 h-3.5 ${color}" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>`;
        }
        return starsHtml;
    };

    // --- Desktop Popover Elements & State ---
    const popover = document.getElementById('review-desktop-popover');
    const popoverName = document.getElementById('popover-name');
    const popoverTreatment = document.getElementById('popover-treatment');
    const popoverStars = document.getElementById('popover-stars');
    const popoverDate = document.getElementById('popover-date');
    const popoverBody = document.getElementById('popover-body');
    const popoverSourceLink = document.getElementById('popover-source-link');

    let popoverHideTimer = null;
    let activeCard = null;

    const showPopover = (card) => {
        if (!popover || window.innerWidth < 768) return;
        clearTimeout(popoverHideTimer);
        activeCard = card;

        const { patientName, treatment, rating, date, sourceUrl, sourceLabel } = card.dataset;
        const fullTextElem = card.querySelector('[data-full-text-content]');
        const fullText = fullTextElem ? fullTextElem.innerHTML : card.dataset.fullText || '';

        if (popoverName) popoverName.textContent = patientName || '';
        if (popoverTreatment) popoverTreatment.textContent = treatment || '';
        if (popoverStars) popoverStars.innerHTML = renderStars(rating || 5);
        if (popoverDate) popoverDate.textContent = date || '';
        if (popoverBody) popoverBody.innerHTML = fullText;
        if (popoverSourceLink && sourceUrl) {
            popoverSourceLink.href = sourceUrl;
            popoverSourceLink.target = '_blank';
            popoverSourceLink.rel = 'noopener noreferrer';
        }

        // Positioning logic
        popover.classList.remove('hidden');
        const cardRect = card.getBoundingClientRect();
        const popoverWidth = popover.offsetWidth || 384;
        const popoverHeight = popover.offsetHeight || 260;

        let left = cardRect.left;
        let top = cardRect.bottom + 8;

        // Viewport collision avoidance
        if (top + popoverHeight > window.innerHeight - 16) {
            top = cardRect.top - popoverHeight - 8;
        }
        if (left + popoverWidth > window.innerWidth - 16) {
            left = window.innerWidth - popoverWidth - 16;
        }
        if (left < 16) {
            left = 16;
        }

        popover.style.top = `${top}px`;
        popover.style.left = `${left}px`;
        popover.classList.remove('opacity-0', 'pointer-events-none');
        popover.classList.add('opacity-100');
    };

    const scheduleHidePopover = () => {
        clearTimeout(popoverHideTimer);
        popoverHideTimer = setTimeout(() => {
            hidePopover();
        }, 180);
    };

    const hidePopover = () => {
        if (!popover) return;
        popover.classList.remove('opacity-100');
        popover.classList.add('opacity-0', 'pointer-events-none');
        setTimeout(() => {
            if (popover.classList.contains('opacity-0')) {
                popover.classList.add('hidden');
            }
        }, 200);
        activeCard = null;
    };

    if (popover) {
        popover.addEventListener('mouseenter', () => {
            clearTimeout(popoverHideTimer);
        });
        popover.addEventListener('mouseleave', () => {
            scheduleHidePopover();
        });
    }

    // --- Mobile Modal Elements & State ---
    const modal = document.getElementById('review-mobile-modal');
    const modalBackdrop = document.getElementById('review-modal-backdrop');
    const modalCloseBtn = document.getElementById('review-modal-close');
    const modalName = document.getElementById('review-modal-name');
    const modalTreatment = document.getElementById('review-modal-treatment');
    const modalStars = document.getElementById('review-modal-stars');
    const modalDate = document.getElementById('review-modal-date');
    const modalBody = document.getElementById('review-modal-body');
    const modalSourceLink = document.getElementById('review-modal-source-link');

    let previousActiveElement = null;

    const openModal = (card) => {
        if (!modal) return;
        hidePopover();
        previousActiveElement = document.activeElement;

        const { patientName, treatment, rating, date, sourceUrl, sourceLabel } = card.dataset;
        const fullTextElem = card.querySelector('[data-full-text-content]');
        const fullText = fullTextElem ? fullTextElem.innerHTML : card.dataset.fullText || '';

        if (modalName) modalName.textContent = patientName || '';
        if (modalTreatment) modalTreatment.textContent = treatment || '';
        if (modalStars) modalStars.innerHTML = renderStars(rating || 5);
        if (modalDate) modalDate.textContent = date || '';
        if (modalBody) modalBody.innerHTML = fullText;
        if (modalSourceLink && sourceUrl) {
            modalSourceLink.href = sourceUrl;
            modalSourceLink.target = '_blank';
            modalSourceLink.rel = 'noopener noreferrer';
        }

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        requestAnimationFrame(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            if (modalCloseBtn) modalCloseBtn.focus();
        });
    };

    const closeModal = () => {
        if (!modal || modal.classList.contains('hidden')) return;
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        document.body.style.overflow = '';
        setTimeout(() => {
            modal.classList.add('hidden');
            if (previousActiveElement && typeof previousActiveElement.focus === 'function') {
                previousActiveElement.focus();
            }
        }, 200);
    };

    if (modalCloseBtn) {
        modalCloseBtn.addEventListener('click', closeModal);
    }
    if (modalBackdrop) {
        modalBackdrop.addEventListener('click', closeModal);
    }

    // Global escape key handler
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            hidePopover();
            closeModal();
        }
    });

    // --- Card Interaction Listeners ---
    const reviewCards = document.querySelectorAll('[data-review-card]');
    reviewCards.forEach((card) => {
        // Desktop Hover Bridge
        card.addEventListener('mouseenter', () => showPopover(card));
        card.addEventListener('mouseleave', () => scheduleHidePopover());

        // Keyboard Focus
        card.addEventListener('focusin', () => showPopover(card));
        card.addEventListener('focusout', (e) => {
            if (!popover || !popover.contains(e.relatedTarget)) {
                scheduleHidePopover();
            }
        });

        // Click / Tap Action: Open Modal on mobile or when explicit trigger clicked
        const triggerBtn = card.querySelector('[data-review-trigger]');
        if (triggerBtn) {
            triggerBtn.addEventListener('click', (e) => {
                e.preventDefault();
                openModal(card);
            });
        }

        card.addEventListener('click', (e) => {
            // If click target was external source link, let browser open link
            if (e.target.closest('a[target="_blank"]')) return;

            // On mobile or touch devices, clicking anywhere on card opens modal
            if (window.innerWidth < 768 || window.matchMedia('(pointer: coarse)').matches) {
                openModal(card);
            }
        });
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initTestimonials);
} else {
    initTestimonials();
}

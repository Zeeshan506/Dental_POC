import { animate } from 'motion/mini';
import { initTestimonials } from './testimonials.js';
import { initializeConsultationForms } from './consultation-form.js';

const expressiveEase = [0.16, 1, 0.3, 1];
const editorialEase = [0.22, 1, 0.36, 1];

const motionProfiles = {
    ease: expressiveEase,
    action: { distance: 12, duration: 0.42 },
    card: { distance: 20, duration: 0.52 },
    copy: { distance: 14, duration: 0.46 },
    fade: { distance: 0, duration: 0.36 },
    group: { distance: 16, duration: 0.48 },
    headline: { distance: 18, duration: 0.56 },
    image: { distance: 28, duration: 0.62 },
    mask: { duration: 0.64 },
    review: { distance: 18, duration: 0.48 },
    rise: { distance: 12, duration: 0.44 },
    timeline: { duration: 0.6 },
};

const editorialMotionProfiles = {
    ease: editorialEase,
    action: { distance: 8, duration: 0.56 },
    card: { distance: 12, duration: 0.7 },
    copy: { distance: 10, duration: 0.62 },
    fade: { distance: 0, duration: 0.5 },
    group: { distance: 12, duration: 0.64 },
    headline: { distance: 12, duration: 0.72 },
    image: { distance: 10, duration: 0.76, scale: 1.02 },
    mask: { duration: 0.82 },
    review: { distance: 12, duration: 0.68 },
    rise: { distance: 10, duration: 0.6 },
    timeline: { duration: 0.8 },
};

const parseMilliseconds = (value) => {
    const parsedValue = Number.parseFloat(value ?? '0');

    return Number.isFinite(parsedValue) ? parsedValue / 1000 : 0;
};

const getStaggerDelay = (element) => {
    if (window.matchMedia('(max-width: 767px)').matches) {
        return 0;
    }

    const group = element.parentElement?.closest('[data-motion-stagger]');

    if (!group || group === element) {
        return 0;
    }

    const siblings = [...group.querySelectorAll(':scope > [data-motion]')];

    return Math.max(0, siblings.indexOf(element)) * parseMilliseconds(group.dataset.motionStagger);
};

const getProfile = (element) => {
    const profiles = document.documentElement.dataset.motionProfile === 'editorial'
        ? editorialMotionProfiles
        : motionProfiles;

    return {
        ...(profiles[element.dataset.motion] ?? profiles.rise),
        ease: profiles.ease,
    };
};

const getObserverTarget = (element) => {
    let ancestor = element.parentElement?.closest('[data-motion]');

    while (ancestor) {
        if (!['mask', 'timeline'].includes(ancestor.dataset.motion)) {
            return ancestor;
        }

        ancestor = ancestor.parentElement?.closest('[data-motion]');
    }

    return element;
};

const getDelay = (element) => {
    if (window.matchMedia('(max-width: 767px)').matches) {
        return 0;
    }

    const group = element.parentElement?.closest('[data-motion-stagger]');

    return parseMilliseconds(element.dataset.motionDelay)
        + parseMilliseconds(group?.dataset.motionDelay)
        + getStaggerDelay(element);
};

function initializeMotion() {
    const motionElements = [...document.querySelectorAll('[data-motion]')];
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (motionElements.length === 0 || prefersReducedMotion || !('IntersectionObserver' in window)) {
        return;
    }

    const animationControls = new Set();
    const revealedElements = new WeakSet();

    motionElements.forEach((element) => {
        const profile = getProfile(element);

        element.style.setProperty('--motion-offset', `${profile.distance ?? 0}px`);
        element.style.setProperty('--motion-scale', `${profile.scale ?? 1}`);
        element.classList.add('motion-pending');
    });

    document.documentElement.classList.add('motion-ready');

    const reveal = (element) => {
        if (revealedElements.has(element)) {
            return;
        }

        revealedElements.add(element);

        const profile = getProfile(element);
        const delay = getDelay(element);
        const isMask = element.dataset.motion === 'mask' || element.dataset.motion === 'timeline';
        const isFade = element.dataset.motion === 'fade';
        const transformFrom = `translate3d(0, ${profile.distance ?? 0}px, 0) scale(${profile.scale ?? 1})`;
        const animation = isMask
            ? animate(element, {
                clipPath: ['inset(0 100% 0 0)', 'inset(0 0 0 0)'],
                opacity: [0.98, 1],
            }, {
                delay,
                duration: profile.duration,
                ease: profile.ease,
            })
            : isFade
                ? animate(element, {
                    opacity: [0, 1],
                }, {
                    delay,
                    duration: profile.duration,
                    ease: profile.ease,
                })
                : animate(element, {
                opacity: [0, 1],
                transform: [transformFrom, 'translate3d(0, 0, 0) scale(1)'],
            }, {
                delay,
                duration: profile.duration,
                ease: profile.ease,
            });

        animationControls.add(animation);
        const settle = () => {
            element.classList.remove('motion-pending');
            element.style.removeProperty('clip-path');
            element.style.removeProperty('opacity');
            element.style.removeProperty('transform');
            animationControls.delete(animation);
        };

        animation.finished.then(settle).catch(settle);
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) {
                return;
            }

            observerTargets.get(entry.target)?.forEach(reveal);
            observer.unobserve(entry.target);
        });
    }, {
        rootMargin: '0px 0px 12% 0px',
        threshold: 0.08,
    });

    const observerTargets = new Map();

    motionElements.forEach((element) => {
        const target = getObserverTarget(element);
        const targets = observerTargets.get(target) ?? [];

        targets.push(element);
        observerTargets.set(target, targets);
    });

    observerTargets.forEach((_, target) => observer.observe(target));

    window.addEventListener('pagehide', () => {
        animationControls.forEach((animation) => animation.cancel());
        observer.disconnect();
    }, { once: true });
}

function initializeHeroGalleries() {
    document.querySelectorAll('[data-hero-gallery]').forEach((gallery) => {
        const slides = [...gallery.querySelectorAll('[data-hero-slide]')];
        const previousButton = gallery.querySelector('[data-hero-prev]');
        const nextButton = gallery.querySelector('[data-hero-next]');
        const indexLabel = gallery.querySelector('[data-hero-index]');
        let activeIndex = 0;

        if (slides.length < 2) {
            return;
        }

        const showSlide = (nextIndex) => {
            activeIndex = (nextIndex + slides.length) % slides.length;

            slides.forEach((slide, index) => {
                const isActive = index === activeIndex;

                slide.classList.toggle('opacity-100', isActive);
                slide.classList.toggle('opacity-0', ! isActive);
                slide.setAttribute('aria-hidden', String(! isActive));
            });

            if (indexLabel) {
                indexLabel.textContent = `${String(activeIndex + 1).padStart(2, '0')} / ${String(slides.length).padStart(2, '0')}`;
            }
        };

        previousButton?.addEventListener('click', () => showSlide(activeIndex - 1));
        nextButton?.addEventListener('click', () => showSlide(activeIndex + 1));
    });
}

function initializeApp() {
    initTestimonials();
    initializeConsultationForms();
    initializeHeroGalleries();
    initializeMotion();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeApp, { once: true });
} else {
    initializeApp();
}

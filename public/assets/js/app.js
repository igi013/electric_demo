/**
 * PowerFlow Electric - Custom JavaScript
 * Enhanced interactions and animations
 */
document.addEventListener('DOMContentLoaded', function() {
    initScrollAnimations();
    initFormEnhancements();
    initNavigationEffects();
    initCounterAnimations();
    initPasswordToggles();

    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.feature-item, .card, .timeline-item').forEach(function(el) {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    }

    function initFormEnhancements() {
        document.querySelectorAll('.form-control, .form-select').forEach(function(input) {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.classList.remove('focused');
                }
            });
        });

        document.querySelectorAll('input[type="email"]').forEach(function(input) {
            input.addEventListener('input', function() {
                const isValid = this.checkValidity();
                this.classList.toggle('is-valid', isValid && this.value.length > 0);
                this.classList.toggle('is-invalid', !isValid && this.value.length > 0);
            });
        });

        document.querySelectorAll('input[type="password"][data-password-strength]').forEach(function(input) {
            input.addEventListener('input', function() {
                updatePasswordStrengthIndicator(this, calculatePasswordStrength(this.value));
            });
        });
    }

    function initNavigationEffects() {
        const navbar = document.querySelector('.navbar');
        if (!navbar) {
            return;
        }

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    }

    function initCounterAnimations() {
        const counters = document.querySelectorAll('.stat-item h2');
        const counterObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.textContent.replace(/\D/g, ''), 10);
                    const suffix = counter.textContent.replace(/\d/g, '');
                    animateCounter(counter, 0, target, suffix, 2000);
                    counterObserver.unobserve(counter);
                }
            });
        });

        counters.forEach(function(counter) {
            counterObserver.observe(counter);
        });
    }

    function initPasswordToggles() {
        document.querySelectorAll('.password-toggle').forEach(function(button) {
            button.addEventListener('click', function() {
                const target = document.getElementById(this.dataset.target);
                const icon = this.querySelector('i');
                const showIcon = this.querySelector('.password-icon-show');
                const hideIcon = this.querySelector('.password-icon-hide');

                if (!target) {
                    return;
                }

                const isPassword = target.type === 'password';
                target.type = isPassword ? 'text' : 'password';

                if (icon) {
                    icon.classList.toggle('fa-eye', !isPassword);
                    icon.classList.toggle('fa-eye-slash', isPassword);
                }

                if (showIcon && hideIcon) {
                    this.classList.toggle('is-password-visible', isPassword);
                }

                this.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
            });
        });
    }

    function calculatePasswordStrength(password) {
        let strength = 0;
        if (password.length >= 8) strength++;
        if (/[a-z]/.test(password)) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[^A-Za-z0-9]/.test(password)) strength++;
        return strength;
    }

    function updatePasswordStrengthIndicator(input, strength) {
        let indicator = input.parentElement.querySelector('.password-strength');
        if (!indicator) {
            indicator = document.createElement('div');
            indicator.className = 'password-strength mt-1';
            input.parentElement.appendChild(indicator);
        }

        const strengthLevels = ['Very Weak', 'Weak', 'Fair', 'Good', 'Strong'];
        const strengthColors = ['#dc3545', '#fd7e14', '#ffc107', '#20c997', '#28a745'];

        if (input.value.length === 0) {
            indicator.style.display = 'none';
            return;
        }

        indicator.style.display = 'block';
        indicator.innerHTML = '<div class="progress" style="height: 4px;"><div class="progress-bar" style="width: ' + ((strength / 5) * 100) + '%; background-color: ' + (strengthColors[strength - 1] || strengthColors[0]) + '"></div></div><small class="text-muted">Password strength: ' + (strengthLevels[strength - 1] || strengthLevels[0]) + '</small>';
    }

    function animateCounter(element, start, end, suffix, duration) {
        const startTime = performance.now();

        function updateCounter(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const current = Math.floor(start + (end - start) * easeOutQuart(progress));
            element.textContent = current + suffix;

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            }
        }

        requestAnimationFrame(updateCounter);
    }

    function easeOutQuart(t) {
        return 1 - (--t) * t * t * t;
    }

    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn && !submitBtn.disabled) {
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
                submitBtn.disabled = true;
                setTimeout(function() {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 5000);
            }
        });
    });

    if (document.body.classList.contains('auth-body')) {
        return;
    }

    const backToTopBtn = document.createElement('button');
    backToTopBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
    backToTopBtn.className = 'btn btn-primary position-fixed back-to-top-btn';
    backToTopBtn.style.cssText = 'bottom: 20px; right: 20px; z-index: 1000; display: none;';
    document.body.appendChild(backToTopBtn);

    window.addEventListener('scroll', function() {
        backToTopBtn.style.display = window.pageYOffset > 300 ? 'inline-flex' : 'none';
    });

    backToTopBtn.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});

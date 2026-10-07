<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Powering Your World with Excellence</h1>
                <p class="lead mb-4">Professional electrical services you can trust. From residential wiring to commercial installations, we deliver safe, reliable, and efficient electrical solutions for over 25 years.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?= base_url('services') ?>" class="btn btn-primary btn-lg">Our Services</a>
                    <a href="<?= base_url('contact') ?>" class="btn btn-outline-light btn-lg">Get Quote</a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <i class="fas fa-bolt" style="font-size: 15rem; color: rgba(255,255,255,0.1);"></i>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Why Choose Puihaha Electric?</h2>
                <p class="lead text-muted">We combine decades of experience with cutting-edge technology to deliver exceptional electrical services that exceed expectations.</p>
            </div>
        </div>
        <div class="row g-4">
            <?php
            $features = [
                ['shield-alt', 'Licensed & Insured', 'Fully licensed electricians with comprehensive insurance coverage for your peace of mind and protection.'],
                ['clock', '24/7 Emergency Service', 'Round-the-clock emergency electrical services because electrical problems do not wait for business hours.'],
                ['award', '25+ Years Experience', 'Over two decades of expertise in residential, commercial, and industrial electrical solutions.'],
                ['tools', 'Modern Equipment', 'State-of-the-art tools and equipment ensure efficient, safe, and high-quality electrical work.'],
                ['leaf', 'Eco-Friendly Solutions', 'Energy-efficient installations and solar solutions to reduce your carbon footprint and energy costs.'],
                ['handshake', 'Satisfaction Guarantee', '100% satisfaction guarantee on all our work with comprehensive warranties for your investment.'],
            ];
            ?>
            <?php foreach ($features as [$icon, $heading, $copy]): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 text-center p-4 feature-item">
                        <div class="feature-icon"><i class="fas fa-<?= esc($icon) ?>"></i></div>
                        <h4 class="text-primary-custom mb-3"><?= esc($heading) ?></h4>
                        <p class="text-muted"><?= esc($copy) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Our Core Services</h2>
                <p class="lead text-muted">From simple repairs to complex installations, we handle all your electrical needs with precision and care.</p>
            </div>
        </div>
        <div class="row g-4">
            <?php
            $services = [
                ['home', 'Residential Services', 'Complete home electrical solutions including wiring, panel upgrades, outlet installation, and smart home automation.'],
                ['building', 'Commercial Services', 'Professional commercial electrical installations, maintenance, and emergency repairs for businesses of all sizes.'],
                ['solar-panel', 'Solar Solutions', 'Sustainable energy solutions with solar panel installation, battery storage, and energy management systems.'],
                ['exclamation-triangle', 'Emergency Repairs', '24/7 emergency electrical repair services for power outages, electrical faults, and safety hazards.'],
            ];
            ?>
            <?php foreach ($services as [$icon, $heading, $copy]): ?>
                <div class="col-lg-6">
                    <div class="card h-100 p-4 feature-item">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-3 text-center"><div class="feature-icon mx-auto"><i class="fas fa-<?= esc($icon) ?>"></i></div></div>
                            <div class="col-md-9">
                                <h4 class="text-primary-custom mb-2"><?= esc($heading) ?></h4>
                                <p class="text-muted mb-0"><?= esc($copy) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-5">
            <a href="<?= base_url('services') ?>" class="btn btn-primary btn-lg">View All Services</a>
        </div>
    </div>
</section>

<section class="section-padding bg-primary text-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4"><div class="stat-item"><h2 class="display-4 fw-bold text-secondary-custom mb-2">2500+</h2><p class="lead mb-0">Projects Completed</p></div></div>
            <div class="col-lg-3 col-md-6 mb-4"><div class="stat-item"><h2 class="display-4 fw-bold text-secondary-custom mb-2">25+</h2><p class="lead mb-0">Years Experience</p></div></div>
            <div class="col-lg-3 col-md-6 mb-4"><div class="stat-item"><h2 class="display-4 fw-bold text-secondary-custom mb-2">100%</h2><p class="lead mb-0">Customer Satisfaction</p></div></div>
            <div class="col-lg-3 col-md-6 mb-4"><div class="stat-item"><h2 class="display-4 fw-bold text-secondary-custom mb-2">24/7</h2><p class="lead mb-0">Emergency Service</p></div></div>
        </div>
    </div>
</section>

<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Ready to Power Up Your Project?</h2>
                <p class="lead text-muted mb-4">Get a free consultation and quote for your electrical needs. Our expert team is ready to help you with safe, reliable, and efficient electrical solutions.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg me-3">Get Free Quote</a>
                <a href="tel:5551234567" class="btn btn-outline-primary btn-lg"><i class="fas fa-phone me-2"></i>Call Now</a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

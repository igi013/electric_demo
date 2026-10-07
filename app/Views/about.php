<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="hero-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 fw-bold mb-4">About Puihaha Electric</h1>
                <p class="lead">Powering communities with excellence, integrity, and innovation for over 25 years</p>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold text-primary-custom mb-4">Our Story</h2>
                <p class="lead text-muted mb-4">Founded in 1999 by master electrician John Benedic R. Enriquez, Puihaha Electric began as a small family business with a simple mission: to provide safe, reliable, and affordable electrical services to our community.</p>
                <p class="mb-4">What started as a one-man operation has grown into a trusted electrical contractor serving thousands of residential and commercial clients across the region.</p>
                <p class="mb-4">Today, Puihaha Electric stands as a testament to hard work, dedication, and unwavering commitment to quality.</p>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5 text-center">
                        <div class="feature-icon mb-4"><i class="fas fa-history"></i></div>
                        <h3 class="text-primary-custom mb-3">25+ Years</h3>
                        <p class="text-muted mb-0">of dedicated service to our community, building trust and delivering excellence in every project we undertake.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Our Foundation</h2>
                <p class="lead text-muted">The principles that guide everything we do</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4"><div class="card h-100 text-center p-4 feature-item"><div class="feature-icon"><i class="fas fa-bullseye"></i></div><h4 class="text-primary-custom mb-3">Our Mission</h4><p class="text-muted">To provide safe, reliable, and innovative electrical solutions that exceed our customers' expectations.</p></div></div>
            <div class="col-lg-4"><div class="card h-100 text-center p-4 feature-item"><div class="feature-icon"><i class="fas fa-eye"></i></div><h4 class="text-primary-custom mb-3">Our Vision</h4><p class="text-muted">To be the leading electrical contractor in the region, recognized for expertise, integrity, and sustainable energy solutions.</p></div></div>
            <div class="col-lg-4"><div class="card h-100 text-center p-4 feature-item"><div class="feature-icon"><i class="fas fa-heart"></i></div><h4 class="text-primary-custom mb-3">Our Values</h4><p class="text-muted">Safety first, integrity always, excellence in execution, environmental responsibility, and customer satisfaction.</p></div></div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Meet Our Expert Team</h2>
                <p class="lead text-muted">Experienced professionals dedicated to delivering exceptional electrical services</p>
            </div>
        </div>
        <div class="row g-4">
            <?php
            $team = [
                ['John Benedic R. Enriquez', 'Founder & Master Electrician'],
                ['Sarah Martinez', 'Operations Manager'],
                ['Michael Chen', 'Senior Electrician'],
                ['Emily Rodriguez', 'Customer Service Manager'],
                ['David Thompson', 'Emergency Services Lead'],
                ['Lisa Wang', 'Solar Solutions Specialist'],
            ];
            ?>
            <?php foreach ($team as [$name, $role]): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 text-center p-4 feature-item">
                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 120px; height: 120px;">
                            <i class="fas fa-user text-white" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="text-primary-custom mb-2"><?= esc($name) ?></h4>
                        <p class="text-secondary-custom fw-semibold mb-3"><?= esc($role) ?></p>
                        <p class="text-muted small">Dedicated to safe, reliable electrical service and excellent customer care.</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-padding bg-primary text-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold mb-4">Ready to Work with Us?</h2>
                <p class="lead mb-4">Experience the Puihaha Electric difference. Contact us today for a free consultation.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="<?= base_url('contact') ?>" class="btn btn-secondary btn-lg">Get Free Quote</a>
                    <a href="<?= base_url('services') ?>" class="btn btn-outline-light btn-lg">Our Services</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

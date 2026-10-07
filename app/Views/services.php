<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="hero-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 fw-bold mb-4">Our Electrical Services</h1>
                <p class="lead">Comprehensive electrical solutions for residential, commercial, and industrial needs</p>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Complete Electrical Solutions</h2>
                <p class="lead text-muted">From simple repairs to complex installations, we provide safe, reliable, and efficient electrical services tailored to your specific needs.</p>
            </div>
        </div>
    </div>
</section>

<?php
$groups = [
    [
        'title' => 'Residential Services',
        'icon' => 'home',
        'class' => 'bg-light-custom',
        'intro' => 'Professional electrical services for your home, ensuring safety, efficiency, and comfort for your family.',
        'services' => [
            ['plug', 'Electrical Wiring', ['New home wiring', 'Rewiring old homes', 'Code compliance updates', 'Safety inspections']],
            ['th-large', 'Panel Upgrades', ['Panel replacements', 'Circuit breaker upgrades', 'Service capacity increases', 'GFCI installations']],
            ['lightbulb', 'Lighting Solutions', ['LED lighting upgrades', 'Landscape lighting', 'Smart lighting systems', 'Security lighting']],
            ['mobile-alt', 'Smart Home Automation', ['Smart switches & outlets', 'Home automation systems', 'Voice control integration', 'Energy monitoring']],
            ['car', 'EV Charging Stations', ['Level 2 charger installation', 'Electrical capacity assessment', 'Permit handling', 'Smart charging features']],
            ['tools', 'Electrical Repairs', ['Outlet & switch repairs', 'Fixture installations', 'Troubleshooting', 'Emergency repairs']],
        ],
    ],
    [
        'title' => 'Commercial Services',
        'icon' => 'building',
        'class' => '',
        'intro' => 'Reliable electrical solutions for businesses, offices, retail spaces, and industrial facilities.',
        'services' => [
            ['industry', 'Commercial Wiring', ['New construction wiring', 'Tenant improvements', 'Office electrical systems', 'Retail installations']],
            ['bolt', 'Power Distribution', ['Power distribution panels', 'Transformer installations', 'Motor control centers', 'Emergency power systems']],
            ['video', 'Security & Data Systems', ['Security camera systems', 'Access control systems', 'Network cabling', 'Fire alarm systems']],
            ['warehouse', 'Industrial Electrical', ['Machine wiring', 'Control systems', 'High-bay lighting', 'Power factor correction']],
            ['wrench', 'Maintenance Services', ['Preventive maintenance', 'System inspections', 'Thermal imaging', 'Equipment testing']],
            ['chart-line', 'Energy Efficiency', ['Energy audits', 'LED retrofits', 'Power quality analysis', 'Demand management']],
        ],
    ],
];
?>

<?php foreach ($groups as $group): ?>
    <section class="section-padding <?= esc($group['class']) ?>">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="display-5 fw-bold text-primary-custom mb-3">
                        <i class="fas fa-<?= esc($group['icon']) ?> text-secondary-custom me-3"></i><?= esc($group['title']) ?>
                    </h2>
                    <p class="lead text-muted"><?= esc($group['intro']) ?></p>
                </div>
            </div>
            <div class="row g-4">
                <?php foreach ($group['services'] as [$icon, $heading, $items]): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 p-4 feature-item">
                            <div class="feature-icon"><i class="fas fa-<?= esc($icon) ?>"></i></div>
                            <h4 class="text-primary-custom mb-3"><?= esc($heading) ?></h4>
                            <p class="text-muted mb-3">Professional <?= esc(strtolower($heading)) ?> delivered with safety, reliability, and clean workmanship.</p>
                            <ul class="list-unstyled text-muted small">
                                <?php foreach ($items as $item): ?>
                                    <li><i class="fas fa-check text-success me-2"></i><?= esc($item) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endforeach; ?>

<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">
                    <i class="fas fa-solar-panel text-secondary-custom me-3"></i>Solar & Renewable Energy
                </h2>
                <p class="lead text-muted">Sustainable energy solutions to reduce your carbon footprint and energy costs with cutting-edge solar technology.</p>
            </div>
        </div>
        <div class="row g-4">
            <?php
            $solar = [
                ['sun', 'Solar Panel Installation', 'System design, permit acquisition, professional installation, and grid interconnection.'],
                ['battery-full', 'Energy Storage Systems', 'Battery storage solutions to store solar energy and provide backup power during outages.'],
                ['calculator', 'Energy Consultation', 'Site assessments, energy usage analysis, ROI calculations, and financing options.'],
                ['cog', 'System Maintenance', 'Ongoing monitoring, cleaning, preventive maintenance, and warranty support.'],
            ];
            ?>
            <?php foreach ($solar as [$icon, $heading, $copy]): ?>
                <div class="col-lg-6">
                    <div class="card h-100 p-4 feature-item">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-3 text-center"><div class="feature-icon mx-auto"><i class="fas fa-<?= esc($icon) ?>"></i></div></div>
                            <div class="col-md-9"><h4 class="text-primary-custom mb-2"><?= esc($heading) ?></h4><p class="text-muted mb-0"><?= esc($copy) ?></p></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-padding bg-danger text-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold mb-4"><i class="fas fa-exclamation-triangle text-warning me-3"></i>24/7 Emergency Services</h2>
                <p class="lead mb-4">Electrical emergencies do not wait for business hours. Our emergency response team is available 24/7 to handle urgent electrical issues and ensure your safety.</p>
                <div class="row g-4 mt-4">
                    <div class="col-md-4"><div class="emergency-item"><i class="fas fa-fire text-warning mb-3" style="font-size: 3rem;"></i><h4>Electrical Fires</h4><p>Immediate response to electrical fires and safety hazards</p></div></div>
                    <div class="col-md-4"><div class="emergency-item"><i class="fas fa-power-off text-warning mb-3" style="font-size: 3rem;"></i><h4>Power Outages</h4><p>Quick diagnosis and restoration of electrical power</p></div></div>
                    <div class="col-md-4"><div class="emergency-item"><i class="fas fa-zap text-warning mb-3" style="font-size: 3rem;"></i><h4>Electrical Faults</h4><p>Emergency repairs for dangerous electrical conditions</p></div></div>
                </div>
                <div class="mt-5">
                    <a href="tel:5551234567" class="btn btn-warning btn-lg me-3"><i class="fas fa-phone me-2"></i>Emergency: (555) 123-4567</a>
                    <a href="<?= base_url('contact') ?>" class="btn btn-outline-light btn-lg">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Our Service Process</h2>
                <p class="lead text-muted">A streamlined approach to delivering exceptional electrical services from consultation to completion.</p>
            </div>
        </div>
        <div class="row g-4">
            <?php foreach (['Consultation', 'Assessment', 'Installation', 'Follow-up'] as $index => $step): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="text-center feature-item">
                        <div class="process-step bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                            <span class="h3 mb-0"><?= $index + 1 ?></span>
                        </div>
                        <h4 class="text-primary-custom mb-3"><?= esc($step) ?></h4>
                        <p class="text-muted">Quality service from first conversation through testing, inspection, and ongoing support.</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Ready to Get Started?</h2>
                <p class="lead text-muted mb-4">Contact us today for a free consultation and quote.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="<?= base_url('contact') ?>" class="btn btn-primary btn-lg me-3">Get Free Quote</a>
                <a href="tel:5551234567" class="btn btn-outline-primary btn-lg"><i class="fas fa-phone me-2"></i>Call Now</a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

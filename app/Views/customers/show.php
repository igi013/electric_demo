<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="admin-shell">
    <div class="container">
        <div class="admin-header">
            <div>
                <p class="eyebrow mb-1">Customer Details</p>
                <h1><?= esc($account['customer_name']) ?></h1>
            </div>
            <div class="d-flex gap-2">
                <a href="<?= base_url('customers/' . $account['id'] . '/edit') ?>" class="btn btn-primary"><i class="fas fa-pen me-2"></i>Edit</a>
                <a href="<?= base_url('customers') ?>" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
        <?php endif; ?>

        <div class="detail-grid">
            <div class="detail-card"><span>Account Number</span><strong><?= esc($account['account_number']) ?></strong></div>
            <div class="detail-card"><span>Status</span><strong><?= esc(ucfirst($account['status'])) ?></strong></div>
            <div class="detail-card"><span>Connection Type</span><strong><?= esc(ucfirst($account['connection_type'])) ?></strong></div>
            <div class="detail-card"><span>Meter Number</span><strong><?= esc($account['meter_number']) ?></strong></div>
            <div class="detail-card detail-wide"><span>Address</span><strong><?= esc($account['address']) ?></strong></div>
            <div class="detail-card"><span>Phone</span><strong><?= esc($account['phone']) ?></strong></div>
            <div class="detail-card"><span>Email</span><strong><?= esc($account['email']) ?></strong></div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

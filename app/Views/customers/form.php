<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php
$isEdit = $mode === 'edit';
$action = $isEdit ? base_url('customers/' . $account['id']) : base_url('customers');
$value = static fn(string $key): string => (string) old($key, $account[$key] ?? '');
?>

<section class="admin-shell">
    <div class="container">
        <div class="admin-header">
            <div>
                <p class="eyebrow mb-1"><?= $isEdit ? 'Update Record' : 'New Record' ?></p>
                <h1><?= $isEdit ? 'Edit Customer Account' : 'Add Customer Account' ?></h1>
            </div>
            <a href="<?= base_url('customers') ?>" class="btn btn-outline-secondary admin-action-btn">Cancel</a>
        </div>

        <div class="form-panel">
            <form action="<?= $action ?>" method="post">
                <?= csrf_field() ?>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="account_number" class="form-label">Account Number *</label>
                        <input type="text" class="form-control <?= isset($validation['account_number']) ? 'is-invalid' : '' ?>" id="account_number" name="account_number" value="<?= esc($value('account_number')) ?>" required>
                        <?php if (isset($validation['account_number'])): ?><div class="invalid-feedback"><?= esc($validation['account_number']) ?></div><?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label for="customer_name" class="form-label">Customer Name *</label>
                        <input type="text" class="form-control <?= isset($validation['customer_name']) ? 'is-invalid' : '' ?>" id="customer_name" name="customer_name" value="<?= esc($value('customer_name')) ?>" required>
                        <?php if (isset($validation['customer_name'])): ?><div class="invalid-feedback"><?= esc($validation['customer_name']) ?></div><?php endif; ?>
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">Address *</label>
                        <textarea class="form-control <?= isset($validation['address']) ? 'is-invalid' : '' ?>" id="address" name="address" rows="3" required><?= esc($value('address')) ?></textarea>
                        <?php if (isset($validation['address'])): ?><div class="invalid-feedback"><?= esc($validation['address']) ?></div><?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control <?= isset($validation['phone']) ? 'is-invalid' : '' ?>" id="phone" name="phone" value="<?= esc($value('phone')) ?>">
                        <?php if (isset($validation['phone'])): ?><div class="invalid-feedback"><?= esc($validation['phone']) ?></div><?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?= isset($validation['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= esc($value('email')) ?>">
                        <?php if (isset($validation['email'])): ?><div class="invalid-feedback"><?= esc($validation['email']) ?></div><?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <label for="meter_number" class="form-label">Meter Number</label>
                        <input type="text" class="form-control <?= isset($validation['meter_number']) ? 'is-invalid' : '' ?>" id="meter_number" name="meter_number" value="<?= esc($value('meter_number')) ?>">
                        <?php if (isset($validation['meter_number'])): ?><div class="invalid-feedback"><?= esc($validation['meter_number']) ?></div><?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <label for="connection_type" class="form-label">Connection Type *</label>
                        <select class="form-select <?= isset($validation['connection_type']) ? 'is-invalid' : '' ?>" id="connection_type" name="connection_type" required>
                            <?php foreach (['residential' => 'Residential', 'commercial' => 'Commercial', 'industrial' => 'Industrial'] as $option => $label): ?>
                                <option value="<?= esc($option) ?>" <?= $value('connection_type') === $option ? 'selected' : '' ?>><?= esc($label) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($validation['connection_type'])): ?><div class="invalid-feedback"><?= esc($validation['connection_type']) ?></div><?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <label for="status" class="form-label">Status *</label>
                        <select class="form-select <?= isset($validation['status']) ? 'is-invalid' : '' ?>" id="status" name="status" required>
                            <?php foreach (['active' => 'Active', 'inactive' => 'Inactive', 'suspended' => 'Suspended'] as $option => $label): ?>
                                <option value="<?= esc($option) ?>" <?= $value('status') === $option ? 'selected' : '' ?>><?= esc($label) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($validation['status'])): ?><div class="invalid-feedback"><?= esc($validation['status']) ?></div><?php endif; ?>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end gap-2">
                    <a href="<?= base_url('customers') ?>" class="btn btn-outline-secondary admin-action-btn">Back</a>
                    <button type="submit" class="btn btn-primary admin-action-btn"><?= $isEdit ? 'Save Changes' : 'Create Account' ?></button>
                </div>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

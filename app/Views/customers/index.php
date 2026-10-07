<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php
$statusBase = static fn(string $status = ''): string => base_url('customers') . '?' . http_build_query(array_filter([
    'search' => $search_keyword,
    'status' => $status,
    'type' => $filter_type,
], static fn($value): bool => $value !== ''));
?>

<section class="admin-shell customer-dashboard">
    <div class="container-fluid px-4">
        <div class="dashboard-topbar">
            <div class="dashboard-heading">
                <p class="dashboard-eyebrow"><span></span>Customer management</p>
                <div class="dashboard-title-row">
                    <h1>Customers</h1>
                    <span class="dashboard-user"><i class="far fa-user"></i><?= esc($username) ?></span>
                </div>
                <p>Manage electric service accounts, contact details, meter records, and customer status.</p>
            </div>
            <a href="<?= base_url('customers/new') ?>" class="btn btn-primary dashboard-create-btn">
                <span><i class="fas fa-plus"></i></span>Add customer
            </a>
        </div>

        <?php if ($success): ?>
            <div class="alert alert-success"><?= esc($success) ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= esc($error) ?></div>
        <?php endif; ?>

        <div class="dashboard-metrics">
            <article class="metric-card metric-total">
                <div class="metric-heading"><span><i class="fas fa-users"></i></span><p>Total customers</p></div>
                <strong><?= esc($total_accounts) ?></strong>
                <small>All account records</small>
            </article>
            <article class="metric-card is-active">
                <div class="metric-heading"><span><i class="fas fa-check"></i></span><p>Active</p></div>
                <strong><?= esc($active_accounts) ?></strong>
                <small>Currently connected</small>
            </article>
            <article class="metric-card is-inactive">
                <div class="metric-heading"><span><i class="fas fa-minus"></i></span><p>Inactive</p></div>
                <strong><?= esc($inactive_accounts) ?></strong>
                <small>Temporarily inactive</small>
            </article>
            <article class="metric-card is-suspended">
                <div class="metric-heading"><span><i class="fas fa-exclamation"></i></span><p>Suspended</p></div>
                <strong><?= esc($suspended_accounts) ?></strong>
                <small>Requires attention</small>
            </article>
        </div>

        <section class="customer-controls" aria-label="Customer filters">
            <div class="customer-viewbar">
                <div class="customer-tabs">
                    <a href="<?= esc($statusBase()) ?>" class="<?= $filter_status === '' ? 'active' : '' ?>">All customers</a>
                    <a href="<?= esc($statusBase('active')) ?>" class="<?= $filter_status === 'active' ? 'active' : '' ?>">Active</a>
                    <a href="<?= esc($statusBase('inactive')) ?>" class="<?= $filter_status === 'inactive' ? 'active' : '' ?>">Inactive</a>
                    <a href="<?= esc($statusBase('suspended')) ?>" class="<?= $filter_status === 'suspended' ? 'active' : '' ?>">Suspended</a>
                </div>
                <span class="result-count"><?= esc($filtered_accounts) ?> results</span>
            </div>

            <div class="tool-panel">
                <form method="get" action="<?= base_url('customers') ?>" class="customer-filter-form">
                    <div class="filter-field filter-search">
                        <label class="form-label" for="customer-search">Search customers</label>
                        <div class="dashboard-search">
                            <i class="fas fa-magnifying-glass"></i>
                            <input type="text" class="form-control" id="customer-search" name="search" placeholder="Search name, account, email or meter" value="<?= esc($search_keyword) ?>">
                        </div>
                    </div>
                    <div class="filter-field">
                        <label class="form-label" for="customer-status">Status</label>
                        <select class="form-select" id="customer-status" name="status">
                            <option value="">All statuses</option>
                            <?php foreach (['active' => 'Active', 'inactive' => 'Inactive', 'suspended' => 'Suspended'] as $value => $label): ?>
                                <option value="<?= esc($value) ?>" <?= $filter_status === $value ? 'selected' : '' ?>><?= esc($label) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="filter-field">
                        <label class="form-label" for="connection-type">Connection type</label>
                        <select class="form-select" id="connection-type" name="type">
                            <option value="">All connection types</option>
                            <?php foreach (['residential' => 'Residential', 'commercial' => 'Commercial', 'industrial' => 'Industrial'] as $value => $label): ?>
                                <option value="<?= esc($value) ?>" <?= $filter_type === $value ? 'selected' : '' ?>><?= esc($label) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="filter-actions">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-sliders"></i><span>Apply filters</span></button>
                        <a href="<?= base_url('customers') ?>" class="btn btn-outline-secondary" title="Clear filters"><i class="fas fa-rotate-left"></i><span>Reset</span></a>
                    </div>
                </form>
            </div>
        </section>

        <div class="data-panel">
            <div class="table-toolbar">
                <div>
                    <p class="table-kicker">Directory</p>
                    <h2>Customer records</h2>
                    <p>Browse, edit, and maintain customer account information.</p>
                </div>
                <span><?= esc($filtered_accounts) ?> shown</span>
            </div>

            <div class="table-responsive">
                <table class="table align-middle customer-table">
                    <thead>
                        <tr>
                            <th>Account</th>
                            <th>Customer</th>
                            <th>Contact</th>
                            <th>Meter</th>
                            <th>Connection</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($accounts)): ?>
                            <tr>
                                <td colspan="7" class="customer-empty-state">
                                    <i class="far fa-folder-open"></i>
                                    <strong>No customer accounts found</strong>
                                    <span>Try changing your search or filters.</span>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php foreach ($accounts as $account): ?>
                            <tr>
                                <td><span class="account-number"><?= esc($account['account_number']) ?></span></td>
                                <td>
                                    <div class="customer-name-cell">
                                        <span><?= esc(strtoupper(substr($account['customer_name'], 0, 1))) ?></span>
                                        <div>
                                            <div class="customer-primary-text"><?= esc($account['customer_name']) ?></div>
                                            <small><?= esc($account['address']) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="customer-primary-text"><?= esc($account['email']) ?></div>
                                    <small class="customer-secondary-text"><?= esc($account['phone']) ?></small>
                                </td>
                                <td><span class="meter-number"><?= esc($account['meter_number']) ?></span></td>
                                <td><span class="type-pill type-<?= esc($account['connection_type']) ?>"><?= esc(ucfirst($account['connection_type'])) ?></span></td>
                                <td><span class="status-pill status-<?= esc($account['status']) ?>"><?= esc(ucfirst($account['status'])) ?></span></td>
                                <td class="text-end">
                                    <div class="table-actions">
                                        <a href="<?= base_url('customers/' . $account['id']) ?>" class="btn btn-sm btn-outline-primary" title="View customer" aria-label="View <?= esc($account['customer_name']) ?>"><i class="far fa-eye"></i></a>
                                        <a href="<?= base_url('customers/' . $account['id'] . '/edit') ?>" class="btn btn-sm btn-outline-secondary" title="Edit customer" aria-label="Edit <?= esc($account['customer_name']) ?>"><i class="far fa-pen-to-square"></i></a>
                                        <form action="<?= base_url('customers/' . $account['id'] . '/delete') ?>" method="post" class="d-inline" onsubmit="return confirm('Delete this customer account?');">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete customer" aria-label="Delete <?= esc($account['customer_name']) ?>"><i class="far fa-trash-can"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?php if ($pager): ?>
                <?php
                $currentPage = $pager->getCurrentPage('customers');
                $pageCount = $pager->getPageCount('customers');
                $perPage = $pager->getPerPage('customers');
                $paginationTotal = $pager->getTotal('customers');
                $firstResult = $paginationTotal > 0 ? (($currentPage - 1) * $perPage) + 1 : 0;
                $lastResult = min($currentPage * $perPage, $paginationTotal);
                $previousPage = $pager->getPreviousPageURI('customers');
                $nextPage = $pager->getNextPageURI('customers');
                ?>
                <div class="customer-pagination">
                    <div class="pagination-summary">
                        <span>Showing <strong><?= esc($firstResult) ?>&ndash;<?= esc($lastResult) ?></strong> of <strong><?= esc($paginationTotal) ?></strong> customers</span>
                        <small>Page <?= esc($currentPage) ?> of <?= esc($pageCount) ?></small>
                    </div>
                    <nav class="pagination-controls" aria-label="Customer pagination">
                        <?php if ($currentPage > 1): ?>
                            <a href="<?= esc($pager->getPageURI(1, 'customers')) ?>" class="pagination-direction pagination-jump" aria-label="First page" title="First page"><span aria-hidden="true">&laquo;</span></a>
                        <?php else: ?>
                            <span class="pagination-direction pagination-jump is-disabled" aria-label="First page" title="First page"><span aria-hidden="true">&laquo;</span></span>
                        <?php endif; ?>

                        <?php if ($previousPage): ?>
                            <a href="<?= esc($previousPage) ?>" class="pagination-direction" aria-label="Previous page" title="Previous page"><span aria-hidden="true">&larr;</span></a>
                        <?php else: ?>
                            <span class="pagination-direction is-disabled" aria-label="Previous page" title="Previous page"><span aria-hidden="true">&larr;</span></span>
                        <?php endif; ?>

                        <div class="pagination-pages">
                            <?php for ($pageNumber = 1; $pageNumber <= $pageCount; $pageNumber++): ?>
                                <a href="<?= esc($pager->getPageURI($pageNumber, 'customers')) ?>"
                                   class="pagination-number <?= $pageNumber === $currentPage ? 'is-active' : '' ?>"
                                   <?= $pageNumber === $currentPage ? 'aria-current="page"' : '' ?>>
                                    <?= esc($pageNumber) ?>
                                </a>
                            <?php endfor; ?>
                        </div>

                        <?php if ($nextPage): ?>
                            <a href="<?= esc($nextPage) ?>" class="pagination-direction" aria-label="Next page" title="Next page"><span aria-hidden="true">&rarr;</span></a>
                        <?php else: ?>
                            <span class="pagination-direction is-disabled" aria-label="Next page" title="Next page"><span aria-hidden="true">&rarr;</span></span>
                        <?php endif; ?>

                        <?php if ($currentPage < $pageCount): ?>
                            <a href="<?= esc($pager->getPageURI($pageCount, 'customers')) ?>" class="pagination-direction pagination-jump" aria-label="Last page" title="Last page"><span aria-hidden="true">&raquo;</span></a>
                        <?php else: ?>
                            <span class="pagination-direction pagination-jump is-disabled" aria-label="Last page" title="Last page"><span aria-hidden="true">&raquo;</span></span>
                        <?php endif; ?>
                    </nav>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

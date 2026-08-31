<?php

use Livewire\Attributes\Title;
Use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

new class extends Component
{
    public $news;
    public function mount(){
        $this->news = DB::table('tbl_news')->orderByDesc('post_date')->get();
        
        if ($this->news->isEmpty()) {
            abort(404);
        }

    }
    public function render(){
        return $this->view()->title("Investor Dashboard");

    }
}
?>

<div>
    <section><!-- Start: About Us -->
    <div class="container my-5 rounded-1 p-2 rounded-bordered" style="background-color: var(--bs-body-bg);">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold" style="color: #1a4d8c;">Welcome back, <?= htmlspecialchars($user->name ?? 'Investor') ?></h2>
            <a href="/logout" class="btn btn-outline-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>

        <!-- Summary Cards -->
        <div class="row mb-5">
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0 h-100" style="border-left: 4px solid #1a4d8c;">
                    <div class="card-body">
                        <p class="text-muted mb-1 text-uppercase small fw-bold">Total Units Held</p>
                        <h3 class="mb-0"><?= number_format($summary_stats['total_units'] ?? 0, 4) ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0 h-100" style="border-left: 4px solid #28a745;">
                    <div class="card-body">
                        <p class="text-muted mb-1 text-uppercase small fw-bold">Current Portfolio Value (BDT)</p>
                        <h3 class="mb-0">৳ <?= number_format($summary_stats['total_value'] ?? 0, 2) ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <?php 
                    $gain_loss = $summary_stats['total_gain_loss'] ?? 0;
                    $gain_color = $gain_loss >= 0 ? 'text-success' : 'text-danger';
                    $border_color = $gain_loss >= 0 ? '#28a745' : '#dc3545';
                ?>
                <div class="card shadow-sm border-0 h-100" style="border-left: 4px solid <?= $border_color ?>;">
                    <div class="card-body">
                        <p class="text-muted mb-1 text-uppercase small fw-bold">Total Gain/Loss</p>
                        <h3 class="mb-0 <?= $gain_color ?>">
                            <?= $gain_loss >= 0 ? '+' : '' ?>৳ <?= number_format($gain_loss, 2) ?>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Holdings Section -->
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                        <h5 class="fw-bold" style="color: #1a4d8c;">Your Holdings</h5>
                    </div>
                    <div class="card-body">
                        <?php if (empty($portfolios)): ?>
                            <div class="text-center py-5">
                                <i class="bi bi-folder-x text-muted" style="font-size: 3rem;"></i>
                                <h6 class="mt-3 text-muted">No holdings found.</h6>
                                <p class="text-muted mb-4">Contact HFAML to link your folio to this account.</p>
                                <a href="/contact" class="btn btn-primary" style="background-color: #1a4d8c;">Contact Us</a>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Fund Name</th>
                                            <th class="text-end">Units Held</th>
                                            <th class="text-end">Avg Cost/Unit</th>
                                            <th class="text-end">Current NAV</th>
                                            <th class="text-end">Current Value</th>
                                            <th class="text-end">Gain/Loss</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($portfolios as $p): ?>
                                            <?php 
                                                $gl = $p['gain_loss'] ?? 0;
                                                $gl_class = $gl >= 0 ? 'text-success' : 'text-danger';
                                            ?>
                                            <tr>
                                                <td class="fw-bold"><?= htmlspecialchars($p['fund_name']) ?></td>
                                                <td class="text-end"><?= number_format($p['units_held'], 4) ?></td>
                                                <td class="text-end">৳ <?= number_format($p['avg_cost'], 2) ?></td>
                                                <td class="text-end">৳ <?= number_format($p['current_nav'], 2) ?></td>
                                                <td class="text-end fw-bold">৳ <?= number_format($p['current_value'], 2) ?></td>
                                                <td class="text-end <?= $gl_class ?>">
                                                    <?= $gl >= 0 ? '+' : '' ?>৳ <?= number_format($gl, 2) ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="/invest/topup?fund=<?= urlencode($p['fund_id']) ?>" class="btn btn-sm btn-outline-primary" title="Buy More">Top Up</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Recent NAV Section -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                        <h5 class="fw-bold" style="color: #1a4d8c;">Latest NAV</h5>
                        <small class="text-muted">As of <?= htmlspecialchars($nav_date ?? date('d M Y')) ?></small>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless table-sm">
                                <tbody>
                                    <?php foreach ($latest_navs ?? [] as $nav): ?>
                                        <tr class="border-bottom">
                                            <td class="py-2">
                                                <span class="d-block fw-bold"><?= htmlspecialchars($nav['fund_short_name'] ?? $nav['fund_name']) ?></span>
                                            </td>
                                            <td class="text-end py-2 align-middle">
                                                <span class="fw-bold" style="color: #1a4d8c;">৳ <?= number_format($nav['nav'], 2) ?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php if (empty($latest_navs)): ?>
                                        <tr>
                                            <td colspan="2" class="text-center text-muted">NAV data unavailable</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-3">
                            <a href="/funds" class="text-decoration-none" style="color: #1a4d8c; font-size: 0.9rem;">View All Funds <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
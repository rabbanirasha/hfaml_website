<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_investorportfolios', function (Blueprint $table) {
            $table->id();
            $table->decimal('unit_holding', 15, 4);
            $table->decimal('total_cost_bdt', 15, 2);
            $table->decimal('current_market_value_bdt', 15, 2);
            $table->decimal('unrealized_gain_loss_bdt', 15, 2);
            $table->date('as_of_date');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_investorportfolios');
    }
};

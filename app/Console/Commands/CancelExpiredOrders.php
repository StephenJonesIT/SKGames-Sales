<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CancelExpiredOrders extends Command
{
    protected $signature = 'orders:cancel-expired';

    protected $description = 'Kiểm tra và hủy các đơn hàng đã hết hạn thanh toán trong 10 phút';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $expiredOrders = DB::table('orders')
            ->where('status', 'Chờ thanh toán')
            ->where('created_at', '<', Carbon::now()->subMinutes(10))
            ->update(['status' => 'Hủy', 'updated_at' => Carbon::now()]);

        $this->info('Đã cập nhật trạng thái cho các đơn hàng hết hạn.');
    }
}

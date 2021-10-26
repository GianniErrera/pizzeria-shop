<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\OrderExtra;

class PruneUnconfirmedOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prune:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prunes old unconfirmed orders and all related records';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $old_orders = Order::where('order_status', 0)->where('created_at', '<=', Carbon::now()->subDays(2))->get();

        foreach($old_orders as $order) {
            $orderlines = OrderLine::where('order_id', $order->id)->get();
            if($orderlines) {
                foreach($orderlines as $orderline) {
                    $orderExtras = OrderExtra::where('order_line_id', $orderline->id)->get();
                    if($orderExtras) {
                        foreach($orderExtras as $orderExtra) {
                            $orderExtra->delete();
                        }
                    }
                    $orderline->delete();
                }
            }

            $order->delete();
        }
    }
}

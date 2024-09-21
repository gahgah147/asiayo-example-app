<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessOrder
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event)
    {
        $data = $event->orderData;

        switch ($data['currency']) {
            case 'TWD':
                OrderTwd::create($data);
                break;
            case 'USD':
                OrderUsd::create($data);
                break;
            case 'JPY':
                OrderJpy::create($data);
                break;
            case 'RMB':
                OrderRmb::create($data);
                break;
            case 'MYR':
                OrderMyr::create($data);
                break;
            // 其他幣別依照類似方式處理 TWD、USD、JPY、RMB、MYR
        }
    }
}

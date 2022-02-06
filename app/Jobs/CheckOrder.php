<?php

namespace App\Jobs;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $checkDue = Order::where('status_id', 1)->where('user_id', $this->user)->get();

        foreach ($checkDue as $row) {
            if (Carbon::parse(explode(' ', Carbon::now())[0])->gt(Carbon::parse($row->due_at))) {
                $order = Order::findOrFail($row->id);
                $order->status_id = 6;
                $order->save();
            }
        }

        $checkSent = Order::where('status_id', 4)->where('user_id', $this->user)->get();

        foreach ($checkSent as $row) {
            if (Carbon::parse(explode(' ', Carbon::now())[0])->gt(Carbon::parse($row->updated_at)->addDays(5))) {
                $order = Order::findOrFail($row->id);
                $order->status_id = 5;
                $order->save();
            }
        }
    }
}

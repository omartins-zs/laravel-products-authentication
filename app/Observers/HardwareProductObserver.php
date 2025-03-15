<?php

namespace App\Observers;

use App\Models\HardwareProduct;

class HardwareProductObserver
{
    /**
     * Handle the HardwareProduct "created" event.
     */
    public function created(HardwareProduct $hardwareProduct): void
    {
        //
    }

    /**
     * Handle the HardwareProduct "updated" event.
     */
    public function updated(HardwareProduct $hardwareProduct): void
    {
        //
    }

    /**
     * Handle the HardwareProduct "deleted" event.
     */
    public function deleted(HardwareProduct $hardwareProduct): void
    {
        //
    }

    /**
     * Handle the HardwareProduct "restored" event.
     */
    public function restored(HardwareProduct $hardwareProduct): void
    {
        //
    }

    /**
     * Handle the HardwareProduct "force deleted" event.
     */
    public function forceDeleted(HardwareProduct $hardwareProduct): void
    {
        //
    }
}

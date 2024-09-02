<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('emails:parse', function () {
    Artisan::call('emails:parse');
})->purpose('Parse raw email content and save to successful_emails table')->hourly();

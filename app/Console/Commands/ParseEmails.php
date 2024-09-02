<?php

namespace App\Console\Commands;

use App\Models\SuccessfulEmail;
use Illuminate\Console\Command;

class ParseEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse raw email content and extract plain text';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $emails = SuccessfulEmail::whereNull('raw_text')->get();

        foreach ($emails as $email) {
            $plainText = $this->extractPlainText($email->email);
            $email->raw_text = $plainText;
            $email->save();
        }

        $this->info('Emails parsed successfully.');
    }

    // Extract the plain text only from the email.
    private function extractPlainText($emailContent)
    {
        return strip_tags($emailContent);
    }
}

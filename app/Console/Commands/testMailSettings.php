<?php
/**
 * NOTICE OF LICENSE
 *
 * UNIT3D is open-sourced software licensed under the GNU General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 * @author     HDVinnie
 */

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Mail\TestEmail;
use App\User;

class testMailSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test email to owner account using the current mail configuration';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $owner = User::where('id', '=', 3)->pluck('email');

        $this->info('Sending Test Email To ' . $owner);
        sleep(5);
        $abort = false;

        try {
            Mail::to($owner)->send(new TestEmail());
        } catch (\Exception $e) {
            $abort = true;
        }

        if ($abort) {
            $this->error('Failed!');
            $this->alert('Email failed to send. Please review your mail configs in the .env file.');
        } else {
            $this->alert('Email Was Successfully Sent!');
        }
    }

}
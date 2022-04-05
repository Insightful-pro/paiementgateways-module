<?php

namespace Modules\PaiementGateways\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class StripeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'stripe:create_endpoint';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create endpoint stripe';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        \Stripe\Stripe::setApiKey(config('paiementgateways.stripe.STRIPE_SECRET'));

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url= url(route('stripe.notifyappsession'));

        $endpoint = \Stripe\WebhookEndpoint::create([
            'url' => $url,
            'enabled_events' => [
               'payment_intent.canceled',
               'payment_intent.payment_failed',
               'payment_intent.succeeded',
            ],
          ]);
         if (isset($endpoint->secret))
         {
             echo $endpoint->secret."\n";

         }
         else
         {
            print_r($endpoint) ;
         }

        return 0;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */

}

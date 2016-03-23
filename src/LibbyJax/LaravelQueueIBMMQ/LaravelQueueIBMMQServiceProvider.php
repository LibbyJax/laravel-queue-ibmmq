<?php

namespace LibbyJax\LaravelQueueRabbitMQ;

use Illuminate\Support\ServiceProvider;
use LibbyJax\LaravelQueueRabbitMQ\Queue\Connectors\IBMMQConnector;

class LaravelQueueIBMMQServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/ibmmq.php', 'queue.connections.ibmmq'
        );
    }

    /**
     * Register the application's event listeners.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * @var \Illuminate\Queue\QueueManager $manager
         */
        $manager = $this->app['queue'];
        $manager->addConnector('ibmmq', function () {
            return new IBMMQConnector;
        });
    }

}

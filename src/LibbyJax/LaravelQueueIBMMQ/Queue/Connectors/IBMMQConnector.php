<?php

namespace LibbyJax\LaravelQueueIBMMQ\Queue\Connectors;

use Illuminate\Queue\Connectors\ConnectorInterface;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use LibbyJax\LaravelQueueIBMMQ\Queue\IBMMQQueue;

class IBMMQConnector implements ConnectorInterface
{

	/**
	 * Establish a queue connection.
	 *
	 * @param  array $config
	 *
	 * @return \Illuminate\Contracts\Queue\Queue
	 */
	public function connect(array $config)
	{
		// create connection with AMQP
		$connection = new AMQPStreamConnection($config['host'], $config['port'], $config['login'], $config['password'],
				$config['vhost']);

		return new IBMMQQueue(
			$connection,
			$config
		);
	}

}

<?php

/**
 * default configuration for laravel-queue-rabbitmq merged with project config to base key 'queue'
 * @see \MapleSyrupGroup\AMQPEvents\Providers\AMQPEventServiceProvider
 */
return [

    'driver' => 'ibmmq',

    'host' => env('IBMMQ_HOST', '127.0.0.1'),
    'port' => env('IBMMQ_PORT', 5672),

    'vhost' => env('IBMMQ_VHOST', '/'),
    'login' => env('IBMMQ_LOGIN', 'guest'),
    'password' => env('IBMMQ_PASSWORD', 'guest'),

    'queue' => env('IBMMQ_QUEUE'), // name of the default queue,

    'exchange_declare' => env('IBMMQ_EXCHANGE_DECLARE', true), // create the exchange if not exists
    'queue_declare_bind' => env('IBMMQ_QUEUE_DECLARE_BIND', true), // create the queue if not exists and bind to the exchange

    'queue_params' => [
        'passive' => env('IBMMQ_QUEUE_PASSIVE', false),
        'durable' => env('IBMMQ_QUEUE_DURABLE', true),
        'exclusive' => env('IBMMQ_QUEUE_EXCLUSIVE', false),
        'auto_delete' => env('IBMMQ_QUEUE_AUTODELETE', false),
    ],
    'exchange_params' => [
        'name' => env('IBMMQ_EXCHANGE_NAME', null),
        'type' => env('IBMMQ_EXCHANGE_TYPE', 'direct'), // more info at http://www.rabbitmq.com/tutorials/amqp-concepts.html
        'passive' => env('IBMMQ_EXCHANGE_PASSIVE', false),
        'durable' => env('IBMMQ_EXCHANGE_DURABLE', true), // the exchange will survive server restarts
        'auto_delete' => env('IBMMQ_EXCHANGE_AUTODELETE', false),
    ],

];

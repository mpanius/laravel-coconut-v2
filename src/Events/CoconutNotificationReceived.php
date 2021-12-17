<?php

namespace Nidhalkratos\LaravelCoconut\Events;


use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class CoconutNotificationReceived
{
    use Dispatchable, SerializesModels;

    public $videoId;
    public Array $params;

    public function __construct($videoId, Array $params)
    {
        $this->videoId = $videoId;
        $this->params = $params;
    }
}
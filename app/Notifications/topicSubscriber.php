<?php


namespace App\Notifications;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Promise\Utils;

class topicSubscriber
{
    protected $data;
    protected $url;

    /**
     * topicSubscriber constructor.
     */
    public function __construct()
    {
    }

    public function data($data) {
        $this->data = $data;
        return $this;
    }
    public function url($url) {
        $this->url = $url;
        return $this;
    }

    public function send() {
        $client = new Client();

        $subscriber = $client->requestAsync('POST', $this->url, [
            'body' => $this->data
        ]);

        Utils::settle($subscriber)->wait();
    }
}

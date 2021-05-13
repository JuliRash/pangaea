<?php


namespace App\Notifications;


use Illuminate\Support\Facades\Http;

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
//        implement logic to send notification here.
        return Http::post($this->url, ['message' => 'hello']);
    }
}

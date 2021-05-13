<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublishRequest;
use App\Models\Subscriber;
use App\Notifications\PublishTopic;
use App\Notifications\SubscriberTopic;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Promise\Utils;

class PublisherController extends Controller
{
    public function publishTopic(PublishRequest $request, $topic)
    {
        $message = collect($request->only('message'));
        $subscribers = Subscriber::where('topic', $topic)->get();
        if($subscribers->count() >= 1){
            // send notification: php artisan notification
            foreach($subscribers as $subscriber) {
                $subscriber->notify(new SubscriberTopic($subscriber->url, $message));
            }
            return response()->json(['topic' => $topic, 'message' => $message['message']]);
        }else {
            return response()->json([
                'status' => 'false',
                'message' => 'no subscriber with that topic was found'
            ]);
        }

    }
}

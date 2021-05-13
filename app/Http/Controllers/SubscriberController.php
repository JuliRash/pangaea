<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscribeTopic(TopicRequest $request, $topic): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();

        $URL = $validated['url'];

        Subscriber::create([
          'url'=> $URL,
          'topic' => $topic
        ]);

        return response()->json(['url' => $URL, 'topic' => $topic]);
    }
}

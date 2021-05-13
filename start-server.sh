#!/usr/bin/bash
# Description: Creates topic and allow subscribed users to receive notification.

curl -X POST -H "Content-Type: application/json" -d '{ "url": "http://localhost:8001"}' http://localhost:8000/subscribe/topic1
curl -X POST -H "Content-Type: application/json" -d '{ "url": "http://localhost:8002"}' http://localhost:8000/subscribe/topic1
curl -X POST -H "Content-Type: application/json" -d '{"message": "hello"}' http://localhost:8000/publish/topic1

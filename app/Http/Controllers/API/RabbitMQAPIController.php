<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMQAPIController extends AppBaseController
{

   /**
     * @OA\Get(
     *     path="/api/rabbitmq/{channel}",
     *     operationId="getMessageByChannel",
     *     tags={"Messages"},
     *     summary="Get a message by channel",
     *     description="Consumes a message from the specified channel",
     *     @OA\Parameter(
     *         name="channel",
     *         in="path",
     *         description="Name of the channel to get the message from",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="string", example="Message content"),
     *             @OA\Property(property="message", type="string", example="Message retrieved successfully"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Channel not found or no message available",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", example="No message available"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Unexpected error",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", example="Unexpected error"),
     *         )
     *     ),
     * )
     *
     * @param string $channel
     * 
     * @return JsonResponse
     */
    public function show(String $channel_name): JsonResponse
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare($channel_name, false, false, false, false);

        try {
            $message = $channel->basic_get($channel_name);
            $channel->basic_ack($message->delivery_info['delivery_tag']);
            $channel->close();
        } catch (\Throwable $exception) {
            return $this->sendError('Unexpected error: '.$exception->getMessage(), 500);
        }

        return $this->sendResponse($message->body, 'Message retrieved successfully');
    }


}

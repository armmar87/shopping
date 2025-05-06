<?php

namespace App\Http\Controllers;

use App\Domain\Order\DTOs\CreateOrderDTO;
use App\Domain\Order\DTOs\OrderItemDTO;
use App\Domain\Order\Entities\Order;
use App\Http\Controllers\Api\CreateOrderRequest;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Client\Request;

class OrderController
{


    public function index(Request $request)
    {
        $user = $request->get('auth_user');

        $orders = Order::where('user_id', $user['id'])->latest()->get();

        return OrderResource::collection($orders);
    }

    public function store(CreateOrderRequest $request)
    {
        $user = $request->get('auth_user');

        $dto = new CreateOrderDTO(
            userId: $user['id'],
            items: collect($request->validated()['products'])
                ->map(fn($p) => new OrderItemDTO($p['product_id'], $p['quantity']))
                ->toArray()
        );

        $order = $this->orderService->createOrder($dto);

        return new OrderResource($order);
    }
    public function show(Request $request, string $externalId)
    {
        $user = $request->get('auth_user');

        $order = Order::where('external_id', $externalId)
            ->where('user_id', $user['id'])
            ->firstOrFail();

        return new OrderResource($order);
    }
}

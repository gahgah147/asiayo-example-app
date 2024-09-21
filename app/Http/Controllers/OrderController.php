<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function store(StoreOrderRequest $request)
    {
        // 立即返回 200 HTTP 狀態
        event(new OrderCreated($request->validated()));
        return response()->json(['message' => 'Order processing'], 200);
    }

    public function show($id)
    {
        // 查詢邏輯依據 currency 決定資料表
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRequest;
use Illuminate\Support\Carbon;


class RequestController extends Controller
{
    public function index(Request $request)
    {
        // $todayDate = '2023-03-13';  //Carbon::now();
        // $orders = Order::whereDate('created_at', $todayDate)->paginate(10);

        $todayDate = Carbon::now()->format('Y-m-d');
        $requests = UserRequest::when($request->date != null, function ($q) use ($request) {

            return $q->whereDate('created_at', $request->date);
        }, function ($q) use ($todayDate) {

            return $q->whereDate('created_at', $todayDate);
        })
            ->when($request->status != null, function ($q) use ($request) {

                return $q->where('status_message', 'LIKE', '%' . $request->status . '%');
            })
            ->paginate(10);


        return view('admin.requests.index', compact('orders'));
    }
    public function updateRequestStatus(int $orderId, Request $request)
    {
        $request = UserRequest::where('id', $orderId)->first();
        if ($request) {
            $request->update([
                'status_message' => $request->request_status
            ]);

            return redirect('admin/requests/' . $orderId)->with('message', 'Request Status Updated Successfully!');
        } else {
            return redirect('admin/requests/' . $orderId)->with('message', 'Request not found');
        }
    }
}

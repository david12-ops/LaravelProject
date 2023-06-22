<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NotificationController extends Controller
{
    public function showNotification(Request $request): View
    {

        $message = $request->session()->get('success');
        return view('notification', ['message' => $message]);
    }
}

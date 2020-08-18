<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\PushDemo;
use App\User;
use Auth;
use Notification;

class PushController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }

    /**
     * Store the PushSubscription.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        $this->validate($request,[
            'endpoint'    => 'required',
            'keys.auth'   => 'required',
            'keys.p256dh' => 'required'
            
        ]);
        $content_encoding = $request->content_encoding;
        $endpoint = $request->endpoint;
        $token = $request->keys['auth'];
        $key = $request->keys['p256dh'];
        $user = Auth::user();
        
        // $user = Guest::firstOrCreate([
        //     'endpoint' => $endpoint
        // ]);

        $user->updatePushSubscription($endpoint, $key, $token, $content_encoding);
        
        return response()->json(['success' => true],200);
    }

    /**
     * Send Push Notifications to all users.
     * 
     * @return \Illuminate\Http\Response
     */
    public function push(){
        Notification::send(User::all(),new PushDemo);
        return redirect()->back();
    }
    
}
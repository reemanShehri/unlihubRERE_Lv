<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //


    public function send(){


        // if single admin
        // $admin=User::find(1);
        // $admin->notify(new NewOrderNotification());

        // if many admins
        $admins=User::where('role','admin')->get();
        Notification::send($admins, new NewPostNotification('user','post','new'));
        // foreach($admins as $admin){
        //     $admin->notify(new NewOrderNotification());
        // }


        return 'done ::';


    }




    public function send2(){


        // if single admin
        // $admin=User::find(1);
        // $admin->notify(new NewOrderNotification());

        // if many admins
        $admins=User::where('type','admin')->get();
        Notification::send($admins, new NewPostNotification());
        // foreach($admins as $admin){
        //     $admin->notify(new NewOrderNotification());
        // }


        return 'done Notification::send ::';


    }
}

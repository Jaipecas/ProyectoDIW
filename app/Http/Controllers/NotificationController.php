<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Notification;

class NotificationController extends Controller
{
     /**
     * Modifica el estado de la notificacion
     *
     * @param  $id identificador de la notificación
     * @param  $request Nuevo estado
     * @param  Request  $request
     * @return Response
     */
    public function update($id, $state, Request $request) {
    
        $user = Auth::user();

        if ($state != 'delete' && $state != 'unread' && $state != 'read')
            return response('State not valid', 406);

        // compruebo si la notificación existe
        try {
            $notification = Notification::findOrFail($id);
        }
        catch(ModelNotFoundException $err){
            return response('Notification not found', 404);
        }
        $notification_owner = $notification->user()->get(['id']);
        
        if ($notification_owner->first()->id != $user->id)
            return response('Access denied to notification', 403);
        
        // si la notificacion esta conel estado que se pretende -> error
        if ($notification->state == $state) {
            $error = "Notification already ".$state.($state == 'delete' ? "d" : "");
            return response($error, 409);
        }
           
        $notification->state = $state;
        $notification->save();
        $msg = "Notification checked as ".$state.($state == 'delete' ? "d" : "");
        return response($msg, 200);
    }
}

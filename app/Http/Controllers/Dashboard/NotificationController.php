<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NotificationController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->user()->role == 0){
        
            $notifications = Notification::whenSearch(request()->search)->latest()->paginate(50);

            return view('dashboard.notifications.index',compact('notifications'));

        } else {

            return view('error');
        }

    }//end of index

    
    public function create()
    {
        return view('dashboard.notifications.create');

    }//end of create

   
    public function store(Request $request)
    {
        $request->validate([
            'title_ar'    => ['required','max:40'],
            'title_en'    => ['required','max:40'],
            'message_ar'  => ['required'],
            'message_en'  => ['required'],
        ]);

        $request['admin_id'] = auth()->guard('admin')->user()->id;
        Notification::create($request->all());

        session()->flash('success', __('dashboard.added_successfully'));
        return redirect()->route('notifications.index');   

    }//end of store

    
    public function edit(Notification $notification)
    {
        return view('dashboard.notifications.edit',compact('notification'));

    }//end of edit

    
    public function update(Request $request, Notification $notification)
    {
       $request->validate([
            'title_ar'    => ['required','max:40'],
            'title_en'    => ['required','max:40'],
            'message_ar'  => ['required'],
            'message_en'  => ['required'],
        ]);

        $request['admin_id'] = auth()->guard('admin')->user()->id;
        $notification->update($request->all());

        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->route('notifications.index');   

    }//end of update

    
    public function destroy(Notification $notification)
    {
        $notification->delete();

        session()->flash('success', __('dashboard.deleted_successfully'));
        return redirect()->route('notifications.index');   

    }//end of destroy

}//end of controller

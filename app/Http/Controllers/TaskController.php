<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    
    public function index()
    {
        $data = [];
        $task = new Task();
        $data['importances'] = $task->allImportanceName();
        $data['tasks'] = Task::all();
        return view('tasks.index')->with($data);
    }

    public function store(Request $request){
        $rules =[ 
            'title'=>'required'
         ];
         $messages = [
            'required' => 'این فیلد ضروری است'
         ];
         $request->validate($rules,$messages);

         Task::create($request->all());

         session()->flash('msg','وظیفه اضافه شد');

         return redirect(route('home'));
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $title = $task->title;
        Task::destroy($id);
        
        return redirect()->back()->with('msg-remove',$title.' حذف شد');
    }

}

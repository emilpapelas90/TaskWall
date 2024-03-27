<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\TaskActions;
use App\Models\TaskActions2;
use App\Models\Ads;
use App\Models\AdsPacks;
use App\Models\User;
use App\Models\Actions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;

class AdvertiserController extends Controller
{

    public function dashboard(){
      return view('advertiser.dashboard');
    }

    public function tasks(){
    
      return view('advertiser.tasks.view', 
       ['tasks' => SpladeTable::for(Tasks::where('user_id', Auth::id()))
        ->column('details', sortable: true, canBeHidden: false)
        ->withGlobalSearch(columns: ['name'])
        ->paginate(2)
      ]);
    }

    public function create(){

      $category = [
          ['id' => '1', 'name' => 'Social Media Engagement'],
          ['id' => '2', 'name' => 'Watch a Video'],
          ['id' => '3', 'name' => 'Register'],
          ['id' => '4', 'name' => 'Comment'],
          ['id' => '5', 'name' => 'Other'],
      ];
    
      $actions = Actions::select('id', 'key', 'value')->get()->toArray();
    
      $fees = 2;
    
      $proof_type = [
        'screenshot' => 'Screenshot',
        'text_input' => 'Text Input',
        'both' => 'Screenshot and Text Input',
      ];
    
    
      $approval_time = [
        ['key' => '30', 'value' => '30 Min'],
        ['key' => '60', 'value' => '1 Hour'],
        ['key' => '360', 'value' => '6 Hours'],
        ['key' => '720', 'value' => '12 Hours'],
        ['key' => '1440', 'value' => '1 Day'],
        ['key' => '5760', 'value' => '4 Days'],
  
      ];
        
      $submission_time = [
        ['key' => '1', 'value' => '1 Min'],
        ['key' => '2', 'value' => '2 Min'],
        ['key' => '3', 'value' => '3 Min'],
        ['key' => '4', 'value' => '4 Min'],
        ['key' => '5', 'value' => '5 Min'],
        ['key' => '6', 'value' => '6 Min'],
        ['key' => '7', 'value' => '7 Min'],
        ['key' => '8', 'value' => '8 Min'],
        ['key' => '9', 'value' => '9 Min'],
        ['key' => '10', 'value' => '10 Min'],
        ['key' => '11', 'value' => '11 Min'],
        ['key' => '12', 'value' => '12 Min'],
        ['key' => '13', 'value' => '13 Min'],
        ['key' => '14', 'value' => '14 Min'],
        ['key' => '15', 'value' => '15 Min'],
        ['key' => '16', 'value' => '16 Min'],
        ['key' => '17', 'value' => '17 Min'],
        ['key' => '18', 'value' => '18 Min'],
        ['key' => '19', 'value' => '19 Min'],
        ['key' => '20', 'value' => '20 Min'],
        ['key' => '21', 'value' => '21 Min'],
        ['key' => '22', 'value' => '22 Min'],
        ['key' => '23', 'value' => '23 Min'],
        ['key' => '24', 'value' => '24 Min'],
        ['key' => '25', 'value' => '25 Min'],
      ];
    
      return view('advertiser.tasks.create', ['category' => $category, 'actions' => $actions, 'fees' => $fees, 'proof_type' => $proof_type, 'approval_time' => $approval_time, 'sub_time' => $submission_time]);
    }

    public function add_task(Request $req){

      $actions = Actions::select('id', 'key', 'value')->get()->toArray();
    
      $request = $req->validate([
        'name' => 'required|min:10|max:150',
        'category' => 'required',
        'thumbnail' => 'required|mimes:jpg,jpeg,png',
        'task_req' => 'required|min:15',
        'proof_req' => 'required|min:15',
        'proof_type' => 'required',
        'approval_time' => 'required|numeric',
        'submission_time' => 'required|numeric',
        'budget' => 'required|numeric',
        'limit' => 'required|numeric',
        'daily_submission' => 'required|numeric'
      ]);
    
        // $req_actions = $req->validate([
        //   'action' => 'required',
        //   'action_1' => 'nullable',
        //   'action_2' => 'nullable',
        //   'action_3' => 'nullable',
        //   'action_4' => 'nullable',
        // ]);
    
      if ($req->file()) {
        try {
          $file_name = time() . '_' . $req->file('thumbnail')->extension();
          $file_path = $req->file('thumbnail')->storeAs('task_thumbnails', $file_name, 'public');
          $request['thumbnail'] = '/storage/' . $file_path;
        } catch (\Exception $e) {
          return response()->json(['error' => 'File upload failed.'], 500);
        }
      }
    
      $task_req = $req['task_req'];
  
      $requirementsArray = explode('.', $task_req);
      $formattedRequirements = [];
  
      foreach ($requirementsArray as $index => $requirement) {
        $requirement = trim($requirement);
        if (!empty($requirement)) {
          $formattedRequirements[] = ["id" => $index + 1, "req" => $requirement];
        }
      }
  
      $jsonFormattedRequirements = json_encode($formattedRequirements);

    
        // $action_ids = array_values($req_actions);
    
        // $action_id = array_filter($action_ids, function($value) {
        //   return !is_null($value);
        // });
    
        // $actionCounts = array_count_values($action_id);
    
        // $filteredActions = [];
    
        // foreach ($actionCounts as $actionId => $count) {
        //   // Fetch the corresponding action from the $actions collection
        //   $action = collect($actions)->firstWhere('id', $actionId);
      
        //   // If action is found, calculate the sum of its value multiplied by its count
        //   if ($action) {
        //     // Calculate the sum of value * count
        //     $sum = $action['value'] * $count;
        //     // Add the action to the filteredActions array with the calculated sum
        //     $filteredActions[] = [
        //       'id' => $action['id'],
        //       'key' => $action['key'],
        //       'value' => $sum,
        //     ];
        //   }
        // }
    
        //$totalValue = array_sum(array_column($filteredActions, 'value'));
    
      $request['user_id'] = Auth::user()->id;
      $request['task_req'] = $jsonFormattedRequirements;
      $request['reward'] =  100; //$totalValue;
      $request['status'] = 0;
  

      $task = Tasks::create($request);
        

        // $req_actions['task_id'] = $task->id;
        // $req_actions['action_1'] = $req->get('action_1') ?? 0;
        // $req_actions['action_2'] = $req->get('action_2') ?? 0;
        // $req_actions['action_3'] = $req->get('action_3') ?? 0;
        // $req_actions['action_4'] = $req->get('action_4') ?? 0;
    
       //TaskActions::create($req_actions);

       $actionIds = $req['action'];

       
       foreach($actionIds as $action){

         $taskAction = new TaskActions2();

         $taskAction->user_id = Auth::id();
         $taskAction->task_id = $task->id;
         $taskAction->action_id = $action;

         //dd($taskAction);
         $taskAction->save();
       } 

       //TaskActions2::create($req_actions);

       Toast::message('Task Successfully Created')->success()->rightBottom()->autoDismiss(3);
       return redirect()->route('tasks');
    }

    public function edit($id){

      $task = Tasks::with('actions')->find($id);  
      
    //dd($task->actions->pluck('id')->toArray());
       //unset($task->actions);
       //dd($task);

      // if ($task) {
      //   $taskArray = $task->toArray();
      //   $actionsArray = $task->actions->toArray();
  
      //   $taskReqArray = json_decode($taskArray['task_req'], true);
      //   $req = $taskReqArray[0]['req'] ?? null;
      //   $newTaskReq = ['task_req' => $req];
  
      //   unset($actionsArray[0]['id']);
      //   $newtask = array_merge($taskArray, $newTaskReq, $actionsArray[0]);
      // }
    
      $category = [
        ['id' => '1', 'name' => 'Social Media Engagement'],
        ['id' => '2', 'name' => 'Watch a Video'],
        ['id' => '3', 'name' => 'Register'],
        ['id' => '4', 'name' => 'Comment'],
        ['id' => '5', 'name' => 'Other'],
      ];
    

      $actions = Actions::select(['id', 'key'])->get()->map(function ($pack) {
          return [
              'id' => $pack['id'],
              'key' => $pack['key'],
        ];})->toArray();


    
      $fees = 2;
    
      $proof_type = [
        'screenshot' => 'Screenshot',
        'text_input' => 'Text Input',
        'both' => 'Screenshot and Text Input',
      ];
    
      $approval_time = [
        ['key' => '30', 'value' => '30 Min'],
        ['key' => '60', 'value' => '1 Hour'],
        ['key' => '360', 'value' => '6 Hours'],
        ['key' => '720', 'value' => '12 Hours'],
        ['key' => '1440', 'value' => '1 Day'],
        ['key' => '5760', 'value' => '4 Days'],
  
      ];
      
      $submission_time = [
        ['key' => '1', 'value' => '1 Min'],
        ['key' => '2', 'value' => '2 Min'],
        ['key' => '3', 'value' => '3 Min'],
        ['key' => '4', 'value' => '4 Min'],
        ['key' => '5', 'value' => '5 Min'],
        ['key' => '6', 'value' => '6 Min'],
        ['key' => '7', 'value' => '7 Min'],
        ['key' => '8', 'value' => '8 Min'],
        ['key' => '9', 'value' => '9 Min'],
        ['key' => '10', 'value' => '10 Min'],
        ['key' => '11', 'value' => '11 Min'],
        ['key' => '12', 'value' => '12 Min'],
        ['key' => '13', 'value' => '13 Min'],
        ['key' => '14', 'value' => '14 Min'],
        ['key' => '15', 'value' => '15 Min'],
        ['key' => '16', 'value' => '16 Min'],
        ['key' => '17', 'value' => '17 Min'],
        ['key' => '18', 'value' => '18 Min'],
        ['key' => '19', 'value' => '19 Min'],
        ['key' => '20', 'value' => '20 Min'],
        ['key' => '21', 'value' => '21 Min'],
        ['key' => '22', 'value' => '22 Min'],
        ['key' => '23', 'value' => '23 Min'],
        ['key' => '24', 'value' => '24 Min'],
        ['key' => '25', 'value' => '25 Min'],
      ];
    
      $requirements = json_decode($task->task_req, true);
      $task_req = [];
      foreach ($requirements as $requirement) {
        $task_req[] = $requirement['req'];
      }
      $task_req = implode(PHP_EOL, $task_req);
    
     //'task' => $newtask
     //dd($task);
      return view('advertiser.tasks.edit', ['task' => $task, 'category' => $category, 'actions' => $actions, 'fees' => $fees, 'proof_type' => $proof_type, 'approval_time' => $approval_time, 'sub_time' => $submission_time]);
    }
      
    public function update(Request $req, $id){
    
      $task = Tasks::findOrFail($id);
      $actions = Actions::select('id', 'key', 'value')->get()->toArray();
  
      $requestData = $req->validate([
        'name' => 'required|min:10|max:150',
        'category' => 'required',
        'task_req' => 'required|min:15',
        'proof_req' => 'required|min:15',
        'proof_type' => 'required',
        'approval_time' => 'required|numeric',
        'submission_time' => 'required|numeric',
        'budget' => 'required|numeric',
        'limit' => 'required|numeric',
        'daily_submission' => 'required|numeric'
      ]);
    
      // $req_actions = $req->validate([
      //   'action' => 'required',
      //   'action_1' => 'nullable',
      //   'action_2' => 'nullable',
      //   'action_3' => 'nullable',
      //   'action_4' => 'nullable',
      // ]);
    
        
      if ($req->hasFile('thumbnail')) {
      
        Storage::disk('public')->delete(str_replace('/storage/', '', $task->thumbnail));
      
        try {
          $file_name = time() . '_' . $req->file('thumbnail')->extension();
          $file_path = $req->file('thumbnail')->storeAs('task_thumbnails', $file_name, 'public');
          $requestData['thumbnail'] = '/storage/' . $file_path;
        } catch (\Exception $e) {
          return response()->json(['error' => 'File upload failed.'], 500);
        }
      } else {
        $requestData['thumbnail'] = $task->thumbnail;
      }
  
      $task_req = $req['task_req'];
  
      $requirementsArray = explode('.', $task_req);
      $formattedRequirements = [];
  
      foreach ($requirementsArray as $index => $requirement) {
        $requirement = trim($requirement);
        if (!empty($requirement)) {
          $formattedRequirements[] = ["id" => $index + 1, "req" => $requirement];
        }
      }
  
      $jsonFormattedRequirements = json_encode($formattedRequirements);
  
      $action_ids = array_values($req_actions);
  
      $action_id = array_filter($action_ids, function($value) {
        return !is_null($value);
      });
  
      $actionCounts = array_count_values($action_id);
  
      $filteredActions = [];
  
      foreach ($actionCounts as $actionId => $count) {
        // Fetch the corresponding action from the $actions collection
        $action = collect($actions)->firstWhere('id', $actionId);
    
        // If action is found, calculate the sum of its value multiplied by its count
        if ($action) {
          // Calculate the sum of value * count
          $sum = $action['value'] * $count;
          // Add the action to the filteredActions array with the calculated sum
          $filteredActions[] = [
            'id' => $action['id'],
            'key' => $action['key'],
            'value' => $sum,
          ];
        }
      }
    
      $totalValue = array_sum(array_column($filteredActions, 'value'));
  
    
      $requestData['task_req'] = $jsonFormattedRequirements;
      $requestData['reward'] =  $totalValue;
      $requestData['status'] = 0;
  
      $task->update($requestData);
      
      $req_actions['task_id'] = $task->id;
      $req_actions['action_1'] = $req->get('action_1') ?? 0;
      $req_actions['action_2'] = $req->get('action_2') ?? 0;
      $req_actions['action_3'] = $req->get('action_3') ?? 0;
      $req_actions['action_4'] = $req->get('action_4') ?? 0;
  
      $task_actions = TaskActions::where('task_id', $task->id)->first();
      $task_actions->update($req_actions);
    
      Toast::message('Task Successfully Updated')->success()->rightBottom()->autoDismiss(3);
  
      return redirect()->route('tasks');
    }
}

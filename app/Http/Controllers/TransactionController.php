<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        if (!empty($request->description)) {
            $task = new Task();
            $task->description = $request->description;
            $task->status = 0;
            $task->save();
            toastr()->success("Successfull created !");
            return redirect()->back();
        } else {
            toastr()->error("Not empty description");
            return redirect()->back();
        }
    }
    public function update(Request $request, $id)
    {

        $selection_task = Task::where("id", $id)->first();
        $selection_task->status = $request->status;
        $selection_task->save();
        $response["success"] = "Successfull updated !";
        return response()->json($response);
    }
}

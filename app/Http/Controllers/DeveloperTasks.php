<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\DeveloperTask;
use App\Models\Task;
use App\Services\DeveloperTaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeveloperTasks extends Controller
{


    public function home()
    {
        $result = new DeveloperTaskService();

        $plans = $result->show_plans();

        //return $plans;

        return view('tasks', ['plans' => $plans]);
    }
}

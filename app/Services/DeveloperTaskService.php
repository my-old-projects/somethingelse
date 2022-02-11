<?php

namespace App\Services;

use App\Models\Developer;
use App\Models\DeveloperTask;
use App\Models\Task;

class DeveloperTaskService
{
    private $weekly_working_hours = 45;

    private function ShowPlan($taskList, $developers, $totalTaskSum)
    {

        $tasks = [];

        $plan_duration = $this->TotalDuration($developers, $totalTaskSum);

        for ($week = 1; $week <= $plan_duration; $week++) {
            foreach ($developers as $developer) {

                $hours = 0;
                foreach ($taskList as $key => $task) {

                    $isValidDurationRange = $hours + $task["duration"] <= $this->weekly_working_hours && $task["level"] <= $developer->duration;

                    if ($isValidDurationRange) {
                        $task_name = $task["name"];

                        DeveloperTask::updateOrCreate([
                            'developer_id' => $developer->id,
                            'task_id' => $task['id']
                        ]);

                        $tasks["Week: {$week}"][$developer->name][] = "{$task_name}";
                        unset($taskList[$key]);
                        $hours += $task["duration"];
                    }
                }
            }
            if (empty($taskList)) {
                break;
            }
        }

        $result = [
            'average_duration' => $plan_duration,
            'average_week_for_all_jobs' => sizeof(array_keys($tasks)),
            'tasks' => $tasks,
            'developers' => $developers,
        ];
        return $result;
    }

    private function TotalDuration($developers, $totalTaskSum)
    {

        return round($totalTaskSum / ($this->weekly_working_hours * count($developers)));
    }

    public function show_plans()
    {
        $tasks = Task::orderByDesc('level')->get();

        $developers = Developer::all();
        $totalTaskSum = Task::sum('duration');
        $results = $this->ShowPlan($tasks, $developers, $totalTaskSum);

        return $results;
    }
}

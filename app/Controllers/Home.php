<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data = [
            'tasks' => $taskModel->getTodayTasks(),
            'today' => date('F d, Y')
        ];

        return view('home', $data);
    }
}
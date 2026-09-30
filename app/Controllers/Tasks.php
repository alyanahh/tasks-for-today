<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    // READ
    public function index()
    {
        $data = [
            'tasks' => $this->taskModel->getAllTasks()
        ];

        return view('tasks/index', $data);
    }

    // SHOW CREATE FORM
    public function new()
    {
        return view('tasks/new');
    }

    // CREATE
    public function create()
    {
        $rules = [
            'title' => 'required',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->insert([
            'title'       => $this->request->getPost('title'),
            'status'      => $this->request->getPost('status'),
            'task_date'   => $this->request->getPost('task_date'),
            'is_archived' => 0,
            'created_at'  => date('Y-m-d H:i:s')
        ]);

        return redirect()
            ->to(site_url('tasks'))
            ->with('success', 'Task created successfully.');
    }

    // SHOW EDIT FORM
    public function edit($id)
    {
        $task = $this->taskModel->find($id);

        if (!$task || $task['is_archived'] == 1) {
            return redirect()->to(site_url('tasks'));
        }

        return view('tasks/edit', [
            'task' => $task
        ]);
    }

    // UPDATE
    public function update($id)
    {
        $rules = [
            'title' => 'required',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()
            ->to(site_url('tasks'))
            ->with('success', 'Task updated successfully.');
    }

    // SOFT DELETE / ARCHIVE
    public function delete($id)
    {
        $task = $this->taskModel->find($id);

        if (!$task) {
            return redirect()->to(site_url('tasks'));
        }

        $this->taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()
            ->to(site_url('tasks'))
            ->with('success', 'Task archived successfully.');
    }
}
<?php

namespace Tests\Feature;

use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;

class testPostTaskController extends TestCase
{
    /**
     * Teste la bonne attribution des variables avec le controlleur
     */
    public function test_create_task(): void
    {
        $taskPostController = new TaskController();

        //Creation de la requête
        $requestData = [
            'name' => 'Test',
            'description' => 'Description of the task',
            'deadline' => '2023-12-31',
            'priority' => 1,
            'project_id' => Project::all()->first()->id
        ];

        $request = new Request($requestData);

        $result = json_decode($taskPostController->post($request), true);
        $this->assertEquals('Test', $result['name']);
        $this->assertEquals('Description of the task', $result['description']);
        $this->assertEquals('2023-12-31', $result['deadline']);
        $this->assertEquals(0, $result['status']);
        $this->assertEquals(1, $result['priority']);
        $this->assertEquals(Project::all()->first()->id, $result['project_id']);
        Task::find($result['id'])->delete();
    }

    /**
     * Teste la création de la tâche dans la BDD avec le controlleur Post
     */
    public function test_create_database_task(): void
    {
        $taskPostController = new TaskController();

        //Creation de la requête
        $requestData = [
            'name' => 'Test2',
            'description' => 'Description of the task test2',
            'deadline' => '2023-12-31',
            'priority' => 1,
            'project_id' => Project::all()->first()->id
        ];

        $request = new Request($requestData);

        $result = json_decode($taskPostController->post($request), true);
        $this->assertNotNull(Task::find($result['id']));
        if($task = Task::find($result['id'])){
            $task->delete();
        }
    }
}

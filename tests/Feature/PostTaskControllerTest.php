<?php

namespace Tests\Feature;

use App\Http\Controllers\TaskController;
use Tests\TestCase;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;

class PostTaskControllerTest extends TestCase
{
    /**
     * Teste l'existance de la tâche et la bonne attribution des variables avec le controlleur
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
        $this->assertNotNull(Task::find($result['id']));
        $this->assertEquals('Test', $result['name']);
        $this->assertEquals('Description of the task', $result['description']);
        $this->assertEquals('2023-12-31', $result['deadline']);
        $this->assertEquals(0, $result['status']);
        $this->assertEquals(1, $result['priority']);
        $this->assertEquals(Project::all()->first()->id, $result['project_id']);

        if($task = Task::find($result['id'])){
            $task->delete();
        }
    }

}

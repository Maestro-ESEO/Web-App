<?php

namespace Tests\Feature;

use App\Http\Controllers\TaskController;
use App\Models\UserProject;
use Tests\TestCase;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostTaskControllerTest extends TestCase
{
    /**
     * Teste l'existance de la tâche et la bonne attribution des variables avec le controlleur
     * L'utilisateur qui créé la tâche est administrateur du projet
     */
    public function test_create_task(): void
    {
        $taskPostController = new TaskController();
        $userProject = fake()->randomElement(UserProject::where("is_admin", true)->get());
        $user = User::find($userProject->user_id);
        $this->actingAs($user);

        //Creation de la requête
        $requestData = [
            'name' => 'Test',
            'description' => 'Description of the task',
            'deadline' => '2023-12-31',
            'priority' => 1,
            'project_id' => $userProject->project_id
        ];

        $request = new Request($requestData);

        $result = json_decode($taskPostController->store($request)->getContent(), true);
        $this->assertEquals(200, $result['status']);
        $data = $result['data'];
        $this->assertNotNull(Task::find($data['id']));
        $this->assertEquals('Test', $data['name']);
        $this->assertEquals('Description of the task', $data['description']);
        $this->assertEquals('2023-12-31', $data['deadline']);
        $this->assertEquals(0, $data['status']);
        $this->assertEquals(1, $data['priority']);
        $this->assertEquals($userProject->project_id, $data['project_id']);

        if($task = Task::find($data['id'])){
            $task->delete();
        }
    }

    /**
     * Teste la levée d'erreur, si le créateur de la tâche n'est pas administrateur du projet
     */
    public function test_create_task_member_project()
    {
        $taskPostController = new TaskController();
        $userProject = fake()->randomElement(UserProject::where("is_admin", false)->get());
        $user = User::find($userProject->user_id);
        $this->actingAs($user);

        //Creation de la requête
        $requestData = [
            'name' => 'Test',
            'description' => 'Description of the task',
            'deadline' => '2023-12-31',
            'priority' => 1,
            'project_id' => $userProject->project_id
        ];

        $request = new Request($requestData);
        $result = json_decode($taskPostController->store($request)->getContent(), true);
        $this->assertEquals(404, $result['status']);
        $this->assertEquals('Not authorized', $result['message']);
    }

}

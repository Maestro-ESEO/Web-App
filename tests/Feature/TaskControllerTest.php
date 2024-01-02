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

        $result = json_decode($taskPostController->post($request), true);
        $this->assertNotNull(Task::find($result['id']));
        $this->assertEquals('Test', $result['name']);
        $this->assertEquals('Description of the task', $result['description']);
        $this->assertEquals('2023-12-31', $result['deadline']);
        $this->assertEquals(0, $result['status']);
        $this->assertEquals(1, $result['priority']);
        $this->assertEquals($userProject->project_id, $result['project_id']);

        if($task = Task::find($result['id'])){
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
        $this->expectException(NotFoundHttpException::class);
        $this->expectExceptionMessage("The user is not an administrator");
        $taskPostController->post($request);
    }

}

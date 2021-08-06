<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Api;

use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\ActivityInstance\ActivityInstance;
use BristolSU\Support\ActivityInstance\Contracts\ActivityInstanceResolver;
use BristolSU\Support\Completion\CompletionConditionInstance;
use BristolSU\Support\Completion\Contracts\CompletionConditionTester;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use BristolSU\Support\User\User;
use Prophecy\Argument;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ModuleInstanceCompletionConditionControllerTest extends TestCase
{

    /** @test */
    public function store_creates_a_new_completion_condition_and_assigns_it_to_the_module_instance(){
        $this->beUser($this->newUser());

        $moduleInstance = ModuleInstance::factory()->create(['slug' => 'modinstslug', 'name' => 'ModInstName1']);

        $this->assertDatabaseHas('module_instances', [
            'id' => $moduleInstance->id,
            'completion_condition_instance_id' => null
        ]);

        $response = $this->postJson('/api/module-instance/modinstslug/completion-condition', [
            'alias' => 'ccalias1',
            'settings' => ['setting1' => 'val1']
        ]);

        $response->assertStatus(201);
        $response->assertJsonFragment([
            'alias' => 'ccalias1',
            'name' => 'CC For ModInstName1',
            'description' => 'Completion Condition in the Playground',
            'settings' => ['setting1' => 'val1']
        ]);

        $this->assertDatabaseHas('completion_condition_instances', [
            'alias' => 'ccalias1',
            'name' => 'CC For ModInstName1',
            'description' => 'Completion Condition in the Playground',
            'settings' => '{"setting1":"val1"}'
        ]);

        $completionCondition = CompletionConditionInstance::where('alias', 'ccalias1')->first();

        $this->assertInstanceOf(CompletionConditionInstance::class, $completionCondition);

        $this->assertDatabaseHas('module_instances', [
            'id' => $moduleInstance->id,
            'completion_condition_instance_id' => $completionCondition->id
        ]);
    }

    /** @test */
    public function test_returns_404_if_no_completion_condition_created(){
        $this->beUser($this->newUser());

        $moduleInstance = ModuleInstance::factory()->create([
            'slug' => 'modinstslug', 'name' => 'ModInstName1',
            'completion_condition_instance_id' => null
        ]);

        $response = $this->getJson('/api/module-instance/modinstslug/completion-condition/test');

        $response->assertStatus(404);
        $this->assertInstanceOf(NotFoundHttpException::class, $response->exception);
    }

    /** @test */
    public function test_returns_test_results(){
        $this->beUser($this->newUser());

        $completionConditionInstance = CompletionConditionInstance::factory()->create();
        $moduleInstance = ModuleInstance::factory()->create(['slug' => 'modinstslug', 'name' => 'ModInstName1', 'completion_condition_instance_id' => $completionConditionInstance->id]);
        $activityInstance = ActivityInstance::factory()->create(['activity_id' => $moduleInstance->activity_id]);

        $activityInstanceResolver = $this->prophesize(ActivityInstanceResolver::class);
        $activityInstanceResolver->getActivityInstance()->shouldBeCalled()->willReturn($activityInstance);
        $this->instance(ActivityInstanceResolver::class, $activityInstanceResolver->reveal());

        $completionConditionTester = $this->prophesize(CompletionConditionTester::class);

        $completionConditionTester->evaluate(Argument::that(function($arg) use ($activityInstance) {
            return $arg instanceof ActivityInstance && $activityInstance->is($arg);
        }), Argument::that(function($arg) use ($completionConditionInstance) {
            return $arg instanceof CompletionConditionInstance && $completionConditionInstance->is($arg);
        }))->shouldBeCalled()->willReturn(true);
        $completionConditionTester->evaluatePercentage(Argument::that(function($arg) use ($activityInstance) {
            return $arg instanceof ActivityInstance && $activityInstance->is($arg);
        }), Argument::that(function($arg) use ($completionConditionInstance) {
            return $arg instanceof CompletionConditionInstance && $completionConditionInstance->is($arg);
        }))->shouldBeCalled()->willReturn(68);
        $this->instance(CompletionConditionTester::class, $completionConditionTester->reveal());

        $response = $this->getJson('/api/module-instance/modinstslug/completion-condition/test');

        $response->assertStatus(200);
        $response->assertJson([
            'result' => true,
            'percentage'=> 68
        ]);
    }

}

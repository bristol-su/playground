<?php

namespace BristolSU\Playground\Http\Controllers\Api;

use BristolSU\Playground\Http\Controllers\Controller;
use BristolSU\Support\ActivityInstance\Contracts\ActivityInstanceResolver;
use BristolSU\Support\Completion\Contracts\CompletionConditionInstanceRepository;
use BristolSU\Support\Completion\Contracts\CompletionConditionTester;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use Illuminate\Http\Request;

/**
 * Handle completion conditions
 */
class ModuleInstanceCompletionConditionController extends Controller
{

    public function store(ModuleInstance $moduleInstance, Request $request, CompletionConditionInstanceRepository $conditionInstanceRepository)
    {
        $completion = $conditionInstanceRepository->create([
            'alias' => $request->input('alias'),
            'name' => 'CC For ' . $moduleInstance->name,
            'description' => 'Completion Condition in the Playground',
            'settings' => $request->input('settings')
        ]);
        $moduleInstance->completion_condition_instance_id = $completion->id;
        $moduleInstance->save();
        return $completion;
    }

    public function test(ModuleInstance $moduleInstance, CompletionConditionTester $tester, ActivityInstanceResolver $activityInstanceResolver)
    {
        if($moduleInstance->completion_condition_instance_id === null) {
            return abort(404, 'Could not find the completion condition');
        }
        $activityInstance = $activityInstanceResolver->getActivityInstance();
        return [
            'result' => $tester->evaluate($activityInstance, $moduleInstance->completionConditionInstance),
            'percentage' => $tester->evaluatePercentage($activityInstance, $moduleInstance->completionConditionInstance)
        ];
    }

}

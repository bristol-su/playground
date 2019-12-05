<?php

namespace BristolSU\Playground\Tests\Exceptions;

use BristolSU\Playground\Exceptions\Handler;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\Activity\Activity;
use BristolSU\Support\ActivityInstance\ActivityInstance;
use BristolSU\Support\ActivityInstance\Contracts\ActivityInstanceResolver;
use BristolSU\Support\ActivityInstance\Contracts\DefaultActivityInstanceGenerator;
use BristolSU\Support\ActivityInstance\Exceptions\NotInActivityInstanceException;
use BristolSU\Support\Authentication\Contracts\ResourceIdGenerator;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Prophecy\Argument;

class HandlerTest extends TestCase
{

    /** @test */
    public function it_logs_into_an_activity_instance_if_a_not_in_activity_instance_exception_thrown(){
        $activity = factory(Activity::class)->create(['activity_for' => 'user']);
        $activityInstance = factory(ActivityInstance::class)->create(['activity_id' => $activity->id]);

        $request = $this->prophesize(Request::class);
        $request->route('activity_slug')->shouldBeCalled()->willReturn($activity);
        $request->url()->willReturn('https://example.com');

        $resourceIdGenerator = $this->prophesize(ResourceIdGenerator::class);
        $resourceIdGenerator->fromString('user')->shouldBeCalled()->willReturn(1);
        $this->instance(ResourceIdGenerator::class, $resourceIdGenerator->reveal());

        $activityInstanceGenerator = $this->prophesize(DefaultActivityInstanceGenerator::class);
        $activityInstanceGenerator->generate(Argument::that(function($arg) use ($activity) {
            return $arg instanceof Activity && $activity->is($arg);
        }), 'user', 1)->shouldBeCalled()->willReturn($activityInstance);
        $this->instance(DefaultActivityInstanceGenerator::class, $activityInstanceGenerator->reveal());

        $activityInstanceResolver = $this->prophesize(ActivityInstanceResolver::class);
        $activityInstanceResolver->setActivityInstance($activityInstance)->shouldBeCalled();
        $this->app->instance(ActivityInstanceResolver::class, $activityInstanceResolver->reveal());

        $exception = new NotInActivityInstanceException();
        $handler = new Handler($this->app);
        $handler->render($request->reveal(), $exception);
    }

    /** @test */
    public function it_refreshes_the_page_if_exception_was_a_NotInActivityInstanceException(){
        $activity = factory(Activity::class)->create(['activity_for' => 'user']);
        $activityInstance = factory(ActivityInstance::class)->create(['activity_id' => $activity->id]);

        $request = $this->prophesize(Request::class);
        $request->route('activity_slug')->shouldBeCalled()->willReturn($activity);
        $request->url()->willReturn('https://example.com');

        $resourceIdGenerator = $this->prophesize(ResourceIdGenerator::class);
        $resourceIdGenerator->fromString('user')->shouldBeCalled()->willReturn(1);
        $this->instance(ResourceIdGenerator::class, $resourceIdGenerator->reveal());

        $activityInstanceGenerator = $this->prophesize(DefaultActivityInstanceGenerator::class);
        $activityInstanceGenerator->generate(Argument::that(function($arg) use ($activity) {
            return $arg instanceof Activity && $activity->is($arg);
        }), 'user', 1)->shouldBeCalled()->willReturn($activityInstance);
        $this->instance(DefaultActivityInstanceGenerator::class, $activityInstanceGenerator->reveal());

        $activityInstanceResolver = $this->prophesize(ActivityInstanceResolver::class);
        $activityInstanceResolver->setActivityInstance($activityInstance)->shouldBeCalled();
        $this->app->instance(ActivityInstanceResolver::class, $activityInstanceResolver->reveal());

        $exception = new NotInActivityInstanceException();
        $handler = new Handler($this->app);
        /** @var RedirectResponse $response */
        $response = $handler->render($request->reveal(), $exception);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals('https://example.com', $response->getTargetUrl());
    }

}

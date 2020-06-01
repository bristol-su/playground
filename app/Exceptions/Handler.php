<?php

namespace BristolSU\Playground\Exceptions;

use BristolSU\Support\ActivityInstance\Contracts\ActivityInstanceResolver;
use BristolSU\Support\ActivityInstance\Contracts\DefaultActivityInstanceGenerator;
use BristolSU\Support\ActivityInstance\Exceptions\NotInActivityInstanceException;
use BristolSU\Support\Authentication\Contracts\ResourceIdGenerator;
use BristolSU\Support\Authorization\Exception\ActivityRequiresGroup;
use BristolSU\Support\Authorization\Exception\ActivityRequiresRole;
use BristolSU\Support\Authorization\Exception\ActivityRequiresUser;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        NotInActivityInstanceException::class
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * - Logs into an activity instance if exception is NotInActivityInstanceException
     *
     * @param Request $request
     * @param Exception $exception
     * @return Response
     * @throws ActivityRequiresGroup
     * @throws ActivityRequiresRole
     * @throws ActivityRequiresUser
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof NotInActivityInstanceException) {
            $activity = $request->route('activity_slug');
            $activityInstance = app(DefaultActivityInstanceGenerator::class)
                ->generate(
                    $activity,
                    $activity->activity_for,
                    app(ResourceIdGenerator::class)->fromString($activity->activity_for)
                );
            app(ActivityInstanceResolver::class)->setActivityInstance($activityInstance);
            return redirect()->to($request->fullUrl());
        }

        return parent::render($request, $exception);
    }
}

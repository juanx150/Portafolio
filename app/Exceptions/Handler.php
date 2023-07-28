<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;


class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];
    public function handleApiExceptions($request, $exception)
    {
        if($exception instanceof ModelNotFoundException)
        {
            return response()->json(['error' => 'Model Not Found'], 404);
        }
        Log::warning("[Handler.handleApiExceptions] API Exception type '" . 
        get_class($exception) . "' not handled.");
        return parent::render($request, $exception);
    }
    /**
     * Register the exception handling callbacks for the application.
     */
    public function render($request, Throwable $exception)
    {
        if($request->expectsJson())
        {
        return $this->handleApiExceptions($request, $exception);
        }
        return parent::render($request, $exception);
    }
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}

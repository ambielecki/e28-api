<?php

namespace App\Exceptions;

use App\Library\JsonResponseData;
use App\Library\Message;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(JsonResponseData::formatData(
                $request,
                $exception->getMessage(),
                Message::MESSAGE_ERROR,
                [],
            ), 401);
        }

        return redirect()->guest($exception->redirectTo() ?? route('login'));
    }

    protected function invalidJson($request, ValidationException $exception): JsonResponse
    {
        return response()->json(JsonResponseData::formatData(
            $request,
            $exception->getMessage(),
            Message::MESSAGE_ERROR,
            ['errors' => $exception->errors()],
        ), $exception->status);
    }

    protected function prepareJsonResponse($request, Exception $e)
    {
        return new JsonResponse(JsonResponseData::formatData(
            $request,
            '',
            Message::MESSAGE_ERROR,
            $this->convertExceptionToArray($e),
        ),

            $this->isHttpException($e) ? $e->getStatusCode() : 500,
            $this->isHttpException($e) ? $e->getHeaders() : [],
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
        );
    }
}

<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($this->isHttpException($e)) {
            $statusCode = $e->getStatusCode();
            if (in_array($statusCode, [403, 404, 419, 429, 500])) {
                if (view()->exists("errors.{$statusCode}")) {
                    return response()->view("errors.{$statusCode}", ['exception' => $e], $statusCode);
                }
            }
        }
        return parent::render($request, $e);
    }
}

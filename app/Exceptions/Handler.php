<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

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
  * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
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

    // UnauthorizedHttpException
    if ($exception instanceof UnauthorizedHttpException) {
      return new Response(['message' => 'Credenciales no válidas.'], 401, ['WWW-Authenticate' => 'Basic']);
    }

    // AuthenticationException
    if ($exception instanceof AuthenticationException) {
      return $this->unauthenticated($request, $exception);
    }

    // the request contains a type (GET, PUT, POST etc) that is not used in this API
    if ($exception instanceof MethodNotAllowedHttpException) {
      return response()->json(['message' => 'The specified method for the request is invalid', 'code' => 405,], 405);
    }

    // basically an invalid path in the request
    if ($exception instanceof NotFoundHttpException) {
      return response()->json(['message' => 'The specified URL cannot be found', 'code' => 404,], 404);
    }

    return parent::render($request, $exception);
  }

  /**
  * unauthenticated
  */
  protected function unauthenticated($request, AuthenticationException $exception)
  {
    if ($this->isFrontend($request)) {
      return redirect()->guest('login');
    }
    return response()->json(['message' => 'Unauthenticated', 'code' => 401,], 401);
  }

  /**
  * isFrontend
  */
  private function isFrontend($request)
  {
    // return true if the request accepts HTML and the middleware of the route contains the 'web' middleware
    return $request->acceptsHtml() && collect($request->route()->middleware())->contains('web');
  }
  
  /**
  * convertValidationExceptionToResponse
  */
  protected function convertValidationExceptionToResponse(ValidationException $e, $request)
  {
    $errors = $e->validator->errors()->getMessages();

    if ($this->isFrontend($request)) {
      return $request->ajax() ? response()->json($error, 422) : redirect()
      ->back()
      ->withInput($request->input())
      ->withErrors($errors);
    }

    return response()->json(['message' => $errors], 422);
  }

}

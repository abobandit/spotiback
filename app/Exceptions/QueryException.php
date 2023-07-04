<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
class QueryException extends Exception
{
	public function register(): void
	{
		$this->renderable(function (NotFoundHttpException $e, Request $request) {
			if ($request->is('api/*')) {
				return response()->json([
					'message' => 'Record not found.'
				], 404);
			}
		});
}}

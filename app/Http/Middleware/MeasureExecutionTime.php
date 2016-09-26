<?php

namespace App\Http\Middleware;

use Closure;

class MeasureExecutionTime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get the response
        $response = $next($request);

        // Calculate execution time
        $executionTime = microtime() - LUMEN_START;

        // I assume you're using valid json in your responses
        // Then I manipulate them below
        $content = json_decode($response->getContent(), true);
        $content['execution_time'] = $executionTime;

        $content = json_encode($content);

        // Change the content of your response
        $response->setContent($content);

        // Return the response
        return $response;
    }
}

<?php declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RequestLogger
{
    private array $excludes = [
        '_debugbar',
    ];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (config('logging.request.enable')) {
            if ($this->isWrite($request)) {
                $this->write($request);
            }
        }

        return $next($request);
    }

    /**
     * @param Request $request
     * @return bool
     */
    private function isWrite(Request $request): bool
    {
        return !in_array($request->path(), $this->excludes, true);
    }

    /**
     * @param Request $request
     */
    private function write(Request $request): void
    {
        if (config('env.APP_ENV') === 'production') {
            Log::debug($request->method(), ['REMOTE_ADDR' => $request->ip(), 'URL' => $request->fullUrl()]);
        } else {
            // local, staging etc...
            Log::debug($request->method(), ['REMOTE_ADDR' => $request->ip(), 'URL' => $request->fullUrl(), 'REQUEST' => $request->all()]);
        }

    }
}
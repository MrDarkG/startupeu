<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $filter=implode("|",\App\Models\Language::pluck("slug")->toArray());
        // $filter="";

        $this->configureRateLimiting();
        Route::pattern("language_id",$filter);
        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                // ->namespace($this->namespace)
                ->prefix("/mentor/")
                ->group(base_path('routes/guest/mentor.php'));

            Route::middleware('web')
                // ->namespace($this->namespace)
                ->prefix("/startup/")
                ->group(base_path('routes/guest/startup.php'));

            Route::middleware('web')
                // ->namespace($this->namespace)
                ->prefix("/investor/")
                ->group(base_path('routes/guest/investor.php'));

            Route::middleware('web')
                // ->namespace($this->namespace)
                ->prefix("/register/")
                ->group(base_path('routes/register.php'));

            Route::middleware(['web','auth'])
                // ->namespace($this->namespace)
                ->prefix("/startup/dashboard")
                ->group(base_path('routes/startup/dashboard.php'));

            Route::middleware(['web','auth'])
                // ->namespace($this->namespace)
                ->prefix("/investor/dashboard")
                ->group(base_path('routes/investor/dashboard.php'));

            Route::middleware(['web','auth'])
                // ->namespace($this->namespace)
                ->prefix("/mentor/dashboard")
                ->group(base_path('routes/mentor/dashboard.php'));
            Route::middleware(['web','auth'])
                // ->namespace($this->namespace)
                ->prefix("/admin")
                ->group(base_path('routes/admin.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}

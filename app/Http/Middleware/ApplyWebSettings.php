<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ApplyWebSettings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $setting = Setting::first();

        $appConfig = array(
            'name' => $setting->website_title ?? config('app.name'),
            'env' => env('APP_ENV', 'production'),
            'debug' => (bool) env('APP_DEBUG', false),
            'url' => env('APP_URL', 'http://localhost'),
            'asset_url' => env('ASSET_URL', null),
            'locale' => 'id',
            'fallback_locale' => 'en',
            'faker_locale' => 'id_ID',
            'key' => env('APP_KEY'),
            'cipher' => 'AES-256-CBC',

            'providers' => [

                /*
                 * Laravel Framework Service Providers...
                 */
                Illuminate\Auth\AuthServiceProvider::class,
                Illuminate\Broadcasting\BroadcastServiceProvider::class,
                Illuminate\Bus\BusServiceProvider::class,
                Illuminate\Cache\CacheServiceProvider::class,
                Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
                Illuminate\Cookie\CookieServiceProvider::class,
                Illuminate\Database\DatabaseServiceProvider::class,
                Illuminate\Encryption\EncryptionServiceProvider::class,
                Illuminate\Filesystem\FilesystemServiceProvider::class,
                Illuminate\Foundation\Providers\FoundationServiceProvider::class,
                Illuminate\Hashing\HashServiceProvider::class,
                Illuminate\Mail\MailServiceProvider::class,
                Illuminate\Notifications\NotificationServiceProvider::class,
                Illuminate\Pagination\PaginationServiceProvider::class,
                Illuminate\Pipeline\PipelineServiceProvider::class,
                Illuminate\Queue\QueueServiceProvider::class,
                Illuminate\Redis\RedisServiceProvider::class,
                Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
                Illuminate\Session\SessionServiceProvider::class,
                Illuminate\Translation\TranslationServiceProvider::class,
                Illuminate\Validation\ValidationServiceProvider::class,
                Illuminate\View\ViewServiceProvider::class,

                /*
                 * Package Service Providers...
                 */

                /*
                 * Application Service Providers...
                 */
                App\Providers\AppServiceProvider::class,
                App\Providers\AuthServiceProvider::class,
                // App\Providers\BroadcastServiceProvider::class,
                App\Providers\EventServiceProvider::class,
                App\Providers\RouteServiceProvider::class,

            ],

            'aliases' => [

                'App' => Illuminate\Support\Facades\App::class,
                'Arr' => Illuminate\Support\Arr::class,
                'Artisan' => Illuminate\Support\Facades\Artisan::class,
                'Auth' => Illuminate\Support\Facades\Auth::class,
                'Blade' => Illuminate\Support\Facades\Blade::class,
                'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
                'Bus' => Illuminate\Support\Facades\Bus::class,
                'Cache' => Illuminate\Support\Facades\Cache::class,
                'Config' => Illuminate\Support\Facades\Config::class,
                'Cookie' => Illuminate\Support\Facades\Cookie::class,
                'Crypt' => Illuminate\Support\Facades\Crypt::class,
                'Date' => Illuminate\Support\Facades\Date::class,
                'DB' => Illuminate\Support\Facades\DB::class,
                'Eloquent' => Illuminate\Database\Eloquent\Model::class,
                'Event' => Illuminate\Support\Facades\Event::class,
                'File' => Illuminate\Support\Facades\File::class,
                'Gate' => Illuminate\Support\Facades\Gate::class,
                'Hash' => Illuminate\Support\Facades\Hash::class,
                'Http' => Illuminate\Support\Facades\Http::class,
                'Js' => Illuminate\Support\Js::class,
                'Lang' => Illuminate\Support\Facades\Lang::class,
                'Log' => Illuminate\Support\Facades\Log::class,
                'Mail' => Illuminate\Support\Facades\Mail::class,
                'Notification' => Illuminate\Support\Facades\Notification::class,
                'Password' => Illuminate\Support\Facades\Password::class,
                'Queue' => Illuminate\Support\Facades\Queue::class,
                'RateLimiter' => Illuminate\Support\Facades\RateLimiter::class,
                'Redirect' => Illuminate\Support\Facades\Redirect::class,
                // 'Redis' => Illuminate\Support\Facades\Redis::class,
                'Request' => Illuminate\Support\Facades\Request::class,
                'Response' => Illuminate\Support\Facades\Response::class,
                'Route' => Illuminate\Support\Facades\Route::class,
                'Schema' => Illuminate\Support\Facades\Schema::class,
                'Session' => Illuminate\Support\Facades\Session::class,
                'Storage' => Illuminate\Support\Facades\Storage::class,
                'Str' => Illuminate\Support\Str::class,
                'URL' => Illuminate\Support\Facades\URL::class,
                'Validator' => Illuminate\Support\Facades\Validator::class,
                'View' => Illuminate\Support\Facades\View::class,

            ],
        );

        $mailConfig = array(
            'driver' => 'SMTP',
            'host' => $setting->smtp_host ?? config('mail.mailers.smtp.host'),
            'port' => $setting->smtp_port ?? config('mail.mailers.smtp.port'),
            'from' => array('address' => $setting->smtp_username ?? config('mail.from.address'), 'name' => $setting->website_title ?? config('app.name')),
            'encryption' => $setting->smtp_secure ?? config('mail.mailers.smtp.encryption'),
            'username' => $setting->smtp_username ?? config('mail.mailers.smtp.username'),
            'password' => $setting->smtp_password ?? config('mail.mailers.smtp.password'),
            'sendmail' => '/usr/sbin/sendmail -bs',
            'pretend' => false
        );

        Config::set('app', $appConfig);
        Config::set('mail', $mailConfig);

        return $next($request);
    }
}

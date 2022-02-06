<?php

namespace App\Providers;

use App\Jobs\CheckOrder;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::query()->macro('firstOrFail', function () {
            if ($record = $this->first()) {
                return $record;
            }

            return abort(403);
        });

        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (array_wrap($attributes) as $attribute) {
                    $query->when(
                        str_contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            [$relationName, $relationAttribute] = explode('.', $attribute);

                            $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                            });
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });

            return $this;
        });

        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user()->id;

                CheckOrder::dispatch($user);
            }

            $info = Setting::all();
            $category = Category::all();
            $icon = Setting::where('key', 'icon')->first()->value;
            $store = Setting::where('key', 'name')->first()->value;
            $whatsapp = Setting::where('key', 'whatsapp')->first()->value;

            $data = [
                'info' => $info,
                'categories' => $category,
                'icon' => $icon,
                'store' => $store,
                'whatsapp' => $whatsapp,
            ];

            $view->with($data);
        });
    }
}

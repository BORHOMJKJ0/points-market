<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

trait SortTrait
{
    public static function sortDefaultValue()
    {
        return 'min';
    }

    public static function bootSortTrait()
    {
        self::addGlobalScope('sortable', function (Builder $builder) {
            $table_name = (new self)->getTable();
            $builder->orderBy("$table_name.sort", 'asc');
        });

        self::creating(function ($model) {
            $table_name = (new self)->getTable();

            $model->sort = $model->sort;

            if (! $model->sort) {
                if (self::sortDefaultValue() == 'max') {
                    $model->sort = self::max('sort') + 1;
                } else {
                    $model->sort = 1;
                }
            }

            DB::table($table_name)->where("$table_name.sort", '>=', $model->sort)->increment('sort');

        });

    }

    public function scopeWithoutSorting($query)
    {
        return $query->withoutGlobalScope('sortable');
    }
}

<?php

namespace App\Traits;

trait ParentTrait
{
    public static function bootParentTrait()
    {
        self::creating(function ($model) {
            $model->trees = '{}';
        });

        self::created(function ($model) {
            $trees = (object) [];
            $parents = collect();

            $parent = $model;

            while ($parent = $parent->parent) {
                $temp_trees = $parent->trees;

                if (isset($temp_trees->children)) {
                    $temp_trees->children[] = $model->id;
                } else {
                    $temp_trees->children = [$model->id];
                }

                $parent->trees = $temp_trees;
                $parents->push($parent->id);
                $parent->update();
            }

            $trees->parents = $parents;
            $model->trees = $trees;
            $model->update();

        });

        self::deleting(function ($model) {
            $parent = $model;

            while ($parent = $parent->parent) {
                $temp_trees = $parent->trees;

                if (($key = array_search($model->id, $temp_trees->children)) !== false) {
                    unset($temp_trees->children[$key]);
                }

                $temp_trees->children = array_values($temp_trees->children);

                $parent->trees = $temp_trees;

                $parent->update();
            }

        });

    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function siblings($withThis = false)
    {

        $siblings = self::where('parent_id', $this->parent_id)->get();

        if (! $withThis) {
            $siblings->except($this->id);
        }

        return $siblings;

    }

    public function scopeChildrenOf($query, $parent_id)
    {
        return $query->whereParentId($parent_id);
    }

    public function scopeOnlyParents($query)
    {
        return $query->whereNull('parent_id');
    }

    public function parents($reverse = true, $withThis = true)
    {
        $parents = collect($this->trees->parents ?? []);

        if ($withThis) {
            $parents->prepend($this->id);
        }

        $parents = self::withoutGlobalScopes()->find($parents);

        if ($reverse) {
            $parents = $parents->reverse();
        }

        return $parents;

    }

    public function all_children($withThis = true, $ids = false)
    {

        $children = collect($this->trees->children ?? []);
        if ($withThis) {
            $children->prepend($this->id);
        }

        return $ids ? $children->toArray() : self::find($children);
    }
}

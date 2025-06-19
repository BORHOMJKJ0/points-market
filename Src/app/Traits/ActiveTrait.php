<?php

namespace App\Traits;

trait ActiveTrait
{
    public function scopeOnlyActive($query)
    {
        return $query->where('active', true);
    }

    public function active_label()
    {
        return view('helpers.labels.yes_no', [
            'boolean' => $this->active,
        ]);
    }
}

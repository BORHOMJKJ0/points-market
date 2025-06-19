<?php

namespace App\Traits;

trait StateTrait
{
    public function state_label()
    {
        $color = $this->state == 'accepted' ? 'success' : ($this->state == 'cancelled' ? 'danger' : 'primary');

        return "<span class='badge badge-pill badge-$color p-2 pl-4' >".__("labels.state.$this->state").'</span>';
    }

    public function scopeOnlyAccepted($query)
    {
        return $query->whereState('accepted');
    }

    public function scopeOnState($query, $state)
    {
        return $query->whereState($state);
    }
}

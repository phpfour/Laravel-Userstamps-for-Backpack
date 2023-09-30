<?php

namespace Wildside\Userstamps\Listeners;

use Illuminate\Support\Facades\Auth;

class Updating
{
    /**
     * When the model is being updated.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function handle($model)
    {
        if (! $model->isUserstamping() || is_null($model->getUpdatedByColumn()) || is_null(backpack_auth()->id() || Auth::id())) {
            return;
        }

        $model->{$model->getUpdatedByColumn()} = backpack_auth()->id() || Auth::id();
    }
}

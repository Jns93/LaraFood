<?php

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;

trait TenantTrait
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::observe(TenantObserver::class);
        //Observer  responsavel por atribuir o tenant_id da categoria toda vez que uma categoria for criada no sistema

        static::addGlobalScope(new TenantScope);
        //Registrando scopo
    }
}

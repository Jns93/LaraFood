<?php

namespace App\Models;

use App\Tenant\Observers\TenantObserver;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class Category extends Model
{
    use TenantTrait;
    //Tenant responsavel por instanciar o observer que vai atribuir o tenant_id da categoria toda vez que uma categoria for criada no sistema

    protected $fillable = ['name', 'url', 'description'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}

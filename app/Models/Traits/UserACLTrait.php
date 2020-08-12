<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait
{
    public function permissions()
    {
        //Esse metodo retorna as permissions do tenant x permissions do user (cargo/role)

        $permissionsPlan = $this->permissionsPlan();
        $permissionsRole = $this->permissionsRole();

        $permissions = [];
        foreach ($permissionsRole as $permission) {
            if (in_array($permission, $permissionsPlan))
                array_push($permissions, $permission);
        }
        // dd($permissionsRole);
        return $permissions;
    }

    public function permissionsPlan(): array
    {
        //Esse metodo retorna as permissoes do plano cujo a empresa assinou

        // $tenant = $this->tenant()->first();
        // $plan =  $tenant->plan;
        //A consulta acima será otimizada abaixo.

        $tenant = Tenant::with('plan.profiles.permissions')->where('id',$this->tenant_id)->first();
        //Dessa forma é possivel utilizar o with e encadear os relacionamento

        $plan = $tenant->plan;

        $permissions = [];
        foreach ($plan->profiles as $profile) {
            foreach ($profile->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }
        return $permissions;
    }

    public function permissionsRole(): array
    {
        //Esse metodo retorna as permissoes de cargos de usuarios

        $roles = $this->roles()->with('permissions')->get();
        // dd($roles);
        $permissions = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }

    public function hasPermission(string $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }

    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }

    public function isTenant(): bool
    {
        return !in_array($this->email, config('acl.admins'));
    }
}

<?php

namespace App\Repositories\Contracts;

interface TenantRepositoryInterface
{
    //assinatura dos metodos que serão utilizados

    public function getAllTenants(int $per_page);
    public function getTenantByUuid(string $uuid);
}

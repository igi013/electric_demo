<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerAccountModel extends Model
{
    protected $table = 'customer_accounts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'account_number',
        'customer_name',
        'address',
        'phone',
        'email',
        'meter_number',
        'connection_type',
        'status',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function filteredList(?string $keyword, ?string $status, ?string $type, int $perPage = 10): array
    {
        $builder = $this->builderForFilters($keyword, $status, $type);

        $accounts = $builder->orderBy('created_at', 'DESC')->paginate($perPage, 'customers');
        $this->pager = $builder->pager;

        return $accounts;
    }

    public function countFiltered(?string $keyword, ?string $status, ?string $type): int
    {
        return $this->builderForFilters($keyword, $status, $type)->countAllResults();
    }

    public function getCountByStatus(string $status): int
    {
        return $this->where('status', $status)->countAllResults();
    }

    private function builderForFilters(?string $keyword, ?string $status, ?string $type): self
    {
        $builder = clone $this;

        if ($keyword !== null && $keyword !== '') {
            $builder->groupStart()
                ->like('account_number', $keyword)
                ->orLike('customer_name', $keyword)
                ->orLike('email', $keyword)
                ->orLike('phone', $keyword)
                ->orLike('meter_number', $keyword)
                ->groupEnd();
        }

        if ($status !== null && $status !== '') {
            $builder->where('status', $status);
        }

        if ($type !== null && $type !== '') {
            $builder->where('connection_type', $type);
        }

        return $builder;
    }
}

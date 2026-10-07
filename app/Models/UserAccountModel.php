<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAccountModel extends Model
{
    protected $table = 'user_accounts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'username',
        'password',
    ];

    public function findByUsername(string $username): ?array
    {
        return $this->where('username', $username)->first();
    }
}

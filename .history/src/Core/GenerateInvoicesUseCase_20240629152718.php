<?php 

namespace Core;

use App\Models\Contract;

class GenerateInvoicesUseCase
{
    public function execute()
    {
        $contracts = Contract::all();
        return $contracts;
    }
}
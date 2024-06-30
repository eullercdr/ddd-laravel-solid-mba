<?php 

namespace Core;

class GenerateInvoicesUseCase
{
    public function execute()
    {
        $contracts = Contract::all();
        return [];
    }
}
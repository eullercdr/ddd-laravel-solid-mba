<?php

namespace Core;

use App\Models\Contract;

class GenerateInvoicesUseCase
{
  public function execute(array $input)
  {
    $contracts = Contract::all();
    return $contracts;
  }
}

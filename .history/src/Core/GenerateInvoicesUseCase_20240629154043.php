<?php

namespace Core;

use App\Models\Contract;

class GenerateInvoicesUseCase
{
  /**
   * @param array $input
   * @return array
   */
  public function execute(array $input): 
  {
    $contracts = Contract::all();
    return $contracts;
  }
}

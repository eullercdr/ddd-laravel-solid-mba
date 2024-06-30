<?php

namespace Core;

use App\Models\Contract;

class GenerateInvoicesUseCase
{
  /** array
   * @param array $input
   * { month: int, year: int}
   */
  public function execute(array $input)
  {
    $contracts = Contract::all();
    foreach ($contracts as $contract) {
      $contract->amount = $contract->amount / $contract->periods;
    }
  }
}

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
    $contracts = Contract::whereMonth('start_date', $input['month'])
      ->whereYear('start_date', $input['year'])
      ->get()
      ->toArray();
    return $contracts;
  }
}

<?php

namespace Core;

use App\Models\Contract;
use App\Models\Payment;

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
      $payments = Payment::where('contract_id', $contract->id)->get();
    }
  }
}

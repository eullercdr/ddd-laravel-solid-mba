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
    $output = [];
    foreach ($contracts as $contract) {
      $payments = Payment::where('contract_id', $contract->id)->get();
      foreach ($payments as $payment) {
        if (
          $payment->payment_date->month == $input['month'] &&
          $payment->payment_date->year == $input['year']
        ) {
          $output[] = [
            'payment_date' => $contract->payment_date,
            'amount' => $contract->amount
          ];
        }
      }
    }
    return $output;
  }
}

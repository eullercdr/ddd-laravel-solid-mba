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
      if ($input['type'] === 'cash') {
        $payments = Payment::where('contract_id', $contract->id)->get();
        foreach ($payments as $payment) {
          if (
            $payment->payment_date->month == $input['month'] &&
            $payment->payment_date->year == $input['year']
          ) {
            $output[] = [
              'payment_date' => $payment->payment_date->format('Y-m-d'),
              'amount' => (float) $payment->amount
            ];
          }
        }
      }
      if ($input['type'] === 'accrual') {
        $output[] = [
          'payment_date' => $contract->start_date->format('Y-m-d'),
          'amount' => (float) $contract->amount / $contract->periods
        ];
      }
    }
    return $output;
  }
}

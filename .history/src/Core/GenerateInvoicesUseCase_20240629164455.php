<?php

namespace Core;

use App\Models\Contract;
use App\Models\Payment;
use Core\Repositories\ContractDatabaseRepository;
use Core\Repositories\ContractRepositoryInterface;

class GenerateInvoicesUseCase
{

  // public function __construct(private ContractRepositoryInterface $contractRepository)
  // {
  // }

  /** array
   * @param array $input
   * { month: int, year: int}
   */
  public function execute(array $input)
  {
    $repository = new ContractDatabaseRepository();
    $contracts = $repository->list();
    $output = [];
    foreach ($contracts as $contract) {
      if ($input['type'] === 'cash') {
        dd($contract->payments());
        foreach ($contract->payments()->get() as $payment) {
          dd($payment);
          if (
            $payment->payment_date->month == $input['month'] &&
            $payment->payment_date->year == $input['year']
          ) {
            $output[] = [
              'date' => $payment->payment_date->format('Y-m-d'),
              'amount' => (float) $payment->amount
            ];
          }
        }
      }
      // if ($input['type'] === 'accrual') {
      //   $period = 0;
      //   while ($period < $contract->periods) {
      //     $date = $contract->start_date->addMonths($period);
      //     // if (
      //     //   $date->month != $input['month'] || $date->year != $input['year']
      //     // ) {
      //     //   continue;
      //     // }
      //     $output[] = [
      //       'date' => $date->format('Y-m-d'),
      //       'amount' => $contract->amount / $contract->periods
      //     ];
      //     $period++;
      //   }
      // }
    }
    return $output;
  }
}

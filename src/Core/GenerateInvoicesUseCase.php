<?php

namespace Core;

use App\Models\Contract;
use App\Models\Payment;
use Core\Repositories\ContractDatabaseRepository;
use Core\Repositories\ContractRepositoryInterface;

class GenerateInvoicesUseCase
{

  public function __construct(private ContractRepositoryInterface $repository)
  {
  }

  /** array
   * @param array $input
   * { month: int, year: int}
   */
  public function execute(array $input)
  {
    $contracts = $this->repository->list();
    $output = [];
    foreach ($contracts as $contract) {
      $payments = $contract->payments;
      if ($input['type'] === 'cash') {
        foreach ($payments as $payment) {
          if (
            $payment->date->month == $input['month'] &&
            $payment->date->year == $input['year']
          ) {
            $output[] = [
              'date' => $payment->date->format('Y-m-d'),
              'amount' => (float) $payment->amount
            ];
          }
        }
      }
      if ($input['type'] === 'accrual') {
        $period = 0;
        while ($period < $contract->periods) {
          $date = $contract->date->addMonths($period++);
          if (
            $date->month != $input['month'] || $date->year != $input['year']
          ) {
            continue;
          }
          $output[] = [
            'date' => $date->format('Y-m-d'),
            'amount' => $contract->amount / $contract->periods
          ];
        }
      }
    }
    return $output;
  }
}

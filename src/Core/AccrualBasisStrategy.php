<?php

namespace Core;

use Core\Entities\Contract;
use Core\Entities\Invoice;

class AccrualBasisStrategy implements InvoiceGenerationStrategy
{
  public function generate(Contract $contract, int $month, int $year): array
  {
    $invoices = [];
    $period = 0;
    $periods = $contract->getPeriods();
    $baseDate = $contract->getDate();
    while ($period <= $periods) {
      $date = $baseDate->copy()->addMonths($period++);
      if ($date->month !== $month || $date->year !== $year) {
        continue;
      }
      $invoices[] = new Invoice(
        amount: $contract->getAmount() / $periods,
        date: $date
      );
    }
    return $invoices;
  }
}

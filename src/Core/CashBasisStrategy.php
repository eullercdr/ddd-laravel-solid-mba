<?php

namespace Core;

use Core\Entities\Contract;
use Core\Entities\Invoice;

class CashBasisStrategy implements InvoiceGenerationStrategy
{
  public function generate(Contract $contract, int $month, int $year): array
  {
    $invoices = [];
    $payments = $contract->getPayments();
    foreach ($payments as $payment) {
      if (
        $payment->getDate()->month == $month &&
        $payment->getDate()->year == $year
      ) {
        $invoices[] = new Invoice(
          amount: $payment->getAmount(),
          date: $payment->getDate()
        );
      }
    }
    return $invoices;
  }
}

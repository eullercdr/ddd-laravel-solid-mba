<?php

namespace Core\Repositories;

use App\Models\Contract as ContractModel;
use Core\Entities\Contract;
use Core\Entities\Payment as Payment;

class ContractDatabaseRepository implements ContractRepositoryInterface
{
  public function list(): array
  {
    $contractsData = ContractModel::all();
    $contracts = [];
    foreach ($contractsData as $contractData) {
      $contract = new Contract(
        id: $contractData->id,
        date: $contractData->date,
        amount: $contractData->amount,
        periods: $contractData->periods,
        description: $contractData->description
      );
      $paymentsData = $contractData->payments;
      foreach ($paymentsData as $paymentData) {
        $payment = new Payment(
          id: $paymentData->id,
          amount: $paymentData->amount,
          date: $paymentData->date
        );
        $contract->addPayment($payment);
      }
      $contracts[] = $contract;
    }
    return $contracts;
  }
}

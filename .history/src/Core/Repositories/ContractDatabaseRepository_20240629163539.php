<?php

namespace Core\Repositories;

use App\Models\Contract;
use App\Models\Payment;

class ContractDatabaseRepository implements ContractRepositoryInterface
{
  public function list()
  {
    $contracts = Contract::all();
    foreach ($contracts as $contract) {
      $contracts['payments'] = Payment::where('contract_id', $contract->id)->get();
    }
    return $contracts;
  }
}

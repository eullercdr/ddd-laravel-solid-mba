<?php

namespace Core\Repositories;

use App\Models\Contract;
use App\Models\Payment;

class ContractDatabaseRepository implements ContractRepositoryInterface
{
  public function list()
  {
    return Contract::with('payments')->get();
  }
}

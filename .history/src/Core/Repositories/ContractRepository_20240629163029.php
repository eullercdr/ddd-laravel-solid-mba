<?php

namespace Core\Repositories;

use App\Models\Contract;

class ContractRepository
{
  public function all()
  {
    return Contract::all();
  }
}

<?php

namespace Core;

use Core\Entities\Contract;

interface InvoiceGenerationStrategy
{
  public function generate(Contract $contract, int $month, int $year): array;
}

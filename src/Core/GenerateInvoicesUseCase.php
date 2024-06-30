<?php

namespace Core;

use App\Models\Contract;
use App\Models\Payment;
use Core\Entities\Contract as EntitiesContract;
use Core\Repositories\ContractDatabaseRepository;
use Core\Repositories\ContractRepositoryInterface;

class GenerateInvoicesUseCase
{

  public function __construct(private ContractRepositoryInterface $repository)
  {
  }

  /** array
   * @param array $input
   * { month: int, year: int, type: string}
   */
  public function execute(array $input)
  {
    $output = [];
    $contracts = $this->repository->list();    
    foreach ($contracts as $contract) {
      /** @var EntitiesContract $contract */
      $invoices = $contract->generateInvoices($input['month'], $input['year'], $input['type']);
      foreach ($invoices as $invoice) {
        $output[] = [
          'date'  => $invoice->getDate()->format('Y-m-d'),
          'amount' => $invoice->getAmount()
        ];
      }
    }
    return $output;
  }
}

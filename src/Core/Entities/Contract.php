<?php

namespace Core\Entities;

use Core\InvoiceGenerateStrategy;
use Core\InvoiceGenerationFactory;
use Core\InvoiceGenerationStrategy;
use DateInterval;
use DateTime;

class Contract
{

  public function __construct(
    private string $id,
    private DateTime $date,
    private float $amount,
    private int $periods,
    private string $description,
    private array $payments = [],
  ) {
  }

  public function getId(): string
  {
    return $this->id;
  }

  public function getDate(): DateTime
  {
    return $this->date;
  }

  public function getAmount(): float
  {
    return $this->amount;
  }

  public function getPeriods(): int
  {
    return $this->periods;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function getPayments(): array
  {
    return $this->payments;
  }

  public function addPayment(Payment $payment)
  {
    $this->payments[] = $payment;
    return $this;
  }

  public function getBalance(): float
  {
    $balance = $this->amount;
    foreach ($this->payments as $payment) {
      $balance -= $payment->getAmount();
    }
    return $balance;
  }

  public function generateInvoices(int $month, int $year, string $type):array
  {
    $invoiceGenerationStrategy = InvoiceGenerationFactory::create($type);
    return $invoiceGenerationStrategy->generate($this, $month, $year, $type);
  }
}

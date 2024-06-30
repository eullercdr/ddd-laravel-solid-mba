<?php

namespace Core\Entities;

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
    private array $payments = []
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

  public function generateInvoices(int $month, int $year, string $type)
  {
    $invoices = [];
    if ($type === 'cash') {
      $payments = $this->getPayments();
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
    }
    if ($type === 'accrual') {
      $invoices = [];
      $period = 0;
      $periods = $this->getPeriods();
      $baseDate = $this->getDate();
      while ($period <= $periods) {
        $date = $baseDate->copy()->addMonths($period++);
        if ($date->month !== $month || $date->year !== $year) {
          continue;
        }
        $invoices[] = new Invoice(
          amount: $this->getAmount() / $periods,
          date: $date
        );
      }
    }
    return $invoices;
  }
}

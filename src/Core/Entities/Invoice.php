<?php

namespace Core\Entities;

use DateTime;

class Invoice
{
  public function __construct(
    private float $amount,
    private DateTime $date
  ) {
  }

  public function getAmount(): float
  {
    return $this->amount;
  }

  public function getDate(): Datetime
  {
    return $this->date;
  }
}

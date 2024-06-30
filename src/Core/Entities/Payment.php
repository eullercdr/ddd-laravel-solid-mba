<?php

namespace Core\Entities;

use DateTime;
use Illuminate\Support\Facades\Date;

class Payment {
  public function __construct(
    private string $id,
    private float $amount,
    private DateTime $date
  ) {
  }

  public function getId(): string
  {
    return $this->id;
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
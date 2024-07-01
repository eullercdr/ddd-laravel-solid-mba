<?php

namespace Core;

class InvoiceGenerationFactory
{
  public static function create(string $type){
    if($type === 'cash'){
      return new CashBasisStrategy();
    } 
    if($type === 'accrual'){
      return new AccrualBasisStrategy();
    }
    throw new \Exception('Invalid invoice type');
  }
}
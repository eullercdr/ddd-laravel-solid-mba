<?php

use Core\AccrualBasisStrategy;
use Core\Entities\Contract;
use Core\Entities\Payment;

test('should generate invoices of contract by type accrual', function () {
    $contract = new Contract(
        id: 1,
        date: Carbon\Carbon::create(2021, 1, 1),
        periods: 12,
        amount: 6000,
        description: 'Contract Test',
    );
    $invoices = $contract->generateInvoices(1, 2021, 'accrual');
    expect($invoices[0]->getDate()->format('Y-m-d'))->toBe('2021-01-01');
    expect($invoices[0]->getAmount())->toBe(500.0);
});

test('should calculate the sald of contract', function () {
    $contract = new Contract(
        id: 1,
        date: Carbon\Carbon::create(2021, 1, 1),
        periods: 12,
        amount: 6000,
        description: 'Contract Test',
    );
    $contract->addPayment(new Payment(
        id: 1,
        date: Carbon\Carbon::create(2021, 1, 1),
        amount: 500,
    ));
    expect($contract->getBalance())->toBe(5500.0);
});

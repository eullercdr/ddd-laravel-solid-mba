<?php

use Core\Entities\Contract;

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

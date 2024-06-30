<?php

use App\Models\Contract;
use App\Models\Payment;
use Core\GenerateInvoicesUseCase;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabaseState::class)->in('Feature');

beforeEach(function () {
   $contract = Contract::create([
        'id' => '6bec1816-0d61-5b7c-922a-7c8ecf025ea1',
        'date' => '2024-01-01',
        'amount' => 6000,
        'periods' => 12,
        'description' => 'Contrato Escolar'
    ]);
    $contract->payments()->create([
        'id' => 'de0d6d5a-6e20-53a6-b0c3-61978fc6845a',
        'amount' => 6000,
        'date' => '2024-01-01'
    ]);
});

afterEach(function () {
   // clean up after each test
    
});

test('should generate nfes by cash type', function () {
    $generateInvoicesUsecase = new GenerateInvoicesUseCase();
    $input = [
        'month' => 1,
        'year' => 2024,
        'type' => 'cash'
    ];
    $output = $generateInvoicesUsecase->execute($input);
    expect($output[0]['date'])->toBe('2024-01-01');
    expect($output[0]['amount'])->toBe(6000.0);
});

// test('should generate nfes by accrual type', function () {
//     $generateInvoicesUsecase = new GenerateInvoicesUseCase();
//     $input = [
//         'month' => 1,
//         'year' => 2024,
//         'type' => 'accrual'
//     ];
//     $output = $generateInvoicesUsecase->execute($input);
//     expect($output[0]['date'])->toBe('2024-01-01');
//     expect($output[0]['amount'])->toBe(500.0);
// });

// test('should generate nfes by accrual type test 2', function () {
//     $generateInvoicesUsecase = new GenerateInvoicesUseCase();
//     $input = [
//         'month' => 2,
//         'year' => 2024,
//         'type' => 'accrual'
//     ];
//     $output = $generateInvoicesUsecase->execute($input);
//     expect($output[0]['date'])->toBe('2024-02-01');
//     expect($output[0]['amount'])->toBe(500.0);
// });

<?php

use Core\GenerateInvoicesUseCase;

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

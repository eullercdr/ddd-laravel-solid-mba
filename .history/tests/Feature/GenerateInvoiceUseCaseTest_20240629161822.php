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

test('should generate nfes by accrual type', function () {
    $generateInvoicesUsecase = new GenerateInvoicesUseCase();
    $input = [
        'month' => 1,
        'year' => 2024,
        'type' => 'accrual'
    ];
    $output = $generateInvoicesUsecase->execute($input);
    expect($output[0]['date'])->toBe('2024-01-01');
    expect($output[0]['amount'])->toBe(500.0);
    expect($output[1]['date'])->toBe('2024-02-01');
    expect($output[1]['amount'])->toBe(500.0);
    expect($output[2]['date'])->toBe('2024-03-01');
    expect($output[2]['amount'])->toBe(500.0);
    expect($output[3]['date'])->toBe('2024-04-01');
    expect($output[3]['amount'])->toBe(500.0);
    expect($output[4]['date'])->toBe('2024-05-01');
    expect($output[4]['amount'])->toBe(500.0);
    expect($output[5]['date'])->toBe('2024-06-01');
    expect($output[5]['amount'])->toBe(500.0);
    expect($output[6]['date'])->toBe('2024-07-01');
    expect($output[6]['amount'])->toBe(500.0);
    expect($output[7]['date'])->toBe('2024-08-01');
    expect($output[7]['amount'])->toBe(500.0);
    expect($output[8]['date'])->toBe('2024-09-01');
    expect($output[8]['amount'])->toBe(500.0);
    expect($output[9]['date'])->toBe('2024-10-01');
    expect($output[9]['amount'])->toBe(500.0);
});

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
    expect($output[0]['start_date'])->toBe('2024-01-01');
    expect($output[0]['amount'])->toBe(6000);
});

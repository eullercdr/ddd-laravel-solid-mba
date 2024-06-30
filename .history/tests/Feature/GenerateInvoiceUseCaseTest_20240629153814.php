<?php

use Core\GenerateInvoicesUseCase;

test('should generate nfes', function () {
    $generateInvoicesUsecase = new GenerateInvoicesUseCase();
    $input = [
        'month'=>1, 
        'year'=>2024,
        'type'=>'accrual'
    ];
    $nfes = $generateInvoicesUsecase->execute();
    expect($nfes)->toBe([]);
});

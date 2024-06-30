<?php

use App\Models\Contract;
use Core\GenerateInvoicesUseCase;

uses(Contract)->in('Feature');

test('should generate nfes', function () {
    $generateInvoicesUsecase = new GenerateInvoicesUseCase();
    $nfes = $generateInvoicesUsecase->execute();
    expect($nfes)->toBe([]);
});

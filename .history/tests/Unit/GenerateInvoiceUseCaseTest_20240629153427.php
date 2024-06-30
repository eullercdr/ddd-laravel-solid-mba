<?php

use App\Models\Contract;
use Core\GenerateInvoicesUseCase;


test('should generate nfes', function () {
    $generateInvoicesUsecase = new GenerateInvoicesUseCase();
    $nfes = $generateInvoicesUsecase->execute();
    expect($nfes)->toBe([]);
});

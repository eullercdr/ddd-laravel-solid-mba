<?php

use App\Models\Contract;
use Core\GenerateInvoicesUseCase;

setup(function () {
    $this->contract = new Contract();
});

test('should generate nfes', function () {
    $generateInvoicesUsecase = new GenerateInvoicesUseCase();
    $nfes = $generateInvoicesUsecase->execute();
    expect($nfes)->toBe([]);
});

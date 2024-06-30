<?php

use Core\GenerateInvoicesUseCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

test('should generate nfes', function () {
    $generateInvoicesUsecase = new GenerateInvoicesUseCase();
    $nfes = $generateInvoicesUsecase->execute();
    expect($nfes)->toBe([]);
});

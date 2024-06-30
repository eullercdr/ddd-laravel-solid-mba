<?php

use Core\GenerateInvoicesUseCase;

test('generateinvoiceusecase', function () {
    expect(true)->toBeTrue();
});

test('shoulg generate nfes', function () {
    $generateInvoicesUsecase = new GenerateInvoicesUseCase();
    $nfes = $generateInvoicesUsecase->execute();
    expectArray($nfes)->toBe([]);
});

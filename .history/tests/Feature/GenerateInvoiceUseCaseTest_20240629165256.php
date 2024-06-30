<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GenerateInvoiceUseCaseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $generateInvoicesUsecase = new GenerateInvoicesUseCase();
        $input = [
            'month' => 1,
            'year' => 2024,
            'type' => 'cash'
        ];
        $output = $generateInvoicesUsecase->execute($input);
        expect($output[0]['date'])->toBe('2024-01-01');
        expect($output[0]['amount'])->toBe(6000.0);
    }
}

<?php

it('has generateinvoiceusecase page', function () {
    $response = $this->get('/generateinvoiceusecase');

    $response->assertStatus(200);
});

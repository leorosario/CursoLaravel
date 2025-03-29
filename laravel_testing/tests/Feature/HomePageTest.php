<?php

test('example', function () {
    $response = $this->get('/');

    // $response->assertStatus(200);
    expect($response->status())->toBe(200);
});

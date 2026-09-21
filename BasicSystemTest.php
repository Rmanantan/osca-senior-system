<?php

namespace Tests\Feature;

use Tests\TestCase;

class BasicSystemTest extends TestCase
{
    public function test_login_page_is_available(): void
    {
        $this->get('/login')->assertStatus(200);
    }
}

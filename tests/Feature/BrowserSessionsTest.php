<?php

namespace Tests\Feature;

use App\Models\User;
use Laravel\Jetstream\Http\Livewire\LogoutOtherBrowserSessionsForm;
use Livewire\Livewire;
use Tests\DBTestCase;

class BrowserSessionsTest extends DBTestCase
{
    public function test_other_browser_sessions_can_be_logged_out()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(LogoutOtherBrowserSessionsForm::class)
                ->set('password', 'password')
                ->call('logoutOtherBrowserSessions');
    }
}

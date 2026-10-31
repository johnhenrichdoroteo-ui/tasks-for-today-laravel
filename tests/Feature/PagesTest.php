<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_welcome_page_shows_only_todays_tasks(): void
    {
        $this->travelTo(now()->setDate(2026, 10, 31)->startOfDay()->addHours(10));

        Task::factory()->create(['title' => 'Yesterday task', 'task_date' => today()->subDay()]);
        Task::factory()->create(['title' => 'Today task', 'task_date' => today()]);
        Task::factory()->create(['title' => 'Tomorrow task', 'task_date' => today()->addDay()]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Today task')
            ->assertDontSee('Yesterday task')
            ->assertDontSee('Tomorrow task');
    }

    public function test_task_list_shows_every_task_in_date_order(): void
    {
        Task::factory()->create(['title' => 'Later task', 'task_date' => today()->addDay()]);
        Task::factory()->create(['title' => 'Earlier task', 'task_date' => today()->subDay()]);

        $this->get('/tasks')->assertOk()->assertSeeInOrder(['Earlier task', 'Later task']);
    }

    public function test_profile_displays_the_database_user(): void
    {
        User::factory()->create([
            'username' => 'sample-staff',
            'full_name' => 'Sample Staff',
            'email' => 'sample@example.com',
        ]);

        $this->get('/profile')
            ->assertOk()
            ->assertSee('Sample Staff')
            ->assertSee('sample-staff')
            ->assertSee('sample@example.com');
    }

    public function test_about_page_is_available_without_database_records(): void
    {
        $this->get('/about')->assertOk()->assertSee('Business Analytics');
    }
}

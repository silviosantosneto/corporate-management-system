<?php

use App\Models\{EconomicGroup, User};
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\{actingAs, get};

uses(RefreshDatabase::class);

it('should be able to list economic groups', function () {
    // Arrange: create a user and some economic groups
    $user   = User::factory()->create();
    $groups = EconomicGroup::factory()->count(5)->create();
    // Act: log in the user and make a GET request to the groups index route
    actingAs($user);
    $response = get(route('groups.index'));
    // Assert: check if the response is OK (HTTP status 200)
    $response->assertOk();

    // Check if the response contains the names of the economic groups
    foreach ($groups as $group) {
        $response->assertSee($group->name);
    }
});

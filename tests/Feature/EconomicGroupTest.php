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
    // Assert: check if the response is OK (HTTP status 200) and contains the names of the economic groups
    $response->assertOk();
    foreach ($groups as $group) {
        $response->assertSee($group->name);
    }
});

it('should be able to view create economic group page', function () {
    // Arrange: create a user and some economic groups
    $user   = User::factory()->create();
    $groups = EconomicGroup::factory()->count(5)->create();
    // Act: log in the user and make a GET request to the groups index route
    actingAs($user);
    $response = get(route('group.create'));
    // Assert: check if the response is OK (HTTP status 200) and contains the text 'Add Economic Group'
    $response->assertOk();
    $response->assertSee('Create Economic Group');
});


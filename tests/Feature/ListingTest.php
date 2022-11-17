<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListingTest extends TestCase
{
    /**.
     * authenticated user can create a listing
     *
     * @test
     */
    public function can_create_a_listing()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/listing/create', [
            'title' => 'Honda Yaris',
            'description' => 'Selling my Honda Yaris, the car is in a perfect statel.',
            'price' => '200.00',
            'phone_number' => '0788129192',
            'email' => 'anamazing@email.com',
            'category' => "Cars"
        ]);

        $response->assertOk();
        $this->assertCount(1, Listing::all());
    }

    /**.
     * unauthenticated user cannot create a listing
     *
     * @test
     */
    public function unauthorized_cannot_create_a_listing()
    {
        $response = $this->post('/listing/create', [
            'title' => 'Honda Yaris',
            'description' => 'Selling my Honda Yaris, the car is in a perfect statel.',
            'price' => '200.00',
            'phone_number' => '0788129192',
            'email' => 'anamazing@email.com',
            'category' => "Cars"
        ]);

        $response->assertUnauthorized();
    }


    /**
     *
     * visitor can view all listings
     *
     * @test
     */
    public function can_view_listings()
    {
        $listing = Listing::factory()->create();
        $response = $this->get('/listing/' . $listing->slug);
        $response->assertViewHas('listing');
        $response->assertViewIs('view');
    }


    /**
     *
     * visitor can search all listings
     *
     * @test
     */
    public function can_search_listing()
    {
        $response = $this->post('listing/search', [
            'keyword' => 'Honda'
        ]);

        $response->assertViewHas('listing');
    }

    /**
     *
     * authenticated user can update their listing
     *
     * @test
     */
    public function can_update_listing()
    {
        $user = User::factory()->create();
        $listing = Listing::factory()->create();
        $response = $this->actingAs($user)->post('/listing/update/' . $listing->slug, [
            'description' => 'Selling my Honda Yaris, the car is in an immaculate state.',
            'price' => '220.00',
        ]);
        $this->assertEquals('Selling my Honda Yaris, the car is in an immaculate state.', Listing::first()->description);
        $this->assertEquals('220.00', Listing::first()->price);
    }

}

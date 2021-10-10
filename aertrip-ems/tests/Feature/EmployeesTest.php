<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_create_department_for_employ()
    {
        $response = $this->post('/api/ems/department/add', [
            "name" => "IT"
        ]);

        $response->assertStatus(201);
        return $response->decodeResponseJson()['id'];
    }

    /**
     * @depends test_create_department_for_employ
     */

    public function test_create_employ($dpt_id)
    {

        $response = $this->post('/api/ems/department/add/employ', [
            "name" => "Rajendra Pal Singh",
            "department_id" => $dpt_id
        ]);
        $response->assertStatus(201);
        return $response->decodeResponseJson()['id'];
    }

    /**
     * @depends test_create_employ
     */

    public function test_edit_employ($eid)
    {
        $response = $this->patch("/api/ems/employ/$eid/edit", [
            "name" => "Rajendra Singh",
        ]);
        $response->assertStatus(200);

        $check_edit = $this->get("/api/ems/employ/$eid/get");
        $check_edit->assertStatus(200);
        $this->assertEquals("Rajendra Singh", $check_edit->decodeResponseJson()['name']);

    }

    /**
     * @depends test_create_employ
     */

    public function test_add_contact_to_employ($eid)
    {
        $response = $this->post("/api/ems/employ/add/contact", [
            "phone_no" => 9685925522,
            "employ_id" => $eid,
        ]);
        $response->assertStatus(201);
        return $response->decodeResponseJson()['id'];
    }

    /**
     * @depends test_create_employ
     */

    public function test_add_address_to_employ($eid)
    {
        $response = $this->post("/api/ems/employ/add/address", [
            "address" => "30 Siddharth Nagar",
            "employ_id" => $eid,
        ]);
        $response->assertStatus(201);
        return $response->decodeResponseJson()['id'];
    }

    /**
     * @depends test_create_employ
     */

    public function test_get_employ($eid)
    {
        $response = $this->get("/api/ems/employ/$eid/get");
        $response->assertStatus(200);
        $this->assertEquals("Rajendra Singh", $response->decodeResponseJson()['name']);

    }

    public function test_search_employ()
    {
        $response = $this->get("/api/ems/employs?q=Rajendra Singh");
        $response->assertStatus(200);
    }

    /**
     * @depends test_add_contact_to_employ
     */

    public function test_edit_contact($contact_id)
    {
        $response = $this->patch("/api/ems/employ/edit/$contact_id/contact", [
            "phone_no" => 9685925522
        ]);
        $response->assertStatus(200);
    }


    /**
     * @depends test_add_address_to_employ
     */

    public function test_edit_address($address_id)
    {
        $response = $this->patch("/api/ems/employ/edit/$address_id/address", [
            "address" => "30 Siddharth Nagar"
        ]);

        $response->assertStatus(200);
    }


    /**
     * @depends test_add_contact_to_employ
     */

    public function test_delete_contact($contact_id)
    {
        $response = $this->delete("/api/ems/employ/$contact_id/contact");
        $response->assertStatus(200);
    }


    /**
     * @depends test_add_address_to_employ
     */

    public function test_delete_address($address_id)
    {
        $response = $this->delete("/api/ems/employ/$address_id/address");
        $response->assertStatus(200);
    }

    /**
     * @depends test_create_employ
     */

    public function test_delete_employ($eid)
    {
        $response = $this->delete("/api/ems/employ/$eid/delete");
        $response->assertStatus(200);
    }

    /**
     * @depends test_create_department_for_employ
     */

    public function test_delete_department($dept_id)
    {
        $response = $this->delete("/api/ems/department/$dept_id/delete");
        $response->assertStatus(200);
    }


}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Department as DepartmentModel;

class DepartmentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_add_department()
    {
        $response = $this->post('/api/ems/department/add', [
            "name" => "IT"
        ]);
        $response->assertStatus(201);
        return $response->decodeResponseJson()['id'];
    }

    /**
     * @depends test_add_department
     */

    public function test_get_department($dept_id)
    {
        $response = $this->get("/api/ems/department/$dept_id/get");
        $response->assertStatus(200);

    }

    public function test_get_departments()
    {
        $response = $this->get('/api/ems/departments');
        $response->assertStatus(200);
    }

    /**
     * @depends test_add_department
     */

    public function test_edit_department($dept_id)
    {

        $response = $this->patch("/api/ems/department/$dept_id/edit", [
            "name" => "Security"
        ]);
        $response->assertStatus(200);

        $get = DepartmentModel::find($dept_id);
        $this->assertEquals("Security", $get->name);
    }

    /**
     * @depends test_add_department
     */

    public function test_delete_department($dept_id)
    {
        $response = $this->delete("/api/ems/department/$dept_id/delete");
        $response->assertStatus(200);
    }
}

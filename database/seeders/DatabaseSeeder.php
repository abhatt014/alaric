<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Asset;
use App\Models\AssetType;
use Illuminate\Support\Carbon;
use App\Models\AssetAssignment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\AssetActivityTimeline;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Seed Asset Types
        $laptopType = AssetType::create(['type_name' => 'Laptop']);
        $desktopType = AssetType::create(['type_name' => 'Desktop']);
        $monitorType = AssetType::create(['type_name' => 'Monitor']);
        $headphoneType = AssetType::create(['type_name' => 'Headphone']);
        $mouseType = AssetType::create(['type_name' => 'Mouse']);

        // Seed Users
        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'user',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'employee_id' => 'emp1001',
            'role' => 'admin',
        ]);

        $user1 = User::create([
            'first_name' => 'user1',
            'last_name' => 'Doe',
            'email' => 'user1@example.com',
            'employee_id' => 'emp1002',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);
        $user2 = User::create([
            'first_name' => 'user2',
            'last_name' => 'Smith',
            'email' => 'user2@example.com',
            'employee_id' => 'emp1003',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);
        $user3 = User::create([
            'first_name' => 'Elon',
            'last_name' => 'Musk',
            'email' => 'elon@example.com',
            'employee_id' => 'emp1004',
            'password' => bcrypt('password'),
            'role' => 'auditor',
        ]);
        $user4 = User::create([
            'first_name' => 'hr',
            'last_name' => 'Besos',
            'email' => 'hr@example.com',
            'employee_id' => 'emp1005',
            'password' => bcrypt('password'),
            'role' => 'hr',
        ]);

        // Seed Assets
        $asset1 = Asset::create([
            'asset_type' => $laptopType->id,
            'asset_brand' => 'Dell',
            'asset_model' => 'XPS 13',
            'asset_name' => 'Dell XPS 13',
            'asset_serial' => '1234567890',
            'asset_ram' => '16',
            'asset_ssd' => '512',
            'asset_hdd' => null,
            'asset_processor' => 'Intel i7',
            'asset_status' => 'Assigned',
            'purchase_date' => Carbon::now()->subYear(),
            'purchase_cost' => 1500.00,
            'is_consumable' => 'no',
            'image_path' => '["1730146240_laptop2.jpeg"]',
        ]);

        $asset2 = Asset::create([
            'asset_type' => $desktopType->id,
            'asset_brand' => 'HP',
            'asset_model' => 'EliteDesk',
            'asset_name' => 'HP EliteDesk',
            'asset_serial' => '0987654321',
            'asset_ram' => '8',
            'asset_ssd' => '256',
            'asset_hdd' => null,
            'asset_processor' => 'Intel i5',
            'asset_status' => 'Assigned',
            'purchase_date' => Carbon::now()->subMonths(8),
            'purchase_cost' => 1000.00,
            'is_consumable' => 'no',
            'image_path' => '["1730146240_laptop2.jpeg"]',
        ]);
        $asset3 = Asset::create([
            'asset_type' => $monitorType->id,
            'asset_brand' => 'HP',
            'asset_model' => 'ViewDesk',
            'asset_name' => 'HP ViewDesk',
            'asset_serial' => '0897654321',
            'asset_ram' => null,
            'asset_ssd' => null,
            'asset_hdd' => null,
            'asset_processor' => null,
            'asset_status' => 'assigned',
            'purchase_date' => Carbon::now()->subMonths(8),
            'purchase_cost' => 1000.00,
            'is_consumable' => 'no',
            'image_path' => '["1730146240_laptop2.jpeg"]',
        ]);
        $asset4 = Asset::create([
            'asset_type' => $headphoneType->id,
            'asset_brand' => 'Jabra',
            'asset_model' => 'Conf400',
            'asset_name' => 'UX02',
            'asset_serial' => '0984554321',
            'asset_ram' => null,
            'asset_ssd' => null,
            'asset_hdd' => null,
            'asset_processor' => null,
            'asset_status' => 'assigned',
            'purchase_date' => Carbon::now()->subMonths(8),
            'purchase_cost' => 1000.00,
            'is_consumable' => 'no',
            'image_path' => '["1730146240_laptop2.jpeg"]',
        ]);
        $asset5 = Asset::create([
            'asset_type' => $mouseType->id,
            'asset_brand' => 'Lenovo',
            'asset_model' => 'M600',
            'asset_name' => 'Turbo',
            'asset_serial' => '0981014321',
            'asset_ram' => null,
            'asset_ssd' => null,
            'asset_hdd' => null,
            'asset_processor' => null,
            'asset_status' => 'unassigned',
            'purchase_date' => Carbon::now()->subMonths(8),
            'purchase_cost' => 1000.00,
            'is_consumable' => 'no',
            'image_path' => '["1730146240_laptop2.jpeg"]',
        ]);
        $asset6 = Asset::create([
            'asset_type' => $desktopType->id,
            'asset_brand' => 'Lenovo',
            'asset_model' => 'x1000 ',
            'asset_name' => 'Workstation',
            'asset_serial' => '09876599921',
            'asset_ram' => '8',
            'asset_ssd' => '256',
            'asset_hdd' => null,
            'asset_processor' => 'Intel i5',
            'asset_status' => 'unassigned',
            'purchase_date' => Carbon::now()->subMonths(8),
            'purchase_cost' => 1000.00,
            'is_consumable' => 'no',
            'image_path' => '["1730146240_laptop2.jpeg"]',
        ]);

        for ($i = 1; $i <= 5; $i++) {
            Asset::create([
                'asset_type' => $laptopType->id,
                'asset_brand' => 'Brand ' . $i,
                'asset_model' => 'LaptopModel ' . $i,
                'asset_name' => 'Laptop ' . $i,
                'asset_serial' => 'LAP12345' . $i,
                'asset_ram' => '8',
                'asset_ssd' => '256',
                'asset_hdd' => null,
                'asset_processor' => 'Intel i5',
                'asset_status' => 'unassigned',
                'purchase_date' => Carbon::now()->subDays($i),
                'purchase_cost' => rand(30000, 50000),
                'is_consumable' => 'no',
                'image_path' => '["1730146240_laptop2.jpeg"]',
            ]);
        }

        // Seed 20 Desktops
        for ($i = 1; $i <= 5; $i++) {
            Asset::create([
                'asset_type' => $desktopType->id,
                'asset_brand' => 'Brand ' . $i,
                'asset_model' => 'DesktopModel ' . $i,
                'asset_name' => 'Desktop ' . $i,
                'asset_serial' => 'DESK12345' . $i,
                'asset_ram' => '16',
                'asset_ssd' => '512',
                'asset_hdd' => '1024',
                'asset_processor' => 'Intel i7',
                'asset_status' => 'unassigned',
                'purchase_date' => Carbon::now()->subDays($i),
                'purchase_cost' => rand(1000, 1500),
                'is_consumable' => 'no',
                'image_path' => '["1730146240_laptop2.jpeg"]',
            ]);
        }

        // Seed 20 Monitors
        for ($i = 1; $i <= 5; $i++) {
            Asset::create([
                'asset_type' => $monitorType->id,
                'asset_brand' => 'Brand ' . $i,
                'asset_model' => 'MonitorModel ' . $i,
                'asset_name' => 'Monitor ' . $i,
                'asset_serial' => 'MON12345' . $i,
                'asset_ram' => null,
                'asset_ssd' => null,
                'asset_hdd' => null,
                'asset_processor' => null,
                'asset_status' => 'unassigned',
                'purchase_date' => Carbon::now()->subDays($i),
                'purchase_cost' => rand(150, 300),
                'is_consumable' => 'no',
                'image_path' => '["1730146240_laptop2.jpeg"]',
            ]);
        }

        // Assign Asset to User
        $assignment1 = AssetAssignment::create([
            'asset_id' => $asset1->id,
            'user_id' => $user1->id,
            'action_by' => $admin->id,
            'activity_notes' => 'Assigned for work',
        ]);
        $assignment2 = AssetAssignment::create([
            'asset_id' => $asset2->id,
            'user_id' => $user1->id,
            'action_by' => $admin->id,
            'activity_notes' => 'Assigned for work',
        ]);
        $assignment3 = AssetAssignment::create([
            'asset_id' => $asset3->id,
            'user_id' => $user2->id,
            'action_by' => $admin->id,
            'activity_notes' => 'Assigned for work',
        ]);
        $assignment4 = AssetAssignment::create([
            'asset_id' => $asset4->id,
            'user_id' => $user2->id,
            'action_by' => $admin->id,
            'activity_notes' => 'Assigned for work',
        ]);

        // Seed Timeline History
        // AssetActivityTimeline::create([
        //     'asset_id' => $asset1->id,
        //     'user_id' => $user->id,
        //     'action' => 'assigned',
        //     'notes' => 'Assigned for software development work',
        // ]);

        // AssetActivityTimeline::create([
        //     'asset_id' => $asset2->id,
        //     'user_id' => $user->id,
        //     'action' => 'added',
        //     'notes' => 'Asset added to inventory',
        // ]);



        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

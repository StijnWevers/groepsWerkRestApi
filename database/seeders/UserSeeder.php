<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['firstname' => 'Alice', 'lastname' => 'Johnson', 'email' => 'alice.johnson1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Bob', 'lastname' => 'Smith', 'email' => 'bob.smith1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Charlie', 'lastname' => 'Brown', 'email' => 'charlie.brown1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'David', 'lastname' => 'Williams', 'email' => 'david.williams1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Eve', 'lastname' => 'Davis', 'email' => 'eve.davis1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Frank', 'lastname' => 'Miller', 'email' => 'frank.miller1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Grace', 'lastname' => 'Wilson', 'email' => 'grace.wilson1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Hannah', 'lastname' => 'Moore', 'email' => 'hannah.moore1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Ivy', 'lastname' => 'Taylor', 'email' => 'ivy.taylor1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Jack', 'lastname' => 'Anderson', 'email' => 'jack.anderson1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Kylie', 'lastname' => 'Thomas', 'email' => 'kylie.thomas1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Leo', 'lastname' => 'Jackson', 'email' => 'leo.jackson1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Mia', 'lastname' => 'White', 'email' => 'mia.white1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Nora', 'lastname' => 'Harris', 'email' => 'nora.harris1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Oscar', 'lastname' => 'Martin', 'email' => 'oscar.martin1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Penny', 'lastname' => 'Clark', 'email' => 'penny.clark1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Quincy', 'lastname' => 'Lewis', 'email' => 'quincy.lewis1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Rachel', 'lastname' => 'Roberts', 'email' => 'rachel.roberts1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Sam', 'lastname' => 'Walker', 'email' => 'sam.walker1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Tina', 'lastname' => 'Young', 'email' => 'tina.young1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Ursula', 'lastname' => 'Allen', 'email' => 'ursula.allen1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Victor', 'lastname' => 'King', 'email' => 'victor.king1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Wendy', 'lastname' => 'Scott', 'email' => 'wendy.scott1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Xander', 'lastname' => 'Hill', 'email' => 'xander.hill1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Yvonne', 'lastname' => 'Adams', 'email' => 'yvonne.adams1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Zach', 'lastname' => 'Baker', 'email' => 'zach.baker1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Amelia', 'lastname' => 'Evans', 'email' => 'amelia.evans1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Ben', 'lastname' => 'Morris', 'email' => 'ben.morris1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Catherine', 'lastname' => 'Green', 'email' => 'catherine.green1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Daniel', 'lastname' => 'Robinson', 'email' => 'daniel.robinson1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Ella', 'lastname' => 'Parker', 'email' => 'ella.parker1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Felix', 'lastname' => 'Evans', 'email' => 'felix.evans1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'George', 'lastname' => 'Collins', 'email' => 'george.collins1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Helen', 'lastname' => 'Baker', 'email' => 'helen.baker1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Ian', 'lastname' => 'Roberts', 'email' => 'ian.roberts1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Jane', 'lastname' => 'Cook', 'email' => 'jane.cook1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Kevin', 'lastname' => 'Lee', 'email' => 'kevin.lee1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Lilly', 'lastname' => 'Scott', 'email' => 'lilly.scott1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Mark', 'lastname' => 'Taylor', 'email' => 'mark.taylor1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Nina', 'lastname' => 'King', 'email' => 'nina.king1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Oliver', 'lastname' => 'Clark', 'email' => 'oliver.clark1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Paige', 'lastname' => 'Harris', 'email' => 'paige.harris1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Quinn', 'lastname' => 'Adams', 'email' => 'quinn.adams1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Riley', 'lastname' => 'Young', 'email' => 'riley.young1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Sophia', 'lastname' => 'Nelson', 'email' => 'sophia.nelson1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Tom', 'lastname' => 'Parker', 'email' => 'tom.parker1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Uma', 'lastname' => 'Jones', 'email' => 'uma.jones1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Vera', 'lastname' => 'Gonzalez', 'email' => 'vera.gonzalez1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'William', 'lastname' => 'White', 'email' => 'william.white1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Xena', 'lastname' => 'Martin', 'email' => 'xena.martin1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Yara', 'lastname' => 'Lopez', 'email' => 'yara.lopez1@example.com', 'password' => Hash::make('password123')],
            ['firstname' => 'Zane', 'lastname' => 'Gomez', 'email' => 'zane.gomez1@example.com', 'password' => Hash::make('password123')],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

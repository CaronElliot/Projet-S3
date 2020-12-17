<?php

namespace Database\Seeders;

use App\Models\Commentaire;
use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Mecanique;
use App\Models\Theme;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $faker = Factory::create('fr_FR');
        User::factory()->create([
            'name' => 'Robert Duchmol',
            'email' => 'robert.duchmol@domain.fr',
            'email_verified_at' => now(),
            'password' => '$2y$10$TKaVnYUC6y/IPQk8Gjaw7uBB.1xqNnqi/n4xo5uBH6Eok6ZrEpQdC', // secret00 je crois
            'remember_token' => Str::random(10),
        ]);
        $this->call(
            [
                EditeursSeederTable::class,
                MecaniquesSeeder::class,
                ThemesSeeder::class,
                UsersSeeder::class,
            ]
        );
        $jeux = Jeu::factory(50)->create();
        $mecanisque_ids = Mecanique::all()->pluck('id');
        $user_ids = User::all()->pluck('id');
        $theme_ids = Theme::all()->pluck('id');
        $editeurs_ids = Editeur::all()->pluck('id');
        foreach ($jeux as $jeu) {
            $nbMecs = $faker->numberBetween(1, 3);
            $mecs = $faker->randomElements($mecanisque_ids, $nbMecs);
            $jeu->mecaniques()->attach($mecs);
            $nbAchats = $faker->numberBetween(2, 5);
            $achat_ids = $faker->randomElements($user_ids, $nbAchats);
            for ($i = 0; $i < $nbAchats; $i++) {
                $jeu->acheteurs()->attach($achat_ids[$i], ['lieu' => $faker->word(),
                    'prix' => $faker->randomFloat(2, 50, 250),
                    'date_achat' => $faker->dateTimeInInterval(
                        $startDate = '-6 months',
                        $interval = '+ 180 days',
                        $timezone = date_default_timezone_get()
                    )]);
            }
            $jeu->save();
        }
        Commentaire::factory(100)->create();
        Jeu::factory()->create([
            'nom' => 'Monopoly',
            'regles' => 'Etre le dernier joueur à avoir de l\'argent.',
            'langue' => 'Fr',
            'url_media' => null,
            'nombre_joueurs' => 4,
            'duree' => '2h30',
            'description' => 'Un super jeu',
            'theme_id' => $faker->randomElement($theme_ids),
            'user_id' => $faker->randomElement($user_ids),
            'editeur_id' => $faker->randomElement($editeurs_ids),
        ]);

        Jeu::factory()->create([
            'nom' => 'Uno',
            'regles' => 'Each player starts with 7 cards in hand. The goal of the game is to be the first player to have no cards left. In turn, players will place a card on the discard pile if the card visible on the discard pile has the same number or color.
</br> If they cant play, they draw a card.
</br> There are special cards like:
</br> - the next player passes his turn
</br> - the direction of the turn changes
</br> - next player draws 2 or 4 cards
</br> - the player chooses the colour of the next card placed
</br> When a player has only one card he must say: "Uno".
</br> Other players can say: "Counter-Uno" before, if this is the case, the player having only one card must draw 2.',
            'langue' => 'En',
            'url_media' => null,
            'nombre_joueurs' => 6,
            'duree' => '15',
            'description' => 'A fast and dynamic game. Play with friends or families.',
            'theme_id' => 3,
            'user_id' => 6,
            'editeur_id' => 20,
        ]);
    }
}

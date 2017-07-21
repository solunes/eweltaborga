<?php

use Illuminate\Database\Seeder;

class TruncateSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ContactForm::truncate();
        \App\Contact::truncate();
        \App\Customer::truncate();
        \App\Member::truncate();
        \App\Service::truncate();
        \App\Type::truncate();
        \App\ContentTranslation::truncate();
        \App\Content::truncate();
        \App\TitleTranslation::truncate();
        \App\Title::truncate();
        \App\SocialNetwork::truncate();

    }
}
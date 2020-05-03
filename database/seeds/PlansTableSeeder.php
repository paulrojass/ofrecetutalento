<?php

use App\Plan;

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = new Plan();
        $plan->name = "Caza Talentos";        
        $plan->talents = 0;
        $plan->photos = 0;
        $plan->videos = 0;
        $plan->pdfs = 0;
        $plan->pdf_size = 0;
        $plan->save();

        $plan = new Plan();
        $plan->name = "Novato";
        $plan->monthly_price = 0;
        $plan->quarterly_price = 0;
        $plan->annual_price = 0;
        $plan->talents = 3;
        $plan->photos = 1;
        $plan->videos = 1;
        $plan->pdfs = 1;
        $plan->pdf_size = 5;
        $plan->save();

        $plan = new Plan();
        $plan->name = "Pro";
        $plan->monthly_price = 7;
        $plan->quarterly_price = 18;
        $plan->annual_price = 72;
        $plan->talents = 5;
        $plan->photos = 5;
        $plan->videos = 3;
        $plan->pdfs = 10;
        $plan->pdf_size = 30;
        $plan->save();

        $plan = new Plan();
        $plan->name = "Oro";
        $plan->monthly_price = 26;
        $plan->quarterly_price = 72;
        $plan->annual_price = 290;
        $plan->recommendations = 3;       
        $plan->pdf_size = 500;
        $plan->save();        
    }
}

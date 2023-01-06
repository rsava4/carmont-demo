<?php

namespace App\Console\Commands\Temp;

use Illuminate\Console\Command;
use App\Models\Temp\OldArticle;
use App\Models\Temp\ArticleImage;
use App\Models\Price\PriceOffer;
use App\Models\Tecdoc\Brands;
use App\Models\Tecdoc\Article;

use Illuminate\Support\Str;

class MoveArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'temp:movearticles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $i = 0;

        $brands = Brands::select('supplier_id', 'slug')->orderBy('id')->get();

        foreach ($brands as $brand){
            PriceOffer::where('brand_slug', $brand->slug)->where('supplier_id', 0)->update(['supplier_id'=> $brand->supplier_id]);
            $i++;
            dump($i);
        }

        return 0;
    }
}

<?php

namespace App\Console\Commands\Temp;

use Illuminate\Console\Command;
use App\Models\Tecdoc\Article;
use App\Models\Temp\ArticlePrd;

class SaveProductToArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'temp:addproduct';

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
        $i=0;
        Article::select('id', 'supplier_id', 'sku')->chunk(10000, function($articles) use(&$i){
            foreach ($articles as $article) {
                $prd = ArticlePrd::select('productId')->where('supplierid', $article->supplier_id)->where('datasupplierarticlenumber', $article->sku)->first();
                if($prd){
                    $article->product_id = $prd->productId;
                    $article->save();
                }
            }
            $i++;
            dump($i*10000);
        });
        return 0;
    }
}

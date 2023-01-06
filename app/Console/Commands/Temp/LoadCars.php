<?php

namespace App\Console\Commands\Temp;


use App\Models\Temp\PassangerCarAttribute;
use Illuminate\Console\Command;

use App\Models\Tecdoc\SeoCategory as SeoCategory;
use App\Models\Tecdoc\SeoMaker as SeoMaker;
use App\Models\Tecdoc\SeoModel as SeoModel;
use App\Models\Tecdoc\SeoGeneration as SeoGeneration;
use App\Models\Tecdoc\SeoModification;
use App\Models\Tecdoc\Brands;
use App\Models\RouteTypeMetaTemplate;

use App\Models\Tecdoc\SeoCarRoute;
use Illuminate\Support\Str;
use DB;

class LoadCars extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'temp:loadold';

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
        foreach (DB::table('carmont_test.seo_categories')->orderBy('nested_lk')->get() as $category) {
            SeoCategory::create([
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->alias,
                'parent_id' => $category->parent_id,
                'n_left' => $category->nested_lk,
                'n_right' => $category->nested_rk,
                'n_level' => $category->nested_level,
                'image' => $category->image,
                'is_active' => $category->is_active,
                'is_popular' => $category->is_popular,
                'has_products' => $category->products_count>0? 1: 0,
                'position' => $category->position,
            ]);
        }


        /*foreach (DB::table('carmont_td.passanger_cars')->select('id', 'constructioninterval', 'description', 'fulldescription', 'modelid')->orderBy('id')->get() as $mod){
            SeoModification::create([
                'id' => $mod->id,
                'name' => $mod->description,
                'fullname' => $mod->fulldescription,
                'construction_interval' => $mod->constructioninterval,
                'attributes' => array(),
                'seo_generation_id' => $mod->modelid
            ]);
        }*/


        /*foreach (SeoGeneration::select('id', 'slug', 'body_type')->orderBy('id', 'DESC')->get() as $item) {
            if(SeoCarRoute::where('slug', $item->slug)->where('routable_id', '!=', $item->id)->exists()){
                $item->slug=$item->slug.'-'.Str::slug($item->body_type);
                $item->save();
            }
            $test = $item->carRoute()->firstOrCreate(['slug' => $item->slug, 'path'=>$item->slug]);
        }*/

        /*foreach (SeoMaker::select('id', 'slug')->orderBy('id', 'DESC')->get() as $item) {
            $test = $item->carRoute()->firstOrCreate(['slug' => $item->slug, 'path'=>$item->slug]);
        }*/
        /*foreach (SeoModel::select('id', 'slug')->orderBy('id', 'DESC')->get() as $item) {
            if(SeoCarRoute::where('slug', $item->slug)->where('routable_id', '!=', $item->id)->exists()){
                $item->slug=$item->slug.'-2';
                $item->save();
            }
            $test = $item->carRoute()->firstOrCreate(['slug' => $item->slug, 'path'=>$item->slug]);
        }*/
      /*  foreach (SeoMaker::orderBy('id')->get() as $maker) {
            SeoModel::where('seo_maker_id', $maker->id)->update(['fullname' => DB::raw( 'CONCAT("'.$maker->name.'", " ", name)')]);
        }*/

        /*foreach (TempGeneration::orderBy('id')->get() as $generation) {
            $bt = BodyType::find($generation->seo_body_type_id);

            SeoGeneration::create([
                'id' => $generation->id,
                'name' => $generation->name,
                'fullname' => $generation->fullname,
                'slug' => $generation->slug,
                'body_type' => $bt->name,
                'start_date' => $generation->start_date,
                'end_date' => $generation->end_date,
                'image' => $generation->image,
                'seo_model_id' => $generation->seo_model_id
            ]);
        }

        dump('finish generation');*/

        /*foreach (PassangerCar::orderBy('id')->with(['attrs'])->get() as $modification) {
            $attributes = [];
            foreach ( as $attr) {
                $displayvalue = $attr->displayvalue;
                $sortvalue = $attr->displayvalue;
                if (!empty($attr->unit_value) && !empty($attr->unit) && !empty($attr->displayvalue)) {
                    $displayvalue = Str::replaceFirst($attr->unit_value, $attr->unit, Str::lower($attr->displayvalue));
                    $sortvalue = trim(Str::replaceFirst($attr->unit_value, '', Str::lower($attr->displayvalue)));
                }

                $attributes[$attr->position]['displayvalue'] = (!empty($attributes[$attr->position]['displayvalue'])) ? $attributes[$attr->position]['displayvalue'] . ',' . $displayvalue : $displayvalue;
                $attributes[$attr->position]['unit'] = $attr->unit;
                $attributes[$attr->position]['id'] = $attr->id;
                $attributes[$attr->position]['unit_value'] = $attr->unit_value;
                $attributes[$attr->position]['sortvalue'] = ($sortvalue != $attr->displayvalue) ? 0 + $sortvalue : $sortvalue; //костыль для конвертации в число
                $attributes[$attr->position]['title'] = $attr->title;

            }

            SeoModification::create([
                'id' => $modification->id,
                'name' => $modification->description,
                'fullname' => $modification->fulldescription,
                'construction_interval' => $modification->constructioninterval,
                'attributes' => $attributes,
                'seo_generation_id' => $modification->modelid
            ]);
        }*/

        return 0;
    }
}

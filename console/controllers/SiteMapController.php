<?php
namespace console\controllers;

use common\models\Brands;
use common\models\Category;
use common\models\Firms;
use common\models\Models;
use samdark\sitemap\Sitemap;
use samdark\sitemap\Index;
use Yii;
use yii\base\Model;
use yii\console\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Console;

class SiteMapController extends Controller
{
    private $site = "https://russia-services.com";
    private $brand = [];//записываем бренды
    private $mod;//записываем бренды
    private $cat = [];//записываем категории
    private $firm = [];//записываем категории
    private $cat_br = [];//записываем категории+бренды
    private $br_site = [];//хост+бренд
    private $cat_site = [];//хост+категория
    private $alf_site = [];//хост+буква
    private $firm_site = [];//хост+фирма
    private $cat_br_site = [];//хост+фирма

    public function actionCreate()
    {

        $sitemap = new Sitemap("../frontend/web/123qweasdzcx.xml");

            $sitemap->addItem('https://russia-services.com/categories');

            $sitemap->addItem('https://russia-services.com/view');

            foreach ($this->BrandUrl() as $b) {
                $sitemap->addItem($b);
            }
            foreach ($this->CatdUrl() as $c) {
                $sitemap->addItem($c);
            }
            foreach ($this->AlphabetdUrl() as $a) {
                $sitemap->addItem($a);
            }
            foreach ($this->FirmdUrl() as $f) {
                $sitemap->addItem($f);
            }

            foreach ($this->CatBrdUrl() as $c_b) {
                $sitemap->addItem($c_b);
            }
           foreach ($this->ModelUrl() as $m) {
                $sitemap->addItem($m);
            }

        //$this->ModelUrl();

        $sitemap->write();

    }

    private function BrandUrl()
    {
        $this->brand = Brands::find()->select('name')->asArray()->column();
        foreach ($this->brand as $key => $value) {
            $this->br_site[$key] = $this->site . '/brands/' . str_replace(' ', '-', trim(strtolower($value)));
        }
        return $this->br_site;
    }

    private function CatdUrl()
    {
        $this->cat = Category::find()->select('slug')->where(['status' => 1])->asArray()->column();
        foreach ($this->cat as $key => $value) {
            $this->cat_site[$key] = $this->site . '/' . str_replace(' ', '-', trim(strtolower($value)));
        }
        return $this->cat_site;
    }

    private function AlphabetdUrl()
    {
        $alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '1'];

        foreach ($alphabet as $key => $value) {
            $this->alf_site[$key] = $this->site . '/brands/' . $value;
        }
        return $this->alf_site;
    }

    private function FirmdUrl()
    {
        $this->firm = Firms::find()->select('id')->asArray()->column();
        foreach ($this->cat as $key => $value) {
            $this->firm_site[$key] = $this->site . '/firms/' . $value;
        }
        return $this->firm_site;
    }

    private function CatBrdUrl()
    {

        $qwe = Category::find()->with('brands')->where(['status' => 1])->asArray()->all();
        foreach ($qwe as $category) {
            foreach ($category['brands'] as $brand) {
                $this->cat_br_site [$category['id']] = $this->site . '/' . $category['slug'] . '/' . strtolower($brand['name']);
            }
        }
        return $this->cat_br_site;
    }

    private function ModelUrl()
    {

        $qwe = Category::find()->with('brands')->where(['status' => 1])->asArray()->all();
        foreach ($qwe as $category) {
            foreach ($category['brands'] as $brand) {
                if (!empty($t = Models::find()->select('tovar')->where(['id_category' => $category['id'], 'id_brands' => $brand['id']])->asArray()->column())) {
                    foreach ($t as $val) {
                        $val = iconv('UTF-8', 'cp1251//IGNORE', $val);
                        $val = iconv('cp1251', 'UTF-8//IGNORE', $val);
                        $this->mod[] = $this->site . '/' . $category['slug'] . '/' . strtolower($brand['name'] . '/' . $val);
//                               if (false === filter_var($this->mod, FILTER_VALIDATE_URL)) {
//                                   $file = fopen('log.txt','a');
//                                   foreach ( $text = $this->mod as $url){
//                                       $text = $url."\r\n";
//                                       fwrite($file,$text);// выдает 'fwrite(): 103 is not a valid stream resource' разобраться
//                                       fclose($file);
//                                   }
//
//                            }
                    }
                }

            }
        }
        return $this->mod;
    }
}

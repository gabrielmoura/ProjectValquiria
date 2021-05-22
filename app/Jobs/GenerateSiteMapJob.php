<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use SimpleXMLElement;

class GenerateSiteMapJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Este deverá ser executado de 15 a 30 dias recorrente.
        $sitemap = [];
        foreach (Product::all() as $product) {
            $sitemap[route('product.single', ['slug' => $product->slug])] = 'loc';
        }
        $xml = new SimpleXMLElement('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
        array_walk_recursive($sitemap, array($xml, 'addChild'));
        //$xml->asXML();
        $xml->saveXML(public_path('sitemap.xml'));

    }
}

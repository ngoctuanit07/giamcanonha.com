<?php
	
	namespace App\Console\Commands;
	use Carbon\Carbon;
	use Illuminate\Console\Command;
	use Spatie\Sitemap\SitemapGenerator;
	use Spatie\Sitemap\Tags\Url;
	
	class GenerateSitemap   extends Command
	{
		/**
		 * The console command name.
		 *
		 * @var string
		 */
		protected $signature = 'sitemap:generate';
		
		/**
		 * The console command description.
		 *
		 * @var string
		 */
		protected $description = 'Generate the sitemap.';
		
		
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
		 * @return mixed
		 */
		public function handle()
		{
			//
			SitemapGenerator::create("https://www.giamcanonha.com/")
				->hasCrawled(function (Url $url) {
					if ($url->segment(1) === 'contact') {
						return;
					}
					
					return $url;
				})
				->setMaximumCrawlCount(500)
				->writeToFile(public_path('sitemap.xml'));
		}
	}

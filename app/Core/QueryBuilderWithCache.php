<?php
	
	namespace App\Core;
	
	use Cache;
	use Illuminate\Database\ConnectionInterface;
	use Illuminate\Database\Query\Grammars\Grammar;
	use Illuminate\Database\Query\Processors\Processor;
	use Illuminate\Database\Query\Builder as QueryBuilder;
	
	class QueryBuilderWithCache extends QueryBuilder
	{
		protected $cacheTime;
		
		public function __construct(
			ConnectionInterface $connection,
			Grammar $grammar = null,
			Processor $processor = null,
			int $cacheTime = 0
		)
		{
			$this->cacheTime = $cacheTime;
			parent::__construct($connection, $grammar, $processor);
		}
		
		public function cacheKey()
		{
			return md5(vsprintf('%s.%s.%s', [
				$this->toSql(),
				implode('.', $this->getBindings()),
				!$this->useWritePdo,
			]));
		}
		
		protected function cacheTime()
		{
			return property_exists($this, 'cacheTime') ? $this->cacheTime : 0;
		}
		
		protected function newBaseQueryBuilder()
		{
			$connection = $this->getConnection();
			
			return new QueryBuilderWithCache(
				$connection,
				$connection->getQueryGrammar(),
				$connection->getPostProcessor(),
				$this->cacheTime()
			);
		}
		
		protected function runSelect()
		{
			if ($this->cacheTime) {
				return Cache::remember($this->cacheKey(), $this->cacheTime, function () {
					return parent::runSelect();
				});
			}
			
			return parent::runSelect();
		}
	}
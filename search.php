<?php
	define('BASE', dirname(__FILE__));
	define('APP_CONSUMER_KEY', 'fcyCZ3IbEIEoQTyga3PYbUzkM');
	define('APP_CONSUMER_SECRET', '5GRNcYO7QiLpHgHW22pgzUiOFX61OInizBWxOYWHP6d2RR1KHj');
	define('ACCESS_TOKEN', '164936578-keERLE7jTtXMNQwtm9Fv18mZ1fm8lvUj6oVpFsLe');
	define('ACCESS_TOKEN_SECRET', 'vqwTdozZqVkK7OEfKzscJ28g93HOLGg3to24qnJw1sqbg');
	// activar la caché?
	define('CACHE_ENABLED', true);

	// Parsear el texto del tweet, añadiendo menciones, links y hashtags
	function tweet_text($text) {
		// urls: lo primero para que no conviertan los links posteriores
		$text =  preg_replace("/(http:\/\/[^\s]+)/", '<a href="$1" class="tweet-link" target="_blank">$1</a>', $text);
		// menciones
		$text =  preg_replace("/(^|\W)@([A-Za-z0-9_]+)/", '$1<a href="http://twitter.com/$2" class="tweet-mention" target="_blank">@$2</a>', $text);
		// hashtags
		$text =  preg_replace("/(^|\W)#([^\s]+)/", '$1<a href="?q=%23$2" class="tweet-hash" target="_blank">#$2</a>', $text);
		return $text;
	}
	// Si estamos en la página de resultados
	if( isset($_GET['q']) && !empty($_GET['q']) ) {
		$results = null;
		if( CACHE_ENABLED ) {
			// Lo primero que hacemos es configurar la caché y ver si hay resultados almacenados
			include 'inc/Cache.php';
			Cache::configure(array(
				'cache_dir' => BASE . '/cache',
				'expires' => 1 // hora
			));
			$results = Cache::get($_GET['q']);
		}
		// Si no hay resultados previamente almacenados en la caché
		if( ! $results ) {
			// Incluímos la librería, hacemos la búsqueda y lo guardamos
			include 'inc/twitteroauth.php';

			$twitteroauth = new TwitterOAuth(APP_CONSUMER_KEY, APP_CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
			$results = $twitteroauth->get('search/tweets', array(
				'q' => $_GET['q'], // Nuestra consulta
				'lang' => 'es', // Lenguaje (español)
				'count' => 3, // Número de tweets
				'include_entities' => false, // No nos interesa información adicional. Ver: https://dev.twitter.com/docs/tweet-entities
			));
			if( CACHE_ENABLED ) {
				Cache::put($_GET['q'], $results);
			}
		}


	}
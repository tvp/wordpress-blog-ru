<?php

/**
 * Twitter class, extending from SimplePie class which is available at <code>wp-includes</code> folder.
 *
 * @author James Lloyd R. Atwil
 */
class Padd_Twitter extends SimplePie {

	/**
	 * The Twitter username.
	 *
	 * @var string
	 */
	protected $username;

	/**
	 * Number of tweets to be displayed at a time.
	 *
	 * @var int
	 */
	protected $limit;

	/**
	 * Sets the tweets are in unordered list mode or not.
	 *
	 * @var boolean
	 */
	protected $list_mode;

	/**
	 * Constructor for Twitter class.
	 *
	 * @param string $username
	 * @param int $limit
	 * @param boolean $list_mode
	 */
	public function __construct($username, $limit = 1, $list_mode = false) {
		$this->username = $username;
		$this->limit = $limit;
		$this->list_mode = $list_mode;
		if (method_exists(parent,'__construct')) {
			parent::__construct();
		} else {
			$this->SimplePie();
		}
		if (!empty($this->username)) {
			$this->set_feed_url('http://twitter.com/statuses/user_timeline/' . $username . '.rss');
			$this->set_cache_class('WP_Feed_Cache');
			$this->init();
		}
	}

	/**
	 * Returns the Twitter username.
	 *
	 * @return string
	 */
	public function get_username() {
		return $this->username;
	}

	/**
	 * Sets the Twitter username.
	 *
	 * @param string $username
	 */
	public function set_username($username) {
		$this->username = $username;
	}

	/**
	 * Returns the number of tweets at a time.
	 *
	 * @return int
	 */
	public function get_limit() {
		return $this->limit;
	}

	/**
	 * Sets the number of tweets at a time.
	 *
	 * @param int $limit
	 */
	public function set_limit($limit) {
		$this->limit = $limit;
	}

	/**
	 * Returns whether the tweets are in list mode or not.
	 *
	 * @return <
	 */
	public function get_list_mode() {
		return $this->list_mode;
	}

	public function set_list_mode($list_mode) {
		$this->list_mode = $list_mode;
	}

	/**
	 * Function to render the tweets.
	 */
	public function show_tweets() {

		if ($this->list_mode) {
			echo '<ul class="padd-twitter">';
		}

		if (empty($this->username)) {
			if ($this->list_mode) {
				echo '<li>';
			} else {
				echo '<p class="padd-twitter-message">';
			}
			echo __('Twitter settings is not configured.', PADD_THEME_SLUG);
			if ($this->list_mode) {
				echo '</li>';
			} else {
				echo '</p>';
			}
		} else {
			$count = $this->get_item_quantity();
			if ($count > 0) {
				$i = 0;
				foreach ($this->get_items(0, $this->limit) as $item) {
					$message = $item->get_description();
					$message = substr(strstr($message,': '), 2, strlen($message));
					if ($this->list_mode) {
						echo '<li class="padd-twitter-item">';
					} else if ($num != 1) {
						echo '<p class="padd-twitter-message">';
					}

			          $message = $this->parse_hyperlinks($message);
			          $message = Padd_Twitter::parse_twitter_users($message);

			          echo $message;
					$time = strtotime($item->get_date());

					if ((abs(time()-$time)) < 86400 ) {
						$h_time = sprintf(__('%s ago'), human_time_diff($time));
					} else {
						$h_time = date(__('d.m.Y'), $time);
					}

			          echo ' <span class="padd-twitter-timestamp"><abbr title="' . date(__('d.m.Y G:i'), $time) . '">' . $h_time . '</abbr></span>';

					if ($this->list_mode) {
						echo '</li>';
					} elseif ($this->limit != 1) {
						echo '</p>';
					}
					$i++;
					if ( $i >= $this->limit ) {
						break;
					}
				}
			}
			if ($this->list_mode) {
				echo '</ul>';
			}
		}
	}

	/**
	 * Function to parse the hyperlinks (anchors).
	 *
	 * @param string $text
	 * @return string
	 */
	private function parse_hyperlinks($text) {
		// Props to Allen Shaw & webmancers.com
		// match protocol://address/path/file.extension?some=variable&another=asf%
		//$text = preg_replace("/\b([a-zA-Z]+:\/\/[a-z][a-z0-9\_\.\-]*[a-z]{2,6}[a-zA-Z0-9\/\*\-\?\&\%]*)\b/i","<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
		$text = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
		// match www.something.domain/path/file.extension?some=variable&another=asf%
		//$text = preg_replace("/\b(www\.[a-z][a-z0-9\_\.\-]*[a-z]{2,6}[a-zA-Z0-9\/\*\-\?\&\%]*)\b/i","<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);
		$text = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);

		// match name@address
		$text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text);
		//mach #trendingtopics. Props to Michael Voigt
		$text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $text);
		return $text;
	}

	/**
	 * Function to parse the user tag (the @ sign).
	 *
	 * @param string $text
	 * @return string
	 */
	private function parse_twitter_users($text) {
		$text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $text);
		return $text;
	}


}


<?php
/**
 * Hook Component
 *
 * PHP version 5
 *
 * @package	 QuickApps.Controller.Component
 * @version	 1.0
 * @author	 Christopher Castro <chris@quickapps.es>
 * @link	 http://www.quickappscms.org
 */
class QuickAppsComponent extends Component {
/**
 * Controller reference.
 *
 * @var Controller
 */
	public $Controller;

/**
 * Called before the Controller::beforeFilter().
 *
 * @param object $controller Controller with components to initialize
 * @return void
 */
	public function initialize(Controller $Controller) {
		$this->Controller = $Controller;

		$this->loadVariables();
		$this->setLanguage();
		$this->setCrumb();
	}


/**
 * Set system language for the current user.
 *
 * @return void
 */
	public function setLanguage() {
		$langs = $this->Controller->Language->find('all', array('conditions' => array('status' => 1), 'order' => array('ordering' => 'ASC')));
		$installed_codes = Hash::extract($langs, '{n}.Language.code');

		if (isset($this->Controller->request->params['language'])) {
			if (in_array($this->Controller->request->params['language'], $installed_codes)) {
				$lang = $this->Controller->request->params['language'];
			} else {
				header('Location: ' . $this->Controller->request->base);
				exit;
			}
		} else {
			$lang = CakeSession::read('Config.language');
		}

		$lang = isset($this->Controller->request->params['named']['lang']) ? $this->Controller->request->params['named']['lang'] : $lang;
		$lang = isset($this->Controller->request->query['lang']) && !empty($this->Controller->request->query['lang']) ? $this->Controller->request->query['lang'] : $lang;
		$lang = empty($lang) ? Configure::read('Variable.default_language') : $lang;
		$lang = empty($lang) || strlen($lang) != 3 || !in_array($lang, $installed_codes) ? 'eng' : $lang;
		$lang = Hash::extract($langs, "{n}.Language[code={$lang}]");

		if (!isset($lang[0])) {
			// undefined => default = english
			$lang = array(
				'code' => 'eng',
				'name' => 'English',
				'native' => 'English',
				'direction' => 'ltr'
			);
		} else {
			$lang = $lang[0];
		}

		Configure::write('Variable.language', $lang);
		Configure::write('Variable.languages', $langs);
		Configure::write('Config.language', Configure::read('Variable.language.code'));
		CakeSession::write('Config.language', Configure::read('Variable.language.code'));
	}

/**
 * Shortcut for `$this->set(`title_for_layout`, ...)`.
 *
 * @param string $title Title for layout
 * @return void
 */
	public function title($title) {
		$this->Controller->set('title_for_layout', $title);
	}

/**
 * Shortcut for Session setFlash().
 *
 * @param string $msg Mesagge to display
 * @param string $class Type of message: 'error', 'success', 'alert', 'bubble'. (default 'success')
 * @param string $id Message id. (default 'flash')
 * @return void
 */
	public function flashMsg($msg, $class = 'success', $id = 'flash') {
		$message = $msg;
		$element = 'theme_flash_message';
		$params = array('class' => $class);

		CakeSession::write("Message.{$id}", compact('message', 'element', 'params'));
	}

/**
 * Set crumb based on the given menu-link or based on the given links list.
 *
 * ### Basic usage
 *
 *    setCrumb(
 *        array('Link title 1', '/link_1/url.html'),
 *        array('Link title 2', '/link_2/url.html', 'dec. for title attribute'),
 *        array('Link title 3', '', 'No url', 'pattern' => '/content/edit/*'),
 *        ...
 *    );
 *
 * The above list of links will be pushed to crumbs stack, and will produce the
 * path below:
 *
 *    Link title 1 » Link title 2 » Link title 3
 *
 * **NOTE**:
 * The special keyword `pattern` will mark as active the given element when the current URL match
 * the given pattern.
 *
 * ### Based on menu link
 *
 *    setCrumb('/url/of/menu/link.html');
 *
 * The above example will try to find if there is any link with the given url registered on
 * _any menu_ and will generate the corresponding path.
 *
 * #### Example
 *
 * Lets suppose the following "Main Menu" (id: main-menu):
 *
 * - Home [/]
 *   - Documentation [/page/documentation.html]
 *     - API [/page/api.html]
 *       - Books [/page/books.html]
 *         - Book 1.0 [/page/book-1-0.html]
 *         - Book 2.0 [/page/book-2-0.html]
 *
 * Now if you want to generate the breadcrumb for the 'Book 2.0' link you could do this:
 *
 *    setCrumb('/page/book-2-0.html');
 *
 * The above will produce the following breadcrumb:
 *
 *    Documentation » Books » Book 2.0
 *
 * ***
 *
 * In some cases you may have the same link on different menus. In that case the first matching link
 * will be processed. To avoid confusions you can use a Dot-Syntax to indicate to which menu your link
 * belongs to:
 *
 *    setCrumb('main-menu./page/book-2-0.html');
 *
 * The above will generate the path for the link `/page/book-2-0.html` that belongs to menu
 * with and ID equals to `main-menu`.
 *
 * @param mixed $url List of links to push to the crumbs list. Or url as string (dot-syntax allowed)
 * @return void
 */
	public function setCrumb($url = false) {
		// Breadcrumb item structure
		$__item = array(
			'title' => null,		// TITLE for Html::link()
			'url' => null,			// URL for Html::link()
			'active' => false,		// TRUE if active
			'options' => array()	// Extra options for Html::link()
		);

		if (func_num_args() > 1) {
			foreach (func_get_args() as $arg) {
				$this->setCrumb($arg);
			}
		}

		if (is_array($url) && !empty($url)) {
			if (is_array($url[0])) {
				foreach ($url as $link) {
					if (empty($link)) {
						continue;
					}

					$push = array_merge($__item,
						array(
							'title' => $link[0],
							'url' => (empty($link[1]) ? 'javascript:return false;' : $link[1]),
							'active' => $this->__isCrumbActive($link)
						)
					);

					if (isset($link[2])) {
						$push['options']['title'] = $link[2];
					}

					$this->Controller->viewVars['breadCrumb'][] = $push;
				}
			} else {
				$push = array_merge($__item,
					array(
						'title' => $url[0],
						'url' => (empty($url[1]) ? 'javascript:return false;' : $url[1]),
						'active' => $this->__isCrumbActive($url)
					)
				);

				if (isset($url[2])) {
					$push['options']['title'] = $url[2];
				}

				$this->Controller->viewVars['breadCrumb'][] = $push;
			}

			return;
		} else {
			$url = !is_string($url) ? $this->__urlChunk() : $url;
		}

		$this->Controller->set('breadCrumb', array());

		if (is_array($url)) {
			foreach ($url as $k => $u) {
				$url[$k] = preg_replace('/\/{2,}/', '',  "{$u}//");

				if (Configure::read('Variable.url_language_prefix')) {
					$url[] = QuickApps::str_replace_once('/' . Configure::read('Config.language'), '', $u);
				}
			}
		} else {
			$url = preg_replace('/\/{2,}/', '',  "{$url}//");
		}

		$conditions = array();

		if (is_string($url)) {
			list($menuId, $linkPath) = pluginSplit($url);

			if ($menuId) {
				$conditions['MenuLink.menu_id'] = $menuId;
			}

			$conditions['MenuLink.router_path'] = $linkPath;
		} else {
			$conditions['MenuLink.router_path'] = empty($url) ? '' : $url;
		}

		$current = $this->Controller->MenuLink->find('first', array('conditions' => $conditions));

		if (!empty($current)) {
			$this->Controller->MenuLink->Behaviors->detach('Tree');
			$this->Controller->MenuLink->Behaviors->attach('Tree',
				array(
					'parent' => 'parent_id',
					'left' => 'lft',
					'right' => 'rght',
					'scope' => "MenuLink.menu_id = '{$current['MenuLink']['menu_id']}'"
				)
			);

			$path = $this->Controller->MenuLink->getPath($current['MenuLink']['id']);
			$push = array();

			if (isset($path[0]['MenuLink']['link_title'])) {
				$path[0]['MenuLink']['link_title'] = __t($path[0]['MenuLink']['link_title']);
			}
			
			foreach ($path as $l) {
				$p = array();
				$p = array_merge($__item,
					array(
						'title' => $l['MenuLink']['link_title'],
						'url' => $l['MenuLink']['router_path'],
						'active' => $this->__isCrumbActive($l['MenuLink']['router_path'])
					)
				);

				if (isset($l['MenuLink']['description']) && !empty($l['MenuLink']['description'])) {
					$p['options']['title'] = $l['MenuLink']['description'];
				}

				$push[] = $p;
			}

			$this->Controller->set('breadCrumb', $push);
		}
	}

/**
 * Checks whether or not a Crumb element should be active.
 *
 * @param mixed Array crumb element or URL as String
 * @param boolean
 */
	private function __isCrumbActive($c) {
		$here = str_replace($this->Controller->request->base, '', $this->Controller->request->here);
		$c = is_string($c) ? array(null, $c) : $c;
		$active =
			(isset($c[1]) && $c[1] == $here) ||
			(isset($c['pattern']) && QuickApps::urlMatch($c['pattern'], $here));

		return $active;
	}
	
	/**
 * Performs a cache of all environment variables stored in `variables` table.
 *
 * ### Usage
 *
 *     Configure::read('Variable.varible_key');
 *
 * @return void
 */
	public function loadVariables() {
		$variables = Cache::read('Variable');
		$lp = Configure::read('Variable.url_language_prefix');

		if ($variables === false) {
			$this->Controller->Variable->writeCache();
		} else {
			Configure::write('Variable', $variables);
		}

		Configure::write('Variable.url_language_prefix', $lp);
	}

/**
 * Chunks an URL into smaller url chunks.
 *
 * ### Example
 *
 * For the URL below:
 *
 *     /long/url/to/something.html
 *
 * The following array is returned:
 *
 *     array(
 *         '/long/url/to/something.html',
 *         '/long/url/to/',
 *         '/long/url/',
 *         '/long/',
 *         '/'
 *     );
 *
 * @return array
 */
	private function __urlChunk($url = false) {
		$url = !$url ? '/' . $this->Controller->request->url : $url;
		$out = array($url);

		if (isset($this->Controller->request->params['named'])) {
			foreach ($this->Controller->request->params['named'] as $key => $val) {
				$url = QuickApps::str_replace_once("/{$key}:{$val}", '', $url);
				$out[] = $url;
			}
		}

		$out[] = $url;

		if ($this->Controller->request->params['controller'] == Inflector::underscore($this->plugin)) {
			$url =  QuickApps::str_replace_once("/{$this->Controller->request->params['controller']}", '', $url);
			$out[] = $url;
		} else if ($this->Controller->request->params['action'] == 'index' || $this->Controller->request->params['action'] == 'admin_index') {
			$url =  QuickApps::str_replace_once("/index", '', $url);
			$out[] = $url;
		}

		if (isset($this->Controller->request->params['pass'])) {
			foreach ($this->Controller->request->params['pass'] as $p) {
				$url = QuickApps::str_replace_once("/{$p}", '', $url);
				$out[] = $url;
			}
		}

		return array_unique($out);
	}
}
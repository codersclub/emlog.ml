<?php
/*
Plugin Name: Template options
Version: 4.2.6
Plugin URL: https://www.emlog.net/docs/#/template?id=%e6%a8%a1%e6%9d%bf%e8%ae%be%e7%bd%ae
Description: Add rich setting functions to the template, please see the official website documentation - Template Development for details.
Author: emlog
Author URL: https://www.emlog.net/author/index/577
*/

defined('EMLOG_ROOT') || exit('access denied!');

/*vot*/ load_language('plugins/tpl_options');

/**
 * Template settings class
 */
class TplOptions {

    //Plug-in ID
    const ID = 'tpl_options';
    const NAME = 'Template options';
    const VERSION = '4.2.5';

    //DB table prefix
    private $_prefix = 'tpl_options_';

    //DB table
    private $_tables = array(
        'data',
    );

    //File types allowed to be uploaded
    private $_imageTypes = array(
        'gif',
        'jpg',
        'jpeg',
        'png'
    );

    //Instance
    private static $_instance;

    //Whether to initialize
    private $_inited = false;

    //Template parameters
    private $_templateOptions;

    //Read the processed raw settings item from the template
    private $_options;

    //Supported parameter types
    private $_types;

    //The data is the array of types
    private $_arrayTypes = array();

    //Database connection instance
    private $_db;

    //Plugin template directory
    private $_view;

    //Plugin frontend resource path
    private $_assets;

    //Current template
    private $_currentTemplate;

    //Pages
    private $_pages;

    //Articles
    private $_posts;

    /**
     * Singleton entry
     * @return TplOptions
     */
    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Private constructor, guaranteed singleton
     */
    private function __construct() {
    }

    /**
     * Initialization function
     * @return void
     */
    public function init() {
        if ($this->_inited === true) {
            return;
        }
        $this->_inited = true;

        //Initialize each data table name
        $tables = array();
        foreach ($this->_tables as $name => $table) {
            $tables[$table] = $this->getTableName($table);
        }
        $this->_tables = $tables;

        //Initialize template settings types
        $this->_types = array(
            'radio'    => array(
/*vot*/         'name'       => lang('ftype_radio'),
                'allowMulti' => false,
            ),
            'color'    => array(
/*vot*/         'name'       => lang('ftype_color'),
                'allowMulti' => false,
            ),
            'checkon'  => array(
/*vot*/         'name'       => lang('ftype_checkon'),
                'allowMulti' => false,
            ),
            'checkbox' => array(
/*vot*/         'name'       => lang('ftype_checkbox'),
                'allowMulti' => true,
            ),
            'text'     => array(
/*vot*/         'name'       => lang('ftype_text'),
                'allowMulti' => true,
                'allowRich'  => true,
            ),
            'image'    => array(
/*vot*/         'name'       => lang('ftype_image'),
                'allowMulti' => false,
            ),
            'page'     => array(
/*vot*/         'name'       => lang('ftype_page'),
                'allowMulti' => true,
            ),
            'sort'     => array(
/*vot*/         'name'        => lang('ftype_category'),
                'allowMulti'  => true,
                'allowDepend' => true,
            ),
            'tag'      => array(
/*vot*/         'name'       => lang('ftype_tag'),
                'allowMulti' => true,
            ),
            'select'   => array(
/*vot*/         'name'       => lang('ftype_select'),
                'allowMulti' => true,
            ),
            'block'    => array(
/*vot*/         'name'       => lang('ftype_block'),
                'allowMulti' => true,
            ),
        );
        $this->_arrayTypes = array(
            'checkbox',
            'tag',
            'select',
            'block',
        );

        //Set template directory
        $this->_view = __DIR__ . '/views/';
        $this->_assets = BLOG_URL . 'content/plugins/' . self::ID . '/assets/';
        /*vot*/
        $this->_lang = BLOG_URL . 'content/plugins/' . self::ID . '/lang/' . LANG;

        //Register each hook
        $scriptBaseName = strtolower(substr(basename($_SERVER['SCRIPT_NAME']), 0, -4));
        if ($scriptBaseName == 'template') {
            addAction('adm_head', function () {
                TplOptions::getInstance()->hookAdminMainTopData();
                TplOptions::getInstance()->hookAdminHead();
            });
        }
    }

    /**
     * Output Data
     * @return void
     */
    public function hookAdminMainTopData() {
        $templates = $this->getTemplates();
        $data = array(
            'templates' => $templates,
            'prefix'    => str_replace('_', '-', $this->_prefix),
            'baseUrl'   => $this->url(),
            'uploadUrl' => $this->url(array(
                "do" => "upload"
            )),
        );
        echo sprintf('<script>var tplOptions = %s;</script>', json_encode($data));
    }

    /**
     * Header, such as a css file
     * @return void
     */
    public function hookAdminHead() {
        echo sprintf('<link rel="stylesheet" href="%s">', $this->_assets . 'main.css?ver=' . urlencode(self::VERSION . Option::EMLOG_VERSION_TIMESTAMP));
        echo sprintf('<script src="%s"></script>', $this->_assets . 'main.js?ver=' . urlencode(self::VERSION . Option::EMLOG_VERSION_TIMESTAMP));
        /*vot*/
        echo sprintf('<script src="%s"></script>', $this->_lang . '/lang_js.js?ver=' . urlencode(self::VERSION));
    }

    /**
     * Get data table
     * @param mixed $table Table name, optional, if not set, all tables will be returned, otherwise the corresponding table will be returned
     * @return mixed Return array or string
     */
    public function getTable($table = null) {
        return $table === null ? $this->_tables : (isset($this->_tables[$table]) ? $this->_tables[$table] : '');
    }

    /**
     * Get the data table name
     * @param string $table Table name
     * @return string Table full name
     */
    private function getTableName($table) {
        return DB_PREFIX . $this->_prefix . $table;
    }

    /**
     * Get the template parameter data, get the current template by default
     * @param mixed $template Template name, optional
     * @return array Template options
     */
    public function getTemplateOptions($template = null) {
        if ($template === null) {
            $template = Option::get('nonce_templet');
        }
        if (isset($this->_templateOptions[$template])) {
            return $this->_templateOptions[$template];
        }
        $_data = $this->queryAll('data', array(
            'template' => $template,
        ));
        $templateOptions = array();
        $options = $this->getTemplateDefinedOptions($template);
        if ($options === false) {
            $options = array();
        }
        foreach ($_data as $row) {
            extract($row);
            $data = unserialize($data);
            $templateOptions[$name] = $data;
        }
        $unsorted = isset($option['unsorted']) ? $option['unsorted'] : true;
        $sorts = $this->getSorts($unsorted);
        $pages = $this->getPages();
        foreach ($options as $name => $option) {
            if (!is_array($option) || !isset($option['name']) || !isset($option['type']) || !isset($this->_types[$option['type']])) {
                unset($options[$name]);
                continue;
            }
            if (!isset($templateOptions[$name])) {
                $templateOptions[$name] = $this->getOptionDefaultValue($option, $template);
            }
            $depend = isset($option['depend']) ? $option['depend'] : '';
            if ($depend == 'sort') {
                if (!is_array($templateOptions[$name])) {
                    $templateOptions[$name] = array();
                }
                foreach ($sorts as $sort) {
                    if (!isset($templateOptions[$name][$sort['sid']])) {
                        $templateOptions[$name][$sort['sid']] = $this->getOptionDefaultValue($option, $template);
                    }
                }
            }
            switch ($option['type']) {
                case 'sort':
                case 'page':
                    $varName = $option['type'] . 's';
                    $var = $$varName;
                    if (!$this->isMulti($option) && !isset($var[$templateOptions[$name]])) {
                        $templateOptions[$name] = $this->getOptionDefaultValue($option, $template);
                    }
                    break;

                default:
                    break;
            }
            if ($option['type'] == 'image') {
                $templateOptions[$name] = $this->buildImageUrl($templateOptions[$name]);
            }
        }
        return $this->_templateOptions[$template] = $templateOptions;
    }

    /**
     * Set template option data
     * @param string $template Template name
     * @param array $options Template options
     * @return boolean
     */
    public function setTemplateOptions($template, $options) {
        if ($options === array()) {
            return true;
        }
        $data = array();
        foreach ($options as $name => $option) {
            $data[] = array(
                'template' => $template,
                'name'     => $name,
                'depend'   => $option['depend'],
                'data'     => serialize($option['data']),
            );
        }
        return $this->insert('data', $data, true);
    }

    /**
     * Get all categories
     * @param boolean $unsorted Whether to get uncategorized
     * @return array
     */
    private function getSorts($unsorted = false, $is_cate = false) {
        $sorts = Cache::getInstance()->readCache('sort');
        if ($unsorted) {
            array_unshift($sorts, array(
                'sid'              => -1,
                /*vot*/ 'sortname' => lang('uncategorized'),
                'lognum'           => 0,
                'children'         => array(),
            ));
        }
        if ($is_cate) {
            foreach ($sorts as $sort) {
                $sorts[$sort['sid']] = $this->encode($sort['sortname']);
            }
        }
        return $sorts;
    }

    /**
     * Get all tags
     * @return array
     */
    private function getTags() {
        $data = $this->queryAll('tag', array(), 'tid,tagname');
        return $data;
    }

    /**
     * Get all pages
     * @return array
     */
    private function getPages() {
        if ($this->_pages !== null) {
            return $this->_pages;
        }
        $data = $this->queryAll('blog', array(
            'type' => 'page',
            'hide' => 'n',
        ), 'gid, title');
        $pages = array();
        foreach ($data as $page) {
            $pages[$page['gid']] = $this->encode($page['title']);
        }
        return $this->_pages = $pages;
    }

    /**
     * Get all articles
     * @return array
     */
    private function getPosts() {
        if ($this->_posts !== null) {
            return $this->_posts;
        }
        $data = $this->queryAll('blog', array(
            'type' => 'blog',
            'hide' => 'n',
        ), 'gid, title');
        $posts = array();
        foreach ($data as $post) {
            $posts[$post['gid']] = $this->encode($post['title']);
        }
        return $this->_posts = $posts;
    }

    /**
     * Get multi-content block data
     * @return array
     */
    private function getBlockData($name) {
        $data = $this->queryAll('tpl_options_data', array(
            'name' => $name,
        ), 'data');
        if (!isset($data[0]['data'])) {
            return [];
        }
        return unserialize($data[0]['data']);
    }

    /**
     * Get database connection
     */
    public function getDb() {
        if ($this->_db !== null) {
            return $this->_db;
        }
        $this->_db = Database::getInstance();
        return $this->_db;
    }

    /**
     * Get all the data from the table
     * @param string $table Table name
     * @param mixed $condition String or array condition
     * @return array Result data
     */
    private function queryAll($table, $condition = '', $select = '*') {
        $table = $this->getTable($table) ? $this->getTable($table) : DB_PREFIX . $table;
        $subSql = $this->buildQuerySql($condition);
        $sql = "SELECT $select FROM `$table`";
        if ($subSql) {
            $sql .= " WHERE $subSql";
        }
        $query = $this->getDb()->query($sql);
        $data = array();
        while ($row = $this->getDb()->fetch_array($query)) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * Insert data into data table
     * @param string $table Table name
     * @param array $data Data
     * @return bool Result data
     */
    private function insert($table, $data, $replace = false) {
        $table = $this->getTable($table);
        $subSql = $this->buildInsertSql($data);
        if ($replace) {
            $sql = "REPLACE INTO `$table`";
        } else {
            $sql = "INSERT INTO `$table`";
        }
        $sql .= $subSql;
        return $this->getDb()->query($sql) !== false;
    }

    /**
     * Construct a WHERE clause based on conditions
     * @param mixed $condition String or array condition
     * @return string Query clauses constructed from conditions
     */
    private function buildQuerySql($condition) {
        if (is_string($condition)) {
            return $condition;
        }
        $subSql = array();
        foreach ($condition as $key => $value) {
            if (is_string($value)) {
                if (class_exists('mysqli', FALSE)) {
                    $value = $this->getDb()->escape_string($value);
                }
                $subSql[] = "(`$key`='$value')";
            } elseif (is_array($value)) {
                $subSql[] = "(`$key` IN (" . $this->implodeSqlArray($value) . '))';
            }
        }
        return implode(' AND ', $subSql);
    }

    /**
     * Construct INSERT/REPLACE INTO clauses based on data
     * @param array $data Data
     * @return string Clauses constructed from data
     */
    private function buildInsertSql($data) {
        $subSql = array();
        if (array_key_exists(0, $data)) {
            $keys = array_keys($data[0]);
        } else {
            $keys = array_keys($data);
            $data = array(
                $data
            );
        }
        foreach ($data as $key => $value) {
            $subSql[] = '(' . $this->implodeSqlArray($value) . ')';
        }
        $subSql = implode(',', $subSql);
        $keys = '(`' . implode('`,`', $keys) . '`)';
        $subSql = "$keys VALUES $subSql";
        return $subSql;
    }

    /**
     * Expand an array into a string that can be used by SQL
     * @param array $data Data
     * @return string A string of the form ('value1', 'value2')
     */
    private function implodeSqlArray($data) {
        return implode(',', array_map(function ($val) {
            if (class_exists('mysqli', FALSE)) {
                $val = $this->getDb()->escape_string($val);
            }
            return "'" . $val . "'";
        }, $data));
    }

    /**
     * Plugin settings function
     * @return void
     */
    public function setting() {
        $do = $this->arrayGet($_GET, 'do');
        $template = $this->arrayGet($_GET, 'template');
        $code = $this->arrayGet($_GET, 'code');
        $msg = $this->arrayGet($_GET, 'msg');
        $allTemplate = $this->getTemplates();
        if ($do != '') {
            if ($do == 'upload' && isset($_FILES['image'])) {
                $file = $_FILES['image'];
                $target = $this->arrayGet($_POST, 'target');
                $template = $this->arrayGet($_POST, 'template');
                $result = $this->upload($template, $file, $target);
                extract($result);
                $src = '';
                if ($path) {
                    $path = substr($path, 3);
                    $src = BLOG_URL . $path;
                }
                ob_clean();
                include $this->view('upload');
                exit;
            }
            emDirect('./template.php');
        } elseif ($template !== null) {
            if (!is_dir(TPLS_PATH . $template)) {
                $this->jsonReturn(array(
                    'code'        => 1,
                    /*vot*/ 'msg' => lang('tpl_not_found'),
                ));
            }
            $options = $this->getTemplateDefinedOptions($template);
            if ($options === false) {
                $this->jsonReturn(array(
                    'code'        => 1,
                    /*vot*/ 'msg' => lang('tpl_not_support'),
                ));
            }
            $this->_currentTemplate = $template;
            $storedOptions = $this->getTemplateOptions($template);
            foreach ($options as $name => & $option) {
                if (!is_array($option) || !isset($option['name']) || !isset($option['type']) || !isset($this->_types[$option['type']])) {
                    unset($options[$name]);
                    continue;
                }
                $option['id'] = $name;
                $option['value'] = $storedOptions[$name];
            }
            $this->_options = $options;
            if (!empty($_POST)) {
                $newOptions = array();
                foreach ($_POST as $name => $data) {
                    if (!isset($options[$name])) {
                        continue;
                    }
                    $depend = isset($options[$name]['depend']) ? $options[$name]['depend'] : '';
                    $type = isset($options[$name]['type']) ? $options[$name]['type'] : '';
                    switch ($depend) {
                        case 'sort':
                            $sorts = $this->getSorts(true);
                            if (!is_array($data)) {
                                $data = array();
                            }
                            foreach ($sorts as $sort) {
                                $sid = $sort['sid'];
                                if (!isset($data[$sid]) || $this->shouldBeArray($options[$name], $data[$sid])) {
                                    $data[$sid] = $this->getOptionDefaultValue($options[$name], $template);
                                }
                            }
                            break;
                    }
                    if ($this->shouldBeArray($options[$name], $data)) {
                        $data = array();
                    }
                    $newOptions[$name] = array(
                        'depend' => $depend,
                        'data'   => $data,
                    );
                }
                $result = $this->setTemplateOptions($template, $newOptions);
                $code = $result ? 0 : 1;
                $data = array(
                    'template' => $template,
                    'code'     => $result ? 0 : 1,
                    /*vot*/
                    'msg'      => lang('tpl_save_settings') . ($result ? lang('success') : lang('failure')),
                );
                $this->jsonReturn($data);
            }
            ob_clean();
            include $this->view('setting');
            exit;
        } else {
            emDirect('./template.php');
        }
    }

    /**
     * Determine whether it should be an array but is not an array
     * @param array $option
     * @param mixed $data
     * @return boolean
     */
    private function shouldBeArray($option, $data) {
        if (is_array($data)) {
            return false;
        }
        if (in_array($option['type'], $this->_arrayTypes)) {
            return true;
        }
        if (in_array($option['type'], array(
                'sort',
                'page'
            )) && $this->isMulti($option)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether it is a multi-selection/multi-line text
     * @param array $option
     * @return boolean
     */
    private function isMulti($option) {
        return isset($option['multi']) && $option['multi'];
    }

    /**
     * Check whether it is a date formatted text
     * @param array $option
     * @return boolean
     */
    private function isDate($option) {
        return isset($option['date']) && $option['date'];
    }

    /**
     * Upload file
     * @param string $template Template
     * @param array $file Uploaded file
     * @param string $target Target
     * @return array Upload result information
     */
    private function upload($template, $file, $target) {
        $result = array(
            'code' => 0,
            'msg'  => '',
            'name' => $file['name'],
            'size' => $file['size'],
            'path' => '',
        );
        if ($file['error'] == 1) {
            $result['code'] = 100;
            /*vot*/
            $result['msg'] = lang('file_size_large_system');
            return $result;
        }

        if ($file['error'] > 1) {
            $result['code'] = 101;
            /*vot*/
            $result['msg'] = lang('file_upload_failed');
            return $result;
        }
        $extension = getFileSuffix($file['name']);
        if (!in_array($extension, $this->_imageTypes)) {
            $result['code'] = 102;
            /*vot*/
            $result['msg'] = lang('file_wrong_type');
            return $result;
        }
        $maxSize = defined(UPLOAD_MAX_SIZE) ? UPLOAD_MAX_SIZE : 2097152;

        if ($file['size'] > $maxSize) {
            $result['code'] = 103;
            $result['msg'] = lang('file_size_large');
            return $result;
        }
        $uploadPath = Option::UPLOADFILE_PATH . self::ID . "/$template/";

        $file_baseName = rtrim(str_replace(array(
            '[',
            ']'
        ), '.', $target), '.');

        $fileName = $file_baseName . '_' . uniqid() . '.' . $extension;
        $exists_files = glob($uploadPath . $file_baseName . '*');
        if (count($exists_files)) {
            unlink($exists_files[0]);
        }

        $attachpath = $uploadPath . $fileName;
        $result['path'] = $attachpath;
        if (!is_dir($uploadPath)) {
            @umask(0);
            $ret = @mkdir($uploadPath, 0777, true);
            if ($ret === false) {
                $result['code'] = 104;
                /*vot*/
                $result['msg'] = lang('create_upload_dir_error');
                return $result;
            }
        }
        if (@is_uploaded_file($file['tmp_name'])) {
            if (@!move_uploaded_file($file['tmp_name'], $attachpath)) {
                $result['code'] = 105;
                /*vot*/
                $result['msg'] = lang('upload_no_rights');
                return $result;
            }
            @chmod($attachpath, 0777);
        }
        return $result;
    }

    /**
     * Get the value of the option
     * @param array $option Template option
     * @param array $storedOptions Stored template options
     * @param string $template
     * @return mixed
     */
    private function getOptionValue(&$option, $storedOptions, $template) {
        if (isset($storedOptions[$option['id']])) {
            return $storedOptions[$option['id']];
        }
        return $this->getOptionDefaultValue($option, $template);
    }

    /**
     * Get the value of the template option
     * @param array $option Template option
     * @param string $template
     * @return mixed
     */
    private function getOptionDefaultValue(&$option, $template) {
        if (isset($option['default']) && !in_array($option['type'], array(
                'page',
                'sort',
                'tag'
            ))) {
            $default = $option['default'];
        } else {
            switch ($option['type']) {
                case 'radio':
                    if (!isset($option['values']) || !is_array($option['values'])) {
                        $option['values'] = array(
                            /*vot*/
                            0 => lang('no'),
                            /*vot*/
                            1 => lang('yes'),
                        );
                    }
                    $default = $this->arrayGet(array_keys($option['values']), 0);
                    break;

                case 'checkbox':
                    if (!isset($option['values']) || !is_array($option['values'])) {
                        $option['values'] = array();
                    }
                    $default = $option['values'];
                    break;
                case 'checkon':
                    $default = $option['values'];
                    break;
                case 'text':
                case 'color':
                case 'image':
                    if (!isset($option['values']) || !is_array($option['values'])) {
                        $option['values'] = array();
                    }
                    $default = reset($option['values']);
                    break;

                case 'page':
                    if (!$this->isMulti($option)) {
                        $pages = $this->getPages();
                        $default = $this->arrayGet(array_keys($pages), 0);
                        break;
                    }
                case 'sort':
                    if (!$this->isMulti($option)) {
                        $sorts = $this->getSorts();
                        $default = $this->arrayGet(array_keys($sorts), 0);
                        break;
                    }
                case 'tag':
                    $default = array();
                    break;

                default:
                    return null;
            }
        }
        return $this->replacePath($default, $template);
    }

    /**
     * Replace the url in the option
     * @param mixed $value
     * @param string $template
     * @return mixed
     */
    private function replacePath($value, $template) {
        $replace = array(
            TEMPLATE_URL => TPLS_URL . $template . '/',
        );
        if (is_string($value)) {
            return strtr($value, $replace);
        }

        if (is_array($value)) {
            foreach ($value as $key => $val) {
                $value[$key] = $this->replacePath($val, $template);
            }
            return $value;
        }

        return $value;
    }

    /**
     * Render options
     * @return void
     */
    private function renderOptions() {
        foreach ($this->_options as $option) {
            $method = 'render' . ucfirst($option['type']);
            $this->$method($option);
        }
    }

    /**
     * Render template options
     * @return void
     */
    private function renderByTpl($option, $tpl, $loopValues = true, $placeholder = true) {
        $desc = '';
        $tip = '';
        $is_multi = '';
        if ($this->isMulti($option)) {
            $is_multi = 'is-multi';
        }
        if (!empty($option['description'])) {
            $desc = '<div class="option-description">' . $option['description'] . '</div>';
        }
        if (isset($option['new']) && trim($option['new'])) {
            $tip = '<small class="new-tip">' . trim($option['new']) . '</small>';
        }
        echo '<div class="option ' . @$option['labels'] . '" id="' . $option['id'] . '">';
        echo '<div class="option-ico upico"></div>';
/*vot*/ echo '<div class="option-name" title="' . lang('shrink_expand') . '" data-name="' . $this->encode($option['name']) . '" data-id="' . $option['id'] . '">', $this->encode($option['name']) . $tip, $desc, '</div>';
        $depend = isset($option['depend']) ? $option['depend'] : 'none';
        echo sprintf('<div class="option-body depend-%s %s">', $depend, $is_multi);
        switch ($depend) {
            case 'sort':
                $unsorted = isset($option['unsorted']) ? $option['unsorted'] : true;
                $sorts = $this->getSorts($unsorted);
                if (!is_array($option['value'])) {
                    $option['value'] = array();
                }
                echo '<div class="option-sort-tag" data-option-name="', $option['name'], '">';
                echo '<div class="option-sort-tag-left">';
                if (count($sorts) < 1) {
                    foreach ($sorts as $sort) {
                        echo '<div class="option-sort-tag-name">';
                        echo $sort['sortname'];
                        echo '</div>';
                    }
                } else {
                    echo '<select class="option-sort-tag-select">';
                    foreach ($sorts as $sort) {
                        echo sprintf('<option value="%s">%s</option>', $sort['sortname'], $sort['sortname']);
                    }
                    echo '</select>';
                }
                echo '</div>';
                echo '<div class="option-sort-tag-right">';
                foreach ($sorts as $sort) {
                    $sid = $sort['sid'];
                    echo '<div class="option-sort-tag-option">';
                    if (!isset($option['value'][$sid])) {
                        $option['value'][$sid] = $this->getOptionDefaultValue($option, $this->_currentTemplate);
                    }
                    if ($loopValues) {
                        if ($placeholder) {
                            echo sprintf('<input type="hidden" name="%s" value="">', $option['id'] . "[{$sid}]");
                        }
                        foreach ($option['values'] as $value => $label) {
                            echo strtr($tpl, array(
                                '{name}'    => $option['id'] . "[{$sid}]",
                                '{value}'   => $this->encode($value),
                                '{label}'   => $label,
                                '{checked}' => $this->getCheckedString($value, $option['value'][$sid]),
                            ));
                        }
                    } else {
                        echo strtr($tpl, array(
                            '{name}'  => $option['id'] . "[{$sid}]",
                            '{value}' => $this->encode($option['value'][$sid]),
                            '{label}' => '',
                            '{path}'  => $this->getImagePath($option['value'][$sid]),
                            '{rich}'  => $this->getRichString($option),
                        ));
                    }
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
                break;
            case 'tag':
                $tags = $this->getTags();
                if (!is_array($option['value'])) {
                    $option['value'] = array();
                }
                echo '<div class="option-sort-tag" data-option-name="', $option['name'], '">';
                echo '<div class="option-sort-tag-left">';
                if (count($tags) < 1) {
                    foreach ($tags as $tag) {
                        echo '<div class="option-sort-tag-name">';
                        echo $tag['tagname'];
                        echo '</div>';
                    }
                } else {
                    echo '<select class="option-sort-tag-select">';
                    foreach ($tags as $tag) {
                        echo sprintf('<option value="%s">%s</option>', $tag['tagname'], $tag['tagname']);
                    }
                    echo '</select>';
                }
                echo '</div>';
                echo '<div class="option-sort-tag-right">';
                foreach ($tags as $tag) {
                    $tid = $tag['tid'];
                    echo '<div class="option-sort-tag-option">';
                    if (!isset($option['value'][$tid])) {
                        $option['value'][$tid] = $this->getOptionDefaultValue($option, $this->_currentTemplate);
                    }
                    if ($loopValues) {
                        if ($placeholder) {
                            echo sprintf('<input type="hidden" name="%s" value="">', $option['id'] . "[{$tid}]");
                        }
                        foreach ($option['values'] as $value => $label) {
                            echo strtr($tpl, array(
                                '{name}'    => $option['id'] . "[{$tid}]",
                                '{value}'   => $this->encode($value),
                                '{label}'   => $label,
                                '{checked}' => $this->getCheckedString($value, $option['value'][$tid]),
                            ));
                        }
                    } else {
                        echo strtr($tpl, array(
                            '{name}'  => $option['id'] . "[{$tid}]",
                            '{value}' => $this->encode($option['value'][$tid]),
                            '{label}' => '',
                            '{path}'  => $this->getImagePath($option['value'][$tid]),
                            '{rich}'  => $this->getRichString($option),
                        ));
                    }
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
                break;
            case 'select':
                $type = '';
                if ($option['pattern'] == 'post') {
/*vot*/             $type = lang('article');
                    $data = $this->getPosts();
                }
                if ($option['pattern'] == 'cate') {
/*vot*/             $type = lang('category');
                    $data = $this->getSorts(false, true);
                }
                if ($option['pattern'] == 'page') {
/*vot*/             $type = lang('page');
                    $data = $this->getPages();
                }

                echo sprintf('<div class="chosen-container chosen-container-multi %s">', $option['pattern']);
                echo '<ul class="chosen-choices">';
                echo sprintf('<input type="hidden" name="%s" value="">', $option['id']);
                foreach ($option['value'] as $id) {
                    echo strtr($tpl, array(
                        '{title}' => $data[$id],
                        '{name}'  => $option['id'],
                        '{value}' => $this->encode($id),
                    ));
                }
                echo '<li class="search-field ">';
/*vot*/         echo sprintf('<input class="chosen-search-input" data-opt="%s" data-s-name="%s" data-url="%s" type="text" autocomplete="off" placeholder="' . lang('enter_keyword_for') .'">', $option['pattern'], $option['id'], BLOG_URL, $type, $type);
                echo '</li>';
                echo '</ul>';
                echo '<div class="chosen-drop">';
/*vot*/         echo sprintf('<ul class="chosen-results"><li class="no-results">' . lang('enter_title_for') . '</li></ul>', $type);
                echo '</div>';
                echo '</div>';
                break;
            case 'block':
                $this_data_type = isset($option['pattern']) && $option['pattern'] === 'image' ? 'image' : 'text';
                echo sprintf('<input type="hidden" name="%s" value="">', $option['id']);
                echo '<div class="tpl-sortable-block">';

                $html = '<div class="tpl-block-item">';
                $html .= '<div class="tpl-block-head">
                            <i class="tpl-block-clone icofont-ui-copy"></i>
                            <i class="tpl-block-remove icofont-close icofont-md"></i>
                          </div>';

                $data = $this->getBlockData($option['id']);
                $tmp_len = empty($data) ? 0 : count($data);
                if ($tmp_len !== 0 && is_array($data)) {
                    $data_len = count($data['title']);
                    for ($i = 0; $i < $data_len; $i++) {
                        $block_title = $this->encode($data['title'][$i]);
                        echo $html;
                        echo sprintf('<h4 class="tpl-block-title"><span class="tpl-block-title-icon icofont-rounded-right"></span><item class="block-title-text">%s</item></h4>', $block_title);
                        echo '<div class="tpl-block-content d-none">';
                        echo strtr($tpl, array(
                            '{title}'  => $option['id'] . '[title][]',
                            '{tvalue}' => $block_title,
                            '{name}'   => $option['id'] . '[content][]',
                            '{value}'  => $this->encode($data['content'][$i]),
                        ));
                        echo '</div>';
                        echo '</div>';
                    }
                }

/*vot*/         echo sprintf('<a class="badge badge-success tpl-add-block" data-b-name="%s" data-type="%s" data-url="%s"><i class="ri-add-line"></i> ' . lang('add') . '</a>', $option['id'], $this_data_type, BLOG_URL);
                echo '</div>';
                echo '<script>
                          $(".tpl-sortable-block").sortable({
                              stop: function () {
                                  block_drag_end()
                            }
                          }).disableSelection()
                      </script>';
                break;
            default:
                if ($loopValues) {
                    if ($placeholder) {
                        echo sprintf('<input type="hidden" name="%s" value="">', $option['id']);
                    }
                    foreach ($option['values'] as $value => $label) {
                        echo strtr($tpl, array(
                            '{name}'    => $option['id'],
                            '{value}'   => $this->encode($value),
                            '{label}'   => $label,
                            '{checked}' => $this->getCheckedString($value, $option['value']),
                        ));
                    }
                } else {
                    echo strtr($tpl, array(
                        '{name}'  => $option['id'],
                        '{value}' => $this->encode($option['value']),
                        '{label}' => '',
                        '{path}'  => $this->getImagePath($option['value']),
                        '{rich}'  => $this->getRichString($option),
                    ));
                }
        }
        echo '</div></div>';
    }

    /**
     * @param mixed $value
     * @param mixed $optionvalue
     * @return string
     */
    private function getCheckedString($value, $optionValue) {
        return (is_array($optionValue) && in_array($value, $optionValue)) || $value == $optionValue ? ' checked="checked"' : '';
    }

    /**
     * @param array $option
     * @return string
     */
    private function getRichString($option) {
        return isset($option['rich']) && isset($this->_types[$option['type']]['allowRich']) ? ' option-rich-text' : '';
    }

    /**
     * @param string $url
     * @return string
     */
    private function getImagePath($url) {
        return str_replace(BLOG_URL, '', $url);
    }

    /**
     * @param array $option
     * @return void
     */
    private function renderRadio($option) {
        $tpl = '<div class="tpl-radio"><input id="{name}-{value}" name="{name}" type="radio" value="{value}"{checked}><label class="tpl-radio-label" for="{name}-{value}">{label}</label></div>';

        $this->renderByTpl($option, $tpl);
    }

    /**
     * @param array $option
     * @return void
     */
    private function renderCheckon($option) {
        $tpl = '<label class="check-switch"><input type="checkbox" name="{name}" value="1"{checked}><span class="check-slider"></span></label>';
        $this->renderByTpl($option, $tpl);
    }

    /**
     * @param array $option
     * @return void
     */
    private function renderCheckbox($option) {
        $tpl = '<label class="vtpl-check"><input type="checkbox" name="{name}[]" value="{value}"{checked}> {label}</label>';
        $this->renderByTpl($option, $tpl);
    }

    /**
     * @param array $option
     * @return void
     */
    private function renderText($option) {
        if ($this->isDate($option)) {
            $tpl = '<input type="date" name="{name}" value="{value}">';
        } else if ($this->isMulti($option)) {
            $tpl = '<textarea name="{name}" rows="5" class="option-textarea{rich}">{value}</textarea>';
        } else {
            $tpl = '<input type="text" name="{name}" value="{value}">';
        }
        if (isset($option['pattern']) && trim($option['pattern']) === 'num') {
            $max = '';
            $min = '';
            $limit_html = '';
            $unit_html = isset($option['unit']) && trim($option['unit']) !== '' ? '<span class="tpl-number-input-unit">' . trim($option['unit']) . '</span>' : '';
            if (isset($option['max']) && trim($option['max']) !== '') {
                $max = trim($option['max']);
            }
            if (isset($option['min']) && trim($option['min']) !== '') {
                $min = trim($option['min']);
            }
            if ($max !== '' && $min !== '' && is_numeric($max) && is_numeric($min)) {
                $limit_html = 'oninput="if(value>' . $max . ')value=' . $max . ';if(value<' . $min . ')value=' . $min . '"';
            }
            if ($max !== '' && $min === '' && is_numeric($max)) {
                $limit_html = 'oninput="if(value>' . $max . ')value=' . $max . '"';
            }
            if ($max === '' && $min !== '' && is_numeric($min)) {
                $limit_html = 'oninput="if(value<' . $min . ')value=' . $min . '"';
            }
/*vot*/     $tpl = '<div class="tpl-number-input-item">
                        <input type="number" class="tpl-number-input" placeholder="' . lang('enter_numbers') . '" name="{name}" value="{value}" ' . $limit_html . '>
                        ' . $unit_html . '
                    </div>';
        }
        $this->renderByTpl($option, $tpl, false);
    }

    /**
     * @param array $option
     * @return void
     */
    private function renderSearchSelect($option) {
        $tpl = '<li class="search-choice"><span>{title}</span><a class="search-choice-close"><i class="icofont-close"></i></a><input class="d-none" name="{name}[]" type="text" value="{value}"></li>';
        $this->renderByTpl($option, $tpl, false);
    }

    /**
     * @param array $option
     * @return void
     */
    private function renderColor($option) {
        $tpl = '<input type="color" name="{name}" value="{value}">';
        $this->renderByTpl($option, $tpl, false);
    }


    /**
     * @param array $option
     * @return void
     */
    private function renderImage($option) {
        $tpl = '<div class="tpl-block-upload">
                    <div class="tpl-image-preview">
                        <img src="{value}">
                    </div>
                    <div class="tpl-block-upload-input">
                        <input type="text" name="{name}" value="{value}">
                        <label>
                            <a class="btn btn-primary"><i class="icofont-plus"></i>' . lang('upload') . '</a>
                            <input class="d-none tpl-image" type="file" name="image" data-url="' . BLOG_URL . '" accept="image/gif,image/jpeg,image/jpg,image/png">
                        </label>
                    </div>
                </div>';
        $this->renderByTpl($option, $tpl, false);
    }

    /**
     * @param array $option
     * @return void
     */
    private function renderBlock($option) {
        $tpl = '';
        if (isset($option['pattern']) && trim($option['pattern']) === 'image') {
/*vot*/     $tpl .= '<div class="tpl-block-upload">
                        <span>' . lang('enter_block_title') . ':</span>
                        <input class="block-title-input" type="text" name="{title}" value="{tvalue}">
                         <div class="tpl-image-preview">
                            <img src="{value}">
                         </div>
                         <div class="tpl-block-upload-input">
                             <input type="text" name="{name}" value="{value}">
                             <label>
                                <a class="btn btn-primary"><i class="icofont-plus"></i>' . lang('upload') . '</a>
                                <input class="d-none tpl-image" type="file" name="image" data-url="' . BLOG_URL . '" accept="image/gif,image/jpeg,image/jpg,image/png">
                             </label>
                         </div>
                     </div>';
        } else {
/*vot*/     $tpl = '<div>' . lang('enter_block_title') . ':</div>';
            $tpl .= '<input class="block-title-input" type="text" name="{title}" value="{tvalue}">';
/*vot*/     $tpl .= '<div>' . lang('enter_block_content') . ':</div>';
            if ($this->isMulti($option)) {
                $tpl .= '<textarea rows="5" name="{name}">{value}</textarea>';
            } else {
                $tpl .= '<input type="text" name="{name}" value="{value}">';
            }
        }
        $option['depend'] = 'block';
        $this->renderByTpl($option, $tpl, false);
    }

    /**
     * @param array $option
     * @return void
     */
    private function renderPage($option) {
        $pages = $this->getPages();
        $option['values'] = $pages;
        if ($this->isMulti($option)) {
            $this->renderCheckbox($option);
        } else {
            $this->renderRadio($option);
        }
    }

    /**
     * @param array $option
     * @return void
     */
    private function renderSort($option) {
        if (isset($option['depend']) && $option['depend'] == 'sort') {
            unset($option['depend']);
        }
        $sorts = $this->getSorts();
        $values = array();
        foreach ($sorts as $sid => $sort) {
            $values[$sid] = $sort['sortname'];
        }
        $option['values'] = $values;
        if ($this->isMulti($option)) {
            $this->renderCheckbox($option);
        } else {
            $this->renderRadio($option);
        }
    }

    /**
     * @param array $option
     * @return void
     */
    private function renderSelect($option) {
        if (isset($option['pattern']) && (trim($option['pattern']) === 'post' || trim($option['pattern']) === 'cate' || trim($option['pattern']) === 'page')) {
            $option['depend'] = 'select';
            $this->renderSearchSelect($option);
        }
    }

    /**
     * @param array $option
     * @return void
     */
    private function renderTag($option) {
        $tags = Cache::getInstance()->readCache('tags');
        $values = array();
        foreach ($tags as $tag) {
            $values[$tag['tagname']] = "{$tag['tagname']} ({$tag['usenum']})";
        }
        $option['values'] = $values;
        $this->renderCheckbox($option);
    }

    /**
     * Escape strings to prevent conflicts
     * @param string $value
     * @return string
     */
    private function encode($value) {
        return htmlspecialchars($value);
    }

    /**
     * Get supported templates
     * @return array
     */
    private function getTemplates() {
        $handle = @opendir(TPLS_PATH);
        if ($handle === false) {
            return array();
        }
        $templates = array();
        while ($file = @readdir($handle)) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            if (@file_exists($headerFile = TPLS_PATH . $file . '/header.php')) {
                if ($this->getTemplateDefinedOptions($file) === false) {
                    continue;
                }
                $tplData = file_get_contents($headerFile);
                $template = array();
                preg_match("/Template Name:([^\r\n]+)/i", $tplData, $name);
                $template['name'] = isset($name[1]) ? trim($name[1]) : $file;
                $template['file'] = $file;
                $template['preview'] = $this->getTemplatePreview($file);
                $templates[$file] = $template;
            }
        }
        closedir($handle);
        return $templates;
    }

    /**
     * Get template thumbnail url
     * @param string $template Template
     * @return string
     */
    private function getTemplatePreview($template) {
        if (is_file(TPLS_PATH . $template . '/preview.jpg')) {
            return TPLS_URL . $template . '/preview.jpg';
        }
        return $this->_assets . 'preview.jpg';
    }

    /**
     * Get template parameter configuration
     * @param string $optionFile
     * @return mixed false means this plugin is not supported
     */
    private function getTemplateDefinedOptions($template) {
        if (!is_file($optionFile = TPLS_PATH . $template . '/options.php')) {
            return false;
        }
        include $optionFile;
        if (!isset($options) || !is_array($options)) {
            return false;
        }
        if (strpos(file_get_contents($optionFile), '@support tpl_options') !== false) {
            return $options;
        }
        return false;
    }

    private function buildImageUrl($path) {
        if (is_array($path)) {
            return array_map(array(
                $this,
                'buildImageUrl'
            ), $path);
        }
        return preg_match('{(https?|ftp)://}i', $path) ? $path : BLOG_URL . $path;
    }

    /**
     * Get the template file
     * @param string $view Template name
     * @param string $ext Template suffix, the default is .php
     * @return string Full path to the template file
     */
    public function view($view, $ext = '.php') {
        return $this->_view . $view . $ext;
    }

    /**
     * Construct url according to parameters
     * @param array $params
     * @return string
     */
    public function url($params = array()) {
        $baseUrl = './plugin.php?plugin=' . self::ID;
        $url = http_build_query($params);
        if ($url === '') {
            return $baseUrl;
        } else {
            return $baseUrl . '&' . $url;
        }
    }

    /**
     * Output data in json and exit
     * @param mixed $data
     * @return void
     */
    public function jsonReturn($data) {
        ob_clean();
        echo json_encode($data);
        exit;
    }

    /**
     * Take out data from the array, support key.subKey method
     * @param array $array
     * @param string $key
     * @param mixed $default Default value
     * @return mixed
     */
    public function arrayGet($array, $key, $default = null) {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }
        foreach (explode('.', $key) as $segment) {
            if (!is_array($array) || !array_key_exists($segment, $array)) {
                return $default;
            }
            $array = $array[$segment];
        }
        return $array;
    }

    /**
     * Magic method to get template option
     * @param string $name
     * @return mixed
     */
    public function __get($name) {
        $object = new stdClass();
        $object->name = $name;
        $object->data = $this->arrayGet($this->getTemplateOptions(), $name);
        doAction('tpl_options_get', $object);
        return $object->data;
    }
}

function _g($name = null) {
    if ($name === null) {
        return TplOptions::getInstance()->getTemplateOptions();
    } else {
        return TplOptions::getInstance()->$name;
    }
}

function _em($name = null) {
    if ($name === null) {
        return TplOptions::getInstance()->getTemplateOptions();
    } else {
        return TplOptions::getInstance()->$name;
    }
}

function _getBlock($name = null, $type = 'content') {
    $target = TplOptions::getInstance()->$name;
    $arr = [];
    if (!is_array($target))
        return $arr;
    if (empty($target[trim($type)]))
        return $arr;
    if (trim($type) != 'title' && trim($type) != 'content')
        return $arr;
    $result = array_filter($target, 'is_array');
    if (count($result) == count($target)) {
        foreach ($target[$type] as $val) {
            $arr[] = $val;
        }
    }
    return $arr;
}

TplOptions::getInstance()->init();
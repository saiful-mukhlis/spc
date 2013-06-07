<?php
/**
 * User: yiqing
 * Date: 12-7-21
 * Time: ä¸‹å�ˆ3:41
 * To change this template use File | Settings | File Templates.
 *------------------------------------------------------------
 * @see http://www.professorcloud.com/mainsite/cloud-zoom.htm
 *------------------------------------------------------------
 * ajax content or manually reInit :
 * $(document).ready(function() {
 *       $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
 *   });
 * -----------------------------------------------------------
 */
class CloudZoom extends CWidget
{


    /**
     * @var string
     */
    public $baseUrl;

    /**
     * @var bool
     */
    public $debug = YII_DEBUG;

    /**
     * @var \CClientScript
     */
    protected $cs;

    /**
     * @var array|string
     * -------------------------
     * the options will be passed to the underlying plugin
     *   eg:  js:{key:val,k2:v2...}
     *   array('key'=>$val,'k'=>v2);
     * -------------------------
     */
    public $options = array();

    /**
     * @var string
     * css selector which will apply this plugin effect
     *
     * default is .cloud-zoom
     */
    public $selector;

    /**
     * @var string
     * gallery selector for group thumbImages
     * default is .cloud-zoom-gallery
     */
    public $gallerySelector ;


    /**
     * @return CloudZoom
     */
    public function publishAssets()
    {
        if (empty($this->baseUrl)) {
            $assetsPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
            if ($this->debug == true) {
                $this->baseUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, true);
            } else {
                $this->baseUrl = Yii::app()->assetManager->publish($assetsPath);
            }
        }
        return $this;
    }


    /**
     *
     */
    public function init()
    {
        parent::init();
        $this->cs = Yii::app()->getClientScript();

        $this->cs->registerCoreScript('jquery');
        // publish assets and register css/js files
        $this->publishAssets();

        if ($this->debug) {
            $this->registerScriptFile('cloud-zoom.1.0.2.js', CClientScript::POS_END);
        } else {
            $this->registerScriptFile('cloud-zoom.1.0.2.min.js', CClientScript::POS_END);
        }
        $this->registerCssFile('cloud-zoom.css');

        if(empty($this->options) && empty($this->selector) ){
            return ;
        }elseif(empty($this->selector)){
            $this->selector = '.cloud-zoom';
        }

        //> encode it for initializing the current jquery  plugin
         $options = empty($this->options) ? '' : CJavaScript::encode($this->options);

        $jsCode = '';

        $selector = empty($this->gallerySelector)?  "{$this->selector} ,{$this->selector}-gallery "
            : "{$this->selector} ,{$this->gallerySelector}" ;

        //>  the js code for setup
        $jsCode .= <<<SETUP
        jQuery('{$selector}').CloudZoom({$options});
SETUP;

        //> register jsCode
        $this->cs->registerScript(__CLASS__ . '#' . $this->getId(), $jsCode, CClientScript::POS_READY);

    }


    /**
     * @param string $name
     * @param mixed $value
     * @return mixed|void
     */
    public function __set($name, $value)
    {
        try {
            //shouldn't swallow the parent ' __set operation
            parent::__set($name, $value);
        } catch (Exception $e) {
            $this->options[$name] = $value;
        }
    }

    /**
     * @param $fileName
     * @param int $position
     * @return CloudZoom
     * @throws InvalidArgumentException
     */
    protected function registerScriptFile($fileName, $position = CClientScript::POS_END)
    {
        if (is_string($fileName)) {
            $jsFiles = explode(',', $fileName);
        } elseif (is_array($fileName)) {
            $jsFiles = $fileName;
        } else {
            throw new InvalidArgumentException('you must give a string or array as first argument , but now you give' . var_export($fileName, true));
        }
        foreach ($jsFiles as $jsFile) {
            $jsFile = trim($jsFile);
            $this->cs->registerScriptFile($this->baseUrl . '/' . ltrim($jsFile, '/'), $position);
        }
        return $this;
    }

    /**
     * @param $fileName
     * @return CloudZoom
     * @throws InvalidArgumentException
     */
    protected function registerCssFile($fileName)
    {
        $cssFiles = func_get_args();
        foreach ($cssFiles as $cssFile) {
            if (is_string($cssFile)) {
                $cssFiles2 = explode(',', $cssFile);
            } elseif (is_array($cssFile)) {
                $cssFiles2 = $cssFile;
            } else {
                throw new InvalidArgumentException('you must give a string or array as first argument , but now you give' . var_export($cssFiles, true));
            }
            foreach ($cssFiles2 as $css) {
                $this->cs->registerCssFile($this->baseUrl . '/' . ltrim($css, '/'));
            }
        }
        // $this->cs->registerCssFile($this->assetsUrl . '/vendors/' .$fileName);
        return $this;
    }

    /**
     * @static
     * @param bool $hashByName
     * @return string
     * return this widget assetsUrl
     */
    public static function getAssetsUrl($hashByName = false)
    {
        // return CHtml::asset(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets', $hashByName);
        return Yii::app()->getAssetManager()->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets', $hashByName, -1, YII_DEBUG);
    }
}
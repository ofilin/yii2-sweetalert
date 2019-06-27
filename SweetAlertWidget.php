<?php

namespace ofilin\sweetalert;

use Yii;
use yii\base\Widget;
use yii\helpers\Json;

class SweetAlertWidget extends Widget
{
    const TYPE_SUCCESS = 'success';
    const TYPE_ERROR = 'error';
    const TYPE_WARNING = 'warning';
    const TYPE_INFO = 'info';
    const TYPE_QUESTION = 'question';

    const INPUT_TYPE_TEXT = 'text';
    const INPUT_TYPE_EMAIL = 'email';
    const INPUT_TYPE_PASSWORD = 'password';
    const INPUT_TYPE_NUMBER = 'number';
    const INPUT_TYPE_RANGE = 'range';
    const INPUT_TYPE_TEXTAREA = 'textarea';
    const INPUT_TYPE_SELECT = 'select';
    const INPUT_TYPE_RADIO = 'radio';
    const INPUT_TYPE_CHECKBOX = 'checkbox';
    const INPUT_TYPE_FILE = 'file';

    public $isFlash = false;
    public $pluginOptions = [];
    public $callback;

    protected $queue = [];

    public function init()
    {
        parent::init();
        SweetAlert2DistAsset::register($this->getView());
    }

    public function run()
    {
        if ($this->isFlash && $session = Yii::$app->session) {
            $this->runFlashSwal($session);
            if(empty($this->queue)){
                return;
            }
        }
        $this->runSwal();
    }

    protected function runSwal()
    {
        $view = $this->getView();
        if ($this->isFlash) {
            $js = "Swal.mixin(" . Json::encode($this->pluginOptions) . ").queue(" . Json::encode($this->queue) . ").then({$this->callback}).catch(swal.noop);";
        } else {
            $js = "Swal.fire(" . Json::encode($this->pluginOptions) . ").then({$this->callback}).catch(swal.noop);";
        }

        $this->view->registerJs($js, $view::POS_END);
    }

    protected function runFlashSwal($session)
    {
        $flashes = $session->getAllFlashes();
        foreach ($flashes as $type => $message) {
            $this->queue[] = [
                'type' => $type,
                'title' => $message,
            ];
        }
    }
}



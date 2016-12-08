<?php
/**
 * @author sergii gamaiunov <hello@webkadabra.co>
 */

namespace webkadabra\yii\widgets\bootstrap\toggle;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\InputWidget;

class BootstrapToggleInput extends InputWidget
{
    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run();
        $this->registerAssets();
        echo $this->renderInput();
    }

    public $inlineLabel;
    public $containerOptions = [];
    public $pluginOptions = [];


    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        BootstrapToggleAsset::register($view);
    }


    /**
     * @return string
     */
    protected function renderInput()
    {
        $this->options = ArrayHelper::merge($this->options, ['data-toggle' => 'toggle']);
        foreach ($this->pluginOptions as $name => $value) {
            $this->options['data-'.$name] = $value;
        }
		if (empty($this->options['label'])) {
			$this->options['label'] = null;
		}
		$input = $this->getInput();
		$output = ($this->inlineLabel) ? $input : Html::tag('div', $input);
		return Html::tag('div', $output, $this->containerOptions) . "\n";
    }

    /**
     * Generates an input.
     */
    protected function getInput()
    {
        if ($this->hasModel()) {
            return $list ?
                Html::activeCheckbox($this->model, $this->attribute, $this->data, $this->options) : 
        }
        $input = 'Checkbox';
        $checked = false;
		$this->options['value'] = $this->value;
		$checked = ArrayHelper::remove($this->options, 'checked', '');
		if (empty($checked) && !empty($this->value)) {
			$checked = ($this->value == 0) ? false : true;
		} elseif (empty($checked)) {
			$checked = false;
		}
        return Html::$input($this->name, $checked, $this->options);
    }
}
<?php

namespace Core\HTML;

class Form
{

    private $data;
    private $errors;
    public $surround = 'p';

    public function __construct($data, array $errors = null)
    {
        $this->data = $data;
        $this->errors = $errors;
    }

    protected function surround(string $html)
    {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    public function input(string $key, string $label = null): string
    {
        $type = $key === 'password' ? 'password' : 'text';
        $value = $this->getValue($key);

        return $this->surround('<input type="'.$type.'" name="'.$key.'" value="'.$this->getValue($key).'">');

        // return <<<HTML
        // <div class="form-group">
        //     <label for="field{$key}">$label</label>
        //     <input type="{$type}" id="field{$key}" class="{$this->getInputClass($key)}" name="{$key}" value="{$value}" required>
        //     {$this->getErrorFeedback($key)}
        // </div>
        // HTML;
    }

    public function select(string $key, string $label, array $option = []): string
    {
        $tableHTML = [];
        $value = $this->getValue($key);
        foreach ($option as $k => $v) {
            $selected = in_array($k, $value) ? " selected" : "";
            $tableHTML[] = "<option value=\"$k\"$selected>$v</option>";
        }
        $InputHTML = implode('', $tableHTML);
        return <<<HTML
        <div class="form-group">
            <label for="field{$key}">$label</label>
            <select type="text" id="field{$key}" class="{$this->getInputClass($key)}" name="{$key}[]" multiple> {$InputHTML} </select>
            {$this->getErrorFeedback($key)}
        </div>
        HTML;
    }


    public function textarea(string $key, string $label): string
    {
        $value = $this->getValue($key);
        $class = $this->getInputClass($key);
        $invalidFeedback = $this->getErrorFeedback($key);

        return <<<HTML
        <div class="form-group">
            <label for="field{$key}">$label</label>
            <textarea id="field{$key}" class="{$class}" rows="6" name="{$key}"required>{$value}</textarea>
            {$invalidFeedback}
        </div>
        HTML;
    }

    private function getInputClass(string $key): string
    {
        $InputClass = 'form-control mb-3';
        if (isset($this->errors[$key])) {
            $InputClass .= ' is-invalid';
        }
        return $InputClass;
    }

    private function getErrorFeedback(string $key): string
    {
        if (isset($this->errors[$key])) {
            if (is_array($key)) {
                $option = implode('<br>', $this->errors[$key]);
            } else {
                $option = $this->errors[$key];
            }
            return '<div class="invalid-feedback">' . $option . '</div>';
        }
        return '';
    }


    protected function getValue(string $key)
    {
        
        if (is_object($this->data)) {
            return $this->data->$key;
        }
        return isset($this->data[$key]) ? $this->data[$key] : null;
        // if (is_array($this->data)) {
        //     if(!empty($this->data)){
        //         return $this->data[$key];
        //     }
        //     else{
        //         return null;
        //     }
        // }

        // $method = 'get' . str_replace(' ', '', ucwords(str_replace('_', ' ', ($key))));
        // $value = $this->data->$method();

        // if ($value instanceof \DateTimeInterface) {
        //     return $value->format('Y-m-d H:i:s');
        // }
        // return $value;
    }
}

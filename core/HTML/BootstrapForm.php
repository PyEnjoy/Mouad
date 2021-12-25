<?php
namespace Core\HTML;

class BootstrapForm extends Form{

    protected function surround(string $html)
    {
        return "<div class=\"form-group\">{$html}</div>";
    }

    public function input(string $name,string $label = null,$option = []): string
    {
        $type = isset($option['type']) ? $option['type'] : 'text';
        $label = '<label>'. $label . '</label>';
        if($type === 'textarea'){
            $input = '<textarea class="form-control" type="'.$type.'" name="'.$name.'" >'.$this->getValue($name).'</textarea>';
        }else{
            $input = '<input class="form-control" type="'.$type.'" name="'.$name.'" value="'.$this->getValue($name).'">';
        }
        return $this->surround($label.$input);
        //$type = $name === 'password' ? 'password' : 'text';
        //$label = $label !== null ? $label : $name;
        //return $this->surround('<label>'. $label . '</label><input class="form-control" type="'.$type.'" name="'.$name.'" value="'.$this->getValue($name).'">');
    } 

    public function select(string $key, string $label, array $option = []): string
    {
        $tableHTML = [];
        $label = '<label>'. $label . '</label>';
        $value = $this->getValue($key);
        
        foreach ($option as $k => $v) {
            $selected = $k == $value ? " selected" :"";
            $tableHTML[] = "<option value=\"$k\"$selected>$v</option>";
        }
        $InputHTML = implode('', $tableHTML);
        $input = '<select type="text" class="form-control" name="'.$key.'" >'.$InputHTML.'</select>';
        
        return $this->surround($label.$input);
    }

    public function submit()
    {
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }
}

    

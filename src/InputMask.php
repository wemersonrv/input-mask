<?php

namespace Wemersonrv\InputMask;

use Laravel\Nova\Fields\Field;

class InputMask extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'input-mask';

    /**
     * Set input mask
     *
     * @param  String  $mask
     * @return $this
     */
    public function mask(String $mask = '')
    {
        return $this->withMeta([__FUNCTION__ => $mask]);
    }

    /**
     * Set raw mode when save
     *  TRUE    Send value without mask ( RAW )
     *  FALSE   Send value with mask
     *
     * @param  bool  $raw
     * @return $this
     */
    public function raw(bool $raw = true)
    {
        return $this->withMeta([__FUNCTION__ => $raw]);
    }
    
    /**
     * Set placeholder
     *
     * @param string $placeholder
     * @return InputMask
     */
    public function placeholder(string $placeholder = '')
    {
        return $this->withMeta([
            'extraAttributes' => [
                'placeholder' => $placeholder,
            ],
        ]);
    }
}

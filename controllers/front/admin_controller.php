<?php
  public function buildAdminParameters()
  {
         $fields_form = array(
            'form' => array(
                'legend' => array(
                  'title' => $this->trans('Contact details', array(), 'Modules.Checkpayment.Admin'),
                  //'title' => 'some-title',  
                  'icon' => 'icon-envelope'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->trans('Payee (name)', array(), 'Modules.Checkpayment.Admin'),
                        //'label' => 'some-label', 
                        'name' => 'CHEQUE_NAME',
                        'required' => true
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->trans('Address', array(), 'Modules.Checkpayment.Admin'),
                        'desc' => $this->trans('Address where the check should be sent to.', array(), 'Modules.Checkpayment.Admin'),
                        //'label' => 'some-new-label', 
                        //'desc' => 'some-desc', 
                        'name' => 'CHEQUE_ADDRESS',
                        'required' => true
                      ),
                      array(
                          'type'      => 'radio',                               // This is an <input type="checkbox"> tag.
                          'label'     => $this->l('Mode'),        // The <label> for this <input> tag.
                          'name'      => 'active',                              // The content of the 'id' attribute of the <input> tag.
                          'required'  => true,                                  // If set to true, this option must be set.
                          'class'     => 't',                                   // The content of the 'class' attribute of the <label> tag for the <input> tag.
                          'is_bool'   => true,                                  // If set to true, this means you want to display a yes/no or true/false option.
                                                                                // The CSS styling will therefore use green mark for the option value '1', and a red mark for value '2'.
                                                                                // If set to false, this means there can be more than two radio buttons,
                                                                                // and the option label text will be displayed instead of marks.
                          'values'    => array(                                 // $values contains the data itself.
                            array(
                              'id'    => 'active_on',                           // The content of the 'id' attribute of the <input> tag, and of the 'for' attribute for the <label> tag.
                              'value' => 1,                                     // The content of the 'value' attribute of the <input> tag.
                              'label' => $this->l('Production')                    // The <label> for this radio button.
                            ),
                            array(
                              'id'    => 'active_off',
                              'value' => 0,
                              'label' => $this->l('Sandbox')
                            )
                          ),
                        ),
                     array(
                        'type' => 'text',
                        'label' => $this->trans('Webhook', array(), 'Modules.Checkpayment.Admin'),
                        //'label' => 'some-label', 
                        'name' => 'WEB_HOOK',
                        'required' => true
                      ),
                      array(
                        'type'    => 'checkbox',                   // This is an <input type="checkbox"> tag.
                        'label'   => $this->l('Payment Method'),          // The <label> for this <input> tag.
                        'desc'    => $this->l('Choose options.'),  // A help text, displayed right next to the <input> tag.
                        'name'    => 'Payment Methods',                    // The content of the 'id' attribute of the <input> tag.
                        'values'  => array(
                          'query' => array(
                            array(
                                'id' => 'card_payment_method',
                                'name' => $this->l('Card'),
                                'val' => 'card_payment_method'
                              ),
                           array(
                                'id' => 'installment_payment_method',
                                'name' => $this->l('Monthly Installents'),
                                'val' => 'installment_payment_method'
                            ),
                           array(
                               'id' => 'cash_payment_method',
                                'name' => $this->l('Cash'),
                                'val' => 'cash_payment_method'
                            ),
                           array(
                                'id' => 'banorte_payment_method',
                                'name' => $this->l('Banorte'),
                                'val' => 'banorte_payment_method'
                            ),
                           array(
                                'id' => 'spei_payment_method',
                                'name' => $this->l('SPEI'),
                                'val' => 'spei_payment_method'
                            ),

                        ),
                          //'query' => $options,                     // $options contains the data itself.
                          'id'    => 'id_option',                  // The value of the 'id' key must be the same as the key
                                                                   // for the 'value' attribute of the <option> tag in each $options sub-array.
                          'name'  => 'name'                        // The value of the 'name' key must be the same as the key
                        ),                                           // for the text content of the <option> tag in each $options sub-array.
                        'expand' => array(                      // 1.6-specific: you can hide the checkboxes when there are too many.
                                                                   // A button appears with the number of options it hides.
                          ['print_total'] => count($options),
                          'default' => 'show',
                          'show' => array('text' => $this->l('show'), 'icon' => 'plus-sign-alt'),
                          'hide' => array('text' => $this->l('hide'), 'icon' => 'minus-sign-alt')
                        ),
                      ),
                      array(
                        'type' => 'password',
                        'label' => $this->trans('Test Private Key', array(), 'Modules.Checkpayment.Admin'),
                        'name' => 'TEST_PRIVATE_KEY',
                        'required' => true
                      ),
                       array(
                        'type' => 'password',
                        'label' => $this->trans('Test Public Key', array(), 'Modules.Checkpayment.Admin'),
                        'name' => 'TEST_PUBLIC_KEY',
                        'required' => true
                      ),
                       array(
                        'type' => 'password',
                        'label' => $this->trans('Test Live Key', array(), 'Modules.Checkpayment.Admin'),
                        'name' => 'LIVE_PRIVATE_KEY',
                        'required' => true
                      ),
                       array(
                        'type' => 'password',
                        'label' => $this->trans('Live Public Key', array(), 'Modules.Checkpayment.Admin'),
                        'name' => 'LIVE_PUBLIC_KEY',
                        'required' => true
                      ),
            ),
                'submit' => array(
                    'title' => $this->trans('Save', array(), 'Admin.Actions'),
                    //'title' => 'submit title'),
                )
            ),
          );
      return $fields_form; 
 
  }
?>

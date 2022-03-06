<?php

    class PickleDelivery {

        private $settings;

        public function __construct(){
            $this->settings = get_option('pp_delivery');
            if(!$this->settings){
                $this->settings  = array(
                    'zones' => array()
                );
            }
        }

        protected function save_options(){
            return update_option('pp_delivery', $this->settings);
        }

        public function change_in_shipping_setting_func(){
            $posted_data = $_POST;

            $this->settings['zone_'.$posted_data['zone_id']]['minimum_amt'] = $posted_data['minimum_amt'];
            $this->settings['zone_'.$posted_data['zone_id']]['shipping_charge'] = $posted_data['shipping_charge'];
            $this->settings['zone_'.$posted_data['zone_id']]['free_shipping_charge'] = $posted_data['free_shipping_charge'];
            $this->save_options();            
        }


    }


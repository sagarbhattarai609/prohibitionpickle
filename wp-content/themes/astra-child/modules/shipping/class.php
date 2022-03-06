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

            print_r($posted_data);
            exit;


            $this->settings['zone_'.$zone_id][$key] = $value;
            $this->save_options();            
        }


    }


<?php

class ApiToken
{
    private $token_id;
    private $token;
    private $company_name;

        public function getTokenID()
        {
            return $this->token_id;
        }
        public function getToken()
        {
            return $this->token;
        }
        public function getCompanyName()
        {
            return $this->company_name;
        }

        public function setTokenID($token_id)
        {
            $this->token_id = $token_id;
        }
        public function setToken($token)
        {
            $this->token = $token;
        }
        public function setCompanyName($company_name)
        {
            $this->company_name = $company_name;
        }
}
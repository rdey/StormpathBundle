<?php

namespace Redeye\StormpathBundle\IdSite;

/**
* 
*/
class IdSiteResponse
{
    protected $iss;
    protected $sub;
    protected $aud;
    protected $exp;
    protected $iat;
    protected $jti;
    protected $state;
    protected $status;

    public function __construct(\stdClass $data)
    {
        $this->iss = $data->iss;
        $this->sub = $data->sub;
        $this->aud = $data->aud;
        $this->exp = $data->exp;
        $this->iat = $data->iat;
        $this->jti = $data->jti;
        $this->state = $data->state;
        $this->status = $data->status;
    }

    public function getIssuer()
    {
        return $this->iss;
    }

    public function getSubject()
    {
        return $this->sub;
    }

    public function getAudience()
    {
        return $this->aud;
    }

    public function getExpiresAt()
    {
        return $this->exp;
    }

    public function getCreatedAt()
    {
        return $this->iat;
    }

    public function getToken()
    {
        return $this->jti;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getStatus()
    {
        return $this->status;
    }
}

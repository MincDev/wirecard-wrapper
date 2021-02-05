<?php

namespace Wrapper;

class Constants
{
    public const WSDL               = "https://api.mygateglobal.com/api/?wsdl";
    public const WIRECARD_MODE_TEST = 0;
    public const WIRECARD_MODE_LIVE = 1;

    const ACTION_3DS_LOOKUP     = 14;
    const ACTION_AUTHORISE      = 1;
    const ACTION_SALE           = 5;
    const ACTION_CAPTURE        = 3;
    const ACTION_CREATE_TOKEN   = 21;
    const ACTION_READ_TOKEN     = 22;
    const ACTION_DELETE_TOKEN   = 23;
    const ACTION_AUTHENTICATE   = 15;
    const ACTION_AUTH_REVERSAL  = 2;
    const ACTION_CREDIT         = 4;
}
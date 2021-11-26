<?php



namespace depexorPackages\Utils\Captcha\Validators;

use Illuminate\Validation\Validator;

class CaptchaValidator
{


    public function validate($attribute, $value, $parameters)
    {
        return app()->captcha_manager->validate($value);
    }




}
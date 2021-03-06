<?php

namespace depexorPackages\User\tests;

use function GuzzleHttp\Psr7\str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Testing\Fakes\MailFake;
use depexorPackages\App\Http\RequestRoute;
use depexorPackages\Core\tests\TestCase;
use depexorPackages\Customer\Models\Address;
use depexorPackages\Customer\Models\Customer;
use depexorPackages\Notification\Channels\AppMailChannel;
use depexorPackages\Notification\Mail\SimpleHtmlEmail;
use depexorPackages\Option\Facades\Option;
use depexorPackages\User\Events\UserWasRegistered;
use depexorPackages\User\Models\User;
use depexorPackages\User\Notifications\NewRegistration;
use depexorPackages\User\Notifications\VerifyEmail;
use depexorPackages\User\tests\UserTestHelperTrait;
use depexorPackages\User\UserManager;
use depexorPackages\Utils\Mail\MailSender;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

/**
 * Run test
 * @author Bobi Slaveykvo depexor
 * @command php phpunit.phar --filter UserTest
 */
class UserManagerTest extends TestCase
{
    use UserTestHelperTrait;

    public function testRegistration()
    {
        $this->_disableCaptcha();
        $this->_disableLoginCaptcha();
        $this->_enableUserRegistration();
        $this->_disableRegistrationApprovalByAdmin();

        $randomInt = rand(1111, 9999);
        $password = md5($randomInt);

        // Test simple user registration
        $newUser = array();
        $newUser['username'] = 'bobi_' . $randomInt;
        $newUser['email'] = $newUser['username'] . '@depexor.com';
        $newUser['password'] = $password;
        $newUser['password_confirm'] = $password;

        $userManager = new UserManager();
        $registerStatus = $userManager->register($newUser);

        $this->assertArrayHasKey('success', $registerStatus);

        self::$_username = $newUser['username'];
        self::$_password = $newUser['password'];
        self::$_email = $newUser['email'];

    }

    /*
        public function testEmailWrongRegistration()
        {
            $data['option_value'] = 'y';
            $data['option_key'] = 'captcha_disabled';
            $data['option_group'] = 'users';
            $save = save_option($data);

            $randomInt = rand(1111, 9999);
            $password = md5($randomInt);

            // Test wrong email user registration
            $newUser = array();
            // $newUser['username'] = 'bobi_'.$randomInt;
            $newUser['email'] = 'wrong-email';
            $newUser['password'] = $password;
            $newUser['password_confirm'] = $password;

            $userManager = new UserManager();
            $registerStatus = $userManager->register($newUser);

            $this->assertArrayHasKey('success', $registerStatus);
        }
    */

    public function testLogin()
    {
        $this->_disableCaptcha();
        $this->_disableLoginCaptcha();
        $this->_disableRegistrationApprovalByAdmin();
        $this->_disableEmailVerify();

        $loginDetails = array();
        $loginDetails['username'] = self::$_username;
        $loginDetails['password'] = self::$_password;

        $userManager = new UserManager();
        $loginStatus = $userManager->login($loginDetails);

        $this->assertArrayHasKey('success', $loginStatus);

    }

    public function testWrongPasswordLogin()
    {
        $this->_disableCaptcha();
        $this->_disableLoginCaptcha();
        $this->_disableRegistrationApprovalByAdmin();

        $loginDetails = array();
        $loginDetails['username'] = self::$_username;
        $loginDetails['password'] = 'depexor-best';

        $userManager = new UserManager();
        $loginStatus = $userManager->login($loginDetails);

        $this->assertArrayHasKey('error', $loginStatus);

    }

    public function testWrongUsernameLogin()
    {
        $this->_disableCaptcha();
        $this->_disableLoginCaptcha();
        $this->_disableRegistrationApprovalByAdmin();

        $loginDetails = array();
        $loginDetails['username'] = 'depexor-some-user';
        $loginDetails['password'] = 'depexor-some-pass';

        $userManager = new UserManager();
        $loginStatus = $userManager->login($loginDetails);

        $this->assertArrayHasKey('error', $loginStatus);

    }

    public function testWrongEmailLogin()
    {
        $this->_disableCaptcha();
        $this->_disableLoginCaptcha();
        $this->_disableRegistrationApprovalByAdmin();

        $loginDetails = array();
        $loginDetails['email'] = 'depexor-some-email';
        $loginDetails['password'] = 'depexor-some-pass';

        $userManager = new UserManager();
        $loginStatus = $userManager->login($loginDetails);

        $this->assertArrayHasKey('error', $loginStatus);

    }

    public function testForgotPassword()
    {
        $this->_disableCaptcha();
        $this->_disableLoginCaptcha();
        $this->_disableRegistrationApprovalByAdmin();

        $user = 'testUserAddress' . uniqid().'@example.com';
        $pass = 'testUserAddress' . uniqid();

        $this->_registerUserWithEmail($user, $pass);

        $userDetails = array();
        $userDetails['email'] = $user;

        $userManager = new UserManager();
        $requestStatus = $userManager->send_forgot_password($userDetails);

        $this->assertArrayHasKey('success', $requestStatus);
        $this->assertTrue($requestStatus['success']);



        $this->assertTrue(str_contains($requestStatus['message'],'We have emailed your password reset link!'));
        $this->assertTrue(str_contains($requestStatus['message'],'reset link'));



        $userDetails['email'] = 'wrong@gmail.com';

        $userManager = new UserManager();
        $requestStatus = $userManager->send_forgot_password($userDetails);

        $this->assertArrayHasKey('error', $requestStatus);
        $this->assertTrue($requestStatus['error']);
        $this->assertTrue(str_contains($requestStatus['message'],'user with that'));


    }

    public function testResetPassword()
    {
        $password_reset_hash = '[like]';

        $check = mw()->user_manager->get_all('exclude_shorthand=password_reset_hash&single=true&password_reset_hash=[not_null]&password_reset_hash=' . $password_reset_hash . '&username=' . self::$_username);

        $this->assertEquals(false, $check);

    }


    public function testDisableUserRegistration()
    {
        $this->_disableUserRegistration();
        $this->_disableRegistrationApprovalByAdmin();

        $randomInt = rand(1111, 9999);
        $password = md5($randomInt);

        // Test simple user registration
        $newUser = array();
        $newUser['username'] = 'bobi_' . $randomInt;
        $newUser['email'] = $newUser['username'] . '@depexor.com';
        $newUser['password'] = $password;
        $newUser['password_confirm'] = $password;

        $userManager = new UserManager();
        $registerStatus = $userManager->register($newUser);

        $this->assertArrayHasKey('error', $registerStatus);
    }


    public function testDisableUserRegistrationWithDisposableEmail()
    {
        $this->_disableUserRegistrationWithDisposableEmail();
        $this->_disableCaptcha();
        $this->_disableLoginCaptcha();
        $this->_enableUserRegistration();
        $this->_disableRegistrationApprovalByAdmin();

        $randomInt = rand(1111, 9999);
        $password = md5($randomInt);

        // Test simple user registration
        $newUser = array();
        $newUser['username'] = 'anon' . $randomInt;
        $newUser['email'] = $newUser['username'] . '@mailinator.com';
        $newUser['password'] = $password;
        $newUser['password_confirm'] = $password;

        $userManager = new UserManager();
        $registerStatus = $userManager->register($newUser);
        $this->assertArrayHasKey('error', $registerStatus);

    }

    public function testUserApprovalRegistration()
    {

        $fakeNotify = Notification::fake();

        $this->_enableUserRegistration();
        $this->_enableRegistrationApprovalByAdmin();
        $this->_enableEmailVerify();
        $this->_enableRegisterWelcomeEmail();
        $this->_disableCaptcha();
        $this->_disableLoginCaptcha();


        $randomInt = rand(1111, 9999);
        $password = md5($randomInt);

        // Test simple user registration
        $newUser = array();
        $newUser['username'] = 'bobi_' . $randomInt;
        $newUser['email'] = $newUser['username'] . '@depexor.com';
        $newUser['password'] = $password;
        $newUser['password_confirm'] = $password;

        $userManager = new UserManager();
        $registerStatus = $userManager->register($newUser);
        $this->assertArrayHasKey('success', $registerStatus);


        $loginDetails = array();
        $loginDetails['username'] = $newUser['username'];
        $loginDetails['password'] = $newUser['password'];

        $userManager = new UserManager();
        $loginStatus = $userManager->login($loginDetails);
//dump($loginStatus);
        $this->assertArrayHasKey('error', $loginStatus);

        $this->assertTrue(str_contains($loginStatus['error'],'verify'));



        $user = User::find($registerStatus['data']['id']);

        $this->assertEquals('0', $user->is_active);
        $this->assertEquals('0', $user->is_admin);
        $this->assertEquals('0', $user->is_verified);

        $fakeNotify->assertSentTo([$user], NewRegistration::class);
        $fakeNotify->assertSentTo([$user], VerifyEmail::class);
    }

    public function testUserRegistrationWithXSS()
    {
        $this->_enableUserRegistration();
        $this->_disableRegistrationApprovalByAdmin();
        $this->_enableRegisterWelcomeEmail();
        $this->_disableCaptcha();
        $this->_disableLoginCaptcha();


        $unamnexss = '<a href="Boom"><font color=a"onmouseover=alert(document.cookie);"> XSxxxS-Try ME</span></font>' . uniqid();
        $registerStatus = '';
        $newUser = array();
        $newUser['username'] = $unamnexss;
        $newUser['email'] = uniqid() . '@mail.test';
        $newUser['password'] = uniqid();


        $userManager = new UserManager();
        $registerStatus = $userManager->register($newUser);


        $this->assertTrue($registerStatus['error']);
        $this->assertArrayHasKey('errors', $registerStatus);
        $this->assertArrayHasKey('username', $registerStatus['errors']);


    }


    public function testUserRegistrationForgotPasswordEmail()
    {
        $this->_enableUserRegistration();
        $this->_disableEmailVerify();
        $this->_disableRegistrationApprovalByAdmin();
        $this->_enableRegisterWelcomeEmail();
        $this->_disableCaptcha();
        $this->_disableLoginCaptcha();


        $newUser = array();
        $newUser['username'] = 'xxx' . uniqid();
        $newUser['email'] = uniqid() . '@mail.test';
        $newUser['password'] = uniqid();


        $userManager = new UserManager();
        $registerStatus = $userManager->register($newUser);
        $this->assertArrayHasKey('success', $registerStatus);
        $user = User::find($registerStatus['data']['id']);


        $userManager = new UserManager();
        $forgotPass = $userManager->send_forgot_password($newUser);


        $this->assertArrayHasKey('success', $forgotPass);
        $this->assertTrue($forgotPass['success']);


        $this->assertTrue(str_contains($forgotPass['message'],'reset link'));



        $check = DB::table('password_resets')
            ->where('email', '=', $newUser['email'])
            ->first();

        $this->assertEquals($check->email, $newUser['email']);


        // Lets change the password
        $token = Password::getRepository()->create($user);
        $update_pass_request = [
            'token' => $token,
            'email' => $newUser['email'],
            'password' => 'pass1234',
            'password_confirmation' => 'pass1234'
        ];
        $updatePasswordWithToken = RequestRoute::postJson(route('api.user.password.update'), $update_pass_request);



        $this->assertArrayHasKey('success', $updatePasswordWithToken);

        $this->assertTrue($updatePasswordWithToken['success']);

        $this->assertTrue(str_contains($updatePasswordWithToken['message'],'has been reset'));


        logout();

        $loginDetails = array();
        $loginDetails['email'] = $newUser['email'];
        $loginDetails['password'] = 'pass1234';

        $userManager = new UserManager();
        $loginStatus = $userManager->login($loginDetails);
        $this->assertArrayHasKey('success', $loginStatus);


        // Lets expire email token
        $token = Password::getRepository()->create($user);
        DB::table('password_resets')->where('email', '=', $check->email)->update([
            'created_at' => '1997'
        ]);
        $update_pass_request = [
            'token' => $token,
            'email' => $newUser['email'],
            'password' => '1234',
            'password_confirmation' => '1234'
        ];
        $updatePasswordWithToken = RequestRoute::postJson(route('api.user.password.update'), $update_pass_request);
        $this->assertArrayHasKey('error', $updatePasswordWithToken);
        $this->assertTrue($updatePasswordWithToken['error']);

        $this->assertTrue(str_contains($updatePasswordWithToken['message'],'token is invalid'));

    }

    public function testUserRegistrationForgotPasswordCustomEmailTemplate()
    {
        \Config::set('mail.transport', 'array');
        $this->_enableUserRegistration();
        $this->_disableRegistrationApprovalByAdmin();
        $this->_enableRegisterWelcomeEmail();
        $this->_disableCaptcha();
        $this->_disableLoginCaptcha();

        $newUser = array();
        $newUser['username'] = 'xxx' . uniqid();
        $newUser['email'] = uniqid() . '@mail.test';
        $newUser['password'] = uniqid();


        $userManager = new UserManager();
        $registerStatus = $userManager->register($newUser);
        $this->assertArrayHasKey('success', $registerStatus);
        $user = User::find($registerStatus['data']['id']);

        // Save custom mail template and test it
        $templateId = save_mail_template([
            'type' => 'forgot_password',
            'message' => '{{username}}--unit-testingRESET_passwordlink-{{reset_password_link}}'
        ]);

        Option::setValue('forgot_password_mail_template', $templateId, 'users');

        $userManager = new UserManager();
        $forgotPass = $userManager->send_forgot_password($newUser);
        $this->assertArrayHasKey('success', $forgotPass);
        $this->assertTrue($forgotPass['success']);

        $this->assertTrue(str_contains($forgotPass['message'],'reset link'));



        $findResetPasswordLink = false;
        $emails = app()->make('mailer')->getSwiftMailer()->getTransport()->messages();
        foreach ($emails as $email) {

            $body = $email->getBody();

            if (strpos($body, '--unit-testingRESET_passwordlink-') !== false) {
                if (strpos($body, '?email=') !== false) {
                    $findResetPasswordLink = true;
                }
            }
        }

        $this->assertTrue($findResetPasswordLink);
    }


    public function testUserRegistrationWelcomeCustomEmailTemplate()
    {
        \Config::set('mail.transport', 'array');
        $this->_enableUserRegistration();
        $this->_disableRegistrationApprovalByAdmin();
        $this->_enableRegisterWelcomeEmail();
        $this->_disableCaptcha();
        $this->_disableLoginCaptcha();

        $newUser = array();
        $newUser['username'] = 'xxx' . uniqid();
        $newUser['email'] = uniqid() . '@mail.test';
        $newUser['password'] = uniqid();


        // Save custom mail template and test it
        $templateId = save_mail_template([
            'type' => 'new_user_registration',
            'message' => '{{username}}--unit-testing-welcome-{{email}}'
        ]);
        Option::setValue('new_user_registration_mail_template', $templateId, 'users');


        $userManager = new UserManager();
        $registerStatus = $userManager->register($newUser);
        $this->assertArrayHasKey('success', $registerStatus);
        $user = User::find($registerStatus['data']['id']);


        $findUnitTestingText = false;
        $checkMailIsFound = false;
        $findUsername = false;
        $emails = app()->make('mailer')->getSwiftMailer()->getTransport()->messages();
        foreach ($emails as $email) {

            $subject = $email->getSubject();
            $body = $email->getBody();

            if ($subject == 'New Registration') {
                $checkMailIsFound = true;
                if (strpos($body, '--unit-testing-welcome-') !== false) {
                    $findUnitTestingText = true;
                }

                if (strpos($body, $newUser['email']) !== false) {
                    $findUsername = true;
                }
            }

        }

        $this->assertTrue($findUsername);
        $this->assertTrue($findUnitTestingText);
        $this->assertTrue($checkMailIsFound);
    }


    public function testUserAddressIsCachedAfterSave()
    {
        $this->_disableCaptcha();
        $this->_disableLoginCaptcha();
        $this->_disableRegistrationApprovalByAdmin();
        $this->_disableEmailVerify();


        $user = 'testUserAddress' . uniqid();
        $pass = 'testUserAddress' . uniqid();

        $this->_registerUserWithUsername($user, $pass);


        $loginDetails = array();
        $loginDetails['username'] = $user;
        $loginDetails['password'] = $pass;

        $userManager = new UserManager();
        $loginStatus = $userManager->login($loginDetails);

        $this->assertArrayHasKey('success', $loginStatus);


        $address = [];
        // $address['country'] = 'country' . uniqid();
        $address['city'] = 'city' . uniqid();
        $address['street'] = 'street' . uniqid();

        $findCustomerByUser = Customer::where('user_id', \Auth::id())->first();

        if (!$findCustomerByUser) {
            $createNewCustomer = Customer::create([
                'user_id' => \Auth::id(),
            ]);
            //  $createNewCustomer->save();
            $findCustomerByUser = $createNewCustomer;
        }

        $findCustomerAddressByCustomerId = Address::where('customer_id', $findCustomerByUser->id)->first();
        if (!$findCustomerAddressByCustomerId) {
            $findCustomerAddressByCustomerId = Address::create([
                'name' => 'Default',
                'type' => 'shipping',
                'customer_id' => $findCustomerByUser->id,
                //    'country' => $address['country'],
                'city' => $address['city'],
                'street' => $address['street'],

            ]);
            $findCustomerAddressByCustomerId->save();
        }

        $user_data_checkout = checkout_get_user_info();


        $this->assertEquals($address['city'], $findCustomerAddressByCustomerId->city);
        $this->assertEquals($address['city'], $user_data_checkout['city']);

        $city2 = 'city2' . uniqid();
        $findCustomerAddressByCustomerId->city = $city2;
        $findCustomerAddressByCustomerId->save();

        $user = auth()->user();

        $shippingAddress = $user->customer()->first()->shippingAddress()->first();
        $user_data_checkout = checkout_get_user_info();

        $this->assertEquals($city2, $shippingAddress->city);
        $this->assertEquals($city2, $user_data_checkout['city']);


    }


}

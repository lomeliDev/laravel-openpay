<?php



use TooPago\Payu\Payments;
use Fakes\Order;
use Fakes\User;

class LaravelPayUTest extends PHPUnit_Framework_TestCase
{
    protected $approvedOrder;
    public $response;

    
    public static function setUpBeforeClass()
    {
        date_default_timezone_set('America/Mexico_City');
        $environmentPath = __DIR__.'/../.env';
        $setEnv = trim(file_get_contents($environmentPath));
        if (file_exists($environmentPath)){
            //putenv('APP_ENV='.$setEnv);
            if (getenv('APP_ENV') && file_exists(__DIR__.'/../.' .getenv('APP_ENV') .'.env')) {
                $dotenv = Dotenv\Dotenv::create(__DIR__.'/../', '.'.getenv('APP_ENV').'.env');
                $dotenv->overload();
            }
        }
    }

    public function testCreditCardPayment()
    {
        $user = $this->getUser();
        $order = $this->getOrder();
        $sendData = [
            'REFERENCE_CODE' => $order->reference,
            'DESCRIPTION' => 'Payment cc test 2',
            'VALUE' => $order->value,
            'BUYER_NAME' =>  $user->name,
            'PAYER_NAME' => 'APPPENDINGROVED',
            'CREDIT_CARD_NUMBER' => '5499491458511933',
            'CREDIT_CARD_EXPIRATION_DATE' => '2023/01',
            'CREDIT_CARD_SECURITY_CODE' => '897',
            'PAYMENT_METHOD' => 'MASTERCARD',
            'INSTALLMENTS_NUMBER' => '1',
        ];
        $payu = new Payments();
        $payu->CreatePaymentCard($sendData, function($response , $order) {
            //$order->payu_order_id = $response->orderId;
            //$order->transaction_id = $response->transactionId;

            var_dump($response->state);

            //$this->assertEquals($response->state, 'APPROVED');
            //$this->assertTrue(false);
        }, function($error) {

            var_dump($error);

            // ... handle PayUException, InvalidArgument or another error
        });

        var_dump($order);
        return $order;
    }


    private function getUser()
    {
        return new User([
            'name' => 'Taylor Otwell Lopez',
            'email' => 'user@tests.com',
        ]);
    }

    private function getOrder()
    {
        return new Order([
            'payu_order_id' => null,
            'transaction_id' => null,
            'reference' => uniqid(time()),
            'value' => 600,
            'user_id' => 1
        ]);
    }
}

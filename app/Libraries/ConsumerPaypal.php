<?php
namespace App\Libraries;
 
use PayPal\Rest\ApiContext,
    PayPal\Auth\OAuthTokenCredential,
    PayPal\Api\CreditCard,
    PayPal\Exception\PayPalConnectionException,
    PayPal\Api\Amount,
    PayPal\Api\Details,
    PayPal\Api\Item,
    PayPal\Api\ItemList,
    PayPal\Api\CreditCardToken,
    PayPal\Api\Transaction,
    PayPal\Api\Payment,
    PayPal\Api\Payer,
    PayPal\Api\FundingInstrument,
    PayPal\Api\PaymentExecution, 
    PayPal\Api\RedirectUrls,
    PayPal\Api\Capture,
    PayPal\Api\Authorization,
    PayPal\Api\Refund,
    PayPal\Api\RefundRequest;

class ConsumerPaypal {
 
    /**
    *
    * api context
    *
    * @var
    *
    */
    private $_apiContext = null;
    
    /**
    *
    * base url de la app
    *
    * @var
    *
    */
    private $_baseUrl = "http://127.0.0.1/~deduar/Projects/PayPal_PHP-SDK/public/";
 
    /**
    *
    * crea la instancia y configura ApiContext
    *
    */
    public function __construct()
    {
        $this->_apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AefFAmUYJJhIb2TlozO8IvkHC7FnRYP7kZOcW0OhXHHyBH2OSuB0vxN4xr2Gl5Sg1daHBMp41HDnvdkM',     // ClientID
                'ECuTGLlzK7Q3CJOPCW8TWcfxbBwZoE6yiZ1oJaWqpMdpVSovPKZKfHDPV330hF1rf__IqsViOU4FR8fL'  // ClientSecret
            )
        );
 
        $this->_apiContext->setConfig(
            array(
                'mode'              => 'sandbox',
                'log.LogEnabled'    => true,
                'log.FileName'      => 'PayPal.log',
                'log.LogLevel'      => 'DEBUG'
            )
        );
    }

    /**
	*
	* da de alta una tarjeta de crédito y obtiene la información válida para futuras peticiones
	*
	*/
	public function saveCard () 
	{
	    $creditCard = new CreditCard();
	    $creditCard->setType("visa")
	    ->setNumber("4569137580949530")
	    ->setExpireMonth("11")
	    ->setExpireYear("2019")
	    ->setCvv2("123")
	    ->setFirstName("John")
	    ->setLastName("Doe");
	 
	    try {
	        $creditCard->create($this->_apiContext);
	        return $creditCard;
	    }
	    catch (PayPalConnectionException $ex) {
	        echo $ex->getData();
	        exit;
	    }
	}

	/**
	*
	* busca una tarjeta de crédito a través de su id 
	*
	*/
	public function find_card($cardId) 
	{
	    try {
	        $card = CreditCard::get($cardId, $this->_apiContext);
	        return $card;
	    } catch (PayPalConnectionException $ex) {
	        echo $ex->getData();
	        exit;
	    }
	}

	//.............................................
	/**
	*
	* realiza un pago con visa sin necesidad de pasar por paypal con una tarjeta existente
	*
	*/
	public function savePaymentWithExistingVisa($cardId)
	{
	    $creditCardToken = new CreditCardToken();
	    $creditCardToken->setCreditCardId($cardId);
	 
	    $fi = new FundingInstrument();
	    $fi->setCreditCardToken($creditCardToken);
	 
	    $payer = new Payer();
	    $payer->setPaymentMethod("credit_card")
	        ->setFundingInstruments(array($fi));
	 
	    $item1 = new Item();
	    $item1->setName('Curso de Angular 2')
	        ->setCurrency('EUR')
	        ->setQuantity(1)
	        ->setSku("1") // Similar to `item_number` in Classic API
	        ->setPrice(1);

	    $itemList = new ItemList();
	    $itemList->setItems(array($item1));
	 
	    $details = new Details();
	    $details->setShipping(0)->setTax(0.05)->setSubtotal(1);
	 
	    $amount = new Amount();
	    $amount->setCurrency("EUR")
	        ->setTotal(1.05)
	        ->setDetails($details);
	 
	    $transaction = new Transaction();
	    $transaction->setAmount($amount)
	        ->setItemList($itemList)
	        ->setDescription("Cursos sobre desarrolloweb")
	        ->setInvoiceNumber(uniqid());
	 
	    $payment = new Payment();
	    $payment->setIntent("sale")
	        ->setPayer($payer)
	        ->setTransactions(array($transaction));
	 
	    try {
	        $payment->create($this->_apiContext);
	        return $payment;
	    } catch (PayPalConnectionException $ex) {
	        echo $ex->getData();
	        exit;
	    }
	}


/**
*
* genera un pedido sin procesar que devuelve una url para hacer el redirect
*
*/
public function savePaymentWithPaypal($price) 
{
    $payer = new Payer();
    $payer->setPaymentMethod("paypal");
 
    $item1 = new Item();
    $item1->setName('Coexperiences')
        ->setCurrency('USD')
        ->setQuantity(1)
        ->setSku("1")
        ->setPrice($price);
 
    $itemList = new ItemList();
    $itemList->setItems(array($item1));
    $details = new Details();
    $details->setShipping(0)->setTax(0)->setSubtotal($price);
 
    $amount = new Amount();
    $amount->setCurrency("USD")->setTotal($price)->setDetails($details);
 
    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("Compra en cursosdesarrolloweb")
        ->setInvoiceNumber(uniqid());
 
 
    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl(url()."/reservation/executepaypal")
        ->setCancelUrl(url() . "paypal_payment_response/error");
 
    $payment = new Payment();
    $payment->setIntent("authorize")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));
 
    try {
        $payment->create($this->_apiContext);
        return $payment->getApprovalLink();
    } catch (PayPalConnectionException $ex) {
        echo $ex->getData();
        exit;
    }
}

public function getPaymentWithPayPal()
{
	//$authorizationId = "7G389687WU1457508";
	try {
		$authorization = Authorization::get($authorizationId, $this->_apiContext);

	    $amt = new Amount();
	    $amt->setCurrency("USD")
	        ->setTotal(1.30);

	    ### Capture
	    $capture = new Capture();
	    $capture->setAmount($amt);

	    $getCapture = $authorization->capture($capture, $this->_apiContext);
	} catch (Exception $ex) { 
		ResultPrinter::printError("Capture Payment", "Authorization", null, $capture, $ex);
    	exit(1);
	}
	return $getCapture;    
}

public function refundPaymentWithPayPal()
{
	//$captureId = "98159733X27599831";

	$refund = new Refund();
	$refund->setId($captureId);

	try {
		$refundResponse = Refund::get($captureId, $this->_apiContext);

	} catch (Exception $ex) {
        ResultPrinter::printError("Get Payment", "Payment", null, null, $ex);
        exit(1);
    }
    return $refundResponse;

}

public function voidPaymentWithPayPal()
{
	//$authorizationId = "51A461164S445760W";
	try {
		 $authorization = Authorization::get($authorizationId, $this->_apiContext);
		 $voidedAuth = $authorization->void($this->_apiContext);
	} catch (Exception $ex) { 
		ResultPrinter::printError("Void Authorization", "Authorization", null, null, $ex);
    	exit(1);
	}
	return $voidedAuth;
}

public function execute_payment($paymentId, $payerId)
{
    $payment = Payment::get($paymentId, $this->_apiContext);
 
    $execution = new PaymentExecution();
    $execution->setPayerId($payerId);
 
    try {
        $payment->execute($execution, $this->_apiContext);
        return $payment;
    } catch (PayPalConnectionException $ex) {
        echo $ex->getData();
        exit;
    }
}

}
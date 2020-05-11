<?php

namespace App\Http\Controllers;

use App\Suscription;
use App\User;
use App\Plan;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ChangePlan;
use Illuminate\Support\Facades\Auth;

use DOMDocument;
use SimpleXMLElement;
use Exception;

class SuscriptionController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Suscription  $suscription
	 * @return \Illuminate\Http\Response
	 */
	public function show(Suscription $suscription)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Suscription  $suscription
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Suscription $suscription)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Suscription  $suscription
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Suscription $suscription)
	{
		if($request->id_usuario) $usuario = $request->id_usuario;
		else $usuario = $request->user_id;

		if($request->id_producto) $producto = $request->id_producto;
		else $producto = $request->plan_id;

		
		if($request->periodo) $periodo = $request->periodo;
		elseif($request->type) $periodo = $request->type;
		else $periodo = null;

		if($periodo){
			if($periodo == 'Mensual') $suscription->expiration_date = Carbon::now()->addMonth(1);
			if($periodo == 'Trimestral') $suscription->expiration_date = Carbon::now()->addMonth(3);
			if($periodo == 'Anual') $suscription->expiration_date = Carbon::now()->addYear(1);
		}
		else $suscription->expiration_date = null;
		
		$suscription->user_id = $usuario;
		$suscription->plan_id = $producto;
		$suscription->save();

		$user = User::find($usuario);
		$user->notify(new ChangePlan($suscription));
		return view('plan-cambiado',compact('suscription', 'request'));
	}

	public function updatePay($periodo, $plan_id, Suscription $suscription)
	{
		if($periodo == 'Mensual') $suscription->expiration_date = Carbon::now()->addMonth(1);
		if($periodo == 'Trimestral') $suscription->expiration_date = Carbon::now()->addMonth(3);
		if($periodo == 'Anual') $suscription->expiration_date = Carbon::now()->addYear(1);
		$suscription->plan_id = $plan_id;
		$suscription->save();
		$user = User::find(auth()->user()->id);
		$user->notify(new ChangePlan($suscription));
		return $suscription;
	}

	public function change(Request $request)
	{
		if($request->id_usuario) $usuario = $request->id_usuario;
		else $usuario = $request->user_id;

		$suscription = Suscription::find($usuario);

		return $this->update($request, $suscription);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Suscription  $suscription
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Suscription $suscription)
	{
		//
	}

/*	public function callback(Request $request)
	{
		//dd($request->all());

		$hashSecretWord = 'MjM3NzExYTYtMmRmZi00YjlmLTliZGItZWY0NDc3ZGY5ZDYz'; //2Checkout Secret Word
		$hashSid        = $request->sid; //2Checkout account number
		$hashTotal      = $request->total; //Sale total to validate against
		$hashOrder      = $request->order_number; //2Checkout Order Number
		$StringToHash   = strtoupper(md5($hashSecretWord . $hashSid . $hashOrder . $hashTotal));

		if ($StringToHash == $request->key) return $this->change($request);
		return back();
	}*/

	public function planVencido()
	{
		return view('plan-vencido');
	}

	public function datosPago(Request $request)
	{
		$usuario = User::find($request->id_usuario);
		$plan = Plan::find($request->id_producto);
		$periodo = $request->periodo;
		$paises_json = file_get_contents(base_path('resources/json/paises-codigo.json'));
		$paises = json_decode($paises_json, true);
		return view('datos-pago', compact('usuario', 'plan', 'periodo', 'paises'));
	}

	public function generarForm(Request $request)
	{
		$monto = "";
		$plan = Plan::find($request->plan_id);
		$usuario = auth()->user();
		$periodo = $request->periodo;	

		if($periodo === 'Mensual'){
			$monto =  $plan->monthly_price;
			$month_frequency = 1;
		} 
		if($periodo === 'Trimestral'){
			$monto =  $plan->quarterly_price;
			$month_frequency = 3;
		}
		if($periodo === 'Anual'){
			$monto =  $plan->annual_price;
			$month_frequency = 12;
		}

		$gatewayURL = 'https://secure.networkmerchants.com/api/v2/three-step';
		$APIKey = 'Xn6kA5Q3eKuTcZp5AA36JrYhXMb8uj54';

		// Initiate Step One: Now that we've collected the non-sensitive payment information, we can combine other order information and build the XML format.
		$xmlRequest = new DOMDocument('1.0','UTF-8');

		$xmlRequest->formatOutput = true;
		$xmlSale = $xmlRequest->createElement('sale');
		// Amount, authentication, and Redirect-URL are typically the bare minimum.
		$this->appendXmlNode($xmlRequest, $xmlSale,'api-key',$APIKey);
		$this->appendXmlNode($xmlRequest, $xmlSale,'redirect-url', url('cambio-plan-pago') );
		$this->appendXmlNode($xmlRequest, $xmlSale, 'amount', number_format($monto, 2, '.', ''));
		$this->appendXmlNode($xmlRequest, $xmlSale, 'ip-address', $_SERVER["REMOTE_ADDR"]);
		//$this->appendXmlNode($xmlRequest, $xmlSale, 'processor-id' , 'processor-a');
		$this->appendXmlNode($xmlRequest, $xmlSale, 'currency', 'USD');
		
		// Set the Billing and Shipping from what was collected on initial shopping cart form
		$xmlBillingAddress = $xmlRequest->createElement('billing');
		$this->appendXmlNode($xmlRequest, $xmlBillingAddress,'first-name', $request->billing_address_first_name);
		$this->appendXmlNode($xmlRequest, $xmlBillingAddress,'last-name', $request->billing_address_last_name);
		$this->appendXmlNode($xmlRequest, $xmlBillingAddress,'address1', $request->billing_address_address1);
		$this->appendXmlNode($xmlRequest, $xmlBillingAddress,'city', $request->billing_address_city);
		$this->appendXmlNode($xmlRequest, $xmlBillingAddress,'state', $request->billing_address_state);
		$this->appendXmlNode($xmlRequest, $xmlBillingAddress,'postal', $request->billing_address_zip);
		//billing-address-email
		$this->appendXmlNode($xmlRequest, $xmlBillingAddress,'country', $request->billing_address_country);
		$this->appendXmlNode($xmlRequest, $xmlBillingAddress,'email', $request->billing_address_email);
		$this->appendXmlNode($xmlRequest, $xmlBillingAddress,'phone', $request->billing_address_phone);
		//$this->appendXmlNode($xmlRequest, $xmlBillingAddress,'company', $request->billing-address-company);
		$this->appendXmlNode($xmlRequest, $xmlBillingAddress,'address2', $request->billing_address_address2);
		$this->appendXmlNode($xmlRequest, $xmlBillingAddress,'fax', $request->billing_address_fax);
		$xmlSale->appendChild($xmlBillingAddress);

		// Identificación del plan
		$xmlProduct = $xmlRequest->createElement('product');
		$this->appendXmlNode($xmlRequest, $xmlProduct,'product-code' , $plan->id);
		$this->appendXmlNode($xmlRequest, $xmlProduct,'description' , 'Suscripción a plan '.$plan->name.' por un periodo '.$periodo);
		$this->appendXmlNode($xmlRequest, $xmlProduct,'unit-cost' , number_format($monto, 2, '.', ''));
		$this->appendXmlNode($xmlRequest, $xmlProduct,'quantity' , 1);
		$xmlSale->appendChild($xmlProduct);

		//Suscription
		/*		
		$xmlAddSubscription = $xmlRequest->createElement('add-subscription');
		$this->appendXmlNode($xmlRequest, $xmlAddSubscription,'start-date' , now()->add(1,'day')->format('Ymd') );


		$xmlPlan = $xmlRequest->createElement('plan');
		//$this->appendXmlNode($xmlRequest, $xmlPlan,'plan-id' , $plan->id );s
		$this->appendXmlNode($xmlRequest, $xmlPlan,'payments' , 0 );
		$this->appendXmlNode($xmlRequest, $xmlPlan, 'amount', number_format($monto, 2, '.', ''));
		$this->appendXmlNode($xmlRequest, $xmlPlan,'month-frequency' , $month_frequency );
		$this->appendXmlNode($xmlRequest, $xmlPlan,'day-of-month' , today()->day );
		$xmlAddSubscription->appendChild($xmlPlan);

		$xmlSale->appendChild($xmlAddSubscription);*/

		$xmlRequest->appendChild($xmlSale);

		// Process Step One: Submit all transaction details to the Payment Gateway except the customer's sensitive payment information.
		// The Payment Gateway will return a variable form-url.
		$data = $this->sendXMLviaCurl($xmlRequest,$gatewayURL);


		// Parse Step One's XML response
		$gwResponse = @new SimpleXMLElement($data);
		if ((string)$gwResponse->result ==1 ) {
			// The form url for used in Step Two below
			$formURL = $gwResponse->{'form-url'};
		} else {
			throw New Exception(print " Error, received " . $data);
		}

		return view('datos-tarjeta', compact('formURL'));
	}

	public function cambioPlanPago(Request $request){
		$user = auth()->user()->id;
		$tokenId = $request['token-id'];

		$gatewayURL = 'https://secure.networkmerchants.com/api/v2/three-step';
		$APIKey = 'Xn6kA5Q3eKuTcZp5AA36JrYhXMb8uj54';

		if($tokenId){
			// Step Three: Once the browser has been redirected, we can obtain the token-id and complete
			// the transaction through another XML HTTPS POST including the token-id which abstracts the
			// sensitive payment information that was previously collected by the Payment Gateway.
			$xmlRequest = new DOMDocument('1.0','UTF-8');
			$xmlRequest->formatOutput = true;
			$xmlCompleteTransaction =  $xmlRequest->createElement('complete-action');
			$this->appendXmlNode($xmlRequest, $xmlCompleteTransaction,'api-key', $APIKey);
			$this->appendXmlNode($xmlRequest, $xmlCompleteTransaction,'token-id',$tokenId);
			$xmlRequest->appendChild($xmlCompleteTransaction);
			// Process Step Three
			$data = $this->sendXMLviaCurl($xmlRequest,$gatewayURL);
			$gwResponse = @new SimpleXMLElement((string)$data);

		    if ((string)$gwResponse->result == 1 ) {
		    	$resultado = 'aprobada';
		    	$transaction_id = (string)$gwResponse->{'transaction-id'};
		    	$plan_id = (string)$gwResponse->product->{'product-code'};
		    	$description = (string)$gwResponse->product->{'description'};
		    	$total = (string)$gwResponse->{'amount'};

				$mensual = strpos($description, 'Mensual');
				$trimestral = strpos($description, 'Trimestral');
				$anual = strpos($description, 'Anual');

				if ($mensual !== false) $periodo = 'Mensual';
				elseif ($trimestral !== false) $periodo = 'Trimestral';
				else $periodo = 'Anual';

				$suscription = Suscription::where('user_id', $user)->first();

				$nueva_suscripcion = $this->updatePay($periodo, $plan_id, $suscription);

				return view('cambio-plan-pago', compact('resultado','transaction_id', 'plan_id', 'description', 'total', 'nueva_suscripcion'));
		    } elseif((string)$gwResponse->result == 2)  {
		    	$resultado = 'rechazada'; 
		    	$respuesta = (string)$gwResponse->{'result-text'};
		    } else {
		    	$resultado = 'error';
		    	$respuesta = (string)$gwResponse->{'result-text'};
		    }
		    $respuestaXML = htmlentities($data);	

			return view('cambio-plan-pago', compact('resultado', 'respuesta'));
		}else{
			return back();
		}
	}


	public function sendXMLviaCurl($xmlRequest,$gatewayURL) {
		// helper function demonstrating how to send the xml with curl


		$ch = curl_init(); // Initialize curl handle
		curl_setopt($ch, CURLOPT_URL, $gatewayURL); // Set POST URL

		$headers = array();
		$headers[] = "Content-type: text/xml";
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // Add http headers to let it know we're sending XML
		$xmlString = $xmlRequest->saveXML();
		curl_setopt($ch, CURLOPT_FAILONERROR, 1); // Fail on errors
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // Allow redirects
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Return into a variable
		curl_setopt($ch, CURLOPT_PORT, 443); // Set the port number
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Times out after 30s
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlString); // Add XML directly in POST

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);


		// This should be unset in production use. With it on, it forces the ssl cert to be valid
		// before sending info.
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		if (!($data = curl_exec($ch))) {
			return back();
/*		print  "curl error =>" .curl_error($ch) ."\n";
		throw New Exception(" CURL ERROR :" . curl_error($ch));*/

		}
		curl_close($ch);

		return $data;
	}

	// Helper function to make building xml dom easier
	public function appendXmlNode($domDocument, $parentNode, $name, $value) {
		$childNode      = $domDocument->createElement($name);
		$childNodeValue = $domDocument->createTextNode($value);
		$childNode->appendChild($childNodeValue);
		$parentNode->appendChild($childNode);
	}



}

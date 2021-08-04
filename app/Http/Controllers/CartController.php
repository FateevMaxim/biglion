<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrderUsers;
use App\Models\Products;
use App\Models\ProductsCategories;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use function PHPUnit\Framework\returnSelf;

class CartController extends Controller
{
    public function index()
    {
        $categories = ProductsCategories::all();
        return view('cart', compact('categories'));
    }

    public function checkout()
    {
        $cart = Cart::content();
        $cartTotal = Cart::priceTotal();
        $categories = ProductsCategories::all();
        return view('checkout', compact('categories', 'cart', 'cartTotal'));
    }

    public function failure(){
        $cart = Cart::content();
        $cartTotal = Cart::priceTotal();
        $categories = ProductsCategories::all();
        return view('checkout', compact('categories', 'cart', 'cartTotal'));
    }
    public function payment(Request $request)
    {

        $usersData = $request;
        $cart = Cart::content();
        //dd($request->paymentMethod[0]);

        if ($request->paymentMethod[0] == '1'){
            /**Оплата картой**/
            $pg_merchant_id = "540603";
            $secret_key = "GdLpRspksTz5BCIK";
            $cartTotal = Cart::priceTotal(0, '', '');
            $randomId = Str::random(8);
            $resultUrl = "http://biglion/result";
            //$resultUrl = "https://big-lion.kz/result";
            $id = time().'-'.sprintf('%.3f',microtime());
            $t = preg_replace('/(.*)-(.*)/','\1',$id);
            $request = $requestForSignature = [
                'pg_order_id' =>  $t,
                'pg_merchant_id' => $pg_merchant_id,
                //'pg_amount' => $cartTotal,
                'pg_amount' => '100',
                'pg_description' => 'Оплата товара с интернет-магазина BigLion',
                'pg_salt' => $randomId,
                'pg_currency' => 'KZT',
                'pg_check_url' => $resultUrl,
                'pg_result_url' => $resultUrl,
                'pg_request_method' => 'GET',
                'pg_success_url' => $resultUrl,
                'pg_failure_url' => $resultUrl,
                'pg_success_url_method' => 'GET',
                'pg_failure_url_method' => 'GET',
                'pg_state_url' => $resultUrl,
                'pg_state_url_method' => 'GET',
                'pg_site_url' => $resultUrl,
                'pg_lifetime' => '86400',
                'pg_user_phone' => $request->phone,
                'pg_postpone_payment' => '0',
                'pg_language' => 'ru',
                'pg_testing_mode' => '1',
            ];

            /**
             * Функция превращает многомерный массив в плоский
             */
            function makeFlatParamsArray($arrParams, $parent_name = '')
            {
                $arrFlatParams = [];
                $i = 0;
                foreach ($arrParams as $key => $val) {
                    $i++;
                    /**
                     * Имя делаем вида tag001subtag001
                     * Чтобы можно было потом нормально отсортировать и вложенные узлы не запутались при сортировке
                     */
                    $name = $parent_name . $key . sprintf('%03d', $i);
                    if (is_array($val)) {
                        $arrFlatParams = array_merge($arrFlatParams, makeFlatParamsArray($val, $name));
                        continue;
                    }
                    $arrFlatParams += array($name => (string)$val);
                }

                return $arrFlatParams;
            }

            // Превращаем объект запроса в плоский массив
            $requestForSignature = makeFlatParamsArray($requestForSignature);

            // Генерация подписи
            ksort($requestForSignature); // Сортировка по ключю
            array_unshift($requestForSignature, 'init_payment.php'); // Добавление в начало имени скрипта
            array_push($requestForSignature, $secret_key); // Добавление в конец секретного ключа

            $request['pg_sig'] = md5(implode(';', $requestForSignature));

            $ch = curl_init('https://api.paybox.money/init_payment.php');

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $html = curl_exec($ch);
            curl_close($ch);

            $responceUrl = simplexml_load_string($html);

            $orderUser['order_sig'] = $request['pg_sig'];
            $orderUser['city'] = $usersData->city;
            $orderUser['name'] = $usersData->name;
            $orderUser['phone'] = $usersData->phone;
            $orderUser['street'] = $usersData->street;
            $orderUser['apartment'] = $usersData->apartment;
            $orderUser['notes'] = $usersData->notes;

            $saveOrderUser = new OrderUsers($orderUser);
            $saveOrderUser->save();

            foreach ($cart as $cartProduct){
                $orderData['slug'] = $cartProduct->name;
                $orderData['quantity'] = $cartProduct->qty;
                $orderData['price'] = $cartProduct->price;
                $orderData['paymentStatus'] = "0";
                $orderData['payment_method'] = "Paybox";
                $orderData['order_sig'] = $request['pg_sig'];
                $orderData['order_id'] =  $t;
                $saveOrderData = new Orders($orderData);
                $saveOrderData->save();
            }
            Cart::destroy();
            return Redirect::to((string)$responceUrl->pg_redirect_url);
        }else{
            /**Оплата наличными курьеру**/

            $order_sig = Str::random(8);
            $id = time().'-'.sprintf('%.3f',microtime());
            $t = preg_replace('/(.*)-(.*)/','\1',$id);
            $orderUser['order_sig'] = $order_sig;
            $orderUser['city'] = $usersData->city;
            $orderUser['name'] = $usersData->name;
            $orderUser['phone'] = $usersData->phone;
            $orderUser['street'] = $usersData->street;
            $orderUser['apartment'] = $usersData->apartment;
            $orderUser['notes'] = $usersData->notes;

            $saveOrderUser = new OrderUsers($orderUser);
            $saveOrderUser->save();

            foreach ($cart as $cartProduct){
                $orderData['slug'] = $cartProduct->name;
                $orderData['quantity'] = $cartProduct->qty;
                $orderData['price'] = $cartProduct->price;
                $orderData['paymentStatus'] = "0";
                $orderData['payment_method'] = "Курьеру";
                $orderData['order_sig'] = $order_sig;
                $orderData['order_id'] = $t;

                $saveOrderData = new Orders($orderData);
                $saveOrderData->save();
            }
            Cart::destroy();
            return redirect()->route('cart')->with('message', 'Успешное оформление заказа!');
        }

    }
    public function result(){
        $categories = ProductsCategories::all();

        $curlArray = array(
            'pg_merchant_id' => '540603',
            'pg_payment_id' => $_GET['pg_payment_id'],
            'pg_salt' => $_GET['pg_salt'],
            'pg_sig' => $_GET['pg_sig']
        );
        $ch = curl_init('https://api.paybox.money/get_status.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlArray);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $html = curl_exec($ch);
        curl_close($ch);
        $responceUrl = simplexml_load_string($html);

        return view('cart', compact('categories', 'responceUrl'));
    }
}

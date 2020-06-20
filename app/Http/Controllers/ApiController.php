<?php

namespace App\Http\Controllers;

use GuzzleHttp;

class ApiController extends Controller
{
    protected $url = 'http://monitoring.e-kassa.gov.az/pks-portal/1.0.0/documents/';
    const KEYWORD = 'grante';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        return view('index');
    }

    public function check($id)
    {
        if (!(strlen($id) == 12 || strlen($id) == 42 || strlen($id) == 46)) return response()->json(['error' => 'Length must be 12, 42 or 46'], 400);

        $apiUrl = $this->url . $id;
        $client = new GuzzleHttp\Client(['verify' => false]);

        try {
            $res = $client->request('GET', $apiUrl);
            $json = json_decode((string)$res->getBody(), TRUE);

            $response = [];
            $response['message'] = '';
            $response['items'] = [];

            foreach ($json['cheque']['content']['items'] as $item) {
                if (stripos($item['itemName'], self::KEYWORD) !== false)
                    array_push($response['items'], $item);
            }

            $response['message'] = 'Товаров найдено: ' . count($response['items']);

            return json_encode($response);
        } catch (GuzzleHttp\Exception\ClientException $e) {
            switch ($e->getResponse()->getStatusCode()):
                case 404:
                    return response()->json(['message' => 'Кассовый чек не найден. Попробуйте через 90 минут.'], 200);
                default:
                    return response()->json(['message' => 'Неизвестная ошибка']);
            endswitch;
        }
    }
}

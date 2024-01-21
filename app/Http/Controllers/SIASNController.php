<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TokenSiasn;

class SIASNController extends Controller
{
    public function dataUtama($nip){
        $tokenSiasn = TokenSiasn::first();
        $authHeader = 'bearer '.$tokenSiasn['bkn_sso'];
        $authorizationHeader = 'Bearer '.$tokenSiasn['api_ws'];

        $nip = trim($nip);
        $authHeader = trim($authHeader);
        $authorizationHeader = trim($authorizationHeader);

        if (!preg_match('/^\d{18}$/', $nip)) {
            // Handle invalid NIP format, e.g., return an error response or redirect to an error page
            return;
        }

        // Set the API URL with the dynamic NIP parameter
        $api_url = 'https://apimws.bkn.go.id:8243/apisiasn/1.0/pns/data-utama/' . $nip;

        // Set headers for the request
        $headers = array(
            'accept: application/json',
            'Auth: ' . $authHeader,
            'Authorization: ' . $authorizationHeader,
            // Add any other headers if necessary
        );

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $headers,
        ));

        // Execute the cURL request
        $response = curl_exec($curl);

        // Close cURL session
        curl_close($curl);

        if (!$response) {
            // Handle API request failure, e.g., return an error response or redirect to an error page
            return;
        }

        // Parse the JSON response
        $data = json_decode($response);
        return $data->data;
    }

    function foto_pegawai($nip){
        $pegawai = $this->dataUtama($nip);
        $pegawai_id = $pegawai->id;

        $tokenSiasn = TokenSiasn::first();
        $authHeader = 'bearer '.$tokenSiasn['bkn_sso'];
        $authorizationHeader = 'Bearer '.$tokenSiasn['api_ws'];
        $nip = trim($nip);
        $authHeader = trim($authHeader);
        $authorizationHeader = trim($authorizationHeader);
        if (!preg_match('/^\d{18}$/', $nip)) {
            // Handle invalid NIP format, e.g., return an error response or redirect to an error page
            echo "error";
            return;
        }

        // Set the API URL with the dynamic NIP parameter
        $api_url = 'https://apimws.bkn.go.id:8243/apisiasn/1.0/pns/photo/' . $pegawai_id;

        // Set headers for the request
        $headers = array(
            'accept: application/json',
            'Auth: ' . $authHeader,
            'Authorization: ' . $authorizationHeader,
            // Add any other headers if necessary
        );

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $headers,
        ));

        // Execute the cURL request
        $response = curl_exec($curl);
        return $response;
        // $foto_pegawai = "<img src='data:image/jpeg;base64,".base64_encode($response)."' />";
        // return $foto_pegawai;
    }

    function get_api_ws(){
        // $this->output->unset_template();
        $url = 'https://apimws.bkn.go.id/oauth2/token';
        $username = '3WiZKeK6X1q9SgdvD6rcmIML19Ma';
        $password = '9PNb0K__4nrmdgqYLMdzGoIg6lMa';

        // Create Basic Authentication header
        $authHeader = base64_encode($username . ':' . $password);

        // Set the POST data for the request
        $data = array(
            'grant_type' => 'client_credentials'
        );

        // Build URL-encoded query string for the POST data
        $queryString = http_build_query($data);

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $queryString,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic ' . $authHeader,
                'Content-Type: application/x-www-form-urlencoded'
            )
        ));

        // Execute the cURL request
        $response = curl_exec($curl);

        // Close cURL session
        curl_close($curl);

        // Handle the response
        if ($response) {
            $json = json_decode($response);
            if(!empty($json->access_token)){
                // simpan access_token
                // echo $json->access_token;
                $select = TokenSiasn::first();
                $select->update([
                    'api_ws' => $json->access_token
                ]);
                $return['status'] = true;
                $return['message'] = "API WS Token Berhasil di Update";
            }
            else {
                $return['status'] = false;
                $return['message'] = $json->error;
            }
            return $return;
        } else {
            // Handle API request failure
            $return['status'] = false;
            $return['message'] = "Error: " . curl_error($curl);
        }
    }

    function get_bkn_sso(){
        $curl = curl_init();
        curl_setopt_array(
            $curl, array(
            CURLOPT_URL => 'https://sso-siasn.bkn.go.id/auth/realms/public-siasn/protocol/openid-connect/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'client_id=mempawahws&grant_type=password&username=199603142020121003&password=Hahaha96',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Cookie: SERVERID=keycloak-01|ZMs/L|ZMs/L'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $json = json_decode($response);
        if(!empty($json->access_token)){
            // simpan access_token
            $select = TokenSiasn::first();
            $select->update([
                'bkn_sso' => $json->access_token
            ]);
            $return['status'] = true;
            $return['message'] = "SSO Token Berhasil di Update";
        }
        else {
            $return['status'] = false;
            $return['message'] = $json->error;
        }
        return $return;
    }
}

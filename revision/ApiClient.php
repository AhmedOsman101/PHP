<?php

class ApiClient {
    private $apiUrl;
    private $db;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
        $this->db = new Database("localhost", "root", "crud", "");
    }

    public function sendRequest($method, $endpoint, $data = array()) {
        $url = $this->apiUrl . $endpoint;
        $ch = curl_init();
        switch ($method) {
            case 'GET':
                $response = $this->db->View($endpoint);
                break;
                // Other cases...
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_close($ch);
        return $response;
    }
}

// $apiClient = new ApiClient(
//     "http://localhost/php/revision/"
// );

// GET request
// $response = $apiClient->sendRequest('GET', 'users');
// echo $response;

// // POST request
// $data = array('name' => 'John', 'email' => 'john@example.com');
// $response = $apiClient->sendRequest('POST', 'users', $data);
// echo $response;

// // PUT request
// $data = array('name' => 'John Doe');
// $response = $apiClient->sendRequest('PUT', 'users/1', $data);
// echo $response;

// // DELETE request
// $response = $apiClient->sendRequest('DELETE', 'users/1');
// echo $response;
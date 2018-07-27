<?php
return [
    'express'=>[
        
        'client_id'=>'AZczC1AYlUuYuZTwbnVjd1FE0qc_yEcM-KqNsLLCJEA334Gimm27bwq7-WkpGjHy6CEp6kvfknGoeH6q',
        'secret'=>'EDTX4LK-oEEfm3Lh-lbNPX_u34awHNn9gPVhWiPEq4XuZLoB7lBvFXTbwpaR2s2bCLlfjzE7QvnAeaLF',
        
        'success'=>'Payments\PaypalController@success',
        'cancel'=>'Payments\PaypalController@cancel',
        
        'config'=>
        [
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ]
    ]
];
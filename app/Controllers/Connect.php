<?php
// JOIN MORE UPDATES @ONLINE_KURO_PANEL //
namespace App\Controllers;

use App\Models\KeysModel;

class Connect extends BaseController
{
    protected $model, $game, $uKey, $sDev;

    public function __construct()
    {
        $this->model = new KeysModel();
        
        $db = \Config\Database::connect();
        $userDetails1 = $db->table('onoff')->where('id', 1)->get()->getRowArray();

        if($userDetails1 && $userDetails1['status'] == 'on')
        {
            $this->maintenance = true;
        } else {
            $this->maintenance = false;
        }
       $this->staticWords = "Vm8Lk7Uj2JmsjCPVPVjrLa7zgfx3uz9E";
    }

    public function index()
    {
        if ($this->request->getPost()) {
            return $this->index_post();
        } else {
            $nata = [
                "web_info" => [
                    "_client" => BASE_NAME,
                    "license" => "Qp5KSGTquetnUkjX6UVBAURH8hTkZuLM",
                    "version" => "1.0.0",
                ],
                "web__dev" => [
                    "author" => "@",
                    "telegram" => "https://t.me/"
                           ],
            ];
            
            return "<h1><strong><center><font size='10' color='red' face='arial'><marquee direction='right' scrollamount='15'>WANT OWN KURO PANEL?<br> @ONLINE_KURO_PANEL </marquee></font></center></strong></h1>";
            $this->response->setJSON($nata);
        }
    }

    public function index_post()
    {
        $isMT = $this->maintenance;
        $game = $this->request->getPost('game');
        $uKey = $this->request->getPost('user_key');
        $sDev = $this->request->getPost('serial');

        $form_rules = [
            'game' => 'required|alpha_dash',
            'user_key' => 'required|min_length[1]|max_length[36]',
            'serial' => 'required|alpha_dash'
        ];

        if (!$this->validate($form_rules)) {
            $data = [
                'status' => false,
                'reason' => "Bad Parameter",
            ];
            return $this->response->setJSON($data);
        }

        if ($isMT) {
            $db = \Config\Database::connect();
            $userDetails1 = $db->table('onoff')->where('id', 1)->get()->getRowArray();
            
            $data = [
                'status' => true,
                'reason' => $userDetails1['myinput'] ?? ''
            ];
        } else {
            if (!$game or !$uKey or !$sDev) {
                $data = [
                    'status' => false,
                    'reason' => 'INVALID PARAMETER'
                ];
            } else {
                $time = new \CodeIgniter\I18n\Time;
                $model = $this->model;
                $findKey = $model
                    ->getKeysGame(['user_key' => $uKey, 'game' => $game]);

                if ($findKey) {
                    if ($findKey->status != 1) {
                        $data = [
                            'status' => false,
                            'reason' => 'USER BLOCKED'
                        ];
                    } else {
                        $id_keys = $findKey->id_keys;
                        $duration = $findKey->duration;
                        $expired = $findKey->expired_date;
                        $max_dev = $findKey->max_devices;
                        $devices = $findKey->devices;
    
                        function checkDevicesAdd($serial, $devices, $max_dev)
                        {
                            $lsDevice = explode(",", $devices);
                            $cDevices = isset($devices) ? count($lsDevice) : 0;
                            $serialOn = in_array($serial, $lsDevice);
    
                            if ($serialOn) {
                                return true;
                            } else {
                                if ($cDevices < $max_dev) {
                                    array_push($lsDevice, $serial);
                                    $setDevice = reduce_multiples(implode(",", $lsDevice), ",", true);
                                    return ['devices' => $setDevice];
                                } else {
                                    // ! false - devices max
                                    return false;
                                }
                            }
                        }
    
                        if (!$expired) {
                            $setExpired = $time::now()->addHours($duration);
                            $model->update($id_keys, ['expired_date' => $setExpired]);
                            $data['status'] = true;
                        } else {
                            if ($time::now()->isBefore($expired)) {
                                $data['status'] = true;
                            } else {
                                $data = [
                                    'status' => false,
                                    'reason' => 'EXPIRED KEY'
                                ];
                            }
                        }
    
                        if ($data['status']) {
                            $db = \Config\Database::connect();
                            $userDetails2 = $db->table('modname')->where('id', 1)->get()->getRowArray();
                            $userDetails3 = $db->table('_ftext')->where('id', 1)->get()->getRowArray();
                            $userDetails4 = $db->table('keys_code')->select('expired_date')->where('user_key', $uKey)->get()->getRowArray();
                            $ModFeatureStatus = $db->table('Feature')->where('id', 1)->get()->getRowArray();

                            $rngcnt = $time->getTimestamp();
                            $devicesAdd = checkDevicesAdd($sDev, $devices, $max_dev);
                            if ($devicesAdd) {
                                if (is_array($devicesAdd)) {
                                    $model->update($id_keys, $devicesAdd);
                                }
                                $real = "$game-$uKey-$sDev-$this->staticWords";
                                
                                $expiry = $findKey->expired_date;
                                if ($expiry == null) {
                                     $expiry = $time::now()->addHours($duration);
                                }
                            
                                $data = [
                                    'status' => true,
                                    'data' => [
                                        'real' => $real,
                                        'token' => md5($real),
                                        'modname' => $userDetails2['modname'] ?? '',
                                        'mod_status' => $userDetails3['_status'] ?? '',
                                        'credit' => $userDetails3['_ftext'] ?? '',
                                        'ESP' => $ModFeatureStatus['ESP'] ?? 'off',
                                        'Item' => $ModFeatureStatus['Item'] ?? 'off',
                                        'AIM' => $ModFeatureStatus['AIM'] ?? 'off',
                                        'SilentAim' => $ModFeatureStatus['SilentAim'] ?? 'off',
                                        'BulletTrack' => $ModFeatureStatus['BulletTrack'] ?? 'off',
                                        'Floating' => $ModFeatureStatus['Floating'] ?? 'off',
                                        'Memory' => $ModFeatureStatus['Memory'] ?? 'off',
                                        'Setting' => $ModFeatureStatus['Setting'] ?? 'off',
                                        'expired_date' => $userDetails4['expired_date'] ?? null,
                                        'EXP' => $expiry,
                                        'exdate' => $expiry,
                                        'device'=> $max_dev,
                                        'rng' => $rngcnt
                                    ],
                                ];
                            } else {
                                $data = [
                                    'status' => false,
                                    'reason' => 'MAX DEVICE REACHED'
                                ];
                            }
                        }
                    }
                } else {
                    $data = [
                        'status' => false,
                        'reason' => 'USER OR GAME NOT REGISTERED'
                    ];
                }
            }
        }
        return $this->response->setJSON($data);
    }
}

// JOIN MORE UPDATES @ONLINE_KURO_PANEL
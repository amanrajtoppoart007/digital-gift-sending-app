<?php

return [
    'userManagement'        => [
        'title'          => 'प्रयोक्ता प्रबंधन',
        'title_singular' => 'प्रयोक्ता प्रबंधन',
    ],
    'permission'            => [
        'title'          => 'अनुमतियां',
        'title_singular' => 'अनुमति',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'शीर्षक',
            'title_helper'      => ' ',
            'created_at'        => 'पर बनाया गया',
            'created_at_helper' => ' ',
            'updated_at'        => 'पर अपडेट किया गया',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'पर हटा दिया गया',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'                  => [
        'title'          => 'भूमिकाएँ',
        'title_singular' => 'भूमिका',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'शीर्षक',
            'title_helper'       => ' ',
            'permissions'        => 'अनुमतियां',
            'permissions_helper' => ' ',
            'created_at'         => 'पर बनाया गया',
            'created_at_helper'  => ' ',
            'updated_at'         => 'पर अपडेट किया गया',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'पर हटा दिया गया',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'                  => [
        'title'          => 'उपयोगकर्ताये',
        'title_singular' => 'उपयोगकर्ता',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'नाम',
            'name_helper'               => ' ',
            'email'                     => 'ईमेल',
            'email_helper'              => ' ',
            'email_verified_at'         => 'ईमेल सत्यापित हुआ',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'पासवर्ड',
            'password_helper'           => ' ',
            'roles'                     => 'भूमिकाएँ',
            'roles_helper'              => ' ',
            'remember_token'            => 'टोकन याद रखें',
            'remember_token_helper'     => ' ',
            'created_at'                => 'पर बनाया गया',
            'created_at_helper'         => ' ',
            'updated_at'                => 'पर अपडेट किया गया',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'पर हटा दिया गया',
            'deleted_at_helper'         => ' ',
            'approved'                  => 'अनुमोदित',
            'approved_helper'           => ' ',
            'verified'                  => 'सत्यापित',
            'verified_helper'           => ' ',
            'verified_at'               => 'पर सत्यापित किया गया',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'सत्यापन टोकन',
            'verification_token_helper' => ' ',
            'mobile'                    => 'मोबाइल',
            'mobile_helper'             => ' ',
            'secondary_mobile'          => 'माध्यमिक मोबाइल',
            'secondary_mobile_helper'   => ' ',
            'mobile_verified_at'        => 'पर मोबाइल सत्यापित किया गया',
            'mobile_verified_at_helper' => ' ',
            'referral_code'             => 'रेफरल कोड',
            'referral_code_helper'      => ' ',
        ],
    ],

    'userAlert'             => [
        'title'          => 'उपयोगकर्ता अलर्ट',
        'title_singular' => 'उपयोगकर्ता अलर्ट',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'अलर्ट टेक्स्ट',
            'alert_text_helper' => ' ',
            'alert_link'        => 'अलर्ट लिंक',
            'alert_link_helper' => ' ',
            'user'              => 'उपयोगकर्तायें',
            'user_helper'       => ' ',
            'created_at'        => 'पर बनाया गया',
            'created_at_helper' => ' ',
            'updated_at'        => 'पर अपडेट किया गया',
            'updated_at_helper' => ' ',
        ],
    ],

    'auditLog'              => [
        'title'          => 'ऑडिट लॉग',
        'title_singular' => 'ऑडिट लॉग',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'विवरण',
            'description_helper'  => ' ',
            'subject_id'          => 'विषय आईडी',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'विषय प्रकार',
            'subject_type_helper' => ' ',
            'user_id'             => 'यूज़र आईडी',
            'user_id_helper'      => ' ',
            'properties'          => 'प्रोपेरटीएस',
            'properties_helper'   => ' ',
            'host'                => 'होस्ट',
            'host_helper'         => ' ',
            'created_at'          => 'पर बनाया गया',
            'created_at_helper'   => ' ',
            'updated_at'          => 'पर अपडेट किया गया',
            'updated_at_helper'   => ' ',
        ],
    ],
    'orderManagement'       => [
        'title'          => 'ऑर्डर प्रबंधन',
        'title_singular' => 'ऑर्डर प्रबंधन',
    ],

    'transactionManagement' => [
        'title'          => 'आदान - प्रदान प्रबंधन',
        'title_singular' => 'आदान - प्रदान प्रबंधन',
    ],
    'transaction'           => [
        'title'          => 'लेनदेन',
        'title_singular' => 'लेन-देन',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'order'                     => 'ऑर्डर संख्या',
            'order_helper'              => ' ',
            'user'                      => 'उपयोगकर्ता',
            'user_helper'               => ' ',
            'status'                    => 'स्थिति',
            'status_helper'             => ' ',
            'created_at'                => 'पर बनाया गया',
            'created_at_helper'         => ' ',
            'updated_at'                => 'पर अपडेट किया गया',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'पर हटा दिया गया',
            'deleted_at_helper'         => ' ',
            'amount'                    => 'राशि',
            'amount_helper'             => ' ',
            'transaction_number'        => 'लेन - देन संख्या',
            'transaction_number_helper' => ' ',
        ],
    ],

    'setting'               => [
        'title'          => 'सेटिंग्स',
        'title_singular' => 'सेटिंग',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'setting_key'          => 'सेटिंग की',
            'setting_key_helper'   => ' ',
            'setting_value'        => 'सेटिंग वैल्यू',
            'setting_value_helper' => ' ',
            'created_at'           => 'पर बनाया गया',
            'created_at_helper'    => ' ',
            'updated_at'           => 'पर अपडेट किया गया',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'पर हटा दिया गया',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'adminManagement'       => [
        'title'          => 'व्यवस्थापक प्रबंधन',
        'title_singular' => 'व्यवस्थापक प्रबंधन',
    ],
    'admin'                 => [
        'title'          => 'व्यवस्थापक',
        'title_singular' => 'व्यवस्थापक',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'नाम',
            'name_helper'               => ' ',
            'email'                     => 'ईमेल',
            'email_helper'              => ' ',
            'password'                  => 'पासवर्ड',
            'password_helper'           => ' ',
            'role'                      => 'भूमिका',
            'role_helper'               => ' ',
            'email_verified_at'         => 'पर ईमेल सत्यापित किया गया',
            'email_verified_at_helper'  => ' ',
            'approved'                  => 'स्वीकृत',
            'approved_helper'           => ' ',
            'verified'                  => 'सत्यापित',
            'verified_helper'           => ' ',
            'verified_at'               => 'पर सत्यापित किया गया',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'सत्यापन टोकन',
            'verification_token_helper' => ' ',
            'remember_token'            => 'टोकन याद रखें',
            'remember_token_helper'     => ' ',
            'created_at'                => 'पर बनाया गया',
            'created_at_helper'         => ' ',
            'updated_at'                => 'पर अपडेट किया गया',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'पर हटा दिया गया',
            'deleted_at_helper'         => ' ',
        ],
    ],

    'uploadDocuments' => [
        'title' => 'दस्तावेज़ अपलोड करें',
        'title_singular' => 'दस्तावेज़ अपलोड करें',
    ],
    'userProfile'           => [
        'title'          => 'उपयोगकर्ता प्रोफाइल',
        'title_singular' => 'उपयोगकर्ता प्रोफाइल',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'नाम',
            'name_helper'              => 'कृपया नाम दर्ज करें',
            'email'                    => 'ईमेल',
            'email_helper'             => 'कृपया ईमेल दर्ज करें',
            'mobile'          => 'प्राथमिक मोबाइल नंबर',
            'mobile_helper'   => 'कृपया प्राथमिक मोबाइल नंबर दर्ज करें',
            'secondary_mobile'        => 'वैकल्पिक मोबाइल नंबर',
            'secondary_mobile_helper' => 'कृपया वैकल्पिक संपर्क नंबर दर्ज करें',
            'farming_land_area'        => 'खेती की जमीन',
            'farming_land_area_helper' => 'कृपया खेती की जमीन दर्ज करें',
            'agricultural_land'        => 'खेती की जमीन',
            'agricultural_land_helper'  => 'कृपया फार्मिंग लैंड एरिया दर्ज करें',
            'created_at'               => 'पर बनाया गया',
            'created_at_helper'        => ' ',
            'updated_at'               => 'पर अपडेट किया गया',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'पर हटा दिया गया',
            'deleted_at_helper'        => ' ',
            'image'                    => 'प्रोफ़ाइल फोटो',
            'image_helper'             => ' ',
            'user'                     => 'उपयोगकर्ता',
            'user_helper'              => ' ',
            'crops'                     => 'किसान किस फसल को उगाते हैं',
            'crops_helper'              => ' ',
        ],
    ],
    
];

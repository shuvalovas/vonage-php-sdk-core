<?php

/**
 * Vonage Client Library for PHP
 *
 * @copyright Copyright (c) 2024 SR Apps, Inc. (https://reachtheapp.com)
 * @copyright Copyright (c) 2024 Andrei Shuvalov
 * @license https://github.com/Vonage/vonage-php-sdk-core/blob/master/LICENSE.txt Apache License 2.0
 */

declare(strict_types=1);

namespace Vonage\DLC;

use DateTimeImmutable;
use Vonage\Entity\Hydrator\ArrayHydrateInterface;

class Campaign implements ArrayHydrateInterface
{
    /*
"campaigns": [
         {
            "primary_account_id": "abcd1234",
            "account_id": "abcd1234",
            "brand_id": "BLQKOPK",
            "campaign_id": "VC987XYZ",
            "tcr_campaign_id": "C123ABC",
            "reseller_id": "R123456",
            "label": "This is a sample campaign",
            "status": "ACTIVE",
            "traffic_enabled": true,
            "usecase": "ACCOUNT_NOTIFICATION",
            "sub_usecases": [
               "2FA",
               "SECURITY_ALERT"
            ],
            "description": "User notifications",
            "message_flow": "Brand: My brand \\\nConsent mechanisms: \\\n- TEXT_TO_JOIN: Opt-in Keywords: START,JOIN. A text will be sent to the customer. He can reply yes to consent and opt in. \\\n- ONLINE_FORM: This is an online form \\\n  Link: https://mybrand.com/optin \\\nMessage & data rates may apply. - Message frequency varies \\\nCarriers are not liable for delayed or undelivered messages. \\\nText HELP for help. Text STOP to opt-out. \\\nTerms & Conditions: https://mybrand.com/terms_and_conditions \\\nPrivacy Policy: https://mybrand.com/privacy_policy\n",
            "message_flow_details": {
               "brand_name": "My brand",
               "consent_mechanisms": [
                  {
                     "method": "TEXT_TO_JOIN",
                     "details": "A text will be sent to the customer. He can reply yes to consent and opt in."
                  },
                  {
                     "method": "ONLINE_FORM",
                     "details": "An online form allows the customer to subscribe.",
                     "attachment": "https://mybrand.com/optin"
                  }
               ],
               "pricing_disclosure": true,
               "frequency": "RECURRING",
               "privacy_policy": "https://mybrand.com/privacy_policy",
               "terms_and_conditions": "https://mybrand.com/terms_and_conditions"
            },
            "opt_out_assist": false,
            "subscriber_opt_in": false,
            "opt_in_keywords": "START,SUBSCRIBE",
            "opt_in_message": "<Brand Name>: You are now opted-in. For help, reply HELP. To opt-out, reply STOP\n",
            "subscriber_opt_out": false,
            "opt_out_keywords": "STOP,QUIT",
            "opt_out_message": "<Brand Name>: You are now opted-out and will receive no further messages.\n",
            "subscriber_help": false,
            "help_keywords": "HELP,INFO",
            "help_message": "<Brand Name>: For help, email support@example.com. To opt-out, reply STOP\n",
            "sample_one": "Hi\nThis is a reminder that you have a scheduled appointment with Dr. Doe tomorrow at 4:00PM.\n",
            "sample_two": "Hello,\nYour order, number XXXXXXX, has been shipped.\n",
            "sample_three": "Here is you unique PIN number to access the application: 123456\n",
            "sample_four": "Hello Mr Doe,\nYour payment of 9.99$ was authorized. You can find your invoice in your customer account.\n",
            "sample_five": "Your delivery is scheduled for tomorrow between 8am and 2pm.\nIf you wish to change the delivery date please reply by typing 1 (tomorrow), 2 (Thursday) or 3 (deliver to post office) below.\n",
            "age_gated": true,
            "direct_lending": true,
            "embedded_link": false,
            "embedded_phone": false,
            "partner": true,
            "auto_renewal": true,
            "tcr_status": "UNKNOWN",
            "last_status_changes": [
               {
                  "status": "APPROVED",
                  "reason": "Approved after internal review.",
                  "change_date": "2022-01-01 01:01:01"
               }
            ],
            "mno_metadata": [
               {
                  "network_id": "10017",
                  "mno": "AT&T",
                  "status": "string",
                  "mno_support": true,
                  "mno_review": true,
                  "qualify": true,
                  "min_msg_samples": 2,
                  "req_subscriber_opt_in": true,
                  "req_subscriber_opt_out": true,
                  "req_subscriber_help": true,
                  "no_embedded_link": true,
                  "no_embedded_phone": true,
                  "att_msg_class": "Q",
                  "att_tpm": 3000,
                  "att_mms_tpm": 3000,
                  "att_number_based": true,
                  "tmo_brand_tier": "LOW",
                  "tmo_tpd": 0,
                  "complaints": [
                     {
                        "complaints": [
                           {
                              "description": "string",
                              "dca": "SINCH",
                              "created_at": "2019-08-24T14:15:22Z"
                           }
                        ]
                     }
                  ]
               }
            ],
            "vertical": "TECHNOLOGY",
            "number_pool": false,
            "registration_date": "2019-08-24T14:15:22Z",
            "renewal_date": "2019-08-24",
            "created_date": "2019-08-24T14:15:22Z",
            "last_updated": "2019-08-24T14:15:22Z",
            "billed_date": "2019-08-24T14:15:22Z",
            "hipaa": true,
            "carrier_brand_suspensions": [
               [
                  {}
               ]
            ],
            "_links": {
               "self": {
                  "href": "https://api.nexmo.com/v1/10dlc/brands/BLQKOPK/campaigns/C1DEB879"
               },
               "brand": {
                  "href": "https://api.nexmo.com/v1/10dlc/brands/BLQKOPK"
               },
               "numbers": {
                  "href": "https://api.nexmo.com/v1/10dlc/brands/BLQKOPK/campaigns/C1DEB879/numbers"
               }
            }
         }
      ]
     */

    protected array $data = [];

    public function getBrandId(): string
    {
        return $this->data['brand_id'];
    }

    public function getName(): string
    {
        return $this->data['label'];
    }

    public function getUseCase(): string
    {
        return $this->data['usecase'];
    }

    public function getStatus(): string
    {
        return $this->data['status'];
    }

    public function getTcrStatus(): string
    {
        return $this->data['tcr_status'];
    }

    /**
     * @throws \Exception
     */
    public function getCreationDate(): DateTimeImmutable
    {
        return new DateTimeImmutable($this->data['created_date']);
    }

    public function fromArray(array $data): void
    {
        $this->data = $data;
    }

    public function toArray(): array
    {
        return $this->data;
    }
}

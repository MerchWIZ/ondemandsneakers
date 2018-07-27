<?php

namespace App\Functions;

use App\Categories;
use Intervention\Image\Facades\Image as Image;

class Functions {

    public static function prettyJson($inputArray, $statusCode) {
        return response()->json($inputArray, $statusCode, array('Content-Type' => 'application/json'), JSON_PRETTY_PRINT);
    }

    public static function saveImage($file, $destinationPath, $destinationPathThumb = '') {
        $extension = $file->getClientOriginalExtension();
        $fileName = rand(111, 999) . time() . '.' . $extension;
        $image = $destinationPath . '/' . $fileName;
        $upload_success = $file->move($destinationPath, $fileName);
        //Functions::saveThumbImage($image,'fit',$destinationPath.$fileName);
        return $fileName;
    }

    // remove string from any length and concatinate three dots at end any string condition needle start to end 
    public static function stringTrim($string = '', $needle = 0, $start = 0, $end = 0) {
        return (strlen($string) > $needle) ? substr($string, $start, $end) . '...' : $string;
    }

    public static function relativeTime($time, $short = false) {
        $SECOND = 1;
        $MINUTE = 60 * $SECOND;
        $HOUR = 60 * $MINUTE;
        $DAY = 24 * $HOUR;
        $MONTH = 30 * $DAY;
        $before = time() - $time;

        if ($before < 0) {
            return "Not yet";
        }

        if ($short) {
            if ($before < 1 * $MINUTE) {
                return ($before < 5) ? "Just now" : $before . " seconds ago";
            }

            if ($before < 2 * $MINUTE) {
                return "1 minute ago";
            }

            if ($before < 45 * $MINUTE) {
                return floor($before / 60) . " minutes ago";
            }

            if ($before < 90 * $MINUTE) {
                return "1 hour ago";
            }

            if ($before < 24 * $HOUR) {

                return floor($before / 60 / 60) . " hours ago";
            }

            if ($before < 48 * $HOUR) {
                return "1 day ago";
            }

            if ($before < 30 * $DAY) {
                return floor($before / 60 / 60 / 24) . " days ago";
            }


            if ($before < 12 * $MONTH) {
                $months = floor($before / 60 / 60 / 24 / 30);
                return $months <= 1 ? "1 month ago" : $months . " montha ago";
            } else {
                $years = floor($before / 60 / 60 / 24 / 30 / 12);
                return $years <= 1 ? "1 year ago" : $years . " years ago";
            }
        }

        if ($before < 1 * $MINUTE) {
            return ($before <= 1) ? "Just now" : $before . " seconds ago";
        }

        if ($before < 2 * $MINUTE) {
            return "a minute ago";
        }

        if ($before < 45 * $MINUTE) {
            return floor($before / 60) . " minutes ago";
        }

        if ($before < 90 * $MINUTE) {
            return "an hour ago";
        }

        if ($before < 24 * $HOUR) {

            return (floor($before / 60 / 60) == 1 ? 'about an hour' : floor($before / 60 / 60) . ' hours') . " ago";
        }

        if ($before < 48 * $HOUR) {
            return "yesterday";
        }

        if ($before < 30 * $DAY) {
            return floor($before / 60 / 60 / 24) . " days ago";
        }

        if ($before < 12 * $MONTH) {

            $months = floor($before / 60 / 60 / 24 / 30);
            return $months <= 1 ? "one month ago" : $months . " months ago";
        } else {
            $years = floor($before / 60 / 60 / 24 / 30 / 12);
            return $years <= 1 ? "one year ago" : $years . " years ago";
        }

        return "$time";
    }

    public static function makeOrderEmailTemplate($orders, $addresses) {
        //d($order,1);
        $template = "";

        return view('email.order', compact('orders', 'addresses'));
        //die('aaa');
    }

    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function setEmailTemplate($contentModel, $replaces) {
        $data['body'] = $contentModel[0]->body;
        $data['subject'] = $contentModel[0]->subject;
        $data['title'] = $contentModel[0]->title;
        foreach ($replaces as $key => $replace) {
            $data['body'] = str_replace("%%" . $key . "%%", $replace, $data['body']);
        }

        return $data;
    }

    public static function sendEmail($email, $subject, $body, $header = '', $from = "aftab.golpik@gmail.com", $cc = "", $bcc = "") {
        // To send HTML mail, the Content-type header must be set
        if ($header == '') {
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <' . $from . '>' . "\r\n";
            $headers .= 'To: ' . $email . '' . "\r\n";
            $headers .= 'From: ' . $from . '' . "\r\n";
            if ($cc != "") {
                $headers .= 'Cc: ' . $cc . "\r\n";
            }
            if ($bcc != "") {
                $headers .= 'Bcc: ' . $bcc . "\r\n";
            }
        }
        $body = "<title></title><style></style></head><body>" . $body . "</body></html>";
        return mail($email, $subject, $body, $headers);
    }

    public static function makeCurlRequest($url) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
                )
        );
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }

    public static function setTemplate($body, $replaces) {

        $replaces["asset('')"] = asset("");
        $replaces["url('')"] = url("");
        foreach ($replaces as $key => $replace) {
            // $key=str_replace(" ", "", $key);
            $body = str_replace("{{" . $key . "}}", $replace, $body);
        }
        return $body;
    }

    public static function getCategories($allCategories) {
        $categories = array();
        return $categories = self::getBranch($allCategories, 1);
    }

    public static function getBranches($arr, $id) {
        $childrenArr = array();
        foreach ($arr as $item) {

            if ($item->parent_id == $id) {
                $childrenArr[] = $item;
            }
        }
        return $childrenArr;
    }

    public static function getBranch($arr, $id) {
        $branch = array();
        foreach ($arr as $item) {

            if ($item->id == $id) {

                $branch[$item->id] = $item;
                $branches = self::getBranches($arr, $id);

                $children = array();
                foreach ($branches as $child) {

                    $b = self::getBranch($arr, $child->id);

                    foreach ($b as $token => $child) {
                        $children[$token] = $child;
                    }
                }
                $branch[$item->id]['categories'] = $children;
                break;
            }
        }
        if (count($branch) == 0)
            echo 'WARNING ' . $id;
        return $branch;
    }

    public static function getPrice($user, $product) {

        $price = $product->salePrice;
        if ($product->sale == 1 && $product->price > $product->salePrice) {
            $price = $product->salePrice;
        }

        if (isset($user->id)) {
            $role = \App\Role::find($user->role_id);
            if (strtolower(trim($role->role)) == 'doctor') {
                $price = $product->priceForDoctors;
            }
        }


        return $price;
    }

    public static function getAge($birthDate) {

        $age = (date('Y') - date('Y', strtotime($birthDate)));
        return $age;
    }

public static function base64_to_jpeg($base64_string, $output_file) {
        // open the output file for writing
        $ifp = fopen( $output_file, 'wb' );

        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );

        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );

        // clean up the file resource
        fclose( $ifp );

        return $output_file;
    }

}

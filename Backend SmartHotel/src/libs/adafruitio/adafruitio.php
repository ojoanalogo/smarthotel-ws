<?php
/*
Library to send and retrieve data to/from the AdaFruit IO platform.
Copyright (C) 2016  Nicolas Simonnet
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
/**
 *
 * Wrapper around an AdaFruit IO account.
 * Provides methods to enumerate feed names, and obtain a feed wrapper.
 *
 */
class AdaFruitIO
{
    public $key;
    public $url;

    public function __construct($key, $url="http://io.adafruit.com")
    {
        $this->key = $key;
        $this->url = $url;
    }

    /**
     * Returns a feed wrapper
     * @param string $name
     * @return AdaFruitIOFeed
     */
    public function getFeed($name)
    {
        return new AdaFruitIOFeed($this->key, $name, $this->url);
    }

    /**
     * Returns the all the feed names in an array
     * @return array of string
     */
    public function getFeedNames($group) {
        $url = $this->url."/api/v2/MrARC/groups/" . $group . "/feeds";
        $c = curl_init($url);
        $headers = array();
        $headers[] = "X-AIO-Key: ".$this->key;
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
        $json = json_decode(curl_exec($c));
        curl_close($c);
        return $json;
    }
    public function getChartData($feed) {
        $url = $this->url."/api/v2/MrARC/feeds/" . $feed . "/data/chart?resolution=5&hours=8";
        $c = curl_init($url);
        $headers = array();
        $headers[] = "X-AIO-Key: ".$this->key;
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_HTTPHEADER, $headers);

        $json = json_decode(curl_exec($c));
        curl_close($c);
        return $json;
    }
}
/**
 * Represents a feed wrapper.
 * Provides methods to push data, and retrieve the last data pushed to the feed.
 */
class AdaFruitIOFeed
{
    public $key;
    public $url;
    public $name;

    public function __construct($key, $name, $url)
    {
        $this->key = $key;
        $this->name = $name;
        $this->url = $url;
    }

    /**
     * Pushes a new value to the feed in a json form
     *
     * @param mixed $value
     * @param string $quoted : indicates if the json data must be wrapped in quotes
     */
    public function send($value, $quoted = false)
    {
        $req = '{"value":';

        if($quoted) $req .= '"';

        $req .= $value;

        if($quoted) $req .= '"';

        $req .= '}';


        $url = $this->url."/api/feeds/".$this->name."/data/send";
        $res = $this->sendRequest($url, true, $req);

        return $res;
    }

    /**
     * Retrieves the last value of this feed
     * @return mixed
     */
    public function get()
    {
        $url = $this->url."/api/feeds/".$this->name."/data/last.txt";

        return $this->sendRequest($url);
    }

    /**
     * Sends an HTTP request
     * @param string $body
     */
    protected function sendRequest($url, $isPOST = false, $body = "")
    {

        $c = curl_init($url);

        $headers = array();
        $headers[] = "X-AIO-Key: ".$this->key;


        if($isPOST)
        {
            curl_setopt($c, CURLOPT_POST, true);
            $headers[] = "Content-Type: application/json";
            curl_setopt($c, CURLOPT_POSTFIELDS, $body);
        }

        curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($c);

        curl_close($c);

        return $res;
    }
}
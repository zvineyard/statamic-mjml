<?php

namespace Vineyard\StatamicMjml;

use Statamic\Tags\Tags;
use Statamic\Statamic;
use Statamic\Contracts\View\Antlers\Parser;

class Mjml extends Tags
{
    protected static $handle = 'mjml';

    public $parser;

    public function parser()
    {
        return $this->parser ?? app(Parser::class);
    }

    /**
     * The {{ mjml }} tag.
     *
     * @return string|array
     */
    public function index()
    {
        $mjml = $this->parser()->parse($this->content, $this->context->all());

        // MJML API Call
        $post = [
            'mjml' => (string) $mjml,
        ];

        $ch = curl_init('https://api.mjml.io/v1/render');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERPWD, config('statamic-mjml.mjml_api_key'));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));

        // Execute!
        $response = curl_exec($ch);
        curl_close($ch);

        if(isset(json_decode($response)->html))
        {
            return json_decode($response)->html;
        }
        else
        {
            return "Your MJML request failed. Please check your markup and try again.";
        }
    }
}
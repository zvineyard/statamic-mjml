# Statamic MJML Tag

The Statamic MJML tag parses MJML into HTML using the MJML.io API. It is free to sign up for the API and you can learn more here: [https://mjml.io/](https://mjml.io/).

## How to Install

You can search for this addon in the `Tools > Addons` section of the Statamic control panel and click **install**, or run the following command from your project root:

``` bash
composer require vineyard/statamic-mjml
```

Publish the addon's config file:

``` bash
php artisan vendor:publish --provider="Vineyard\StatamicMjml\ServiceProvider"
```

Get an MJML API key from https://mjml.io/api. This is required. Add it to your .env file as "MJML_API_KEY" or change the API key value in your ```config/statamic-mjml.php``` file.

## How to Use

In your Antlers template, wrap any chunk of MJML in a new ```{{ mjml }}``` tag and it will be converted to HTML.


``` html
{{ mjml }}

    <mj-body>
        <mj-section>
            <mj-column>
                <mj-text font-family="Helvetica" color="#F45E43">
                    <h1>Title</h1>
                    <p>Paragraph</p>
                    <p style="font-family:Comic Sans Ms">Another paragraph</p>
                </mj-text>
            </mj-column>
        </mj-section>
    </mj-body>

{{ /mjml }}
```

Or, if you prefer, in Blade.

``` html
<s:mjml>

    <mj-body>
        <mj-section>
            <mj-column>
                <mj-text font-family="Helvetica" color="#F45E43">
                    <h1>Title</h1>
                    <p>Paragraph</p>
                    <p style="font-family:Comic Sans Ms">Another paragraph</p>
                </mj-text>
            </mj-column>
        </mj-section>
    </mj-body>

</s:mjml>
```
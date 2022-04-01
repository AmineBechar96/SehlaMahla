<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/llll.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/llll.png">
    <title>{{'Facture-'.$invoice->id}}</title>

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png" type="image/x-icon"> <!-- Invoice styling -->
    <style>
        body {
            font-family: 'XBRiyas', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #000;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;

            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #000;
            height: fit-content;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
            border: 1px solif #c2c2c2;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr.topp td:nth-child(2) {
            padding-bottom: 40px !important;
            text-align: right;

        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.total td:nth-child(2) {
            text-align: left;

        }



        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .totaldiv {
            margin-top: 93px;
            margin-bottom: 20px;
            margin-left: 60%;

        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #f0f2f5;

            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.heading {
            border-radius: 5px;
            background: #c2c2c2;
            border-radius: 5px;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box div.total {
            text-align: left;
            margin-left: auto;

        }

        .invoice-box div.total span {

            font-weight: bold;
        }

        .invoice-box table .totaldiv {
            margin-top: 550px;
            border: 1px solid #000;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        @page {
            header: page-header;
            footer: page-footer;
        }
    </style>
</head>

<body>

    <div class="invoice-box">
        <table style="width:100%">

            <tr class="topp">

                <td></td>
                <td colspan="4">
                    <h3>Facture</h3>
                    #: {{$invoice->invoice_number}}<br />
                    Crée: {{$invoice->invoice_date}}<br />
                </td>

            </tr>

            <tr class="information" style="padding-top:25px !important;">
                <td colspan="5">
                    <table>
                        <tr>
                            <td>
                                <span style="font-weight:bold; margin-botttom:5px;"> Client: </span><br />
                                {{$invoice->client->name}}<br />
                                {{$invoice->client->address}}<br />
                                {{$invoice->client->email}}<br />
                                {{$invoice->client->phone}}

                            </td>
                            <td>
                                <span style="font-weight:bold ;margin-botttom:5px;"> Fournisseur de Service : </span>
                                <br />
                                {{$invoice->client->service->title}}<br />
                                {{$invoice->client->service->address}}<br />

                                {{$invoice->client->service->phone}}<br />

                                {{$invoice->socialMedia($invoice->client->service->id)}}
                            </td>


                        </tr>
                    </table>
                </td>
            </tr>





            <tr class="heading">
                <td>Description</td>
                <td style=" text-align: left;">Quantité</td>
                <td>Prix Unitaire</td>
                <td>Montant</td>
                <td></td>
            </tr>
            @foreach ($invoice->products as $order)
            <tr class="item">
                <td>{{$order->name}}</td>
                <td style=" text-align: left;">{{$order->pivot->quantity}}</td>
                <td>{{number_format($order->unit_price, 2, ',', ' ')}} DA</td>
                <td style="color:red">{{number_format(($order->unit_price *$order->pivot->quantity), 2, ',', ' ') }}
                    DA </td>
            </tr>
            @endforeach

        </table>

        <table class="totaldiv">
            <tr class="total">
                <td></td>

                <td colspan="2">SOUS-TOTAL :
                    {{number_format((($invoice->total - $invoice->tva_value -$invoice->shipping_value) + $invoice->discount_value), 2, ',', ' ')}}
                    DA </td>
            </tr>


            <tr class="total">
                <td></td>

                <td>TVA ({{$parameters->tva_rate}}) : <span
                        style="color:green">{{number_format($invoice->tva_value, 2, ',', ' ')}} DA
                    </span></td>
            </tr>
            <tr class="total">
                <td></td>

                <td>LIVRAISON ({{$parameters->shipping_rate}}) :
                    <span style="color:green">{{number_format($invoice->shipping_value, 2, ',', ' ')}} DA </span></td>
            </tr>
            <tr class="total">
                <td></td>

                <td>REDUCTION :
                    <span style="color:green">
                        {{number_format($invoice->discount_value, 2, ',', ' ')}}
                        DA </span></td>
            </tr>
            <tr class="total">
                <td></td>

                <td>TOTAL : <span style="font-weight:bold">{{number_format($invoice->total, 2, ',', ' ')}} DA </span>
                </td>
            </tr>

        </table>
        <div style="margin-top:30%">
            <h6>sahlamahla.com invoices tout droit reserve</h6>
        </div>

    </div>
</body>

</html>
@extends('others.email_templates.email_layout.master')

@section('email_style')
    <style type="text/css">
        body {
            text-align: center;
            font-family: 'Montserrat', sans-serif;
            background-color: #f6f7fb;
            display: block;
            width: 650px;
            padding: 0 12px;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            text-decoration: unset;
        }

        a {
            text-decoration: none;
        }

        p {
            margin: 15px 0;
        }

        h5 {
            color: #444;
            text-align: left;
            font-weight: 400;
        }

        .text-center {
            text-align: center
        }

        .title {
            color: #444444;
            font-size: 22px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-bottom: 0;
            text-transform: uppercase;
            display: inline-block;
            line-height: 1;
        }

        table {
            margin-top: 30px
        }

        table.top-0 {
            margin-top: 0;
        }

        table.order-template {
            border: 1px solid #eeeeee;
            border-collapse: collapse;
        }

        table.order-template tr:nth-child(even) {
            border-top: 1px solid #eeeeee;
            border-bottom: 1px solid #eeeeee;
        }

        table.order-template tr:nth-child(odd) {
            border-bottom: 1px solid #eeeeee;
        }

        .pad-left-right-space {
            border: unset !important;
        }

        .pad-left-right-space td {
            padding: 5px 15px;
        }

        .pad-left-right-space td p {
            margin: 0;
        }

        .pad-left-right-space td b {
            font-size: 15px;
            font-family: work-Sans, sans-serif;
        }

        .order-template th {
            font-size: 16px;
            padding: 15px;
            text-align: left;
            background: #fafafa;
        }

        .footer-social-icon tr td img {
            margin-left: 5px;
            margin-right: 5px;
        }

        .temp-social td {
            display: inline-block;
        }

        .temp-social td i {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #5c61f2;
            border: 1px solid #5c61f2;
            transition: all 0.5s ease;
        }

        .temp-social td i:hover {
            background-color: #5c61f2;
            color: #ffffff;
        }

        .temp-social td:nth-child(n+2) {
            margin-left: 15px;
        }

        .main-bg-light {
            background-color: rgba(62, 95, 206, 0.03);
            border-radius: 15px;
        }

        @media only screen and (max-width: 767px) {
            body {
                width: 90%;
            }

            .temp-social td i {
                width: 32px !important;
                height: 32px !important;
            }

            .temp-social td:nth-child(n+2) {
                margin-left: 6px !important;
            }
        }

        @media only screen and (max-width:575px) {
            body {
                width: 90%;
            }

            .order-template tbody tr:nth-child(n+2) td img {
                width: 40px;
            }

            .order-template tbody tr td:nth-child(3),
            .order-template tbody tr th:nth-child(3) {
                display: none;
            }

            .order-template tbody tr td,
            .order-template tbody tr th {
                width: 50px;
            }

            .content-detail tbody tr {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            .content-detail tbody tr td:nth-child(2) {
                display: none;
            }

            table tbody td>table:first-child {
                text-align: center !important;
            }
        }

        @media only screen and (max-width:480px) {
            body {
                width: 92%;
            }

            .order-template th,
            .order-template td h5 {
                font-size: 13px !important;
            }

            table.main-section {
                padding: 0 12px 22px !important;
                width: 80% !important;
            }
        }

        @media only screen and (max-width: 360px) {

            .order-template th,
            .order-template td h5 {
                font-size: 12px !important;
            }

            .order-template tbody tr td {
                padding-left: 0 !important;
            }

            .order-template tbody tr:nth-child(n+2) td img {
                width: 34px;
            }

            .order-template tr th:nth-child(n+2) {
                padding-left: 0 !important;
            }
        }
    </style>
@endsection

@section('email_body')

    <body style="margin: 20px auto;">
        <table class="main-section" align="center" border="0" cellpadding="0" cellspacing="0"
            style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%; border-radius:10px; padding-bottom:30px;">
            <tbody>
                <tr>
                    <td>
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="text-align: left;"
                            width="100%">
                            <tbody>
                                <tr>
                                    <td style="text-align: center;"><img
                                            src="{{ asset('assets/images/email-template/delivery-2.png') }}" alt=""
                                            style=";margin-bottom: 30px;border-radius:10px;"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style=" font-size: 14px; color:#717171;">
                                        <h4>Hi John Doe,</h4>
                                        </p>
                                        <p style=" font-size: 14px; color:#717171;">Order Is Successfully Processsed And
                                            Your Order Is On The Way,</p>
                                        <p style=" font-size: 14px; color:#717171;">Transaction ID : 267676GHERT105467,</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="content-detail" cellpadding="0" cellspacing="0" border="0" align="left"
                            style="width: 100%;margin-top: 10px;    margin-bottom: 10px;">
                            <tbody>
                                <tr>
                                    <td
                                        style="background-color: rgba(62,95,206,0.02);border: 1px solid #eeeeee; padding: 15px;letter-spacing: 0.3px;width: 50%; border-radius:10px;">
                                        <h5
                                            style="font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;border">
                                            Your Shipping Address</h5>
                                        <p
                                            style="text-align: left;font-weight: normal; font-size: 14px; color: #717171;line-height: 21px;    margin-top: 0;">
                                            268 Cambridge Lane New Albany,<br> IN 47150268 Cambridge Lane <br>New Albany, IN
                                            47150</p>
                                    </td>
                                    <td><img src="{{ asset('assets/images/email-template/space.jpg') }}" alt=" " height="25"
                                            width="30"></td>
                                    <td
                                        style="background-color: rgba(62,95,206,0.02);border: 1px solid #eeeeee;padding: 15px;letter-spacing: 0.3px;width: 50%; border-radius:10px;">
                                        <h5
                                            style="font-size: 16px;font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">
                                            Your Billing Address:</h5>
                                        <p
                                            style="text-align: left;font-weight: normal; font-size: 14px; color: #717171;line-height: 21px;    margin-top: 0;">
                                            268 Cambridge Lane New Albany,<br> IN 47150268 Cambridge Lane <br>New Albany, IN
                                            47150</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="order-template" border="0" cellpadding="0" cellspacing="0" align="left"
                            style="width: 100%; margin-bottom: 50px;">
                            <tbody>
                                <tr align="left">
                                    <th>PRODUCT</th>
                                    <th style="padding-left: 15px;">DESCRIPTION</th>
                                    <th>QUANTITY</th>
                                    <th>PRICE </th>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('assets/images/email-template/4.png') }}" alt="" width="80"></td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="margin-top: 15px;">AirPods Pro Case, Soft Silicone Skin Case.</h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color:#444;margin-top: 10px;">QTY : <span>1</span></h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>$1000</b></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('assets/images/email-template/1.png') }}" alt="" width="80"></td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="margin-top: 15px;">Black Mobile Vision 1 Pro with No Cost EMI/Additional
                                            Exchange Offers</h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color:#444;margin-top: 10px;">QTY : <span>1</span></h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>$5000</b></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('assets/images/email-template/4.png') }}" alt="" width="80"></td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="margin-top: 15px;">AirPods Pro Case, Soft Silicone Skin Case.</h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color:#444;margin-top: 10px;">QTY : <span>1</span></h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>$1000</b></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('assets/images/email-template/1.png') }}" alt="" width="80"></td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="margin-top: 15px;">Black Mobile Vision 1 Pro with No Cost EMI/Additional
                                            Exchange Offers</h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color:#444;margin-top: 10px;">QTY : <span>1</span></h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>$5000</b></h5>
                                    </td>
                                </tr>
                                <tr class="pad-left-right-space">
                                    <td class="m-t-5" colspan="2" align="left">
                                        <p style="font-size: 14px;">Subtotal : </p>
                                    </td>
                                    <td class="m-t-5" colspan="2" align="right"><b>$12000</b></td>
                                </tr>
                                <tr class="pad-left-right-space">
                                    <td colspan="2" align="left">
                                        <p style="font-size: 14px;">TAX :</p>
                                    </td>
                                    <td colspan="2" align="right"><b>$15</b></td>
                                </tr>
                                <tr class="pad-left-right-space">
                                    <td colspan="2" align="left">
                                        <p style="font-size: 14px;">VAT :</p>
                                    </td>
                                    <td colspan="2" align="right"><b>$15</b></td>
                                </tr>
                                <tr class="pad-left-right-space">
                                    <td colspan="2" align="left">
                                        <p style="font-size: 14px;">SHIPPING Charge :</p>
                                    </td>
                                    <td colspan="2" align="right"><b>$10</b></td>
                                </tr>
                                <tr class="pad-left-right-space">
                                    <td colspan="2" align="left">
                                        <p style="font-size: 14px;">Discount :</p>
                                    </td>
                                    <td colspan="2" align="right"><b> $1000</b></td>
                                </tr>
                                <tr class="pad-left-right-space">
                                    <td class="m-b-5" colspan="2" align="left">
                                        <p style="font-size: 14px;">Total :</p>
                                    </td>
                                    <td class="m-b-5" colspan="2" align="right"><b>$11040</b></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="temp-social main-bg-light text-center" align="center" border="0"
                            cellpadding="0" cellspacing="0" width="100%" style="margin-top:30px;">
                            <tbody>
                                <tr>
                                    <td style="padding: 30px;">
                                        <div>
                                            <h4 class="title" style="margin:0; text-align:center;">Follow us</h4>
                                        </div>
                                        <table class="footer-social-icon" border="0" cellpadding="0" cellspacing="0"
                                            align="center" style="margin-top:20px;">
                                            <tbody>
                                                <tr class="temp-social">
                                                    <td><a href="https://www.facebook.com"><i
                                                                class="fa fa-facebook"></i></a></td>
                                                    <td><a href="https://www.youtube.com/"><i
                                                                class="fa fa-youtube-play"></i></a></td>
                                                    <td><a href="https://twitter.com"><i class="fa fa-twitter"></i></a>
                                                    </td>
                                                    <td><a href="https://accounts.google.com/"><i
                                                                class="fa fa-google-plus"></i></a></td>
                                                    <td><a href="https://www.linkedin.com"><i class="fa fa-linkedin">
                                                            </i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div style="border-top: 1px solid #eeeeee; margin: 20px auto 0;"></div>
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                            style="margin: 20px auto 0;">
                                            <tbody>
                                                <tr>
                                                    <td><a href="javascript:void(0)"
                                                            style="color: #5c61f2;font-size:14px;text-transform: capitalize;font-weight:600;">Want
                                                            to change how you receive these emails?</a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="font-size:14px; margin:8px 0; color:#717171;">2022 - 23
                                                            Copy Right by Themeforest powerd by Pixel Strap</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)"
                                                            style="color: #5c61f2;font-size: 14px;text-transform: capitalize;font-weight:600; margin:0;">Unsubscribe</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
@endsection

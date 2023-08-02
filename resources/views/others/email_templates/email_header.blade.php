@extends('others.email_templates.email_layout.master')

@section('email_style')
    <style type="text/css">
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f6f7fb;
            display: block;
            width: 650px;
            padding: 0 12px;
        }

        a {
            text-decoration: none;
        }

        span {
            font-size: 14px;
        }

        p {
            font-size: 13px;
            line-height: 1.7;
            letter-spacing: 0.7px;
            margin-top: 0;
        }

        .text-center {
            text-align: center
        }

        h6 {
            font-size: 16px;
            margin: 0 0 18px 0;
        }

        @media only screen and (max-width: 767px) {
            body {
                width: auto;
                margin: 20px auto;
            }

            .logo-sec {
                width: 500px !important;
            }
        }

        @media only screen and (max-width: 575px) {
            .logo-sec {
                width: 400px !important;
            }
        }

        @media only screen and (max-width: 480px) {
            .logo-sec {
                width: 300px !important;
            }
        }

        @media only screen and (max-width: 360px) {
            .logo-sec {
                width: 250px !important;
            }
        }
    </style>
@endsection

@section('email_body')

    <body style="margin: 30px auto;">
        <table style="width: 100%">
            <tbody>
                <tr>
                    <td>
                        <table style="background-color: #f6f7fb; width: 100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <table style="margin: 0 auto; margin-bottom: 30px">
                                            <tbody>
                                                <tr class="logo-sec"
                                                    style="display: flex; align-items: center; justify-content: space-between; width: 650px;">
                                                    <td><img class="img-fluid" src="{{ asset('assets/images/logo/logo2.png') }}"
                                                            alt=""></td>
                                                    <td style="text-align: right; color:#999"><span>Some Description</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="margin: 0 auto; background-color: #fff; border-radius: 8px">
                            <tbody>
                                <tr>
                                    <td style="padding: 30px">
                                        <h6 style="font-weight: 600">Password Reset</h6>
                                        <p>you forgot your password for Tivo Admin. If this is true, click below to reset
                                            your password.</p>
                                        <p style="text-align: center"><a href="{{ route('reset_password') }}"
                                                style="padding: 10px; background-color:#5c61f2; color: #fff; display: inline-block; border-radius:30px; font-weight:700; padding:0.6rem 1.75rem;">Reset
                                                Password</a></p>
                                        <p>If you have remember your password you can safely ignore his email.</p>
                                        <p>Good luck! Hope it works.</p>
                                        <p style="margin-bottom: 0">
                                            Regards,<br>Webiots Software</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="margin: 0 auto; margin-top: 30px">
                            <tbody>
                                <tr style="text-align: center">
                                    <td>
                                        <p style="color: #999; margin-bottom: 0">333 Woodland Rd. Baldwinsville, NY 13027
                                        </p>
                                        <p style="color: #999; margin-bottom: 0">Don't Like These Emails?<a href="#"
                                                style="color: #5c61f2">Unsubscribe</a></p>
                                        <p style="color: #999; margin-bottom: 0">Powered By Tivo Admin</p>
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

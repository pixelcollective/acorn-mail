<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }
    </style>
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
                                        <h1 style="text-align: left; font-size: 14px;">{!! $siteName ?? '' !!}</a>
                                    </td>
                                </tr>
                                @isset($user->user_firstname)
                                <tr>
                                    <td class="content-cell">
                                        <p>{!! $user->user_firstname !!}</p>
                                    </td>
                                </tr>
                                @endisset
                                <tr>
                                    <td class="content-cell">
                                        <p>You have a new notification from WordPress:</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-cell">
                                        @isset($body)
                                            {{ $body }}
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-cell" style="margin-top: 20px;">
                                        <p>{{ $footer ?? '' }}</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
